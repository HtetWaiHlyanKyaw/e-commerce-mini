<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupplierPurchaseDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'supplier_purchase_id', 'product_id', 'price', 'quantity', 'sub_total'
    ];
    public function supplierPurchase()
    {
        return $this->belongsTo(SupplierPurchase::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
