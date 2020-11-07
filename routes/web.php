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
Route::get('page/contact', 'ContactController@contact')->name('contact');
Route::post('/contact-us', 'ContactController@contactSubmit')->name('contact.submit');
Route::post('/contactRead/{id}', 'ContactController@contactRead')->name('contact.read');
Route::post('/contact/{id}', 'ContactController@contactUnread')->name('contact.unread');


Route::get('category/{slug}','CategoryController@showCategory')->name('category.show');
Route::get('tag/{slug}','TagController@showTag')->name('tag.show');
Route::get('service/{slug}','ServiceController@detail')->name('service.detail');

Route::post('/customer/review','ReviewController@customerStore')->name('customer.review.store');
Route::post('/post/comment', 'CommentController@commentStore')->name('comment.store');

Route::post('admin/commentApprove/{id}','CommentController@commentApproved')->name('admin.comment.approved');
Route::post('admin/commentUnApprove/{id}','CommentController@commentUnApproved')->name('admin.comment.unapproved');


Route::get('token/{token}','VerificationController@verify')->name('user.verification');


Route::get('page/blog','PostController@showAllPost')->name('allPosts.show');
Route::get('post/{slug}','PostController@details')->name('post.details');
Route::get('/postCategory/{slug}','PostController@showPostCategory')->name('postCategory.show');
Route::get('postTag/{slug}','PostController@showTagCategory')->name('postTag.show');
Route::get('userByPost/{username}','PostController@userByPost')->name('userByPost.show');


Route::get('page/{slug}','PageController@details')->name('page.details');

Route::group(['as'=>'admin.','prefix'=>'admin','namespace'=>'Admin','middleware'=>['auth','admin']], function (){
    Route::get('dashboard','DashboardController@index')->name('dashboard');
    Route::get('profile','DashboardController@profile')->name('profile.index');
    Route::post('profile/update','DashboardController@profileUpdate')->name('profile.update');
    Route::post('profile','DashboardController@updatePassword')->name('profile.updatePassword');

    Route::post('user/verify/{id}','UserController@userVerify')->name('user.verify');
    Route::post('user/unverified/{id}','UserController@userUnverified')->name('user.unverified');




    Route::get('menu','DashboardController@menu')->name('menu');

    //Route::post('seen/{id}','OrderController@seenByAdmin')->name('order.seen');
    //Route::post('completed/{id}','OrderController@completed')->name('order.completed');
    //Route::post('paid/{id}','OrderController@paid')->name('order.paid');
    //Route::post('invoice/{id}','OrderController@invoice')->name('order.invoice');

    Route::resource('service','ServiceController');
    Route::resource('user','UserController');
    Route::resource('category','CategoryController');
    Route::resource('post','PostController');
    Route::resource('page','PageController');
    Route::resource('comment','CommentController');
    Route::resource('contact','ContactController');
    Route::resource('order','OrderController');
    Route::resource('review','ReviewController');
    Route::resource('tag','TagController');
    Route::resource('slider','SliderController');
    Route::resource('division','DivisionController');
    Route::resource('district','DistrictController');
    Route::resource('setting','SettingController');
    Route::resource('social','SocialController');
    Route::resource('gallery','GalleryController');



});

Route::group(['as'=>'author.','prefix'=>'author','namespace'=>'Author','middleware'=>['auth','author']], function (){
    Route::get('dashboard','DashboardController@index')->name('dashboard');
    Route::get('profile','DashboardController@profile')->name('profile.index');
    Route::post('profile/update','DashboardController@profileUpdate')->name('profile.update');
    Route::post('profile','DashboardController@updatePassword')->name('profile.updatePassword');

    Route::resource('post','PostController');

});


//Api Route

Route::get('get-districts/{id}', function ($id) {
    return json_encode(District::where('division_id',$id)->get());
});
