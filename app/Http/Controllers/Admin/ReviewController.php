<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function review(){
        $userdata =review::with('User', 'ProductModel')->get();

        // $data = review::get();
        return view('admin.Products.product_review' , ['userdata' =>  $userdata]);
    }
}
