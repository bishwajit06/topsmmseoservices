<?php

use App\District;
use Illuminate\Support\Facades\Auth;
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

// Route::get('/', function () {
//     return view('welcome');
// });


Auth::routes();

//Home
Route::get('/', 'HomeController@index')->name('home')->middleware('pagespeed');
//Pages
Route::get('/contact', 'PageController@contact')->name('contact');
Route::get('/about', 'PageController@about')->name('about');
Route::get('/terms-conditions', 'PageController@termsConditions')->name('terms-conditions');
Route::get('/faq', 'PageController@faq')->name('faq');


Route::get('category/{slug}','CategoryController@showCategory')->name('category.show');
Route::get('tag/{slug}','TagController@showTag')->name('tag.show');
Route::get('service/{slug}','ServiceController@detail')->name('service.detail');

Route::post('/customer/review','ReviewController@customerStore')->name('customer.review.store');


Route::get('token/{token}','VerificationController@verify')->name('user.verification');


Route::group(['as'=>'admin.','prefix'=>'admin','namespace'=>'Admin','middleware'=>['auth','admin']], function (){
    Route::get('dashboard','DashboardController@index')->name('dashboard');
    Route::get('profile','DashboardController@profile')->name('profile.index');
    Route::post('profile/update','DashboardController@profileUpdate')->name('profile.update');
    Route::post('profile','DashboardController@updatePassword')->name('profile.updatePassword');


    Route::get('menu','DashboardController@menu')->name('menu');

    //Route::post('seen/{id}','OrderController@seenByAdmin')->name('order.seen');
    //Route::post('completed/{id}','OrderController@completed')->name('order.completed');
    //Route::post('paid/{id}','OrderController@paid')->name('order.paid');
    //Route::post('invoice/{id}','OrderController@invoice')->name('order.invoice');

    Route::resource('service','ServiceController');
    Route::resource('category','CategoryController');
    Route::resource('order','OrderController');
    Route::resource('review','ReviewController');
    Route::resource('tag','TagController');
    Route::resource('slider','SliderController');
    Route::resource('division','DivisionController');
    Route::resource('district','DistrictController');

});

Route::group(['as'=>'customer.','prefix'=>'customer','namespace'=>'Customer','middleware'=>['auth','customer']], function (){
    Route::get('dashboard','DashboardController@index')->name('dashboard');

});


//Api Route

Route::get('get-districts/{id}', function ($id) {
    return json_encode(District::where('division_id',$id)->get());
});
