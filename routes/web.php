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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/logout','\App\Http\Controllers\Auth\LoginController@logout');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::put('/home/{id}/update', 'HomeController@update')->name('home.update');
Route::delete('/home/{id}', 'HomeController@destroy')->name('home.destroy');

Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware('can:admin-user')->group(function(){
    Route::resource('/users','UsersController');
    Route::resource('/users/{id}/edit','UsersController@edit');
    Route::post('/users/{id}/update','UsersController@update');
});

Route::namespace('Moderate')->prefix('moderate')->name('moderate.')->middleware('can:mod-user')->group(function(){

    Route::resource('/home','HomeController');
    Route::resource('/users','UsersController');
    Route::resource('/users/{id}/edit','UsersController@edit');
    Route::post('/users/{id}/update','UsersController@update');


});
