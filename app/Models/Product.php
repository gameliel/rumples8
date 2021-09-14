<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    protected $tables = "products";

    protected $fillable = [
        'name',
        'slug',
        'short_description',
        'description',
        'price',
        'discount_price',
        'SKU',
        'stock_status',
        'featured',
        // 'quantity',
        'image',
        'category_id',
        'size_id',
        'brand_id',

    ];

    use HasFactory;
}
