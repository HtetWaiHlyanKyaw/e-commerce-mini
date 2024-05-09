<?php

namespace App\Http\Controllers\User;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Brand;
use App\Models\review;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\CustomerPurchase;
use App\Models\CustomerPurchaseDetail;
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
        $products = Product::with('brand', 'ProductModel')->get()->sortByDesc('created_at');

        $uniqueColors = $products->pluck('color')->unique();
        $uniqueStorage = $products->pluck('storage_option')->unique();
        $filteredMinPrice = null;
        $filteredMaxPrice = null;        // Eager load brand and model information
        $datas = Product::with('brand', 'ProductModel')->get();
        $groupedData = $products->groupBy('product_model_id');
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
        $filteredSelectedValue = 'newest';
        // Pass the paginator and other data to the view
        return view('user.shop', compact('paginatedGroupedData', 'brands', 'minPrice', 'maxPrice', 'uniqueColors', 'uniqueStorage', 'user', 'cart', 'products','filteredMinPrice','filteredMaxPrice', 'filteredSelectedValue'));
    }

    public function details(Request $request)
    {
        $modelId = $request->input('model_id');
        $products = Product::where('product_model_id', $modelId)->get();

        $productVariants = $products->map(function ($product) {
            return [
                'color' => $product->color,
                'storage_option' => $product->storage_option,
                'image' => asset('storage/products/' . $product->image),
                'name' => trim(strstr($product->name, '(', true)),
                'description' => $product->description,
                'price' => $product->price,
                'id' => $product->id,
                'quantity' => $product->quantity,
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
        $cartProductIds = $user->cart->pluck('product_id')->toArray() ?? [];
        $productExistsInCart = in_array($modelId, $cartProductIds);

        if ($user === null) {
            $hasBoughtProductModel = false;
        } else {
            $hasBoughtProductModel = CustomerPurchase::whereHas('details', function ($query) use ($modelId) {
                $query->whereHas('product', function ($query) use ($modelId) {
                    $query->where('product_model_id', $modelId);
                });
            })->where('user_id', $user->id)->exists();
        }

        $brands = Brand::all();
        $minPrice = Product::min('price');
        $maxPrice = Product::max('price');
        $uniqueColors = $products->pluck('color')->unique();
        $uniqueStorage = $products->pluck('storage_option')->unique();
        $cart = $user->cart ?? [];
        $products = Product::all();

        return view('user.buyProduct', compact(
            'productVariants',
            'averageRating',
            'totalRating',
            'totalComments',
            'hasBoughtProductModel',
            'brands',
            'minPrice',
            'maxPrice',
            'uniqueColors',
            'uniqueStorage',
            'user',
            'cart',
            'products',
            'productExistsInCart' // Pass productExistsInCart to the view
        ));
    }

    public function fetchComments($product_id, $limit)
    {
        $product = Product::find($product_id);
        $model_id = $product->product_model_id;
        $comments = Review::with('user')
            ->where('product_model_id', $model_id)
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
        $validatedData = $request->validate([
            'product_id' => 'required|exists:products,id',
            'comments' => 'required|string|max:255',
            // 'rating' => 'integer|between:1,5',
        ]);

        $productModelId = Product::where('id', $validatedData['product_id'])->value('product_model_id');
        $review = new Review();
        $review->user_id = auth()->id(); // Assuming the user is authenticated
        $review->product_model_id = $productModelId;
        $review->comments = $validatedData['comments'];
        $review->rating = $request->rating;
        $review->save();

        return back()->with('success', 'Comment posted successfully');
    }

    // public function filterProducts(Request $request){
    //     $brand_id = $request->input('brands');
    //     $color = $request->input('colors');
    //     dd($brand_id);
    //     // $storage = $request ->input('storage');
    //     $query = Product::with('brand', 'ProductModel')->orderByDesc('created_at');

    //     if ($brand_id !== 'all') {

    //          $query->where('brand_id', $brand_id);
    //     }

    //     if ($color !== 'all') {

    //         $query->where('color', $color);
    //     }

    //     // if ($storage !== 'all') {

    //     //     $query->where('storage', $storage);
    //     // }

    //     $filteredProducts = $query->get();
    //     return response()->json($filteredProducts);

    // }

    public function filterProducts(Request $request)
    {
        $filteredBrands = $request->input('brands');
        $filteredColors = $request->input('colors');
        $filteredStorage = $request->input('storage');
        $filteredMinPrice = $request->input('minPrice');
        $filteredMaxPrice = $request->input('maxPrice');
        $filteredSelectedValue = $request->input('select');

        $brands = Brand::all();
        $minPrice = Product::min('price');
        $maxPrice = Product::max('price');
        $products = Product::with('brand', 'ProductModel')->orderByDesc('created_at')->get();
        $uniqueColors = $products->pluck('color')->unique();
        $uniqueStorage = $products->pluck('storage_option')->unique();

        $query = Product::query();

        if (!empty($filteredBrands)) {
            $query->whereIn('brand_id', $filteredBrands);
        }

        if (!empty($filteredColors)) {
            $query->whereIn('color', $filteredColors);
        }
        if (!empty($filteredStorage)) {
            $query->whereIn('storage_option', $filteredStorage);
        }

        if (!empty($filteredMinPrice) && !empty($filteredMaxPrice)) {
            $query->whereBetween('price', [$filteredMinPrice, $filteredMaxPrice]);
        }

        if ($filteredSelectedValue === 'newest') {
            $query->orderBy('created_at', 'desc');
        }
        else if($filteredSelectedValue == 'A to Z'){
            $query->orderBy('name', 'asc');
        }
        else if($filteredSelectedValue == 'Z to A'){
            $query->orderBy('name', 'desc');
        }
        else if($filteredSelectedValue == 'high to low'){
            $query->orderBy('price', 'desc');
        }
        else{
            $query->orderBy('price', 'asc');
        }
        $filteredProducts = $query->get();
        $groupedData = $filteredProducts->groupBy('product_model_id');
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
        return view('user.shop', compact('paginatedGroupedData', 'brands', 'minPrice', 'maxPrice', 'uniqueColors', 'uniqueStorage', 'user', 'cart', 'products','filteredMinPrice','filteredMaxPrice', 'filteredSelectedValue'));

    }

    public function purchaseCreate(Request $request){
        $request->validate([
            'full_name' => 'required|string|max:255',
            'town' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'phone_no' => 'required|string|regex:/^09\d{9}$/',
            'payment_method' => 'required|string|in:Cash On Delivery,Mobile Banking,Mobile Wallet,Direct Bank Transfer',
            'quantity' => 'required|integer|min:1',

        ]);
        $customerPurchase = new CustomerPurchase();
        $customerPurchase->invoice_id = CustomerPurchase::generateInvoiceId();
        $customerPurchase->total_quantity = $request->quantity;
        $customerPurchase->total_price = $request->price;
        $customerPurchase->payment_method = $request->payment_method;
        $customerPurchase->user_id = auth()->user()->id;
        $customerPurchase->town = $request->town;
        $customerPurchase->address = $request->address;
        $customerPurchase->full_name = $request->full_name;
        $customerPurchase->phone = $request->phone_no;
        $customerPurchase->save();

        $product = Product::find($request->product_id);
        $detail = new CustomerPurchaseDetail();
        $detail->customer_purchase_id = $customerPurchase->id;
        $detail->product_id = $request->product_id; // Assuming you have product IDs in the selectedProducts array
        $detail->price = $product->price; // Assuming you have product prices in the selectedProducts array
        $detail->quantity = $request->quantity; // Assuming you have product quantities in the selectedProducts array
        $detail->sub_total = $product->price * $request->quantity;
        $detail->save();
        session()->flash('alert', [
            'type' => 'success',
            'message' => 'Purchase Complete. Thank you for shoping with us.',
        ]);
        Product::reduceQuantity($request->product_id, $request->quantity);
        return redirect()->route('user.history');
    }
}
