<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function shop(){
        return view('user.shop');
    }


    public function list()
    {
        $data = Products::all();
        return view('admin.Brands.brand_list', compact('data'));
    }

}
