<?php

use Illuminate\Support\Facades\Route;
use App\Models\GeneralSetting;
use App\Models\SeoSetting;
use App\Models\SocialSetting;

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

// Here we are using a custom middleware class setup by us. We are passing everything after : as a value of variable
Route::get('/admin/food-categories', 'App\Http\Controllers\admin\FoodCategoriesController@index')->middleware('role:Admin');
Route::get('/admin/food-categories/create', 'App\Http\Controllers\admin\FoodCategoriesController@create')->middleware('role:Admin');
Route::post('/admin/food-categories', 'App\Http\Controllers\admin\FoodCategoriesController@store')->middleware('role:Admin');
Route::get('/admin/food-categories/{id}/edit', 'App\Http\Controllers\admin\FoodCategoriesController@edit')->middleware('role:Admin');
Route::put('/admin/food-categories/{id}', 'App\Http\Controllers\admin\FoodCategoriesController@update')->middleware('role:Admin');
Route::delete('/admin/food-categories/{id}/delete', 'App\Http\Controllers\admin\FoodCategoriesController@delete')->middleware('role:Admin');


// admin food items
Route::get('/admin/food-items', 'App\Http\Controllers\admin\FoodItemsController@index')->middleware('role:Admin');
Route::get('/admin/food-items/create', 'App\Http\Controllers\admin\FoodItemsController@create')->middleware('role:Admin');
Route::get('/admin/food-items/{id}/edit', 'App\Http\Controllers\admin\FoodItemsController@edit')->middleware('role:Admin');
Route::post('/admin/food-items', 'App\Http\Controllers\admin\FoodItemsController@store')->middleware('role:Admin');
Route::put('/admin/food-items/{id}', 'App\Http\Controllers\admin\FoodItemsController@update')->middleware('role:Admin');
Route::delete('/admin/food-items/{id}/delete', 'App\Http\Controllers\admin\FoodItemsController@delete')->middleware('role:Admin');


// Admin users
Route::get('/admin/users', 'App\Http\Controllers\admin\UsersController@index')->middleware('role:Admin');
// create user page
Route::get('/admin/users/create', 'App\Http\Controllers\admin\UsersController@create')->middleware('role:Admin');
// post route to save user to DB
Route::post('/admin/users', 'App\Http\Controllers\admin\UsersController@store')->middleware('role:Admin');
Route::get('/admin/users/{id}/edit', 'App\Http\Controllers\admin\UsersController@edit')->middleware('role:Admin');
Route::put('/admin/users/{id}', 'App\Http\Controllers\admin\UsersController@update')->middleware('role:Admin');
// we can either delete with a post request or a get requests
//Route::get('/admin/users/{id}/delete', 'App\Http\Controllers\admin\UsersController@delete');

//Route::post('/admin/users/{id}/delete', 'App\Http\Controllers\admin\UsersController@delete');

// To follow rest conventions we would do a delete request instead of a post or get method
Route::delete('/admin/users/{id}/delete', 'App\Http\Controllers\admin\UsersController@delete')->middleware('role:Admin');

// Admin offer Members
Route::get('/admin/members', 'App\Http\Controllers\admin\MemberController@index');
Route::delete('/admin/members/{id}/delete', 'App\Http\Controllers\admin\MemberController@delete');

//Admin reservations
//Route::post('/admin/reservations', 'App\Http\Controllers\admin\UsersController@store');
// ! add edit later
//Route::get('/admin/reservations/{id}/edit', 'App\Http\Controllers\admin\UsersController@edit');
//Route::put('/admin/reservations/{id}', 'App\Http\Controllers\admin\UsersController@update');
Route::delete('/admin/reservations/{id}/delete', 'App\Http\Controllers\admin\ReservationController@delete');
Route::get('/admin/reservations', 'App\Http\Controllers\admin\ReservationController@index');

//Admin settings
Route::get('/admin/settings/general', 'App\Http\Controllers\admin\SettingController@general')->middleware('role:Admin');
Route::put('/admin/settings/general', 'App\Http\Controllers\admin\SettingController@saveGeneral')->middleware('role:Admin');
Route::get('/admin/settings/seo', 'App\Http\Controllers\admin\SettingController@seo')->middleware('role:Admin');
Route::put('/admin/settings/seo', 'App\Http\Controllers\admin\SettingController@saveSeo')->middleware('role:Admin');
Route::get('/admin/settings/social', 'App\Http\Controllers\admin\SettingController@social')->middleware('role:Admin');
Route::put('/admin/settings/social', 'App\Http\Controllers\admin\SettingController@saveSocial')->middleware('role:Admin');



// admin auth
Route::get('/admin/login', function () {
    return view('admin/login');
});

Route::get('/admin/register', function () {
    return view('admin/register');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// this is a wildcard view. We can pass data here for every view
View::composer('*',function($view){
    $generalSettings= GeneralSetting::find(1);
        $seoSettings = SeoSetting::find(1);
        $socialSettings = SocialSetting::find(1);
    $view->with('settings',[
        'social'=> $socialSettings,
        'seo'=>$seoSettings,
        'general'=>$generalSettings
    ]);
});
