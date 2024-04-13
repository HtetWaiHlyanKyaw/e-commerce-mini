<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerPurchase extends Model
{
    use HasFactory;

    protected $fillable = [
        'invoice_id',
        'customer_purchase_detail_id',
        'user_id',
        'payment_method',
        'total_price',
        'total_quantity',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function detail()
    {
        return $this->belongsTo(CustomerPurchaseDetail::class, 'customer_purchase_detail_id');
    }
}
