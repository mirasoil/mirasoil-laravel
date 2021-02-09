<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\PaymentIntent;
use Illuminate\Support\Arr;

class CheckoutController extends Controller
{
    public function index(){
        Stripe::setApiKey('sk_test_51IIzThFPoGjTfy5WgELaDszWIgZ0t7aE0IfuyHvgW8toWQBBVtMcLyXfNE7NZ2OLspC2aycgI0nAXIb58EWhDFoD004H00lqTU');

        $paymentIntent = PaymentIntent::create([
            'amount' => '100',
            'currency' => 'usd',
          ]);
          $output = [
            'clientSecret' => $paymentIntent->client_secret,
          ];

          $clientSecret = Arr::get($paymentIntent, 'client_secret');
        return view('checkout.index')->with('clientSecret', $output);
        }
}
