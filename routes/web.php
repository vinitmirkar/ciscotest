<?php

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

Route::get('/example1', ['uses'=>'Example1\IndexController@index', 'as'=>'example1.list']);

Route::get('/example1/figure', ['uses'=>'Example1\IndexController@figure', 'as'=>'example1.figure']);