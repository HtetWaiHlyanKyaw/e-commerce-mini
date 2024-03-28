<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CustomerPurchase;
use App\Models\CustomerPurchaseDetail;

class CustomerPurchaseController extends Controller
{
    // public function purchase()
    // {
    //     $customerPurchases = CustomerPurchaseController::with('details', 'customer')->get();
    //     return view('admin.Customer.customer_purchases', compact('customerPurchases'));
    // }
    public function list()
    {
        $customerPurchases = CustomerPurchase::with('details', 'user')->latest()->get();
        return view('admin.Customer.customer_purchases', compact('customerPurchases'));
    }
    public function purchase()
    {
        // Use the CustomerPurchase model to fetch data with relationships
        $customerPurchase = CustomerPurchase::with('detail', 'user')->get();

        // Pass the fetched data to the view
        return view('admin.Customer.customer_purchase_detail', compact('customerPurchase'));
    }
    public function detail($id)
    {//    $supplierPurchase = SupplierPurchase::where('id', $id)->get();

    //     $details = SupplierPurchaseDetail::where('supplier_purchase_id', $id)->get();
    //     return view('admin.SupplierPurchases.supplier_purchase_detail', compact('details', 'supplierPurchase'));

        $customerPurchase = CustomerPurchase::with('user')->findOrFail($id);

    $details = CustomerPurchaseDetail::where('customer_purchase_id', $id)->paginate(10);

    return view('admin.Customer.customer_purchase_detail', compact('details', 'customerPurchase'));
    }
}
