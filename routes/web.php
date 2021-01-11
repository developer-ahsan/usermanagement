<?php

Auth::routes();
Route::middleware(['auth'])->group(function(){
    
    //Home Page
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

    Route::get('/deleteuser/{ID}','Controller@deleteuser');

    // cards
    Route::get('cards/list' , 'CardsController@index');
    Route::get('cards/create' , 'CardsController@create');
    Route::get('cards/delete/{id}' , 'CardsController@delete');
    Route::post('cards/store' , 'CardsController@store');
    Route::get('cards/update/{id}' , 'CardsController@edit');
    Route::post('cards/update' , 'CardsController@update');
    // participants
    Route::get('participants/list' , 'WinnerController@index');
    Route::get('winners/list' , 'WinnerController@winner');
    Route::get('participants/list/{id}' , 'WinnerController@indexById');
    Route::get('participant/update/{id}' , 'WinnerController@update');
    // Contact Us Millionaire
    Route::get('contact/list' , 'ContactController@index');
    Route::get('contact/create' , 'ContactController@create');
    Route::get('contact/delete/{id}' , 'ContactController@delete');
    Route::post('contact/store' , 'ContactController@store');
    Route::get('contact/update/{id}' , 'ContactController@edit');
    Route::post('contact/update' , 'ContactController@update');
    // Aboout Us Millionaire
    Route::get('about/list' , 'AboutController@index');
    Route::get('about/create' , 'AboutController@create');
    Route::get('about/delete/{id}' , 'AboutController@delete');
    Route::post('about/store' , 'AboutController@store');
    Route::get('about/update/{id}' , 'AboutController@edit');
    Route::post('about/update' , 'AboutController@update');
// How Use Millionaire
    Route::get('use/list' , 'UseController@index');
    Route::get('use/create' , 'UseController@create');
    Route::get('use/delete/{id}' , 'UseController@delete');
    Route::post('use/store' , 'UseController@store');
    Route::get('use/update/{id}' , 'UseController@edit');
    Route::post('use/update' , 'UseController@update');

    Route::get('/user', 'Controller@user');
    Route::get('/userslist', 'Controller@userslist');
    Route::get('/edituser/{ID}','Controller@edituser');
    Route::post('/updateuser','Controller@updateuser');
    Route::post('/registeruser','Controller@createuser');

    Route::get('/customerslist', 'Controller@customerslist');
    Route::get('/editcustomer/{ID}','Controller@editcustomer');
    Route::post('/updatecustomer','Controller@updatecustomer');
    Route::post('/registercustomer','Controller@createcustomer');
    Route::get('/deletecustomer/{ID}','Controller@deletecustomer');
    

});
    Route::get('resetpasswords/{id}', 'HomeController@resetPassword');
    Route::post('updatepassword', 'HomeController@updatepassword');
    Route::get('emailactivated/{id}', 'HomeController@emailactivated');
