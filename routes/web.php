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
    return view('admin');
})->name('admin');

Route::get('/admin/register', function () {
    return view('admin');
})->name('/admin/register');

Route::post('/admin/login', 'AdminController@login');
// Route::get('/admin/logout', 'AdminController@logout');
Route::get('/logout', 'AdminController@logout')->name('logout');

Route::post('/admin/register', 'AdminController@register');
Route::get('/admin/dashboard', 'AdminController@get_data')->name('dashboard')->middleware('auth');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');

Route::group(['middleware' => 'auth'], function () {
	Route::get('table-list', function () {
		return view('pages.table_list');
	})->name('table');

	Route::get('typography', function () {
		return view('pages.typography');
	})->name('typography');

	Route::get('icons', function () {
		return view('pages.icons');
	})->name('icons');

	Route::get('map', function () {
		return view('pages.map');
	})->name('map');

	Route::get('notifications', function () {
		return view('pages.notifications');
	})->name('notifications');

	Route::get('rtl-support', function () {
		return view('pages.language');
	})->name('language');

	Route::get('upgrade', function () {
		return view('pages.upgrade');
	})->name('upgrade');

	//add

	Route::get('recipes', "RouteController@recipes")->name('recipes');

	Route::get('playlists', "RouteController@playlists")->name('playlists');

	Route::get('locations', "RouteController@locations")->name('locations');

	Route::get('teams', "RouteController@teams")->name('teams');

	Route::get('/links/{id}', "RouteController@links")->name('links');

	Route::get('/personel/{id}', "RouteController@personel")->name('personel');

	Route::get('addRecipe', function () {
		return view('pages.addRecipe');
	})->name('addRecipe');

	Route::get('addPlaylist', function () {
		return view('pages.addPlaylist');
	})->name('addPlaylist');

	Route::post('/submit_recipe', "DataController@submit_recipe")->name('submit_recipe');

	Route::post('/submit_playlist', "DataController@submit_playlist")->name('submit_playlist');

	Route::post('/edit_recipe', "DataController@edit_recipe")->name('edit_recipe');

	Route::post('/edit_playlist', "DataController@edit_playlist")->name('edit_playlist');

	Route::get('/delete_recipe/{id}', "DataController@delete_recipe")->name('delete_recipe');

	Route::get('/delete_playlist/{id}', "DataController@delete_playlist")->name('delete_playlist');

	Route::post('/add_country', "DataController@add_country")->name('add_country');

	Route::post('/add_link', "DataController@add_link")->name('add_link');

	Route::post('/edit_link', "DataController@edit_link")->name('edit_link');

	Route::get('/delete_link/{id}', "DataController@delete_link")->name('delete_link');

	Route::post('/add_dept', "DataController@add_dept")->name('add_dept');
	
	Route::post('/add_personel', "DataController@add_personel")->name('add_personel');

	Route::post('/edit_personel', "DataController@edit_personel")->name('edit_personel');

	Route::get('/delete_personel/{id}', "DataController@delete_personel")->name('delete_personel');

});

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
});

