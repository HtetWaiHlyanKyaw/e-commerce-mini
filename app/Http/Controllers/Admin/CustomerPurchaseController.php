<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\CustomerPurchase;
use Illuminate\Support\Facades\DB;
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
        $customerPurchases = CustomerPurchase::with('details', 'user')->get();
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


        $customerPurchase = CustomerPurchase::with('user')->findOrFail($id);

        $details = CustomerPurchaseDetail::where('customer_purchase_id', $id)->paginate(10);

        return view('admin.Customer.customer_purchase_detail', compact('details', 'customerPurchase'));
    }

    public function clearCart()
    {
        // Delete cart entries for the authenticated user
        Cart::where('user_id', auth()->user()->id)->delete();

        // Optionally, you can redirect the user to a specific page or return a response
        return redirect()->route('user.history')->with('success', 'Cart cleared successfully!');
    }

    public function checkoutPage(Request $request)
    {
        // Retrieve the products data from the query parameter
        $productsData = json_decode($request->query('products'), true);

        // Fetch price information from the database and add it to product data
        foreach ($productsData as &$productData) {
            $product = \App\Models\Product::find($productData['product_id']);
            if ($product) {
                // Ensure product exists before adding to the product data
                $productData['name'] = $product->name;
                $productData['price'] = $product->price;
                $productData['total'] = $product->price * $productData['quantity'];
            } else {
                // Handle the case where product is not found (optional)
                // For example, you can remove the invalid product from the products data
                unset($productData);
            }
        }

        // Calculate the subtotal, total quantity, shipping, and total
        $subtotal = collect($productsData)->sum('total');
        $totalQuantity = collect($productsData)->sum('quantity');
        $shipping = 1000; // Example shipping cost
        $total = $subtotal + $shipping;

        // Pass the products data, subtotal, shipping, total, and total quantity to the view
        return view('user.checkout2', compact('productsData', 'subtotal', 'shipping', 'total', 'totalQuantity'));
    }


    public function createCustomerPurchase(Request $request)
    {
        // Validate the request data
        $request->validate([
            'user_id' => 'required',
            'full_name' => 'required',
            // 'email' => 'required|email',
            'town' => 'required',
            'address' => 'required',
            'phone_no' => 'required|string|regex:/^09\d{9}$/',
            'payment_method' => 'required|string|in:Cash On Delivery,Mobile Banking,Mobile Wallet,Direct Bank Transfer',
            'total_price' => 'required',
            'total_quantity' => 'required',
            'products' => 'required|array', // Assuming you're receiving products data as an array
        ]);

        // Begin a database transaction
        DB::beginTransaction();

        try {
            // Create a new CustomerPurchase instance and save it
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

                // Find the product and update its quantity
                $productModel = Product::find($product['product_id']);
                if ($productModel) {
                    $newQuantity = $productModel->quantity - $product['quantity']; // Calculate new quantity
                    if ($newQuantity >= 0) {
                        $productModel->quantity = $newQuantity; // Reduce the quantity
                        $productModel->save();
                    } else {
                        // Rollback the transaction and return an error response if insufficient quantity
                        DB::rollback();
                        return back()->withError('Insufficient quantity for product: ' . $productModel->name);
                    }
                } else {
                    // Handle case where product is not found
                }
            }

            // Commit the transaction
            DB::commit();

            // Clear the cart data
            $this->clearCart();

            // Redirect or return a response
            return redirect()->route('user.history')->with('success', 'Your order has been placed successfully!');
        } catch (\Exception $e) {
            // Rollback the transaction if an exception occurs
            DB::rollback();

            // Handle the exception, log it, and return an error response
            return back()->withError('An error occurred while processing your order. Please try again later.');
        }
    }
}
