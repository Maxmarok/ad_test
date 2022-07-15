<?php

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

Route::prefix('/v1')->as('api.')->group(function () {
    Route::prefix('/ads')->as('ads.')->group(function () {
        Route::post('/item', ['as' => 'item', 'uses' => 'AdsController@item']);
        Route::post('/list', ['as' => 'list', 'uses' => 'AdsController@list']);
        Route::post('/create', ['as' => 'create', 'uses' => 'AdsController@create']);
    });
});
