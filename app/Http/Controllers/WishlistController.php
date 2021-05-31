<?php

namespace App\Http\Controllers;

use App\Wishlist;
use Illuminate\Http\Request;
use Session;

class WishlistController extends Controller
{
    public function ShowWishlist()
    {
        $userId = Session::get('user')['id'];
        $data = Wishlist::where('customer_id',$userId)->get();
        return view('user.wishlist',['products'=>$data]);
    }
    public function addToWishlist(Request $request)
    {
        $product_id = $request->product_id;
        $userId = Session::get('user')['id'];

        if(Wishlist::where('customer_id',$userId)->where('product_id',$product_id)->exists())
        {
            return response()->json(['status'=>'Product already added to Wishlist']);
        }
        else
        {
            $wishlist = new Wishlist();
            $wishlist->customer_id = $userId;
            $wishlist->product_id = $product_id;
            $wishlist->save();
            return response()->json(['status'=>'Product added to Wishlist']);
        }
    }

    public function addToCart(Request $request)
    {
        // $item = Wishlist::find($id);
        echo $request->qty;
        
      
    }
}
