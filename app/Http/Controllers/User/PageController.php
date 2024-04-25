<?php

namespace App\Http\Controllers\User;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\CustomerPurchaseDetail;

class PageController extends Controller
{
    //
    public function index(){
        $topModels = CustomerPurchaseDetail::select('products.product_model_id', DB::raw('SUM(customer_purchase_details.quantity) as total_quantity'))
                                            ->join('products', 'customer_purchase_details.product_id','products.id')
                                            ->groupBy('products.product_model_id')
                                            ->orderByDesc('total_quantity')
                                            ->limit(4)
                                            ->get();

        $topModelIds = $topModels->pluck('product_model_id')->toArray();
        $topProducts = Product::whereIn('product_model_id', $topModelIds)->get();
        $topProducts = $topProducts->groupBy('product_model_id');
        $newestProducts = Product::orderBy('created_at', 'desc')
                                ->get();
        $newestProducts = $newestProducts->groupBy('product_model_id')->take(4);

          // Retrieve the authenticated user
     $user = Auth::user();

     // Retrieve the cart items for the authenticated user
     $cart = $user->cart ?? [];

     // Retrieve all products
     $products = Product::all();
        return view('user.page', compact('topProducts','newestProducts', 'user', 'cart', 'products'));
    }

}
