<?php

namespace App\Http\Controllers\User;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Brand;
use App\Models\review;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\CustomerPurchase;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\LengthAwarePaginator;

class ShopController extends Controller
{
    public function shop()
    {
        $brands = Brand::all();
        $minPrice = Product::min('price');
        $maxPrice = Product::max('price');
        $products = Product::with('brand', 'ProductModel')->orderByDesc('created_at')->get();
        $uniqueColors = $products->pluck('color')->unique();
        $uniqueStorage = $products->pluck('storage_option')->unique();

        // Eager load brand and model information
        $datas = Product::with('brand', 'ProductModel')->get();
        $groupedData = $datas->groupBy('product_model_id');
        $perPage = 12;
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $currentPageItems = $groupedData->slice(($currentPage - 1) * $perPage, $perPage)->all();

        // Create a paginator instance
        $paginatedGroupedData = new LengthAwarePaginator(
            $currentPageItems,
            count($groupedData),
            $perPage,
            $currentPage
        );

        // Set the path for the paginator
        $paginatedGroupedData->setPath(URL::current());

        // Retrieve the authenticated user
        $user = Auth::user();

        // Retrieve the cart items for the authenticated user
        $cart = $user->cart ?? [];

        // Retrieve all products
        $products = Product::all();

        // Pass the paginator and other data to the view
        return view('user.shop', compact('paginatedGroupedData', 'brands', 'minPrice', 'maxPrice', 'uniqueColors', 'uniqueStorage', 'user', 'cart', 'products'));
    }

    public function details(Request $request)
    {
        $modelId = $request->input('model_id');
        $products = Product::where('product_model_id', $modelId)->get();
        // $reviews = Review::with('user')->latest()->take(2)->get();
        $productVariants = $products->map(function ($product) {
            return [
                'color' => $product->color,
                'storage_option' => $product->storage_option,
                'image' => asset('storage/products/' . $product->image),
                'name' => trim(strstr($product->name, '(', true)),
                'description' => $product->description,
                'price' => $product->price,
                'id' => $product->id,
            ];
        })->unique(function ($variant) {
            return $variant['color'] . '_' . $variant['storage_option'];
        });
        $averageRating = Review::where('product_model_id', $modelId)
            ->avg('rating');
        $averageRating = round($averageRating);
        $totalRating = Review::where('product_model_id', $modelId)
            ->count('rating');
        $totalComments = Review::where('product_model_id', $modelId)
            ->count('comments');

        $user = auth()->user();
        $cart = $user->cart ?? [];
        $products = Product::all();
        if ($user === null) {
            $hasBoughtProductModel = false;
        } else {
            $hasBoughtProductModel = CustomerPurchase::whereHas('details', function ($query) use ($modelId) {
                $query->whereHas('product', function ($query) use ($modelId) {
                    $query->where('product_model_id', $modelId);
                });
            })->where('user_id', $user->id)->exists();
        }

        return view('user.buyProduct', [
            'productVariants' => $productVariants,
            // 'reviews' => $reviews,
            'averageRating' => $averageRating,
            'totalRating' => $totalRating,
            'totalComments' => $totalComments,
            'hasBoughtProductModel' => $hasBoughtProductModel,
            'cart' =>$cart,
            'user'=>$user,
            'products'=>$products,
        ]);
    }

    // public function details(Request $request)
    // {
    //     $modelId = $request->input('model_id');
    //     $products = Product::where('product_model_id', $modelId)->get();

    //     $productVariants = $products->map(function ($product) {
    //         return [
    //             'color' => $product->color,
    //             'storage_option' => $product->storage_option,
    //             'image' => asset('storage/products/' . $product->image),
    //             'name' => trim(strstr($product->name, '(', true)),
    //             'description' => $product->description,
    //             'price' => $product->price,
    //             'id' => $product->id,
    //         ];
    //     })->unique(function ($variant) {
    //         return $variant['color'] . '_' . $variant['storage_option'];
    //     });

    //     $averageRating = Review::where('product_model_id', $modelId)
    //         ->avg('rating');
    //     $averageRating = round($averageRating);
    //     $totalRating = Review::where('product_model_id', $modelId)
    //         ->count('rating');
    //     $totalComments = Review::where('product_model_id', $modelId)
    //         ->count('comments');

    //     $user = auth()->user();

    //     if ($user === null) {
    //         $hasBoughtProductModel = false;
    //     } else {
    //         $hasBoughtProductModel = CustomerPurchase::whereHas('details', function ($query) use ($modelId) {
    //             $query->whereHas('product', function ($query) use ($modelId) {
    //                 $query->where('product_model_id', $modelId);
    //             });
    //         })->where('user_id', $user->id)->exists();
    //     }

    //     $brands = Brand::all();
    //     $minPrice = Product::min('price');
    //     $maxPrice = Product::max('price');
    //     $uniqueColors = $products->pluck('color')->unique();
    //     $uniqueStorage = $products->pluck('storage_option')->unique();
    //     $cart = $user->cart ?? [];
    //     $products = Product::all();

    //     return view('user.buyProduct', compact(
    //         'productVariants',
    //         'averageRating',
    //         'totalRating',
    //         'totalComments',
    //         'hasBoughtProductModel',
    //         'brands',
    //         'minPrice',
    //         'maxPrice',
    //         'uniqueColors',
    //         'uniqueStorage',
    //         'user',
    //         'cart',
    //         'products'
    //     ));
    // }


    public function fetchComments($product_id, $limit)
    {
        $product = Product::find($product_id);
        $model_id = $product->product_model_id;
        $comments = Review::with('user')
            ->where('product_model_id', $model_id) // Filter comments by product_id
            ->latest()
            ->take($limit)
            ->get();

        $formattedComments = $comments->map(function ($comment) {
            $comment->formatted_created_at = Carbon::parse($comment->created_at)->format('F j, Y');
            return $comment;
        });

        return response()->json($formattedComments);
    }

    public function storeComment(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'product_id' => 'required|exists:products,id',
            'comments' => 'required|string|max:255',
            // 'rating' => 'integer|between:1,5',
        ]);


        $productModelId = Product::where('id', $validatedData['product_id'])->value('product_model_id');
        // Create a new review instance
        $review = new Review();
        $review->user_id = auth()->id(); // Assuming the user is authenticated
        $review->product_model_id = $productModelId;
        $review->comments = $validatedData['comments'];
        $review->rating = $request->rating;
        $review->save();

        // Redirect back with a success message
        return back()->with('success', 'Comment posted successfully');
    }

    public function filterProducts(Request $request){
        $brand_id = $request->input('brands');
        $color = $request->input('colors');
        $storage = $request ->input('storage');
        $query = Product::with('brand', 'ProductModel')->orderByDesc('created_at');

        if ($brand_id !== 'all') {

             $query->where('brand_id', $brand_id);
        }

        if ($color !== 'all') {

            $query->where('color', $color);
        }

        if ($storage !== 'all') {

            $query->where('storage', $storage);
        }

        $filteredProducts = $query->get();
        return response()->json($filteredProducts);
    }
}
