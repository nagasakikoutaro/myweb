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

Route::get('/', function () {
    return view('welcome');
});
Route::group(['prefix' => 'content'], function() {
    Route::get('profile/create', 'Content\ProfileController@add')->middleware('auth');
    Route::post('profile/create', 'Content\ProfileController@create')->middleware('auth');
    Route::get('profile', 'Content\ProfileController@index')->middleware('auth');
    Route::get('profile/edit', 'Content\ProfileController@edit')->middleware('auth'); 
    Route::post('profile/edit', 'Content\ProfileController@update')->middleware('auth');
    Route::get('profile/delete', 'Content\ProfileController@delete')->middleware('auth');
});
Route::group(['prefix' => 'content'], function() {
    Route::get('coment/create', 'Content\ComentController@add')->middleware('auth');
    Route::post('coment/create', 'Content\ComentController@create')->middleware('auth');
    Route::get('coment', 'Content\ComentController@index')->middleware('auth');
    Route::get('coment/edit', 'Content\ComentController@edit')->middleware('auth'); 
    Route::post('coment/edit', 'Content\ComentController@update')->middleware('auth');
    Route::get('coment/delete', 'Content\ComentController@delete')->middleware('auth');
});
Auth::routes();
Route::get('/', 'ProfileController@index')->middleware('auth');
Route::get('profile/show', 'ProfileController@show')->middleware('auth');
Route::get('coment', 'ComentController@index')->middleware('auth');
Route::get('/home', 'HomeController@index')->name('home');