<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class CustomerController extends Controller
{
    public function list(){
        $data = User::get();
        return view('admin.Customer.customer_list' , compact('data'));
    }
}
