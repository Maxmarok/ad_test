<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return redirect()->route('list');
});

Route::get('/list', function () {
    return view('welcome');
})->name('list');

Route::get('/item/{id}', function () {
    return view('welcome');
})->name('item');

Route::get('/create', function () {
    return view('welcome');
});
