<?php

namespace App\Models;
use App\Models\Orderitems;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';

    protected $fillbale = [
        'user_id',
        'fname',
        'lname',
        'email',
        'phone',
        'address',
        'address2',
        'city',
        'state',
        'country',
        'postcode',
        'status',
        'message',
        'total_price',
        'payment_mode',
        'payment_id',
        'tracking_no',
    ];

    public function orderitems()
    {
        return $this->hasMany(Orderitems::class);
    }
}
