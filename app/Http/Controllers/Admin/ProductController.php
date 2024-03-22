<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function page()
     {
         // Eager load brand and model information
         $data = Product::get();
         return view('admin.Products.product_create', compact('data'));
     }
     public function create(Request $request)
     {

     }







    private function vali($request)
    {
        $rules = [
            'productName' => 'required',
            'image' => 'required | image | mimes:jpeg,jpg,png',
            'BrandId' => 'required',
            'ModelName' => 'required',
            'storage_option' => 'required',
            'color' => 'required',
            'price' => 'required',
            'quantity' => 'required',
            'low_stock' => 'required',
            'description' => 'required',

        ];
        Validator::make($request->all(), $rules)->validate();
    }

}
