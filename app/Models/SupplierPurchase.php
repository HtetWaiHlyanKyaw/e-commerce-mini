<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupplierPurchase extends Model
{
    use HasFactory;
    protected $fillable = [
        'invoice_id',
        'supplier_id',
        'total_quantity',
        'total_price',
        'payment_method',
    ];
    public function supplier()
    {
        return $this->belongsTo(supplier::class);
    }

    public function details()
    {
        return $this->hasMany(SupplierPurchaseDetail::class);
    }

    // public function product()
    // {
    //     return $this->hasMany(Product::class);
    // }
}
