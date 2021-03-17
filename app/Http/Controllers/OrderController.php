<?php

namespace App\Http\Controllers;

use Auth;
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
            
        $user_id = Auth::user()->id;
        $orders = Order::where('user_id', $user_id)->get();   //din orders toate id-urile comenzilor plasate de utilizatorul cu id-ul $user_id

        $items = array();
        foreach($orders as $order){
            $items[] = OrderProduct::where('order_id', $order->id)->first();     //din order_product toate id-urile produselor corespunzatoare comenzilor cu order_id egal cu id-ul din orders
        }

        $products = array();
        foreach($items as $item){
            $prod = Product::where('id', $item->product_id)->first();   //cautam produsele cu id-ul respectiv si le adaugam in array
            $products[] = $prod;
        }
        return view('orders.myorders', array(
            'orders' => $orders,
            'products' => $products
        ));

        // dd($products);
        
    } 

    public function getMyOrderSpecs($id){
        $orders = Order::where('id', $id)->get();
        
        $details = OrderProduct::where('order_id', $id)->get();    //pentru o comanda cu acelasi order id putem avea mai multe produse => array
        // $order_id = OrderProduct::where('id', $id)->get('order_id');
        $product_id = OrderProduct::where('order_id', $id)->get('product_id');

        $items = array();
        $products = array();
        foreach($details as $detail){
            $items[] = $detail->product_id;    //array-ul cu toate detaliile din comanda respectiva

            $prod = Product::findOrFail($detail->product_id);   //cautama produsele cu id-ul respectiv si le adaugam in array
            $products[] = $prod;
        }

        return view('orders.myorder', array(
            'orders' => $orders,
            'details' => $details,
            'products' => $products   //returnam toate detaliile referitoare la produsele respective cosului din tabela products
        ));

        // dd($items);
    }

    // public function index2()  
    // {  
   
    //     $user_id = Auth::user()->id;
    //     $orders = Order::where('user_id', $user_id)->get();   
    //     return view('orders.myorders', array('orders' => $orders));
    // }

    //ORDERS for admin
    function getOrders(Request $request){

        // $orders = Order::all();

        // return view('orders.orders', array(
        //     'orders' => $orders,
        // ));

        $orders = Order::orderBy('id','DESC')->paginate(5);   //apelam modelul care va face legatura cu BD de unde va afisa produsele - pentru admin
        $value = ($request->input('page',1)-1)*5;    // get the top 5 of all products, ordered by the id of products in descending order
        return view('orders.orders', compact('orders'))->with('i', $value); 
    } 
    
    // Display all order's details
    public function getOrderSpecs($id){
        $orders = Order::where('id', $id)->get();
        
        $details = OrderProduct::where('order_id', $id)->get();    //pentru o comanda cu acelasi order id putem avea mai multe produse => array
        // $order_id = OrderProduct::where('id', $id)->get('order_id');
        $product_id = OrderProduct::where('order_id', $id)->get('product_id');

        $items = array();
        $products = array();
        foreach($details as $detail){
            $items[] = $detail->product_id;    //array-ul cu toate detaliile din comanda respectiva

            $prod = Product::findOrFail($detail->product_id);   //cautama produsele cu id-ul respectiv si le adaugam in array
            $products[] = $prod;
        }

        return view('orders.order', array(
            'orders' => $orders,
            'details' => $details,
            'products' => $products   //returnam toate detaliile referitoare la produsele respective cosului din tabela products
        ));

        // dd($items);
    }   

    // Display form for edit order details
    public function editOrder($id)
    {
        $order = Order::find($id);
        return view('orders.edit', compact('order'));
    }

    // Update order details
    public function updateOrder(Request $request, $id)
    {
        $this->validate($request, [
            'billing_fname' => 'required',
            'billing_lname' => 'required',
            'billing_email' => 'required',
            'billing_phone' => 'required',
            'billing_address' => 'required',
            'billing_county' => 'required',
            'billing_locality' => 'required',
            'billing_zipcode' => 'required',
            'billing_total' => 'required',
        ]);
        Order::find($id)->update($request->all());        //in model trimitem pentru id-ul specific toate campurile cu date de actualizat
        return redirect()->route('orders', app()->getLocale())->with('success', 'Comanda actualizata cu succes!');
        // dd($order);
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


    //Might be useful for generating unique bill number
    // public function generateOrderNR()
    // {
    //     $orderObj = \DB::table('orders')->select('order_nr')->latest('id')->first();
    //     if ($orderObj) {
    //         $orderNr = $orderObj->order_nr;
    //         $removed1char = substr($orderNr, 1);
    //         $generateOrder_nr = $stpad = '#' . str_pad($removed1char + 1, 8, "0", STR_PAD_LEFT);
    //     } else {
    //         $generateOrder_nr = '#' . str_pad(1, 8, "0", STR_PAD_LEFT);
    //     }
    //     return $generateOrder_nr;
    // }
    
    //Stergerea unei comenzi
    public function destroyOrder($id)
    {
        Order::find($id)->delete();
        return redirect()->route('orders', app()->getLocale())->with('success', 'Comanda sters cu succes!');
    }
}
