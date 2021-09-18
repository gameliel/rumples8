<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FindMyspec extends Model
{
    use HasFactory;

    protected $tables = "find_myspecs";

    protected $fillable = [
        'user_id',
        'neck_id',
        'body_id',
        'leg_id',
        'foot_id'
    ];
}
