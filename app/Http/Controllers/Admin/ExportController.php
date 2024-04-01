<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Exports\SupplierPurchasesExport;
use App\Exports\CustomerPurchasesExport;
use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller
{
    //
    public function exportSupplierPurchases()
    {
        return Excel::download(new SupplierPurchasesExport, 'MobileSupplierPurchases.xlsx');
    }

    public function exportCustomerPurchases()
    {
        return Excel::download(new CustomerPurchasesExport(), 'MobileCustomerPurchases.xlsx');
    }
}
