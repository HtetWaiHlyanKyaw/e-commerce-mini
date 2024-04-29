<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function RegularPage(){
        return view('user.regular_page');
    }

    public function contact(){
        return view('user.contact');
    }

    public function singleBlog(){
        return view('user.single_blog');
    }

    public function checkout(Request$request) {

        $product = Product::with('brand', 'ProductModel')->find($request->product_id);
        $quantity = $request->input('qtyHidden');
        return view('user.checkout',['product' => $product,
        'quantity' => $quantity ]);
    }

    public function blog(){
        return view('user.blog');
    }

    public function productDetail(){
        return view('user.single_product_details');
    }

}
