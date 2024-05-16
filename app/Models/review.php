<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class review extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'product_id',
        'rating',
        'comments',
          ];

          public function User()
          {
              return $this->belongsTo(User::class);
          }

          public function ProductModel()
          {
            return $this->belongsTo(ProductModel::class);
        }
}
