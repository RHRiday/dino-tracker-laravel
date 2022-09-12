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
    return view('home');
});

Route::get('/create', 'DinoController@create');
Route::post('/create', 'DinoController@store');
Route::get('/show/{key}', 'DinoController@show');
Route::get('/edit/{creature}', 'DinoController@edit');
Route::post('/edit/{creature}', 'DinoController@update');

Route::get('/list', 'DinoController@index');
Route::get('/{filter}/{option}', 'DinoController@filter');