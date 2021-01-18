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
Route::get('/reservation/confirmation', 'App\Http\Controllers\StaticPagesController@reservationConfirmation');
Route::post('/reservations', 'App\Http\Controllers\StaticPagesController@saveReservation');

Route::get('/offers', 'App\Http\Controllers\StaticPagesController@offers');
Route::post('/offers', 'App\Http\Controllers\StaticPagesController@registerMember');
Route::get('/offers/thank-you', 'App\Http\Controllers\StaticPagesController@offersThankYou');

Route::get('/about', 'App\Http\Controllers\StaticPagesController@about');
Route::get('/contact', 'App\Http\Controllers\StaticPagesController@contact');
Route::get('/menu', 'App\Http\Controllers\StaticPagesController@menu');
Route::get('/menu/{slug}', 'App\Http\Controllers\StaticPagesController@singleMenu');


// admin dash
Route::get('/admin', 'App\Http\Controllers\admin\AdminController@index');

// admin food cat
Route::get('/admin/food-categories', 'App\Http\Controllers\admin\FoodCategoriesController@index');
Route::get('/admin/food-categories/create', 'App\Http\Controllers\admin\FoodCategoriesController@create');
Route::post('/admin/food-categories', 'App\Http\Controllers\admin\FoodCategoriesController@store');
Route::get('/admin/food-categories/{id}/edit', 'App\Http\Controllers\admin\FoodCategoriesController@edit');
Route::put('/admin/food-categories/{id}', 'App\Http\Controllers\admin\FoodCategoriesController@update');
Route::delete('/admin/food-categories/{id}/delete', 'App\Http\Controllers\admin\FoodCategoriesController@delete');


// admin food items
Route::get('/admin/food-items', 'App\Http\Controllers\admin\FoodItemsController@index');
Route::get('/admin/food-items/create', 'App\Http\Controllers\admin\FoodItemsController@create');
Route::get('/admin/food-items/{id}/edit', 'App\Http\Controllers\admin\FoodItemsController@edit');
Route::post('/admin/food-items', 'App\Http\Controllers\admin\FoodItemsController@store');
Route::put('/admin/food-items/{id}', 'App\Http\Controllers\admin\FoodItemsController@update');
Route::delete('/admin/food-items/{id}/delete', 'App\Http\Controllers\admin\FoodItemsController@delete');


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
// Admin Members
Route::get('/admin/members', 'App\Http\Controllers\admin\MemberController@index');
Route::delete('/admin/members/{id}/delete', 'App\Http\Controllers\admin\MemberController@delete');

//Admin reservations
//Route::post('/admin/reservations', 'App\Http\Controllers\admin\UsersController@store');
// ! add edit later
//Route::get('/admin/reservations/{id}/edit', 'App\Http\Controllers\admin\UsersController@edit');
//Route::put('/admin/reservations/{id}', 'App\Http\Controllers\admin\UsersController@update');
Route::delete('/admin/reservations/{id}/delete', 'App\Http\Controllers\admin\ReservationController@delete');
Route::get('/admin/reservations', 'App\Http\Controllers\admin\ReservationController@index');



// admin auth
Route::get('/admin/login', function () {
    return view('admin/login');
});

Route::get('/admin/register', function () {
    return view('admin/register');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
