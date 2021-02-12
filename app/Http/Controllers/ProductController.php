<?php

namespace App\Http\Controllers;
use App\Product;
use App\User;
use Auth;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::orderBy('id','ASC')->paginate(3);   //apelam modelul care va face legatura cu BD de unde va afisa produsele - pentru admin
        $value = ($request->input('page',1)-1)*3;    // get the top 5 of all products, ordered by the id of products in descending order
        return view('products.list', compact('products'))->with('i', $value);     
    }

    public function indexUser(Request $request)
    {
        if(!Auth::guard('admin')){
            $shop = Product::orderBy('id','ASC')->paginate(5);   //pentru afisarea paginii de produse din acelasi tabel pentru useri logati
            $value = ($request->input('page',1)-1)*5;
            return view('pages.shop', compact('shop'));
        } else {
            return redirect()->back()->with('message-area-failure', 'Nu ai permisiunea de a accesa aceasta pagina!');
        }   
    }

    public function indexGuest(Request $request)
    {
        if(!Auth::guard('admin')){
            $shop = Product::orderBy('id','ASC')->paginate(5);   //pentru afisarea paginii de produse din products pentru vizitatori
            $value = ($request->input('page',1)-1)*5;
            return view('pages.shop', compact('shop'));  
        } else {
            return redirect()->back()->with('message-area-failure', 'Nu ai permisiunea de a accesa aceasta pagina!');
        }  
    }

    public function showUser($id)  //afisarea paginii individuale a produselor conectandu-ne la acelasi model => acelasi tabel (products)
    {
        if(!Auth::guard('admin')){
            $shop = Product::find($id);
            return view('pages.details', compact('shop'));
        }else {
            return redirect()->back()->with('message-area-failure', 'Nu ai permisiunea de a accesa aceasta pagina!');
        }
    }

    public function showGuest($id)
    {
        if(!Auth::guard('admin')){
            $shop = Product::find($id);
            return view('pages.details', compact('shop'));
        }else {
            return redirect()->back()->with('message-area-failure', 'Nu ai permisiunea de a accesa aceasta pagina!');
        }
    }

    //Functionalitati useri - parte de cos
    public function cart(){
        return view('pages.cart', compact('cart'));
    }

    public function addToCart($id){
        $shop = Product::find($id);
        if(!$shop) {
        abort(404);
    }
    
    $cart = session()->get('cart');          //verificam daca exista un cos in sesiune
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
    }

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

    public function removeCart(Request $request){
        if($request->id) {
        $cart = session()->get('cart');
        if(isset($cart[$request->id])) {
            unset($cart[$request->id]);
            session()->put('cart', $cart);
            }
        session()->flash('cart-success', 'Produsul a fost sters.');
        }  
    }

    public function emptyCart(){         //Functie ce gleste cosul si returneaza un mesaj specific
        session()->forget('cart');
        return redirect()->back()->with('cart-success', 'Cosul dumneavoastra de cumparaturi este gol!');
    } 

    public function getCheckout(){       //Confirmarea comenzii care initial ne redirecta pe pagina confirm cu un mesaj specific dar acum doar goleste cosul si afiseaza un mesaj
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
        return redirect()->route('products.index')->with('succes', 'Produsul a fost creat cu succes!');
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
        return redirect()->route('products.index')->with('success', 'Produs actualizat cu succes!');
    }

    public function destroy($id)
    {
        Product::find($id)->delete();
        return redirect()->route('products.index')->with('success', 'Produs sters cu succes!');
    }
}
