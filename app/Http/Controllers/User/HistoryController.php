<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\CustomerPurchase;
use App\Models\CustomerPurchaseDetail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    public function list(){
        $user = Auth::user();
        $user_id = Auth::user()->id;
        $customerPurchases = CustomerPurchase::with('details', 'user')
        ->where('user_id', $user_id)
        ->latest()
        ->get();
        // Retrieve the cart items for the authenticated user
        $cart = $user->cart ?? [];

        // Retrieve all products
        $products = Product::all();
        return view('user.history',['user'=> $user, 'cart'=>$cart, 'products'=>$products, 'customerPurchases'=>$customerPurchases ]);
    }

    public function detail($id){
        $customerPurchase = CustomerPurchase::with('details', 'user')->findOrFail($id);
        $details = CustomerPurchaseDetail::where('customer_purchase_id', $id)->paginate(10);
        $user = Auth::user();
        $cart = $user->cart ?? [];
        // Retrieve all products
        $products = Product::all();
        return view('user.history_detail', compact('details', 'customerPurchase', 'user', 'cart', 'products'));
    }
}
