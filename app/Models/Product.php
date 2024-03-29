<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image',
        'brand_id',
        'product_model_id',
        'storage_option',
        'color',
        'price',
        'quantity',
        'low_stock',
        'description',
    ];

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function productModel()
    {
        return $this->belongsTo(ProductModel::class);
    }

    public static function updateQuantity($productId, $quantity)
    {
        $product = self::findOrFail($productId); // Find the product by its ID
        $product->quantity += $quantity; // Subtract the purchased quantity
        $product->save(); // Save the updated product
    }
}
