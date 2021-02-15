<?php

namespace App\Http\Controllers;

use App\User;
use App\Order;
use App\Product;
use App\OrderProduct;
use Gloudemans\Shoppingcart\Facades\Cart;
use Cartalyst\Stripe\Laravel\Facades\Stripe;

use Illuminate\Http\Request;

class OrderController extends Controller
{
        public function index()  
    {  
            
    //  
        
    }  
     
    public function create()  
    {  
            
    //  
        
    }  
     

    public function store(Request $request){
    // Insert into orders table
    $order = Order::create([
        'user_id' => auth()->user() ? auth()->user()->id : null,
        'billing_fname' => $request->firstname,
        'billing_lname' => $request->lastname,
        'billing_email' => $request->email,
        'billing_phone' => $request->phone,
        'billing_address' => $request->address,
        'billing_county' => $request->input('county'),
        'billing_locality' => $request->locality,
        'billing_zipcode' => $request->zipcode,
        'billing_total' => Cart::subtotal()
    ]);

    // Insert into order_product table
    foreach (Cart::content() as $item) {
        $product = Product::where('id', '=', $item->id)->get();
        $id = $product->first()->id;
        OrderProduct::create([
            'order_id' => $order->id,
            'product_id' => $id,
            'quantity' => $item->qty,
        ]);
    }

    return $order;
    }

      
    public function show($id)  
    {  
    
    //  
    }  
    
    
    public function edit($id)  
        
    {  
            
    //  
        
    }  
    
    
    public function update(Request $request, $id)  
    {  
            
    //  
        
    }  
    
    
    public function destroy($id)  
    {  
        
    }
}
