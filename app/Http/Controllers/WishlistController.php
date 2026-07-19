<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Wishlist;

class WishlistController extends Controller
{
    public function addToWishlist($id){
        $wishlist=Wishlist::create([
            'product_id' => $id,
            'user_id'=> Auth()->id(),
        ]);
        $wishlist->save();
        return redirect()->back();
    }
}
