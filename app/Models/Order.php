<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'customer_id',
        'order_number',
        'total_amount',
        'payment_status',
        'payment_method',
        'shipping_address'
    ];

    public function customer()
    {
        return $this->belongsTo(User::class, 'customer_id');
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function vendorOrders()
    {
        return $this->hasMany(VendorOrder::class);
    }
}
