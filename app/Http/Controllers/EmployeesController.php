<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Product;
use Illuminate\Http\Request;

class EmployeesController extends Controller
{
    public function index()
    {
        // return view('temp');
        $data = Product::find(1);
        // echo $data->attributes
    }

    public function getUsers($id = 0)
    {
        if($id==0)
        {
            $employees = Cart::orderby('id','asc')->select('*')->get();
        }
        else
        {
            $employees = Cart::select('*')->where('id',$id)->get();

        }

        $userData['data'] = $employees;

        echo json_encode($userData);
        exit;
    }
}
