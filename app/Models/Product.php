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
        'alteration',
        'alteration_price',
        'laundry',
        'laundry_price',
        'stock_status',
        'featured',
        'quantity',
        'image',
        'images',
        'category_id',
        'size_id',
        'brand_id',
    ];

    use HasFactory;
}
