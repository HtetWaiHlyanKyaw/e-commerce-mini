<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Product;

class ShopController extends Controller
{
    public function shop(){

        $brands = Brand::get();
        $minPrice = Product::min('price');
        $maxPrice = Product::max('price');
        $products = Product::all();
        $uniqueColors = $products->pluck('color')->unique();
        $uniqueStorage = $products->pluck('storage_option')->unique();
        return view('user.shop',compact('brands','minPrice','maxPrice','uniqueColors','uniqueStorage'));
    }


}
