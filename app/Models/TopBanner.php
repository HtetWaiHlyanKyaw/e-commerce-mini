<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TopBanner extends Model
{
    use HasFactory;
    protected $fillable = [
        'image_1',
        'image_2',
        'image_3',
    ];
}
