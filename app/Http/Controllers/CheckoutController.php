<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\PaymentIntent;
use Illuminate\Support\Arr;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Order;
use App\Product;
use App\User;
use App\OrderProduct;
use Auth;

class CheckoutController extends Controller
{
    public function index(){
        Stripe::setApiKey('sk_test_51IIzThFPoGjTfy5WgELaDszWIgZ0t7aE0IfuyHvgW8toWQBBVtMcLyXfNE7NZ2OLspC2aycgI0nAXIb58EWhDFoD004H00lqTU');

        $paymentIntent = PaymentIntent::create([
            'amount' => '2567',
            'currency' => 'lei',
          ]);
          $output = [
            'clientSecret' => $paymentIntent->client_secret,
          ];

          $clientSecret = Arr::get($paymentIntent, 'client_secret');
        return view('revieworder')->with('clientSecret', $output);
        }

        
        
}
