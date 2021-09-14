<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Size extends Model
{

    protected $tables = "sizes";

    protected $fillable = [
        'name', 
        'slug',
    ];

    use HasFactory;
}
