<?php

use Illuminate\Support\Facades\Route;

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


Route::get('/', 'ProductController@index')->name('products.index');

// Routes des produits
//Route::get('/boutique', 'ProductController@index')->name('products.index');
Route::get('/boutique/{slug}', 'ProductController@show')->name('products.show');
Route::get('/search', 'ProductController@search')->name('products.search');
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

//Route pour le panier
Route::get('/panier', 'CartController@index')->name('cart.index');
Route::post('/panier/ajouter', 'CartController@store')->name('cart.store');
Route::patch('/panier/{rowId}', 'CartController@update')->name('cart.update');
Route::delete('/panier/{rowId}', 'CartController@destroy')->name('cart.destroy');

//Route pages de paiements
Route::get('/paiement', 'CheckoutController@index')->name('checkout.index');
Route::post('/paiement', 'CheckoutController@store')->name('checkout.store');
Route::get('/merci', 'CheckoutController@thankYou')->name('checkout.thankyou');

// Routes Users
Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware('can:manage-users')->group(function(){
    Route::resource('users', 'UsersController');
});

// Routes User
Route::get('/user/edit', 'UserController@edit')->name('user.edit');
Route::get('/user/index', 'UserController@index')->name('user.index');
Route::patch('/user/update', 'UserController@update')->name('user.update');

// Routes Modifier Produits
Route::get('/game/liste', 'GameController@index')->name('game.index');
Route::get('/game/create', 'GameController@create')->name('game.create');
Route::patch('/game/store', 'GameController@store')->name('game.store');
Route::get('/game/edit/{id]', 'GameController@edit')->name('game.edit');
Route::delete('/game/delete/{id}', 'GameController@destroy')->name('game.destroy');
Route::patch('/game/update', 'GameController@update')->name('game.update');