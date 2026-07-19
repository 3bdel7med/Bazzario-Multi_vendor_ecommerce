<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'slug',
        'description',
        'price',
        'stock',
        'category_id',
        'shop_id',
        'image'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }
    public function wishlist(){
        return $this->hasMany(Wishlist::class);
    }
}
