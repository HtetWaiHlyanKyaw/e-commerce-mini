<?php

namespace App\Http\Controllers\User;
use Illuminate\Support\Facades\URL;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Brand;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\LengthAwarePaginator;

class ShopController extends Controller
{
    public function shop()
{
    $brands = Brand::get();
    $minPrice = Product::min('price');
    $maxPrice = Product::max('price');
    $products = Product::with('brand', 'ProductModel')->get();
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

    // Pass the paginator and other data to the view
    return view('user.shop', compact('paginatedGroupedData', 'brands', 'minPrice', 'maxPrice', 'uniqueColors', 'uniqueStorage'));
}

    public function details(Request $request)
{
    $modelId = $request->input('model_id');
    $products = Product::where('product_model_id', $modelId)->get();

    // Extract unique combinations of color and storage option
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

    // Pass product variants to the view
    return view('user.buyProduct', [
        'productVariants' => $productVariants,
    ]);
}

}
