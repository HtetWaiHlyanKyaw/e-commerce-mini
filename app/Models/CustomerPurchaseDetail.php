<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerPurchaseDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_id',
         'price',
          'quantity',
           'sub_total',
    ];
    public function CustomerPurchase()
    {
        return $this->belongsTo(CustomerPurchase::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
