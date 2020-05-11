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
Route::get('/boutique', 'ProductController@index')->name('products.index');
Route::get('/boutique/{slug}', 'ProductController@show')->name('products.show');
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

//Route pour le panier
Route::post('/panier/ajouter', 'CartController@store')->name('cart.store');

// Routes Users
Route::resource('/admin/users', 'Admin\UsersController');