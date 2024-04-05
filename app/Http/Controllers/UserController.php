<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index(){

        return view('user.page');
    }

    public function Regular_page(){
        return view('user.regular_page');
    }

    public function contact(){
        return view('user.contact');
    }

    public function shop(){
        return view('user.shop');
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

}
