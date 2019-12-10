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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('reservation','ReservationController');

Route::get('api/v1/reservations','ReservationController@getReservations');

Route::get('api/v1/documento/{num_documento}','ReservationController@getDocumento');

Route::get('trash','ReservationController@trash')->name('reservation.trash');
