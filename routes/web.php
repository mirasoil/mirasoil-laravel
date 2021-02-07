<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactUsFormController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//RUTE ACCESATE FARA A FI LOGAT
Route::get('/', 'ProductController@index'); //afisare lista produse pe pagina de start
Route::resource('products', 'ProductController');// Ruta de resurse va genera CRUD URI

//View pentru pagina despre noi - ruta este /about care apeleaza view-ul about din subdirectorul pages
Route::get('/about', function(){
    return view('pages.about');
});

//View pentru pagina prelucrare - ruta este /manufacture care apeleaza view-ul manufacture din subdirectorul pages
Route::get('/manufacture', function(){
    return view('pages.manufacture');
});

//View pentru pagina specifica fiecarui produs - ruta este /products/id-ul produsului care apeleaza view-ul show din subdirectorul products
//!!!!ATENTIE - este valabil doar pentru admini momentan
Route::get('/products/{id}', function(){
    return view('products.show');
});

Route::get('/shop', 'ShopController@index');

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

Route::get('/contact', 'ContactUsFormController@createForm');

Route::post('/contact', 'ContactUsFormController@ContactUsForm')->name('contact.store');

Route::get('/', function(){
    return view('welcome');
});
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
    
    //CRUD pe cos - accesibil doar pentru useri
    // Route::patch('update-cart', 'ShopController@update')->middleware('auth:user'); //modific cosul (doar pentru useri) - prin patch pentru a modifica toate datele existente (in mare parte doar cantitatea in cazul de fata)
    // Route::delete('remove-from-cart', 'ShopController@remove')->middleware('auth:user');  //sterg din cos

    // Route::get('/show/{id}', 'ShopController@show')->middleware('auth:user');

   
    Route::get('cart', 'ShopController@cart')->middleware('auth:user');  //cosul propriu zis - user
    Route::get('add-to-cart/{id}', 'ShopController@addToCart')->middleware('auth:user');  //adaug in cos
    Route::patch('update-cart', 'ShopController@update')->middleware('auth:user');  //modific cos
    Route::delete('remove-from-cart', 'ShopController@remove')->middleware('auth:user'); //sterg din cos
    Route::get('/confirm', 'ShopController@confirm')->middleware('auth:user'); //pentru confirmarea comenzii
    Route::get('cart/success', 'ShopController@empty')->middleware('auth:user');

    //CRUD pe products, doar adminii au acces la pagina de modificare produse in baza de date
    Route::GET('/products', 'ProductController@index')->middleware('auth:admin');
    Route::resource('products', 'ProductController')->middleware('auth:admin');
