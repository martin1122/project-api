<?php

use Illuminate\Http\Request;
use Device\ReadingController as DeviceReadingController;

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

// Area
Route::get('area', AreaController::class.'@index');

// Device
Route::get('device', DeviceController::class.'@index');

Route::get('device/{device}/reading', DeviceReadingController::class.'@index');
Route::get('device/{device}/reading/hourly', DeviceReadingController::class.'@hourly');
Route::get('device/{device}/reading/daily', DeviceReadingController::class.'@daily');
Route::get('device/{device}/reading/weekly', DeviceReadingController::class.'@weekly');
Route::get('device/{device}/reading/monthly', DeviceReadingController::class.'@monthly');
Route::get('device/{device}/reading/yearly', DeviceReadingController::class.'@yearly');

// Error
Route::get('error', ErrorController::class.'@index');

// Reading
Route::get('reading', ReadingController::class.'@index');
Route::get('reading/hourly', ReadingController::class.'@hourly');
Route::get('reading/daily', ReadingController::class.'@daily');
Route::get('reading/weekly', ReadingController::class.'@weekly');
Route::get('reading/monthly', ReadingController::class.'@monthly');
Route::get('reading/yearly', ReadingController::class.'@yearly');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
