<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('trip-available-seats/{trip}', 'Api\\AvailableSeatController@show');
Route::post('book-seats', 'Api\\BookSeatController@store');


Route::resource('stations', 'Api\\StationController')->only('index');
Route::resource('trips', 'Api\\TripController')->only('index');
