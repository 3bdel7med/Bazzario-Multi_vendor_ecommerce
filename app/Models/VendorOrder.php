<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VendorOrder extends Model
{
    protected $fillable = [
        'order_id',
        'vendor_id',
        'subtotal',
        'commission',
        'total_amount',
        'status',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }
    public function items()
    {
        return $this->hasMany(OrderItem::class, 'order_id', 'order_id');
    }

}
