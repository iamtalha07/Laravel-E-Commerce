<?php

namespace App\Http\Controllers;

use App\customer;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use App\Http\Controllers\MailController;
use App\Http\Requests\UserRegisterRequest;

class CustomerController extends Controller
{
    //
    public function showRegister()
    {
        return view('user.register');
    }

    public function showlogin()
    {
        return view('user.login');
    }

    public function registerUser(UserRegisterRequest $req)
    {
        $validated = $req->validated();
        
        $customer = new customer;
        $customer->name = $req->input("name");
        $customer->email = $req->input("email");
        $customer->phone = $req->input("phone");
        $customer->password = Crypt::encrypt($req->input("password"));
        $customer->verification_code = sha1(time());
        $customer->save();

        if($customer != null)
        {
            //send email
            MailController::sendSignupEmail( $customer->name, $customer->email, $customer->verification_code);
            //Show a message
            Session::flash('ok','Your account has been created please check email for verification link');
            return redirect('mail-message');
           // return redirect()->back()->with(session()->flash('alert-success','Your account has been created please check email for verification link'));
        }

        //show error message
        return redirect()->back()->with(session()->flash('alert-danger','Something went wrong'));

        // $req->session()->put('user',$req->input("name"));
        // return redirect('/');
    }

    public function mailMessage()
    {
        return view('mail.mail-message');
    }

    public function verifyUser()
    {
        $verification_code = \Illuminate\Support\Facades\Request::get('code');
        //$customer = customer::where(['verification_code'=>$verification_code])->first();
        $customer = customer::where('verification_code',$verification_code)->first();
        if($customer != null)
        {
            $customer->is_verified = 1;
            $customer->save();
            return redirect()->route('user_login')->with(session()->flash('alert-success','Your account is verified, Please login'));
        }
        return redirect()->route('user_login')->with(session()->flash('alert-danger','Invalid verification code'));
      
        

    }



    public function loginUser(Request $req)
    {
      $customer =  customer::where('email',$req->input('email'))->get();

      if($customer[0]->is_verified == 1)
        {

      if(Crypt::decrypt($customer[0]->password)==$req->input('password'))
      {
          //$req->session()->put('user',$customer[0]->name);
          //session(['user' => $customer[0]->name, 'id' => $customer[0]->id]);
          $req->session()->put('user',$customer[0]);
          return redirect('/');
        
      }
      else{
        return redirect()->back()->with(session()->flash('status','Incorrect Email or Passowrd '));
      }
    }
    return redirect()->back()->with(session()->flash('stautus','User is not verified'));

        
    }
}
