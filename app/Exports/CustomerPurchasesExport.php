<?php

namespace App\Exports;

use App\Models\CustomerPurchase;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Carbon\Carbon;
class CustomerPurchasesExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return CustomerPurchase::with('user')->get()->map(function ($purchase) {
            return [
                'User Name' => $purchase->user->name,
                'Invoice ID' => $purchase->invoice_id,
                'Payment Method' => $purchase->payment_method,
                'Total Price' => $purchase->total_price,
                'Total Quantity' => $purchase->total_quantity,
                'Created At' => Carbon::parse($purchase->created_at)->format('F j, Y'),
                // Add other columns as needed
            ];
        });
    }

    public function headings(): array
    {
        return [
            'User Name',
            'Invoice ID',
            'Payment Method',
            'Total Price',
            'Total Quantity',
            'Date',
            // Add other column headings as needed
        ];
    }
}
