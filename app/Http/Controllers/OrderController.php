<?php

namespace App\Http\Controllers;

use Session;
use App\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\MailController;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $order = Order::all();
        return view('admin.admin_orders.orders',['order'=>$order]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


     public function ShowOrderDetail($id)
     {
         $order = Order::find($id);
         return view('admin.admin_orders.orderdetail',['order'=>$order]);
     }

     public function ChangeStatus($id)
     {
        $order = Order::find($id);

        if($order->status == "Pending")
        {
            $order->status = "Delievered";
            $order->save();
            MailController::OrderStatusEmail($order->first_name,  $order->email,  $order->address, $order->total);
        }
        else{
            $order->status = "Pending";
            $order->save();
        }
     

        Session::flash('status','Order Status Changed Successfully');
        return redirect('orders');
     }

}
