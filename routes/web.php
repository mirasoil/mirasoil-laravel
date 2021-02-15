<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactUsFormController;

//RUTE ACCESATE FARA A FI LOGAT
//Pagina principala
Route::get('/', function(){
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
    });

    //Paginile accesibile userilor logati
    Route::middleware(['auth:user'])->group(function () {
        Route::GET('/shop', 'ProductController@indexUser')->name('shop');
        Route::post('/shop/{product}', 'ProductController@addToCart')->name('shop.store');
        Route::delete('/delete-from-cart', 'ProductController@destroy')->name('shop.destroy');
        Route::get('/details/{id}', 'ProductController@showUser');

        Route::get('/user', 'UserController@index');    //pagina de dashboard pentru useri, formularul de update al datelor
        Route::patch('user/{id}', 'UserController@update');    //modificarea propriu-zisa a datelor in tabela dupa id-ul userului
    
        // Route::get('cart', 'ProductController@cart');  //cosul propriu zis - user
        // Route::get('add-to-cart/{id}', 'ProductController@addToCart');  //adaug in cos
        // Route::post('add-to-cart/{product}', 'ProductController@storeCart');  //adaug in cos
         Route::patch('update-cart', 'ProductController@updateCart');  //modific cos
        // Route::delete('remove-from-cart', 'ProductController@removeCart'); //sterg din cos
         Route::get('/revieworder', 'ProductController@getCheckout'); //pentru confirmarea comenzii
         Route::patch('revieworder/{id}', 'ProductController@updateUserInfo'); //pentru pagina de revieworder, actualizare date utilizator
         Route::post('orders', 'OrderController@store')->name('orders.store');
        // Route::get('cart/success', 'ProductController@emptyCart');  //golire cos

        // //pentru checkout
         Route::get('/checkout', 'CheckoutController@index');   
        
        
        Route::get('/cart', 'ProductController@cart')->name('cart');
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
    