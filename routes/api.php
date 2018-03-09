<?php

use Illuminate\Http\Request;
use Area\DeviceController as AreaDeviceController;
use Area\ReadingController as AreaReadingController;
use Area\StillHereController as AreaStillHereController;
use Area\ErrorController as AreaErrorController;
use Area\StatController as AreaStatController;
use Device\ReadingController as DeviceReadingController;
use Device\StillHereController as DeviceStillHereController;
use Device\ErrorController as DeviceErrorController;
use Device\StatController as DeviceStatController;

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

// Stat
Route::get('stat', StatController::class.'@index');

// Area
Route::get('area', AreaController::class.'@index');
Route::get('area/{area}', AreaController::class.'@show');
Route::get('area/{area}/device', AreaDeviceController::class.'@index');
Route::get('area/{area}/stat', AreaStatController::class.'@index');

// Area Readings
Route::get('area/{area}/reading', AreaReadingController::class.'@index');
Route::get('area/{area}/reading/hourly', AreaReadingController::class.'@hourly');
Route::get('area/{area}/reading/daily', AreaReadingController::class.'@daily');
Route::get('area/{area}/reading/weekly', AreaReadingController::class.'@weekly');
Route::get('area/{area}/reading/monthly', AreaReadingController::class.'@monthly');
Route::get('area/{area}/reading/yearly', AreaReadingController::class.'@yearly');

// Area StillHeres
Route::get('area/{area}/still-here', AreaStillHereController::class.'@index');
Route::get('area/{area}/still-here/hourly', AreaStillHereController::class.'@hourly');
Route::get('area/{area}/still-here/daily', AreaStillHereController::class.'@daily');
Route::get('area/{area}/still-here/weekly', AreaStillHereController::class.'@weekly');
Route::get('area/{area}/still-here/monthly', AreaStillHereController::class.'@monthly');
Route::get('area/{area}/still-here/yearly', AreaStillHereController::class.'@yearly');

// Area Errors
Route::get('area/{area}/error', AreaErrorController::class.'@index');
Route::get('area/{area}/error/hourly', AreaErrorController::class.'@hourly');
Route::get('area/{area}/error/daily', AreaErrorController::class.'@daily');
Route::get('area/{area}/error/weekly', AreaErrorController::class.'@weekly');
Route::get('area/{area}/error/monthly', AreaErrorController::class.'@monthly');
Route::get('area/{area}/error/yearly', AreaErrorController::class.'@yearly');

// Device
Route::get('device', DeviceController::class.'@index');
Route::get('device/{device}', DeviceController::class.'@show');
Route::get('device/{device}/stat', DeviceStatController::class.'@index');

// Device Readings
Route::get('device/{device}/reading', DeviceReadingController::class.'@index');
Route::get('device/{device}/reading/hourly', DeviceReadingController::class.'@hourly');
Route::get('device/{device}/reading/daily', DeviceReadingController::class.'@daily');
Route::get('device/{device}/reading/weekly', DeviceReadingController::class.'@weekly');
Route::get('device/{device}/reading/monthly', DeviceReadingController::class.'@monthly');
Route::get('device/{device}/reading/yearly', DeviceReadingController::class.'@yearly');

// Device StillHeres
Route::get('device/{device}/still-here', DeviceStillHereController::class.'@index');
Route::get('device/{device}/still-here/hourly', DeviceStillHereController::class.'@hourly');
Route::get('device/{device}/still-here/daily', DeviceStillHereController::class.'@daily');
Route::get('device/{device}/still-here/weekly', DeviceStillHereController::class.'@weekly');
Route::get('device/{device}/still-here/monthly', DeviceStillHereController::class.'@monthly');
Route::get('device/{device}/still-here/yearly', DeviceStillHereController::class.'@yearly');

// Device Errors
Route::get('device/{device}/error', DeviceErrorController::class.'@index');
Route::get('device/{device}/error/hourly', DeviceErrorController::class.'@hourly');
Route::get('device/{device}/error/daily', DeviceErrorController::class.'@daily');
Route::get('device/{device}/error/weekly', DeviceErrorController::class.'@weekly');
Route::get('device/{device}/error/monthly', DeviceErrorController::class.'@monthly');
Route::get('device/{device}/error/yearly', DeviceErrorController::class.'@yearly');

// Reading
Route::get('reading', ReadingController::class.'@index');
Route::get('reading/hourly', ReadingController::class.'@hourly');
Route::get('reading/daily', ReadingController::class.'@daily');
Route::get('reading/weekly', ReadingController::class.'@weekly');
Route::get('reading/monthly', ReadingController::class.'@monthly');
Route::get('reading/yearly', ReadingController::class.'@yearly');

// StillHere
Route::get('still-here', StillHereController::class.'@index');
Route::get('still-here/hourly', StillHereController::class.'@hourly');
Route::get('still-here/daily', StillHereController::class.'@daily');
Route::get('still-here/weekly', StillHereController::class.'@weekly');
Route::get('still-here/monthly', StillHereController::class.'@monthly');
Route::get('still-here/yearly', StillHereController::class.'@yearly');

// Error
Route::get('error', ErrorController::class.'@index');
Route::get('error/hourly', ErrorController::class.'@hourly');
Route::get('error/daily', ErrorController::class.'@daily');
Route::get('error/weekly', ErrorController::class.'@weekly');
Route::get('error/monthly', ErrorController::class.'@monthly');
Route::get('error/yearly', ErrorController::class.'@yearly');


// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
