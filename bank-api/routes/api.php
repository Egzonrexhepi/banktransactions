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

Route::post('authenticate', 'UserController@login');
Route::post('register', 'UserController@register');

Route::middleware('auth:api')->group(function () {
    Route::post('transaction','BankTransactionController@create');
    Route::get('transaction/{uuid}', 'BankTransactionController@getTransactionData');
});

