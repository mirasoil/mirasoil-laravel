<?php

namespace App\Http\Controllers;
use App\Shop;
use Session;
use Cart;
use App\User;

use Illuminate\Http\Request;

class ShopController extends Controller
{
    // public function index(){
    //     $shop = Shop::all();
    //     return view('pages.shop', compact('shop'));
    // }
    public function cart(){
        return view('pages.cart', compact('cart'));
    }
    // public function show($id)
    // {
    //     $shop = Shop::find($id);
    //     return view('shop.show', compact('shop'));
    // }
    //se preia produsul si se verifica daca acesta exista sau nu
    public function addToCart($id){
        $shop = Shop::find($id);
        if(!$shop) {
        abort(404);
    }
    //verificam daca exista un cos in sesiune
    $cart = session()->get('cart');
    // dacă cart este gol se pune primul product
    if(!$cart) {
    $cart = [
        $id => [
            "name" => $shop->name,
            "quantity" => 1,
            "price" => $shop->price,
            "image" => $shop->image
        ]
    ];
    session()->put('cart', $cart);
    return redirect()->back()->with('cart-success', 'Produs adaugat cu succes!');
    }
    // daca cart nu este gol at verificam daca produsul exista pt a incrementa cantitate
    if(isset($cart[$id])) {
        $cart[$id]['quantity']++;
        session()->put('cart', $cart);
        return redirect()->back()->with('cart-success', 'Produs adaugat cu succes!');
    }
    // daca item nu exista in cos at addaugam la cos cu quantity = 1
    $cart[$id] = [
        "name" => $shop->name,
        "quantity" => 1,
        "price" => $shop->price,
        "image" => $shop->image
    ];
    session()->put('cart', $cart);
    return redirect()->back()->with('cart-success', 'Produs adaugat cu succes!');
    }

    public function update(Request $request){
        if($request->id and $request->quantity)
        {
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('cart-success', 'Cos actualizat!');
        }
        return view('pages.cart')->with('cart-success', 'Produs actualizat');
    }

    public function remove(Request $request){
        if($request->id) {
        $cart = session()->get('cart');
        if(isset($cart[$request->id])) {
            unset($cart[$request->id]);
            session()->put('cart', $cart);
            }
        session()->flash('cart-success', 'Produsul a fost sters.');
        }  
    }
    //Functie ce gleste cosul si returneaza un mesaj specific
    public function empty(){
        session()->forget('cart');
        return redirect()->back()->with('cart-success', 'Cosul dumneavoastra de cumparaturi este gol!');
    } 

    // public function show($id)
    // {
    //     $shop = Shop::find($id);
    //     return view('shop.show', compact('show'));
    // }

    //Confirmarea comenzii care initial ne redirecta pe pagina confirm cu un mesaj specific dar acum doar goleste cosul si afiseaza un mesaj
    public function getCheckout(){
        if(!Session::has('cart')) {
            return view('pages.cart');
        }
        $cart = session()->get('cart');
        return view('pages.revieworder');
    }

    public function updateUserInfo(Request $request, $id){

        $user = User::findOrFail($id);
        $user-> firstname = $request->firstname;
        $user-> lastname = $request->lastname;
        $user-> email = $request->email;
        $user-> address = $request->address;
        $user-> phone = $request->phone;
        $user-> county = $request->county;
        $user-> locality = $request->locality;
        $user-> zipcode = $request->zipcode;
        $user->save();

        return redirect()->back()->with('user-success', 'Informatiile au fost actualizate!');
    }

}
