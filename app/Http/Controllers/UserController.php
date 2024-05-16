<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function RegularPage(){
        return view('user.regular_page');
    }

    public function contact() {
        $user = Auth::user();
        $cart = $user ? $user->cart : [];
        $products = Product::all();
        return view('user.contact', compact('cart', 'products'));
    }


    public function singleBlog(){
        return view('user.single_blog');
    }

    public function checkout(Request $request) {
        $multipleProducts = false;
        $product = Product::with('brand', 'ProductModel')->find($request->product_id);
        $quantity = $request->qtyHidden;
        return view('user.checkout',['product' => $product,
        'quantity' => $quantity,
        'multipleProducts'=>$multipleProducts]);
    }

    public function blog() {
        $user = Auth::user();
        $cart = $user ? $user->cart : [];
        $products = Product::all();
        return view('user.blog', compact('cart', 'products'));
    }

    public function productDetail(){
        return view('user.single_product_details');
    }

    // public function Profile(){
    //     return view('user.profile');
    // }


}
