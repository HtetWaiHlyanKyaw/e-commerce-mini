<?php

namespace App\Http\Controllers\user;


use App\Models\Cart;
use App\Models\User;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\QueryException; // Import QueryException

class CartController extends Controller
{
    public function add(Request $request)
    {
        logger($request);
        // Prepare data for creating a new cart item
        $data = [
            'user_id' => $request->userId,
            'product_id' => $request->productId,
            'qty' => $request->qty
        ];

        // Create a new cart item in the database
        $cart = Cart::create($data);

        // Check if the cart item was created successfully
        if ($cart) {
            // Return a JSON response indicating success
            return response()->json(['message' => 'Item added to cart successfully'], 200);
        } else {
            // Return a JSON response with an error message
            return response()->json(['message' => 'Failed to add item to cart'], 500);
        }
    }



    // Cart List Page

    public function cart()
    {
        $data = Cart::where('carts.user_id', Auth::user()->id)
            ->select('carts.*', 'products.image as product_image', 'products.name as product_name', 'products.price as product_price')
            ->leftJoin('products', 'products.id', 'carts.product_id')
            ->get();

        $subTotal = 0;
        foreach ($data as $cart) {
            $subTotal += $cart->qty * $cart->product_price;
        }

        return view('user.cart', compact('data', 'subTotal'));
    }
}