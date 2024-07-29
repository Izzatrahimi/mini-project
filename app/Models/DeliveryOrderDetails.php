<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Products;
use App\Models\DeliveryOrder;

class DeliveryOrderDetails extends Model
{
    protected $fillable = ['delivery_order_id', 'product_id', 'quantity'];

    // Define relationship with DeliveryOrder model
    public function deliveryOrder  ()
    {
        return $this->belongsTo(DeliveryOrder::class, 'delivery_order_id');
    }

    // Define relationship with Product model
    public function product()
    {
        return $this->belongsTo(Products::class, 'product_id');
    }
}
