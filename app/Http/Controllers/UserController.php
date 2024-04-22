<?php

namespace App\Http\Controllers;

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

    public function checkout(){
        return view('user.checkout');
    }

    public function blog(){
        return view('user.blog');
    }

    public function productDetail(){
        return view('user.single_product_details');
    }

}
