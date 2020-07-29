<?php


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

Route::get('/', 'FrontController@index')->name('index');
Route::get('/about', 'FrontController@about')->name('about');
Route::get('/services', 'FrontController@services')->name('services');
Route::get('/products', 'FrontController@products')->name('products');
Route::get('/contact', 'FrontController@contact')->name('contact');
Route::get('/product/{slug}', 'FrontController@singleproduct')->name('page.product');
Route::get('/service/{slug}', 'FrontController@singleservice')->name('page.service');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
// For Admin
Route::group(['prefix'=>'admin','as'=>'admin.','middleware' => ['auth','roles'], 'roles' => ['admin']], function(){
    Route::resource('/service', 'ServiceController');
    Route::resource('/team', 'TeamController');
    Route::resource('/testimonial', 'TestimonialController');
    Route::resource('/product', 'ProductController');
    Route::resource('settings','SettingController')->only(['index','store']);

});
// BOTH EDITOR AND ADMIN
Route::group(['prefix'=>'admin','as'=>'admin.','middleware'=>['auth','roles'],'roles'=>['editor','admin']], function(){
    Route::resource('/service', 'ServiceController');
    Route::resource('/team', 'TeamController');
    Route::resource('/product', 'ProductController');
    Route::resource('/testimonial', 'TestimonialController');
});
