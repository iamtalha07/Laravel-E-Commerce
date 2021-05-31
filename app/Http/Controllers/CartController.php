<?php

namespace App\Http\Controllers;

use Session;
use App\Cart;
use App\Cache;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function ShowCart()
    {
        if(Session::has('user'))
        {
         $userId = Session::get('user')['id'];
         $data = Cart::where('customer_id',$userId)->get();
         return view('user.user_cart',['products'=>$data]);
        }


        else{
             $data = Cache::all();

            return view('user.user_cart',['products'=>$data]);
        }
    }

    public function addToCart(Request $req)
    {
    //    return $req->all();
        if($req->session()->has('user'))
        {   $total_price = $req->product_price * $req->quantity ;

            $cart = new Cart;
            $cart->customer_id = $req->session()->get('user')['id'];   //Customer ID
            $cart->product_id = $req->product_id;
            $cart->price =  $total_price;
            $cart->quantity = $req->quantity;
            $cart->size = $req->size;
            $cart->save();
            Session::flash('status','Item added to cart successfully');
            return redirect('cart');

         
           
        }
        else{
           // return redirect('user_login');
           $total_price = $req->product_price * $req->quantity;
           $cart = new Cache;
           $cart->product_id = $req->product_id;
           $cart->price =  $total_price;
           $cart->quantity = $req->quantity;
           $cart->save();
            Session::flash('status','Item added to cart successfully');
            return redirect('cart');

        }
    }

    public static function cartItem()
    {
        if(Session::has('user')){
        $userId = Session::get('user')['id'];
        return Cart::where('customer_id',$userId)->sum('quantity');
        }
      
    }

    public function removeCart($id)
    {
        if(Session::has('user')){


        // Cart::destroy($id);
        // Session::flash('status','Item Deleted from Cart Successfully');
        // return redirect('cart');
        //Cart::find($id)->delete($id);

        
        Cart::destroy($id);
        return response()->json([
            'success' => 'Record deleted successfully!'

        ]);
        







        }
        else{
            Cache::destroy($id);
            Session::flash('status','Item Deleted from Cart Successfully');
            return redirect('cart');
        }
    }

    public function update(Request $request, $rowId)
    {
        //$qty = $request->qty;
        // $proId = $request->proId;
         //$rowId = $request->rowId;
        
        $cart = Cart::find($rowId);
        
        
        


        $cart->quantity = $request->qty;

        $qty = $request->qty;
        $price=  $cart->products->price;
        
        $total = $qty*$price;
        $cart->price = $total;
        $total=0;
        $cart->save();

        return $cart;
        
        // return response()->json([
        //     'success' => 'Record deleted successfully!'
        // ]);

        //================================

        //$data = Cart::find($rowId);
        
        


    }


}
