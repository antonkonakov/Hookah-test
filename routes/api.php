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

Route::namespace('API')->middleware('booking-time')->group(function () {
    Route::get('booking/get-customers-list', 'BookingController@getCustomersList');
    Route::apiResources(['booking' => 'BookingController']);
});
Route::namespace('API')->group(function () {
    Route::apiResources([
        'smoking-bar' => 'SmokingBarController',
        'smoking-bar.hookah' => 'HookahController',
    ]);
});
