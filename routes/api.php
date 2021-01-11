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


    Route::get('cards','MillionareController@cards');
    Route::get('about','MillionareController@about');
    Route::get('uses','MillionareController@uses');
    Route::get('contact','MillionareController@contact');
    Route::post('participant','MillionareController@participants');
    Route::post('login','MillionareController@login');
    Route::post('registers','MillionareController@register');
    Route::get('cards/{id}','MillionareController@cardsByID');
    Route::get('winners','MillionareController@winners');
    Route::get('todaywinners','MillionareController@todaywinners');
    Route::get('mylottery/{id}','MillionareController@mylottery');
    Route::get('getProfile/{id}','MillionareController@getProfile');
    Route::post('profileUpdate','MillionareController@profileUpdate');
    Route::post('updatePassword','MillionareController@updatePassword');
    Route::post('forgetPassword','MillionareController@forgetPassword');





