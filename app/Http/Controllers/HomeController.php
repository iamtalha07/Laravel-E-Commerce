<?php

namespace App\Http\Controllers;

use App\Order;
use App\Product;
use App\customer;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $order = Order::all()->count();
        $products = Product::all()->count();
        $customer = customer::all()->count();

        $current_month_users = customer::whereYear('created_at', Carbon::now()->year)
        ->whereMonth('created_at', Carbon::now()->month)->count(); 

         $last_month_users = customer::whereYear('created_at', Carbon::now()->year)
        ->whereMonth('created_at', Carbon::now()->subMonth(1))->count(); //submonth used for finding data of prev month

        $last_to_last_month_users = customer::whereYear('created_at', Carbon::now()->year)
        ->whereMonth('created_at', Carbon::now()->subMonth(2))->count();//submonth used for finding data of prev month

         $current_month_orders = Order::whereYear('created_at', Carbon::now()->year)
        ->whereMonth('created_at', Carbon::now()->month)->count(); 

         $last_month_orders = Order::whereYear('created_at', Carbon::now()->year)
        ->whereMonth('created_at', Carbon::now()->subMonth(1))->count();  //submonth used for finding data of prev month

        $last_to_last_month_orders = Order::whereYear('created_at', Carbon::now()->year)
        ->whereMonth('created_at', Carbon::now()->subMonth(2))->count(); //submonth used for finding data of prev month


        return view('admin.home',[
            'order' => $order,
            'products'=>$products,
            'customer'=>$customer,
            'current_month_users' =>  $current_month_users,
            'last_month_users'=>$last_month_users,
            'last_to_last_month_users'=>$last_to_last_month_users,
            'current_month_orders'=>$current_month_orders,
            'last_month_orders'=>$last_month_orders,
            'month_orders'=>$last_to_last_month_orders,
            
        ]);
       
        
    }

    public function showCustomer()
    {
        $customer = customer::all();
        return view('admin.customer',['customer'=>$customer]);
    }

    public function CustomerChart()
    {

    }
}
