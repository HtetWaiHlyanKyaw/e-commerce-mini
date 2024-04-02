<?php

namespace App\Exports;

use App\Models\SupplierPurchase;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Carbon\Carbon;
class SupplierPurchasesExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return SupplierPurchase::with('supplier')->get()->map(function ($purchase) {
            return [
                'User Name' => $purchase->supplier->name,
                'Invoice ID' => $purchase->invoice_id,
                'Payment Method' => $purchase->payment_method,
                'Total Price' => $purchase->total_price,
                'Total Quantity' => $purchase->total_quantity,
                'Created At' => Carbon::parse($purchase->created_at)->format('F j, Y'),

            ];
        });
    }

    public function headings(): array
    {
        return [
            'Supplier Name',
            'Invoice ID',
            'Payment Method',
            'Total Price',
            'Total Quantity',
            'Date',

        ];
    }
}
