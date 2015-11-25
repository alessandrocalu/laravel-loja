<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'LojaAdminController@index');


Route::get('/', 'LojaAdminController@home');

Route::get('items', ['as' => 'items.index', 'uses' => 'LojaAdminController@index']);
Route::get('items/create', ['as' => 'items.create', 'uses' => 'LojaAdminController@create']);
Route::post('items/store', ['as' => 'items.store', 'uses' => 'LojaAdminController@store']);

Route::get('suppliers', 'LojaAdminController@index');
Route::get('locations', 'LojaAdminController@index');


