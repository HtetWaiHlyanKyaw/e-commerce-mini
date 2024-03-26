<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CustomerPurchase;

class CustomerPurchaseController extends Controller
{
    // public function purchase()
    // {
    //     $customerPurchases = CustomerPurchaseController::with('details', 'customer')->get();
    //     return view('admin.Customer.customer_purchases', compact('customerPurchases'));
    // }

    public function purchase()
    {
        // Use the CustomerPurchase model to fetch data with relationships
        $customerPurchases = CustomerPurchase::with('details', 'user')->get();

        // Pass the fetched data to the view
        return view('admin.Customer.customer_purchases', compact('customerPurchases'));
    }
}
