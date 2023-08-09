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

Route::get('/', 'HomeController@home')->middleware('auth');
Route::get('admin', 'HomeController@admin')->middleware('auth');
Route::get('alunos', 'HomeController@alunos')->middleware('auth');
Route::get('points/plus/{id}', 'HomeController@addPoints')->middleware('auth');
Route::get('points/minus/{id}', 'HomeController@removePoints')->middleware('auth');
Route::post('points/plus', ['as' => 'points.plus', 'uses' => 'HomeController@storeAddPoints'])->middleware('auth');
Route::post('points/minus', ['as' => 'points.minus', 'uses' => 'HomeController@storeRemovePoints'])->middleware('auth');

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

