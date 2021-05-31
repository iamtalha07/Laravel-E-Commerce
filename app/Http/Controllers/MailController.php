<?php

namespace App\Http\Controllers;

use App\Mail\OrderMail;
use App\Mail\SignupEmail;
use Illuminate\Http\Request;
use App\Mail\OrderStatusMail;
use App\Mail\sendMailToAdmin;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    //
    public static function sendSignupEmail($name, $email, $verification_code)
    {
        $data = [
            'name' => $name,
            'verification_code' => $verification_code
        ];
        Mail::to($email)->send(new SignupEmail($data));
    }

    public static function sendOrderEmail($name, $email, $address, $total)
    {
        $data = [
            'name' => $name,   
            'address' => $address,
            'total' => $total,
        ];
        Mail::to($email)->send(new OrderMail($data));
    }

    
    public static function OrderStatusEmail($name, $email, $address, $total)
    {
        $data = [
            'name' => $name,   
            'address' => $address,
            'total' => $total,
        ];
        Mail::to($email)->send(new OrderStatusMail($data));
    }

    public static function sendMailToAdmin($name, $email, $address, $total)
    {
        $data = [
            'name' => $name,   
            'address' => $address,
            'total' => $total,
        ];
        Mail::to($email)->send(new sendMailToAdmin($data));
    }


    
    
}
