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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/register', 'App\Http\Controllers\AuthController@register');
Route::post('/login', 'App\Http\Controllers\AuthController@login');
Route::post('/userinfo', 'App\Http\Controllers\AuthController@infouser')->middleware('auth:sanctum');

Route::group(['prefix' => 'ventas', 'middleware' =>'auth:sanctum'], function (){
    Route::get('/ventas', 'App\Http\Controllers\VentaController@index');
    Route::post('/ventas', 'App\Http\Controllers\VentaController@store');
    Route::put('/ventas/{id}', 'App\Http\Controllers\VentaController@update');
    Route::delete('/ventas/{id}', 'App\Http\Controllers\VentaController@destroy');
});

Route::group(['prefix' => 'pociones', 'middleware' =>'auth:sanctum'], function (){
    Route::get('/pociones', 'App\Http\Controllers\PocionController@index');
    Route::post('/pociones', 'App\Http\Controllers\PocionController@store');
    Route::put('/pociones/{id}', 'App\Http\Controllers\PocionController@update');
    Route::delete('/pociones/{id}', 'App\Http\Controllers\PocionController@destroy');
});

Route::group(['prefix' => 'ingredientes', 'middleware' =>'auth:sanctum'], function (){
    Route::get('/ingredientes', 'App\Http\Controllers\IngredienteController@index');
    Route::post('/ingredientes', 'App\Http\Controllers\IngredienteController@store');
    Route::put('/ingredientes/{id}', 'App\Http\Controllers\IngredienteController@update');
    Route::delete('/ingredientes/{id}', 'App\Http\Controllers\IngredienteController@destroy');
});

Route::group(['prefix' => 'brujas', 'middleware' =>'auth:sanctum'], function (){
    Route::get('/brujas', 'App\Http\Controllers\BrujaController@index');
    Route::post('/brujas', 'App\Http\Controllers\BrujaController@store');
    Route::put('/brujas/{id}', 'App\Http\Controllers\BrujaController@update');
    Route::delete('/brujas/{id}', 'App\Http\Controllers\BrujaController@destroy');
});