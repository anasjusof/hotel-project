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

//Route::group(['middleware' => 'web'], function () {
	Route::auth();

	Route::get('/home', 'HomeController@index');

	Route::group(['middleware'=>'admin'], function(){

		Route::resource('/user', 'UserController');

		Route::get('/viewBookBeforeProcess/{booking_id}', ['uses'=>'RoomController@viewBookBeforeProcess'])->name('room.viewBookBeforeProcess');
		Route::get('/showBookingList', ['uses'=>'RoomController@showBookingList'])->name('room.showBookingList');
		Route::resource('/room', 'RoomController');


	});
//});	
