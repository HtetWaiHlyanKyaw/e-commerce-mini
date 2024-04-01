<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Http\Request;
use App\Models\SupplierPurchase;
use App\Http\Controllers\Controller;
use App\Models\SupplierPurchaseDetail;

class SupplierPurchaseController extends Controller
{
    //
    public function list()
    {
        $supplierPurchases = SupplierPurchase::with('details', 'supplier')->latest()->get();
        return view('admin.SupplierPurchases.supplier_purchase_list', compact('supplierPurchases'));
    }


    // public function filter(Request $request){
    //     // Retrieve start and end dates from the request
    //     $start_date = $request->start_date;
    //     $end_date = $request->end_date;


    //     // Fetch supplier purchases with details and suppliers
    //     $supplierPurchases = SupplierPurchase::with('details', 'supplier')
    //         ->whereDate('created_at', '>=', $start_date)
    //         ->whereDate('created_at', '<=', $end_date)
    //         ->orderBy('created_at', 'desc')
    //         ->get();

    //     // Pass the variables to the view
    //     return view('admin.SupplierPurchases.supplier_purchase_list', compact('supplierPurchases'));
    // }


    // public function filter(Request $request){
    //     // Retrieve start and end dates from the request
    //     $start_date = $request->start_date;
    //     $end_date = $request->end_date;

    //     // Check if the start date is greater than the end date
    //     if ($start_date > $end_date) {
    //         return redirect()->back()->with('success', 'Start date cannot be greater than end date.');
    //     }
    //     if ($start_date > $end_date) {
    //         return redirect()->back()->with('success', 'Start date cannot be greater than end date.');
    //     }

    //     // Fetch supplier purchases with details and suppliers
    //     $supplierPurchases = SupplierPurchase::with('details', 'supplier')
    //         ->whereDate('created_at', '>=', $start_date)
    //         ->whereDate('created_at', '<=', $end_date)
    //         ->orderBy('created_at', 'desc')
    //         ->get();

    //     // Pass the variables to the view
    //     return view('admin.SupplierPurchases.supplier_purchase_list', compact('supplierPurchases'));
    // }


    public function filter(Request $request){
        // Retrieve start and end dates from the request
        $start_date = $request->start_date;
        $end_date = $request->end_date;

        // Convert dates to Carbon instances for accurate comparison
        $start_date = Carbon::parse($start_date);
        $end_date = Carbon::parse($end_date);
        $today = Carbon::today();
        // Check if the start date is greater than the end date
        if ($start_date->greaterThan($end_date)) {
            return redirect()->back()->with('error', 'Start date cannot be greater than end date.');
        }

        // Fetch supplier purchases with details and suppliers
        $supplierPurchases = SupplierPurchase::with('details', 'supplier')
            ->whereDate('created_at', '>=', $start_date)
            ->whereDate('created_at', '<=', $end_date)
            ->orderBy('created_at', 'desc')
            ->get();

        // Pass the variables to the view
        return view('admin.SupplierPurchases.supplier_purchase_list', compact('supplierPurchases'));
    }



    // public function filter(Request $request)
    // {
    //     if($request->ajax()){
    //         $purchases = Supplier::all();
    //         return response()->json([

    //         ])
    //     }else{
    //         abort(403);
    //     }
    // }

    public function page()
    {
        $products = Product::latest()->get();
        $suppliers = Supplier::latest()->get();
    return view('admin.SupplierPurchases.supplier_purchase_create', compact('products','suppliers'));
    }

    public function create(Request $request) {
        // Validate the request data
        // dd($request->selectedProducts);
        $request->validate([
            // 'invoice_id' => 'required|string',
            'supplier' => 'required|exists:suppliers,id',
            'payment' => 'required',
            // 'selectedProducts' => 'required|min:1',
            'totalQuantity' => 'required|integer|min:1',
            'totalPrice' => 'required|numeric|min:0',
        ]);
        $selectedProducts = json_decode($request->selectedProducts, true);
        // Wrap the database operations in a try-catch block to handle any exceptions

            // Start a database transaction

            // Create a new SupplierPurchase record
            $supplierPurchase = new SupplierPurchase();
            $supplierPurchase->invoice_id = SupplierPurchase::generateInvoiceId();
            $supplierPurchase->total_quantity = $request->totalQuantity;
            $supplierPurchase->total_price = $request->totalPrice;
            $supplierPurchase->payment_method = $request->payment;
            $supplierPurchase->supplier_id = $request->supplier;
            $supplierPurchase->save();

            // Loop through the selected products and create SupplierPurchaseDetail records
            foreach ($selectedProducts as $product) {
                $detail = new SupplierPurchaseDetail();
                $detail->supplier_purchase_id = $supplierPurchase->id;
                $detail->product_id = $product['id']; // Assuming you have product IDs in the selectedProducts array
                $detail->price = $product['price']; // Assuming you have product prices in the selectedProducts array
                $detail->quantity = $product['quantity']; // Assuming you have product quantities in the selectedProducts array
                $detail->sub_total = $product['price'] * $product['quantity'];
                $detail->save();
                Product::updateQuantity($product['id'], $product['quantity']);
            }
            session()->flash('alert', [
                'type' => 'success',
                'message' => 'Purchase Completed Successfully!',
            ]);
            // Redirect back with success message
            return redirect()->route('supplier_purchase.list');
    }
    public function detail($id)
    {//    $supplierPurchase = SupplierPurchase::where('id', $id)->get();

    //     $details = SupplierPurchaseDetail::where('supplier_purchase_id', $id)->get();
    //     return view('admin.SupplierPurchases.supplier_purchase_detail', compact('details', 'supplierPurchase'));

        $supplierPurchase = SupplierPurchase::with('supplier')->findOrFail($id);

    $details = SupplierPurchaseDetail::where('supplier_purchase_id', $id)->paginate(10);

    return view('admin.SupplierPurchases.supplier_purchase_detail', compact('details', 'supplierPurchase'));
    }
}
