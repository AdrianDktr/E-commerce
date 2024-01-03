<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable =[
        'amount',
        'order_id',
        'product_id'
    ];

    public function order()
    {
        return $this->hasOne(Order::class);
    }

    public function cart()
    {
        return $this->hasMany(Cart::class);
    }

}
