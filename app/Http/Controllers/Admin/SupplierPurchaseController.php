<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SupplierPurchase;
use App\Models\SupplierPurchaseDetail;
use App\Models\Product;
use App\Models\Supplier;
class SupplierPurchaseController extends Controller
{
    //
    public function list()
    {
        $supplierPurchases = SupplierPurchase::with('details', 'supplier')->get();
        return view('admin.SupplierPurchases.supplier_purchase_list', compact('supplierPurchases'));
    }

    public function page()
    {
        $products = Product::all();
        $suppliers = Supplier::all();
    return view('admin.SupplierPurchases.supplier_purchase_create', compact('products','suppliers'));
    }

    public function create(Request $request) {
        // Validate the request data
        // dd($request->selectedProducts);
        $request->validate([
            // 'invoice_id' => 'required|string',
            // 'supplier' => 'required|exists:suppliers,id',
            // 'payment' => 'required|in:credit_card,paypal',
            // 'selectedProductsInput' => 'required|array|min:1',
            // 'totalQuantity' => 'required|integer|min:1',
            // 'totalPrice' => 'required|numeric|min:0',
        ]);
        $selectedProducts = json_decode($request->selectedProducts, true);
        // Wrap the database operations in a try-catch block to handle any exceptions

            // Start a database transaction

            // Create a new SupplierPurchase record
            $supplierPurchase = new SupplierPurchase();
            $supplierPurchase->invoice_id = $request->invoice_id;
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
            }

            // Redirect back with success message
            return redirect()->route('supplier_purchase.list')->with('success', 'Purchase completed successfully.');
    }
}
