<?php

namespace App\Http\Controllers\User;

use App\Models\Product;
use App\Models\TopBanner;
use App\Models\BottomBanner;
use App\Models\MiddleBanner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\CustomerPurchaseDetail;

class PageController extends Controller
{
    public function index()
    {
        // Retrieve top models based on customer purchase details
        $topModels = CustomerPurchaseDetail::select('products.product_model_id', DB::raw('SUM(customer_purchase_details.quantity) as total_quantity'))
            ->join('products', 'customer_purchase_details.product_id', 'products.id')
            ->groupBy('products.product_model_id')
            ->orderByDesc('total_quantity')
            ->limit(4)
            ->get();

        $topModelIds = $topModels->pluck('product_model_id')->toArray();

        // Retrieve top products based on top model IDs
        $topProducts = Product::whereIn('product_model_id', $topModelIds)->get()->groupBy('product_model_id');

        // Retrieve newest products
        $newestProducts = Product::orderBy('created_at', 'desc')->get()->groupBy('product_model_id')->take(4);
        // $newestProducts = Product::latest()->take(4)->get();
        // Retrieve the authenticated user
        $user = Auth::user();

        // Retrieve the cart items for the authenticated user
        $cart = $user->cart ?? [];

        // Retrieve all top banners
        $topBanner = TopBanner::latest()->get();
        $middleBanner = MiddleBanner::latest()->get();
        $BottomBanner = BottomBanner::latest()->get();
        // Retrieve all products
        $products = Product::all();

        return view('user.page', compact('topProducts', 'newestProducts', 'user', 'cart', 'products', 'topBanner', 'middleBanner','BottomBanner' ));
    }
}
