<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Cart;
use App\Models\Product;
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


    // Assuming you have retrieved cart data in your controller
    // Assuming you have retrieved cart data in your controller
    public function checkoutPage(Request $request)
    {
        // Retrieve the products data from the query parameter
        $productsJson = $request->query('products');

        // Decode the JSON string to an array of product data
        $productsData = json_decode($productsJson, true);

        // Fetch price information from the database and add it to product data
        foreach ($productsData as &$productData) {
            $product = \App\Models\Product::find($productData['product_id']);
            $productData['price'] = $product->price;
        }

        // Calculate the subtotal by summing up the total cost of each product
        $subtotal = 0;
        $totalQuantity = 0; // Initialize total quantity
        foreach ($productsData as $productData) {
            $subtotal += $productData['total'];
            $totalQuantity += $productData['quantity']; // Accumulate total quantity
        }

        // Calculate shipping and total
        $shipping = 1000; // Example shipping cost
        $total = $subtotal + $shipping;

        // Pass the subtotal, shipping, total, and total quantity to the view
        return view('user.checkout2', compact('productsData', 'subtotal', 'shipping', 'total', 'totalQuantity'));
    }


    public function createCustomerPurchase(Request $request)
    {
        // dd($request);
        // Validate the request data
        $request->validate([
            'user_id' => 'required',
            'full_name' => 'required',
            // 'email' => 'required|email',
            'town' => 'required',
            'address' => 'required',
            'phone_no' => 'required',
            'payment_method' => 'required',
            'total_price' => 'required',
            'total_quantity' => 'required',
            'products' => 'required|array', // Assuming you're receiving products data as an array
        ]);

        // Create a new CustomerPurchase instance
        $customerPurchase = new CustomerPurchase();
        $customerPurchase->invoice_id = CustomerPurchase::generateInvoiceId();
        $customerPurchase->user_id = auth()->user()->id; // Use auth()->user()->id to get the user ID
        $customerPurchase->full_name = $request->input('full_name');
        // $customerPurchase->email = $request->input('email');
        $customerPurchase->town = $request->input('town');
        $customerPurchase->address = $request->input('address');
        $customerPurchase->phone = $request->input('phone_no');
        $customerPurchase->payment_method = $request->input('payment_method');
        $customerPurchase->total_price = $request->input('total_price');
        $customerPurchase->total_quantity = $request->input('total_quantity');
        $customerPurchase->save();

        // Iterate through the products and create CustomerPurchaseDetail for each
        foreach ($request->input('products') as $product) {
            $customerPurchaseDetail = new CustomerPurchaseDetail();
            $customerPurchaseDetail->customer_purchase_id = $customerPurchase->id;
            $customerPurchaseDetail->product_id = $product['product_id'];
            $customerPurchaseDetail->price = $product['price'];
            $customerPurchaseDetail->quantity = $product['quantity'];
            $customerPurchaseDetail->sub_total = $product['total'];
            $customerPurchaseDetail->save();
        }
        // Redirect or return a response
        // For example, you can redirect back to the checkout page with a success message
        return redirect()->route('user.page')->with('success', 'Your order has been placed successfully!');
    }
}
