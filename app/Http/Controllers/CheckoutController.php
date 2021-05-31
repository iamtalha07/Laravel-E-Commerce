<?php

namespace App\Http\Controllers;

use Session;
use App\Cart;
use App\Order;
use Stripe\Charge;
use Stripe\Stripe;
use PayPal\Api\Item;
use App\OrderDetails;
use PayPal\Api\Payer;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Payment;
use PayPal\Api\ItemList;
use PayPal\Api\Transaction;
use PayPal\Rest\ApiContext;
use Illuminate\Http\Request;
use PayPal\Api\RedirectUrls;
use App\Mail\sendMailToAdmin;
use PayPal\Api\PaymentExecution;
use App\Http\Requests\OrderRequest;
use PayPal\Auth\OAuthTokenCredential;
use App\Http\Controllers\MailController;
use PayPal\Exception\PayPalConnectionException;
use Sample\PayPalClient;
use PayPalCheckoutSdk\Orders\OrdersGetRequest;


class CheckoutController extends Controller
{
    public function showCheckOut()
    {
        $userId = Session::get('user')['id'];
        $data =   Cart::where('customer_id',$userId)->get();


    return view('user.checkout',['data'=>$data]);

    }

    public function orderPlace(Request $req)
    {
      
        $customer = [
            'first_name' => $req->fname,
            'last_name' =>  $req->lname,
            'email'=> $req->email,
            'phone'=> $req->phone,
            'address'=>$req->address,
            'country'=>$req->country,
            'city'=>$req->city,
            'total' => $req->total,
            'status'=> "Pending",
            'payment_type'=> $req->payment,
            'stripeToken'=>$req->input('stripeToken')
        ];
        Session::put('customer',json_encode($customer));

        if($req->payment=="Cash")
        {
            $userId = Session::get('user')['id'];
            $cart =   Cart::where('customer_id',$userId)->get();

          
        
           $order = new Order;
            $order->user_id =  Session::get('user')['id'];
            $order->first_name = $req->fname;
            $order->last_name = $req->lname;
            $order->email =  $req->email;
            $order->phone = $req->phone;
            $order->address = $req->address;
            $order->country = $req->country;
            $order->city = $req->city;
            $order->total =  $req->total;
            $order->status = "Pending";
            $order->payment_type =  $req->payment;
            $order->save(); 
    
        //     //Insert Into ProductDetails Table
            
        $orderdetails = new OrderDetails;
        foreach($cart as $item)
        {
            $orderdata[] = [
                'order_id'=>$order->id,
            'product_id'=>$item->product_id,
            'unit_price'=>$item->products->price,
            'quantity'=>$item->quantity,
            'price'=>$item->price
        ];
        }
        
        OrderDetails::insert($orderdata);
    
    
            $admin_email = "talha.i1997@gmail.com";
    
            MailController::sendOrderEmail($order->first_name,  $order->email,  $order->address, $order->total);
            MailController::sendMailToAdmin($order->first_name,  $admin_email,  $order->address, $order->total);
       Session::flash('success-message','Success! Check Your E-Mail for order confirmation');
            return Redirect('checkout');
      
         
        }
        else if($req->payment=="paypal"){
            return redirect()->route('checkout.paypal');
      
        }
        else{
            return redirect()->route('stripe');
        }

              
            // Stripe::setApiKey ( 'sk_test_51IkQhPJYJ7e9EO5O63KucPqui6U8uhzdjOsrGTAKgIKYQhV9apDXwL424kIiLitwYLcgmxG02m6WUYMNtdIDUvri00RVrboyMV' );
            // try{
            //     Charge::create ( array(
            //         "amount" => 300 * 100,
            //         "currency" => "usd",
            //         "source" => $req->input('stripeToken'),
            //         "description" => "Sample description"
            //     )
            // );
            // Session::flash('success-message','Success! Check Your E-Mail for order confirmation');
            // return Redirect('checkout');
            // }
            // catch(\Exception $e){
            //     Session::flash('fail-message','There Might be Some Problem!');
            //     return Redirect('checkout');
            // }
    }

    public function stripe()
    {
           Stripe::setApiKey ( 'sk_test_51IkQhPJYJ7e9EO5O63KucPqui6U8uhzdjOsrGTAKgIKYQhV9apDXwL424kIiLitwYLcgmxG02m6WUYMNtdIDUvri00RVrboyMV' );
            
            $customer = json_decode(Session::get('customer'));
            $userId = Session::get('user')['id'];
            $cart =   Cart::where('customer_id',$userId)->get();
            
            try{
                Charge::create ( array(
                    "amount" => $customer->total * 100,
                    "currency" => "usd",
                    "source" => $customer->stripeToken,
                    "description" => "Sample description"
                )
            );
            $order = new Order;
            $order->user_id =  Session::get('user')['id'];
            $order->first_name = $customer->first_name;
            $order->last_name = $customer->last_name;
            $order->email =  $customer->email;
            $order->phone = $customer->phone;
            $order->address = $customer->address;
            $order->country = $customer->country;
            $order->city = $customer->city;
            $order->total = $customer->total;
            $order->status = "Pending";
            $order->payment_type =  $customer->payment_type;
            $order->save(); 

             //     //Insert Into ProductDetails Table
            
        $orderdetails = new OrderDetails;
        foreach($cart as $item)
        {
            $orderdata[] = [
                'order_id'=>$order->id,
            'product_id'=>$item->product_id,
            'unit_price'=>$item->products->price,
            'quantity'=>$item->quantity,
            'price'=>$item->price
        ];
        }
        
        OrderDetails::insert($orderdata);

            Session::flash('success-message','Success! Check Your E-Mail for order confirmation');
            return Redirect('checkout');
            }
            catch(\Exception $e){
                dd($e->getMessage());
                Session::flash('fail-message','There Might be Some Problem!');
                return Redirect('checkout');
            }
    }

    public function paypal(){
        
        $apiContext = new ApiContext(
            new OAuthTokenCredential(
                'AY7Z8hByw2JBrwHAlZ6Ae_Wtx06kwWTBq2xUQ1VS7KizjhkMyKSrc1o-2TkqJCDNlh-i06o6Xc22WlKy',  //public
                'EHzX90ayVvlmo9-vRuGCGsNsEQRA06bqdCS9J9Y9ZvZGMRIbQf0Li7rqMLZRBkHW7hFBv2VPO7MQAFG_' //private
            )
          );
          // Create new payer and method
            $payer = new Payer();
            $payer->setPaymentMethod("paypal");

            // Set redirect URLs
            $redirectUrls = new RedirectUrls();
            $redirectUrls->setReturnUrl(route('process.paypal'))
            ->setCancelUrl(route('cancel.paypal'));

            // Set payment amount
            $amount = new Amount();
            $amount->setCurrency("USD")
            ->setTotal(150);

            // Set transaction object
            $transaction = new Transaction();
            $transaction->setAmount($amount)
            ->setDescription("Payment description");

            // Create the full payment object
            $payment = new Payment();
            $payment->setIntent('sale')
            ->setPayer($payer)
            ->setRedirectUrls($redirectUrls)
            ->setTransactions(array($transaction));

            // Create payment with valid API context
            try {
                $payment->create($apiContext);
            
                // Get PayPal redirect URL and redirect the customer
                $approvalUrl = $payment->getApprovalLink();
                // $customer = [
                //     'first_name' => $req->fname,
                //     'last_name' =>  $req->lname,
                //     'email'=> $req->email,
                //     'phone'=> $req->phone,
                //     'address'=>$req->address,
                //     'country'=>$req->country,
                //     'city'=>$req->city,
                //     'total' => $req->total,
                //     'status'=> "Pending",
                //     'payment_type'=> $req->payment,
                // ];
                // Session::put('customer',json_encode($customer));

                return redirect($approvalUrl);     //NEED TO CHECK 

                // Redirect the customer to $approvalUrl
            } catch (PayPal\Exception\PayPalConnectionException $ex) {
                echo $ex->getCode();
                echo $ex->getData();
                die($ex);
            } catch (Exception $ex) {
                die($ex);
            }
       

}

    public function returnPaypal(Request $request){

        $userId = Session::get('user')['id'];
        $cart =   Cart::where('customer_id',$userId)->get();

        $apiContext = new ApiContext(
            new OAuthTokenCredential(
                'AY7Z8hByw2JBrwHAlZ6Ae_Wtx06kwWTBq2xUQ1VS7KizjhkMyKSrc1o-2TkqJCDNlh-i06o6Xc22WlKy',
                'EHzX90ayVvlmo9-vRuGCGsNsEQRA06bqdCS9J9Y9ZvZGMRIbQf0Li7rqMLZRBkHW7hFBv2VPO7MQAFG_'
            //   env('PAYPAL_CLIENT_ID'),
            //   env('PAYPAL_SECRET_ID')
            )
          );

        // Get payment object by passing paymentId
        $paymentId = $request->paymentId;
        $payment = Payment::get($paymentId, $apiContext);
        $payerId = $request->PayerID;

        // Execute payment with payer ID
        $execution = new PaymentExecution();
        $execution->setPayerId($payerId);

        try {
        // Execute payment
        $result = $payment->execute($execution, $apiContext);

            //return  $result->getState();
           //dd($result);
       

           $customer = json_decode(Session::get('customer'));
           
           if(isset($result) && strtolower($result->state)=="approved")
           {
            $order = new Order;
            $order->user_id =  Session::get('user')['id'];
            $order->first_name = $customer->first_name;
            $order->last_name = $customer->last_name;
            $order->email =  $customer->email;
            $order->phone = $customer->phone;
            $order->address = $customer->address;
            $order->country = $customer->country;
            $order->city = $customer->city;
            $order->total = $customer->total;
            $order->status = "Pending";
            $order->payment_type =  $customer->payment_type;
            $order->paypal_id = $paymentId;
            $order->paypal_status =  $result->getState();
            $order->save(); 
    
        //     //Insert Into ProductDetails Table
        $orderdetails = new OrderDetails;
        foreach($cart as $item)
        {
            $orderdata[] = [
            'order_id'=>$order->id,
            'product_id'=>$item->product_id,
            'unit_price'=>$item->products->price,
            'quantity'=>$item->quantity,
            'price'=>$item->price
        ];
        }
        OrderDetails::insert($orderdata);

            Session::flash('success-message','Success! Check Your E-Mail for order confirmation');
            return Redirect('checkout');
           }
           else{
            Session::flash('fail-message','There Might be Some Problem!');
            return Redirect('checkout');
           }
        } catch (PayPal\Exception\PayPalConnectionException $ex) {
        echo $ex->getCode();
        echo $ex->getData();
        die($ex);
        } catch (Exception $ex) {
        die($ex);
        }
    }
    public function cancelPaypal(){}


    public function ok(Request $request)
    {
        \Stripe\Stripe::setApiKey('sk_test_51IkQhPJYJ7e9EO5O63KucPqui6U8uhzdjOsrGTAKgIKYQhV9apDXwL424kIiLitwYLcgmxG02m6WUYMNtdIDUvri00RVrboyMV');

        $intent = \Stripe\PaymentIntent::create([
          'amount' => 1099,
          'currency' => 'usd',
          // Verify your integration in this guide by including this parameter
          'metadata' => ['integration_check' => 'accept_a_payment'],
        ]);
    }

}

