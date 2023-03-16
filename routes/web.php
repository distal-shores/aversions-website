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

// Route::get('/', 'HomeController@index')->name('home');
Route::get('/admin', 'DashboardController@index')->name('dashboard.index');

// Admin routes
Route::prefix('admin')->group(function () {
	Route::resource('events', 'EventsController');
	Route::resource('bands', 'BandsController');
	Route::resource('venues', 'VenuesController');
	Route::resource('publications', 'PublicationsController');
	Route::resource('clippings', 'ClippingsController');
	Route::resource('posts', 'PostsController');
	Route::resource('songs', 'SongsController');
	Route::get('/profile/edit', 'UsersController@edit');
	Route::get('/site-settings', 'SettingsController@edit')->name('settings.edit');
	Route::post('/site-settings', 'SettingsController@update')->name('settings.update');
	Route::patch('/profile/update', 'UsersController@update');
	Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');
});

// Auth::routes(['register' => false]);

// // Utility routes
Route::get('/states', 'GetStatesController');
Route::post('/in-carousel', 'ClippingsController@inCarousel');
Route::post('/published', 'PostsController@published');
Route::post('/contact', 'ContactController@receiveEntry');

// // // Blog routes
// // Route::get('/blog/{slug}', 'PostsController@show');
// // Route::get('/blog', 'PostsController@blogIndex');
// // Route::post('/upload', 'UploadController');

// EPK routes
Route::get('/track/{slug}/epk', 'SongsController@showEPK');
Route::view('/album/you-wanted-the-bike/epk', 'home.album');

