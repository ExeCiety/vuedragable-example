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

Route::group(['api' => 'FoodController'], function () {
    Route::post('/foods', 'FoodController@list');
    Route::put('/foods', 'FoodController@store');
});

Route::group(['api' => 'OrderController'], function () {
    Route::post('/orders', 'OrderController@list');
    Route::put('/orders', 'OrderController@store');
});
