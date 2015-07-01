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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'dashboard'], function(){
    Route::get('','DashboardController@index');

    Route::post('meta/post-update', 'DashboardController@postUpdate');
    Route::get('meta','DashboardController@meta');


    //Route::get('show/{id}', 'DashboardController@show');
});
