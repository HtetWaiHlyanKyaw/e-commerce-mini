<?php

namespace App\Http\Controllers\user;


use App\Models\Cart;
use App\Models\User;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\QueryException; // Import QueryException

class CartController extends Controller
{
    public function add(Request $request)
    {
        try {
            // Check if the product already exists in the cart for the current user
            $existingCartItem = Cart::where('user_id', $request->userId)
                ->where('product_id', $request->productId)
                ->first();

            if ($existingCartItem) {
                // Product already exists in the cart, return a message
                return response()->json(['message' => 'Product already in cart'], 409);
            } else {
                // Create a new cart item in the database
                $data = [
                    'user_id' => $request->userId,
                    'product_id' => $request->productId,
                    'qty' => $request->qty
                ];
                Cart::create($data);
                return response()->json(['message' => 'Item added to cart successfully'], 200);
            }
        } catch (QueryException $e) {
            // Log the error if any
            Log::error($e->getMessage());
            return response()->json(['message' => 'Failed to add item to cart'], 500);
        }
    }

    // Cart List Page
    public function cart()
    {
        $data = Cart::where('carts.user_id', Auth::user()->id)
            ->select('carts.*', 'products.image as product_image', 'products.name as product_name', 'products.price as product_price', 'products.quantity as product_quantity')
            ->leftJoin('products', 'products.id', 'carts.product_id')
            ->orderBy('id', 'asc')
            ->distinct('product_id') // Retrieve only distinct products
            ->get();

        // Assume you have a logic to determine if the product is already in the cart
        $cartExists = true; // For demonstration, replace this with your actual logic

        $subTotal = 0;
        foreach ($data as $cart) {
            $subTotal += $cart->qty * $cart->product_price;
        }

        return view('user.cart', compact('data', 'subTotal', 'cartExists'));
    }



    //Delete Product In cart
    public function deleteProduct(Request $request)
    {
        Cart::where('id', $request->cartId)
            ->where('user_id', Auth::user()->id)
            ->delete();
    }

    //Cart Clear
    public function clearCart()
    {
        Cart::where('user_id', Auth::user()->id)->delete();
        return redirect()->route('cartList');
    }
}
