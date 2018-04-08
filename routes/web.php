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
	return view('index');
});
Route::get('/help', function () {
	return view('help');
});
Route::get('/about', function () {
	return view('about');
});

Route::get('/statistik', 'PencarianHaditsController@statistik');
Route::get('/pencarian-hadits', 'PencarianHaditsController@pencarianHadits');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
