<?php

namespace App\Http\Controllers\user;


use App\Models\Cart;
use App\Models\User;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\QueryException; // Import QueryException

class CartController extends Controller
{
    public function add(Request $request)
    {
        logger($request->all());
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
            // If creation failed, return an error response
            return response()->json(['error' => 'Failed to add item to cart'], 500);
        }
    }
}
