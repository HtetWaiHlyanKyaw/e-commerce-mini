<?php

namespace App\Http\Controllers\User;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ShopController extends Controller
{
    public function shop(){
         // Eager load brand and model information
         $datas = Product::with('brand', 'ProductModel')->get();
         return view('user.shop', compact('datas'));
    }

    // public function display()
    // {
    //     // Eager load brand and model information
    //     $datas = Product::with('brand', 'ProductModel')->get();
    //     return view('user.shop', compact('datas'));
    // }

}
