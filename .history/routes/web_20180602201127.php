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

Route::get('/', 'ClientController@index');
Route::resource('clients', 'ClientController');
Route::resource('services', 'ServiceController');
Route::resource('clientservices', 'ClientServiceController');
Route::get('clientservices/{id}', function ($id) {
    
})->name('clientServices');


Route::resource('paymentservice', 'paymentServiceController');

Route::get('user/profile', 'UserController@showProfile')->name('profile');
Route::get('/show-expired/{id}', 'paymentServiceController@showExpired');
Route::get('/show-expired-client/{id}', 'paymentServiceController@showExpiredClient');
Route::get('/show-expired-all', 'paymentServiceController@showExpiredAll');


// Route::get('user/{id}/profile', function ($id) {
//     //
// })->name('profile');

// $url = route('profile', ['id' => 1]);


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
