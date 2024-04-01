<?php

namespace App\Exports;

use App\Models\SupplierPurchase;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\Exportable;
class SupplierPurchasesExport implements FromView,ShouldAutoSize
{
    public function view(): View
    {
        return view('admin.SupplierPurchases.supplier_purchase_list', [
            'supplierPurchases' => SupplierPurchase::all()
        ]);
    }
}
