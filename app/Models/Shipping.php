<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    protected $primaryKey = 'shipping_id';
    protected $fillable = ['order_id', 'shipping_address', 'shipping_date'];

    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }
}
