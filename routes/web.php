<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactUsFormController;

//RUTE ACCESATE FARA A FI LOGAT
//Pagina principala
Route::get('/', function(){
    //GET REQUEST
    // $response = Http::get('https://jsonplaceholder.typicode.com/todos/1');

    // dd($response->json());
    // dd($response->headers());
    // dd($response->status());
    // dd($response->effectiveUri());
    // dd($response->ok());
    // dd($response->cookies());

    //POST REQUEST
    // $response = Http::post('https://jsonplaceholder.typicode.com/posts', [
    //     'userId' => 123
    // ]);

    // dd($response->json());
    // dd($response->throw());   //server error or a client error -> throws request exception

    // if($response->offsetExists('userId')){
    //     // dd($response['userId']);
    //     dd($response->offsetGet('userId'));
    // }

    //POST REQUEST WITH PROPER HEADERS
    // $response = Http::asForm()->post('https://jsonplaceholder.typicode.com/posts', [
    //     'userId' => 456
    // ]);
    // if($response->offsetExists('userId')){
    //     dd($response->offsetGet('userId'));
    // }

    //ATTACH A FILE
    // $response = Http::attach('image-upload', file_get_contents('photo.jpg'))->post('https://jsonplaceholder.typicode.com/posts', [
    //         'userId' => 456
    //     ]);

    //WITH HEADERS
    // $response = Http::withHeaders([
    //     'X-CODERS-TAPE' => 'HELLO WORLD'
    // ])->withBasicAuth(
    //     'admin@gmail.com', 'password'
    // )->post('https://jsonplaceholder.typicode.com/posts', [
    //     'userId' => 456
    // ]);

    //IF HTTP REQUEST FAILS, RETRY
    // $response = Http::retries(2, 500)->post('https://jsonplaceholder.typicode.com/posts', [    //1st param: retry 2 times, 2nd param: how long wait between retries
    //         'userId' => 123
    //     ]);

    return view('welcome');
});

//View pentru pagina despre noi - ruta este /about care apeleaza view-ul about din subdirectorul pages
Route::get('/about', function(){
    return view('pages.about');
});

//View pentru pagina prelucrare - ruta este /manufacture care apeleaza view-ul manufacture din subdirectorul pages
Route::get('/manufacture', function(){
    return view('pages.manufacture');
});

//Pagina de transport, vizibila pentru oricine
Route::get('/transport', function(){
    return view('pages.transport');
});

//Pagina de informatii utile, vizibila pentru oricine
Route::get('/info', function(){
    return view('pages.info');
});

//TEST
Route::get('/test', function(){
    return view('test');
});

//pentru formularul de contact de pe pagina principala
Route::get('/contact', 'ContactUsFormController@createForm');
Route::post('/contact', 'ContactUsFormController@ContactUsForm')->name('contact.store');

//pentru newsletter - parte de backend, redirectarea se face pe pagina de home la sectiunea contact
Route::get('newsletter', 'NewsletterController@create');
Route::post('newsletter', 'NewsletterController@store');

//for search bar
Route::get('/search','SearchController@search');


    Auth::routes();

    //Accesarea paginilor de login specifice fiecarui tip de utilizator
    Route::get('/login/admin', 'Auth\LoginController@showAdminLoginForm');
    Route::get('/login/user', 'Auth\LoginController@showUserLoginForm');
    Route::get('/register/admin', 'Auth\RegisterController@showAdminRegisterForm');
    Route::get('/register/user', 'Auth\RegisterController@showUserRegisterForm');

    //Trimiterea datelor din formularele generate anterior
    Route::post('/login/admin', 'Auth\LoginController@adminLogin');
    Route::post('/login/user', 'Auth\LoginController@userLogin');
    Route::post('/register/admin', 'Auth\RegisterController@createAdmin');
    Route::post('/register/user', 'Auth\RegisterController@createUser');

    Route::view('/home', 'home')->middleware('auth'); //pagina home e vizibila doar daca sunt logat
    Route::view('/admin', 'admin')->middleware('auth:admin'); //pagina de admin e vizibila doar pentru admini (dashboard-ul cu Hi, boss!)
    Route::view('/user', 'user')->middleware('auth:user'); //pagina de useri (dashboard-ul cu Hi awesome user) e vizibil doar pentru useri, dupa logare sunt redirectionati aici


    //CRUD pe products, doar adminii au acces la pagina de modificare produse in baza de date
    Route::middleware(['auth:admin'])->group(function () { 
        Route::GET('/products', 'ProductController@index');
        Route::resource('products','ProductController');

        //View pentru pagina specifica fiecarui produs - ruta este /products/id-ul produsului care apeleaza view-ul show din subdirectorul products
        Route::get('/products/{id}', function(){
            return view('products.show');
        });    
        
        //orders
        Route::get('orders', 'OrderController@getOrders');   //display all orders
        Route::get('orderdetails/{id}', 'OrderController@getOrderSpecs');
    });

    //Paginile accesibile userilor logati
    Route::middleware(['auth:user'])->group(function () {
        Route::GET('/shop', 'ProductController@indexUser')->name('shop');
        Route::post('add-to-cart/{product}', 'ProductController@addToCart')->name('shop.store');   //add to cart
        Route::delete('/delete-from-cart', 'ProductController@destroy')->name('shop.destroy');
        Route::get('/details/{id}', 'ProductController@showUser');

        Route::get('/user', 'UserController@index');    //pagina de dashboard pentru useri, formularul de update al datelor
        Route::patch('user/{id}', 'UserController@update');    //modificarea propriu-zisa a datelor in tabela dupa id-ul userului
    
        Route::get('/cart', 'ProductController@cart')->name('cart');  //cosul propriu zis - user
        // Route::get('add-to-cart/{id}', 'ProductController@addToCart');  //adaug in cos
        // Route::post('add-to-cart/{product}', 'ProductController@storeCart');  //adaug in cos
         Route::patch('update-cart', 'ProductController@updateCart');  //modific cos
        // Route::delete('remove-from-cart', 'ProductController@removeCart'); //sterg din cos
         Route::get('/revieworder', 'ProductController@getCheckout'); //pentru confirmarea comenzii
         Route::patch('revieworder/{id}', 'ProductController@updateUserInfo'); //pentru pagina de revieworder, actualizare date utilizator
         Route::post('orders', 'OrderController@store')->name('orders.store');
         Route::get('cart/success', 'ProductController@emptyCart');  //golire cos

        // //pentru checkout
         Route::get('/checkout', 'CheckoutController@index');   
        
         //pagina pentru istoricul comenzilor
         Route::get('/myorders', 'OrderController@index');
         Route::get('/myorder/{id}', 'OrderController@getMyOrderSpecs');
        
    });

    //Paginile accesibile vizitatorilor
    Route::group(['middleware' => ['guest']], function () {
        //Magazin - doar vizualizare pentru guest
        // Route::GET('/shop', 'ProductController@indexGuest');
        //Pagina individuala produs pentru guest
        Route::get('/details/{id}', 'ProductController@showGuest');

        Route::get('login', [ 'as' => 'login', 'uses' => 'Auth\LoginController@showUserLoginForm']); //pentru userii care acceseaza functionalitatile cosului fara a fi logati
        Route::post('login', [ 'as' => 'login', 'uses' => 'Auth\LoginController@userLogin']);  //redirectam pe pagina de login/user - se autentifica by default ca si user
    });
    