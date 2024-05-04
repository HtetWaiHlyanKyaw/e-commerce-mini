<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerPurchase extends Model
{
    use HasFactory;
    protected $fillable = [
        'invoice_id',
        'user_id',
        'full_name',
        'payment_method',
        'total_price',
        'total_quantity',
        'phone',
        'address',
        'town'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function details()
    {
        return $this->hasMany(CustomerPurchaseDetail::class);
    }

    public static function generateInvoiceId()
    {
        // Your logic to generate the invoice ID
        $prefix = 'CTP-';
        $date = now()->format('Ymd'); // Current date in the format YearMonthDay
        $lastInvoice = self::where('invoice_id', 'like', "$prefix$date%")->orderBy('invoice_id', 'desc')->first();
        $sequentialPart = $lastInvoice ? intval(substr($lastInvoice->invoice_id, strlen($prefix) + strlen($date))) + 1 : 1;

        return "$prefix$date" . str_pad($sequentialPart, 5, '0', STR_PAD_LEFT); // 5-digit sequential number
    }
    // public function product()
    // {
    //     return $this->hasMany(Product::class);
    // }
}
