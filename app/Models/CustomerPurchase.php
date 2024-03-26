<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerPurchase extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'quantity',
        'unit_price',
        'total_price',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function details()
    {
        return $this->hasMany(CustomerPurchaseDetail::class);
    }

    // public function product()
    // {
    //     return $this->hasMany(Product::class);
    // }
}
