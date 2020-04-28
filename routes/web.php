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

Route::get('/admin', 'DashboardController@index')->name('dashboard.index');
Route::get('/states', 'GetStatesController');

// resource routes
Route::resource('events', 'EventsController');
Route::resource('bands', 'BandsController');
Route::resource('venues', 'VenuesController');
Route::resource('publications', 'PublicationsController');
Route::resource('clippings', 'ClippingsController');

Auth::routes(['register' => false]);
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::get('/', 'HomeController@index')->name('home');
Route::get('/shows', 'HomeController@shows')->name('live');
Route::get('/show/{id}', 'HomeController@showShows')->name('live');
