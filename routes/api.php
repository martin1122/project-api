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


Route::get('/reading', 'ReadingController@index');
Route::get('/reading/hourly', 'ReadingController@hourly');
Route::get('/reading/hourly/{offset}', 'ReadingController@hourly');
Route::get('/reading/daily', 'ReadingController@daily');
Route::get('/reading/daily/{offset}', 'ReadingController@daily');
Route::get('/reading/weekly', 'ReadingController@weekly');
Route::get('/reading/weekly/{offset}', 'ReadingController@weekly');
Route::get('/reading/monthly', 'ReadingController@monthly');
Route::get('/reading/monthly/{offset}', 'ReadingController@monthly');
Route::get('/reading/yearly', 'ReadingController@yearly');
Route::get('/reading/yearly/{offset}', 'ReadingController@yearly');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
