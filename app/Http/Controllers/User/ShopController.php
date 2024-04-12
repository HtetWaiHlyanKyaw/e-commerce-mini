<?php

namespace App\Http\Controllers\User;

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

        $datas = Product::with('brand', 'ProductModel')->get();
        $groupedData = $datas->groupBy('product_model_id');
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $perPage = 8;
        $currentPageItems = $groupedData->slice(($currentPage - 1) * $perPage, $perPage)->all();
        $paginatedGroupedData = new LengthAwarePaginator($currentPageItems, count($groupedData), $perPage);

        return view('user.shop', compact('paginatedGroupedData', 'brands', 'minPrice', 'maxPrice', 'uniqueColors', 'uniqueStorage'));
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
            ];
        })->unique(function ($variant) {
            return $variant['color'] . '_' . $variant['storage_option'];
        });

        return view('user.buyProduct', [
            'productVariants' => $productVariants,
        ]);
    }

}
