<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


//system user
Route::get('/user','UserController@index');
Route::post('/usercreate','UserController@register');
Route::put('/userupdate','UserController@update');
Route::delete('/userdelete/{id}','UserController@destroy');
// Distributor
Route::get('/generateCode','DistributorController@generateCode');
// Route::get('/distributorInit','DistributorController@index');
Route::post('/distributorCreate','DistributorController@create');
Route::put('/distributorUpdate','DistributorController@update');
Route::delete('/distributorDelete/{id}','DistributorController@destroy');

// JOF Order
// Route::get('/JOFinit/{id}','JOFController@index');
Route::post('/JOFcreate','JOFController@create');
Route::put('/JOFupdate','JOFController@update');
Route::delete('/JOFdelete/{id}','JOFController@destroy');
// get number series
Route::get('/getSeries','JOFController@getSeries');

// Return Jof or Add Tracking no
Route::post('/JOFupdateStatus','JOFController@updateStatus');
Route::post('/JOFupdateTracking','JOFController@addTrackingno');

Route::get('/JOFstatus','JOFController@JOFstatus');

Route::get('/exportpdf','JOFController@ExportPDF');

// Route::get('/JOFPending','JOFController@JOFPending');
// Route::get('/JOFDelivered','JOFController@JOFDelivered');

// JOF History
Route::post('/jofhistory','JofHistoryController@jofhistory');
Route::get('/getJOF/{id}','JofHistoryController@getJOF');
Route::get('/getJOFAll/{id}','JofHistoryController@index');

// 7th day due date
Route::get('/sevenDueDate','JOFController@sevenDueDate');
