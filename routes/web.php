<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/','PagesController@index');
Route::get('/logout','\App\Http\Controllers\Auth\LoginController@logout');







Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::put('/home/{id}/update', 'HomeController@update')->name('home.update');
Route::delete('/home/{id}', 'HomeController@destroy')->name('home.destroy');


Route::namespace("Member")->prefix("member")->name('member.')->middleware('can:member-user')->group(function(){
    
    Route::resource("/home","HomeController");
    Route::get("/home/{id}/edit","HomeController@edit");
    Route::post("/home/store","HomeController@store");
    Route::put("/home/{id}/update","HomeController@update");
    Route::delete("/home/{id}","HomeController@destroy");
});



Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware('can:admin-user')->group(function(){
    Route::resource('/whatnews','WhatNewsController');
    Route::post('/whatnews','WhatNewsController@store');
    Route::resource('/whatnews/{id}/edit','WhatNewsController@edit');
    Route::put('/whatnews/{id}/update','WhatNewsController@update');
    Route::delete('/whatnews/{id}/destroy','WhatNewsController@destroy');


    Route::resource('/users','UsersController');
    Route::resource('/users/{id}/edit','UsersController@edit');
    Route::post('/users/{id}/update','UsersController@update');

    Route::resource('/pages','PagesController');
    Route::get('/pages/{id}','PagesController@edit');
    Route::post('/pages/{id}/update','PagesController@update');
    Route::delete('/pages/{id}','PagesController@destroy');

});

Route::namespace('Moderate')->prefix('moderate')->name('moderate.')->middleware('can:mod-user')->group(function(){

    Route::resource('/home','HomeController');
    Route::resource('/home/{home}/edit','HomeController@edit');
    Route::delete('/home/{id}','HomeController@destroy');


    Route::resource('/whatnews','WhatNewsController');
    Route::post('/whatnews','WhatNewsController@store');

    Route::resource('/users','UsersController');
    Route::resource('/users/{user}/edit','UsersController@edit');
    Route::post('/users/{id}/update','UsersController@update');
    Route::delete('/users/{id}','UsersController@destroy');


});
