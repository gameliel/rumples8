<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    protected $tables = "categories";

    protected $fillable = [
        'parent_id',
        'name',
        'slug',
        'featured',
    ];

    public function children()
    {
    return $this->hasMany('App\Models\Category', 'parent_id');
    }

    use HasFactory;
}
