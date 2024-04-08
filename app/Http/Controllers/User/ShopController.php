<?php

namespace App\Http\Controllers\User;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Brand;
use App\Http\Controllers\Controller;

class ShopController extends Controller
{
    public function shop(){

        $brands = Brand::get();
        $minPrice = Product::min('price');
        $maxPrice = Product::max('price');
        $products = Product::all();
        $uniqueColors = $products->pluck('color')->unique();
        $uniqueStorage = $products->pluck('storage_option')->unique();
        // return view('user.shop',compact('brands','minPrice','maxPrice','uniqueColors','uniqueStorage'));
         // Eager load brand and model information
         $datas = Product::with('brand', 'ProductModel')->get();
         return view('user.shop', compact('datas','brands','minPrice','maxPrice','uniqueColors','uniqueStorage'));
    }

    // public function display()
    // {
    //     // Eager load brand and model information
    //     $datas = Product::with('brand', 'ProductModel')->get();
    //     return view('user.shop', compact('datas'));
    // }

}
