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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::middleware('auth:api')->get('/router/{id}', ['uses'=>'Api\Router\IndexController@index', 'as'=>'router.get']);

Route::middleware('auth:api')->post('/router/create', ['uses'=>'Api\Router\IndexController@create', 'as'=>'router.create']);

Route::middleware('auth:api')->put('/router/update/{id}', ['uses'=>'Api\Router\IndexController@update', 'as'=>'router.update']);

Route::middleware('auth:api')->delete('/router/delete/{id}', ['uses'=>'Api\Router\IndexController@delete', 'as'=>'router.delete']);

Route::middleware('auth:api')->post('/router/filter/iprange/', ['uses'=>'Api\Router\IndexController@getByIPRange', 'as'=>'router.ip.range']);

Route::middleware('auth:api')->post('/router/filter/sapId/', ['uses'=>'Api\Router\IndexController@getBySAPID', 'as'=>'router.sapid']);