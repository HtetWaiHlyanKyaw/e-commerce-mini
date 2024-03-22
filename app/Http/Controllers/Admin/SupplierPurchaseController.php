<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SupplierPurchase;

class SupplierPurchaseController extends Controller
{
    //
    public function list()
    {
        $supplierPurchases = SupplierPurchase::with('supplier')->get();
        return view('admin.SupplierPurchases.supplier_purchase_list', compact('supplierPurchases'));
    }

    public function page()
    {
        $supplierPurchases = SupplierPurchase::get();
        return view('admin.SupplierPurchases.supplier_purchase_create', compact('supplierPurchases'));
    }
}
