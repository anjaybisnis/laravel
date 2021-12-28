<?php

/*
| -----------------------------------------------------
| PRODUCT NAME: Codeclub Marketplace - Toko Online Produk Digital Multiseller
| -----------------------------------------------------
| AUTHORS: CODETHEMES & ONEZEROART TEAM
| -----------------------------------------------------
| EMAIL: mycoding@401xd.com
| -----------------------------------------------------
| COPYRIGHT: RESERVED BY PIXELCODER.NET & ONEZEROART.COM
| -----------------------------------------------------
| DESIGNED BY: https://401xd.com
| -----------------------------------------------------
| DEVELOPED BY: https://mycoding.id
| -----------------------------------------------------
| WEBSITE: PIXELCODER.NET & ONEZEROART.COM
| -----------------------------------------------------
*/

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Cart;
use App\User;
use App\Item;
use App\Payment;
use HP;

// Import the class namespaces first, before using it directly
use Srmklive\PayPal\Services\ExpressCheckout;
use Srmklive\PayPal\Services\AdaptivePayments;

/** All Stripe Trait Details class **/
use Cartalyst\Stripe\Laravel\Facades\Stripe;
use Stripe\Error\Card;


class PaymentController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('checkverify');
        $this->middleware('auth');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'paymentmethod' => 'required',
        ]);

        $payment = new Payment;
        $paymentmethod = $request->paymentmethod;
        // Payment Method 1 == Paypal
        if($paymentmethod == 1){

            $provider = new ExpressCheckout;      // To use express checkout.
            //$provider = new AdaptivePayments;     // To use adaptive payments.

            $data = [];
            $data['items'] = [ ];
            $cartIDs = '';
            foreach(HP::cucart() as $cartitem){
                $cartIDs .= $cartitem->id . "_";
                $data['items'][] = ['name' => HP::item($cartitem->item_id)[0]->item_name, 'price' => HP::item($cartitem->item_id)[0]->item_purchasefee, 'qty' => $cartitem->qty ];
            }

            $data['invoice_id'] = Auth::id() . "_" . date('Ymdhi');
            $data['invoice_description'] = "Order #{$data['invoice_id']} Invoice";
            $data['return_url'] = url('/payment/success/parameters?cartIDs=' . $cartIDs . "&userID=" . Auth::id());
            $data['cancel_url'] = url('/checkout');
            $total = 0;
            foreach($data['items'] as $item) {
                $total += $item['price']*$item['qty'];
            }
            $data['total'] = $total;
            //give a discount of 10% of the order amount
            // $data['shipping_discount'] = round((10 / 100) * $total, 2);
            $data['shipping_discount'] = 0;


            try{
                $provider->setCurrency(HP::currency())->setExpressCheckout($data);
                $response = $provider->setExpressCheckout($data);
                // This will redirect user to PayPal
                return redirect($response['paypal_link']);
            } catch(\Exception $e){
                return redirect('/checkout/')->with('error', $e->getMessage());
                //echo $e->getMessage();
                //return redirect('/')->with('error', $e->getMessage());
            }


        }elseif($paymentmethod == 2){ // Payment Method 2 == Stripe

            $stripeToken = $request->stripeToken;
            if(empty($stripeToken)){
                return redirect('/checkout/')->with('error', 'Token is not found! Please try again.');
            }

            $cartIDs = '';
            $totalAmount =  array();
            foreach(HP::cucart() as $cartitem){
                $cartIDs .= $cartitem->id . "_";
                $totalAmount[] = HP::item($cartitem->item_id)[0]->item_purchasefee;
            }

            Stripe::setApiKey(env('STRIPE_SECRET',''));
            try{
                $charge = Stripe::charges()->create([
                    'amount' => (int)number_format(array_sum($totalAmount), 0), // need to multiply by 100
                    'currency' => HP::currency(),
                    'source' => $stripeToken,
                ]);
                $chargeJson = $charge;
                if($chargeJson['status'] == "succeeded"){
                    $cartArray = explode('_', $cartIDs);
                    for($x=0; count($cartArray) > $x; $x++){
                        $cartID = $cartArray[$x];
                        if(!empty($cartID) || $cartID != ''){
                            $cart = Cart::find($cartID);
                            $cart->status = "Paid";
                            $cart->save();
                        }
                    }
                    $payment = new Payment;
                    $payment->userID = Auth::id();
                    $payment->cartIDs = $cartIDs;
                    $payment->amount = $chargeJson['amount']/100;
                    $payment->itemqty = count(HP::cucart());
                    $payment->invnum = Auth::id() . "_" . date('Ymdhi');
                    $payment->payerid = $chargeJson['source']['id'];
                    $payment->email = $chargeJson['id'];
                    $payment->fname = 'N/A';
                    $payment->lname = 'N/A';
                    $payment->country = 'N/A';
                    $payment->currency = strtoupper ($chargeJson['currency']);
                    $payment->save();
                    return redirect('/checkout/')->with('success', 'Payment Successfully, Thank you.');
                }else{
                    return redirect('/checkout/')->with('error', 'Payment is not successful.');
                }
            } catch(\Exception $e){
                return redirect('/checkout/')->with('error', $e->getMessage());
            }
        }
    }


    /**
     * Payment Success
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function success(Request $request)
    {
        $cartIDs = $request->cartIDs;
        $userID = $request->userID;
        $token = $request->token;
        $payerID = $request->PayerID;

        $cartArray = explode('_', $cartIDs);
        for($x=0; count($cartArray) > $x; $x++){
            $cartID = $cartArray[$x];
            if(!empty($cartID) || $cartID != ''){
                $cart = Cart::find($cartID);
                $cart->status = "Paid";
                $cart->save();
            }
        }

        $provider = new ExpressCheckout;      // To use express checkout.
        //$provider = new AdaptivePayments;     // To use adaptive payments.

        $response = $provider->getExpressCheckoutDetails($token);

        $payment = new Payment;
        $payment->userID = $userID;
        $payment->cartIDs = $cartIDs;
        $payment->amount = $response['AMT'];
        $payment->itemqty = $response['L_QTY0'];
        $payment->invnum = $response['INVNUM'];
        $payment->payerid = $response['PAYERID'];
        $payment->email = $response['EMAIL'];
        $payment->fname = $response['FIRSTNAME'];
        $payment->lname = $response['LASTNAME'];
        $payment->country = $response['COUNTRYCODE'];
        $payment->currency = $response['CURRENCYCODE'];
        $payment->save();

        return redirect('/checkout/')->with('success', 'Payment Successfully, Thank you.');
    }



}
