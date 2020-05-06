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

Route::middleware('auth:api')->get('/usuario', function (Request $request) {
    return $request->user();
});

Route::get('rede', 'RedeController@index');
Route::group(['prefix' => 'rede'], function () {
    Route::post('add', 'RedeController@add');
    Route::get('edit/{id}', 'RedeController@edit');
    Route::post('update/{id}', 'RedeController@update');
    Route::delete('delete/{id}', 'RedeController@delete');
});