<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupplierPurchase extends Model
{
    use HasFactory;
    protected $fillable = [
        'supplier_id',
        'product_id',
        'quantity',
        'unit_price',
        'total_price',
    ];
    public function supplier()
    {
        return $this->belongsTo(supplier::class);
    }
    // public function brand()
    // {
    //     return $this->belongsTo(Brand::class);
    // }
}
