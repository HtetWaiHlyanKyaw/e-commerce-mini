<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\CustomerPurchase;
use App\Http\Controllers\Controller;
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

    public function filter(Request $request)
    {
        // Retrieve start and end dates from the request
        $start_date = $request->start_date;
        $end_date = $request->end_date;

        // Check if both start and end dates are provided
        if ($start_date && $end_date) {
            // Convert dates to Carbon instances for accurate comparison
            $start_date = Carbon::parse($start_date);
            $end_date = Carbon::parse($end_date);
            $today = Carbon::today();
            // Check if the start date is greater than the end date
            if ($start_date->greaterThan($end_date)) {
                return redirect()->back()->with('error', 'Start date cannot be greater than end date.');
            }

            // Fetch supplier purchases with details and suppliers
            $customerPurchases = CustomerPurchase::with('details', 'user')
                ->whereDate('created_at', '>=', $start_date)
                ->whereDate('created_at', '<=', $end_date)
                ->orderBy('created_at', 'desc')
                ->get();
        } else {
            // If both start and end dates are not provided or if it's a refresh,
            // fetch all records
            if ($request->refresh) {
                $customerPurchases = CustomerPurchase::with('details', 'user')
                    ->orderBy('created_at', 'desc')
                    ->get();
            } else {
                // Handle the case where neither start nor end date is provided
                // For example, you could return an error message or redirect back
                return redirect()->back()->with('error', 'Please provide both start and end dates.');
            }
        }

        // Pass the variables to the view
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
    { //    $supplierPurchase = SupplierPurchase::where('id', $id)->get();

        //     $details = SupplierPurchaseDetail::where('supplier_purchase_id', $id)->get();
        //     return view('admin.SupplierPurchases.supplier_purchase_detail', compact('details', 'supplierPurchase'));

        $customerPurchase = CustomerPurchase::with('user')->findOrFail($id);

        $details = CustomerPurchaseDetail::where('customer_purchase_id', $id)->paginate(10);

        return view('admin.Customer.customer_purchase_detail', compact('details', 'customerPurchase'));
    }
    // public function filter(Request $request)
    // {
    //     // Retrieve start and end dates from the request
    //     $start_date = $request->start_date;
    //     $end_date = $request->end_date;

    //     // Convert dates to Carbon instances for accurate comparison
    //     $start_date = Carbon::parse($start_date);
    //     $end_date = Carbon::parse($end_date);
    //     $today = Carbon::today();
    //     // Check if the start date is greater than the end date
    //     if ($start_date->greaterThan($end_date)) {
    //         return redirect()->back()->with('error', 'Start date cannot be greater than end date.');
    //     }

    //     // Fetch supplier purchases with details and suppliers
    //     $customerPurchases = CustomerPurchase::with('detail', 'user')
    //         ->whereDate('created_at', '>=', $start_date)
    //         ->whereDate('created_at', '<=', $end_date)
    //         ->orderBy('created_at', 'desc')
    //         ->get();
    //     // Pass the variables to the view
    //     return view('admin.Customer.customer_purchases', compact('customerPurchases'));
    // }

    public function customerPurchase(Request $request){
        logger($request);
    }





}
