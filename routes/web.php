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
Route::group(['middleware'=>'auth'],function(){
    /**
     * Event related routes
     */
    Route::get('events','EbentController@index')->name('events');
    Route::get('events/add','EbentController@add')->name('event-add');
    Route::post('events/save','EbentController@store')->name('event-save');
    Route::get('events/view/{event}','EbentController@view')->name('event-view');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
