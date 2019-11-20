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



Auth::routes();

// Route::post('/login', 'Auth\LoginController@login');
// Route::post('/logout', 'Auth\LoginController@logout');

// Route::post('/register', 'Auth\RegisterController@register');



Route::get('/getUser ', 'UserController@getUser');
// Distributor
Route::get('/distributorInit','DistributorController@index');
// JOF ORDER
Route::get('/JOFinit/{id}','JOFController@index');
// USER ROLES
Route::get('/logout ', 'UserController@logout');
Route::get('/userrole ', 'UserController@userrole');
Route::post('/changepass/{id}', 'UserController@changepass');

Route::get('/home ', 'HomeController@index')->name('home');
Route::get('/userlogin ',function(){
    return view('/home/userlogin');
});


// JOF Status
Route::get('/JOFPending','JOFController@JOFPending');
Route::get('/JOFDelivered','JOFController@JOFDelivered');
// Customer Search
Route::get('/getTracking/{id}','JOFController@getTracking');


Route::get('/{vue?}', function () { return view('/home/home'); })->where('vue', '[\/\w\.-]*');



