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

/* we are using controllers to with functions to serve our views for each route instead
    of directly serving views from this file
*/

/* STATIC PAGES */
Route::get('/', 'App\Http\Controllers\StaticPagesController@index');
Route::get('/reservations', 'App\Http\Controllers\StaticPagesController@reservations');
Route::get('/offers', 'App\Http\Controllers\StaticPagesController@offers');
Route::get('/about', 'App\Http\Controllers\StaticPagesController@about');
Route::get('/contact', 'App\Http\Controllers\StaticPagesController@contact');
Route::get('/menu', 'App\Http\Controllers\StaticPagesController@menu');
Route::get('/menu/{slug}', 'App\Http\Controllers\StaticPagesController@singleMenu');


// admin dash
Route::get('/admin', 'App\Http\Controllers\admin\AdminController@index');

// admin food cat
Route::get('/admin/food-categories', 'App\Http\Controllers\admin\FoodCategoriesController@index');
Route::get('/admin/food-categories/create', 'App\Http\Controllers\admin\FoodCategoriesController@create');
Route::get('/admin/food-categories/{id}/edit', 'App\Http\Controllers\admin\FoodCategoriesController@edit');
Route::put('/admin/food-categories/{id}', 'App\Http\Controllers\admin\FoodCategoriesController@update');
Route::delete('/admin/food-categories/{id}/delete', 'App\Http\Controllers\admin\FoodCategoriesController@delete');


// admin food items
Route::get('/admin/food-items', 'App\Http\Controllers\admin\FoodItemsController@index');
Route::get('/admin/food-items/create', 'App\Http\Controllers\admin\FoodItemsController@create');
Route::get('/admin/food-items/{id}/edit', 'App\Http\Controllers\admin\FoodItemsController@edit');

// Admin users
Route::get('/admin/users', 'App\Http\Controllers\admin\UsersController@index');
// create user page
Route::get('/admin/users/create', 'App\Http\Controllers\admin\UsersController@create');
// post route to save user to DB
Route::post('/admin/users', 'App\Http\Controllers\admin\UsersController@store');
Route::get('/admin/users/{id}/edit', 'App\Http\Controllers\admin\UsersController@edit');
Route::put('/admin/users/{id}', 'App\Http\Controllers\admin\UsersController@update');
// we can either delete with a post request or a get requests
//Route::get('/admin/users/{id}/delete', 'App\Http\Controllers\admin\UsersController@delete');

//Route::post('/admin/users/{id}/delete', 'App\Http\Controllers\admin\UsersController@delete');

// To follow rest conventions we would do a delete request instead of a post or get method
Route::delete('/admin/users/{id}/delete', 'App\Http\Controllers\admin\UsersController@delete');

// Admin Customers
Route::get('/admin/offers-members', 'App\Http\Controllers\admin\CustomersController@allOffersMembers');
Route::get('/admin/reservations/', 'App\Http\Controllers\admin\CustomersController@allReservations');


// admin auth
Route::get('/admin/login', function () {
    return view('admin/login');
});

Route::get('/admin/register', function () {
    return view('admin/register');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
