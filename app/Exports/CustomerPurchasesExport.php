<?php

namespace App\Exports;

use App\Models\CustomerPurchase;
use Maatwebsite\Excel\Concerns\FromCollection;

class CustomerPurchasesExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return CustomerPurchase::all();
    }
}
