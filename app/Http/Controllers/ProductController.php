<?php

namespace App\Http\Controllers;
use App\Product;
use App\User;
use App\Order;
use Auth;
use Session;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::orderBy('id','ASC')->paginate(4);   //apelam modelul care va face legatura cu BD de unde va afisa produsele - pentru admin
        $value = ($request->input('page',1)-1)*4;    // get the top 5 of all products, ordered by the id of products in descending order
        return view('products.list', compact('products'))->with('i', $value);     
    }

    public function indexUser(Request $request)
    {
        $products = Product::orderBy('id','ASC')->paginate(4);   //pentru afisarea paginii de produse din acelasi tabel pentru useri logati
        $value = ($request->input('page',1)-1)*5;
        return view('pages.shop', compact('shop'))->with([
            'products' => $products,
            'i' => $value
        ]);
        //return view('pages.shop', compact('shop'))->with('i', $value);    
    }

    public function indexGuest(Request $request)
    {
        $products = Product::orderBy('id','ASC')->paginate(4);   //pentru afisarea paginii de produse din products pentru vizitatori
        $value = ($request->input('page',1)-1)*5;
        return view('pages.shop', compact('products'))->with('i', $value);   
    }

    public function showUser($id)  //afisarea paginii individuale a produselor conectandu-ne la acelasi model => acelasi tabel (products)
    {
        $shop = Product::find($id);
        return view('pages.details', compact('shop'));
    }

    public function showGuest($id)
    {
        $shop = Product::find($id);
        return view('pages.details', compact('shop'));
    }

    //Functionalitati useri - parte de cos
    public function cart(){
        return view('pages.cart', compact('cart'));
    }

    //Adauga in cos - functional
    public function addToCart(Request $request, $id){
    if(Auth::user()) {
        $shop = Product::find($request->product);
        if(!$shop) {
            abort(404);
        }
    
        $cart = session()->get('cart');          //verificam daca exista un cos in sesiune

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
        
        if(isset($cart[$id])) {        // daca cart nu este gol at verificam daca produsul exista pt a incrementa cantitate
            $cart[$id]['quantity']++;
            session()->put('cart', $cart);
            return redirect()->back()->with('cart-success', 'Produs adaugat cu succes!');
        }
        
        $cart[$id] = [       // daca item nu exista in cos at addaugam la cos cu quantity = 1
            "name" => $shop->name,
            "quantity" => 1,
            "price" => $shop->price,
            "image" => $shop->image
        ];
        session()->put('cart', $cart);
        return redirect()->back()->with('cart-success', 'Produs adaugat cu succes!');
    } else {
        return view('auth.login', ['url' => 'user']);
    }
    
    }

    //Plaseaza comanda doar daca avem produse in cos - functional 
    public function getCheckout(){   
        $cart = session()->get('cart');

        if(count((array) session('cart')) > 0) {
            return view('pages.revieworder')->with('cart', $cart);
        }else {
            return view('pages.cart');
        }
    
    }

    //Acualizare cantitate - nefunctional
    public function updateCart(Request $request){
        if($request->id and $request->quantity)
        {
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('cart-success', 'Cos actualizat!');
        }
        return view('pages.cart')->with('cart-success', 'Produs actualizat');
    }

    //Golire cos - functional
    public function emptyCart(){         
        session()->forget('cart');

        return redirect()->back()->with('cart-success', 'Cosul dumneavoastra de cumparaturi este gol!');
    } 

    //Stergere produs din cos - functional 
    public function destroyCart(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
                }
            session()->flash('cart-success', 'Produsul a fost sters.');
            }
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

    //     $this->validate($request, [
    //         'billing_fname' => 'required',
    //         'billing_lname' => 'required',
    //         'billing_email' => 'required',
    //         'billing_phone' => 'required',
    //         'billing_address' => 'required',
    //         'billing_county' => 'required',
    //         'billing_locality' => 'required',
    //         'billing_zipcode' => 'required',
    //         'billing_total' => 'required',
    //         'shipped' => 'required'
    //   ]);
      
    //   $order = new Order();
      
    //   // $order->id = uniqid('OrderNumber-');
  
    //   $order->user_id = $id;
    //   $order->billing_fname = $request->input('firstname');
    //   $order->billing_lname = $request->input('lastname');
    //   $order->billing_email = $request->input('email');
    //   $order->billing_phone = $request->input('phone');
    //   $order->billing_address = $request->input('address');
    //   $order->billing_county = $request->input('county');
    //   $order->billing_locality = $request->input('locality');
    //   $order->billing_zipcode = $request->input('zipcode');
    //   $order->billing_total = \Cart::subtotal();
    //   $order->shipped = false;
          
    //   $order->save();

        return view('revieworder')->with('user-success', 'Informatiile au fost actualizate!');  //405 - method not allowed or 500 - internal server error
    }

    //CRUD pentru ADMIN
    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, ['name'=>'required', 'quantity'=>'required', 'price'=>'required', 'stock'=>'required', 'image'=>'required', 'description'=>'required', 'properties'=>'required', 'uses'=>'required']);   //validarea datelor
        //crearea unui produs nou
        Product::create($request->all());       //apelam modelul cu functia predefinita create prin care trimitem toate argumentele
        return redirect()->route('products.index', app()->getLocale())->with('succes', 'Produsul a fost creat cu succes!');
    }

    public function show($id)
    {
        $product = Product::find($id);
        return view('products.show', compact('product'));
    }

    public function edit($id)
    {
        $product = Product::find($id);
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'quantity' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'image' => 'required',
            'description' => 'required',
            'properties' => 'required',
            'uses' => 'required',
        ]);
        Product::find($id)->update($request->all());        //in model trimitem pentru id-ul specific toate campurile cu date de actualizat
        return redirect()->route('products.index', app()->getLocale())->with('success', 'Produs actualizat cu succes!');
    }

    public function destroy($id)
    {
        Product::find($id)->delete();
        return redirect()->route('products.index', app()->getLocale())->with('success', 'Produs sters cu succes!');
    }


}
