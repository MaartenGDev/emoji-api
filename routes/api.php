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


Route::group(['prefix' => 'v1', 'middleware' => ['ajax.headers']], function () {
    Route::options('/{any}', 'EmptyResponseController@index')->where('any', '.*');
    Route::resource('groups', 'Api\\GroupController');
    Route::resource('tasks', 'Api\\TaskController');
});
