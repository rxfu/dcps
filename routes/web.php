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
	return redirect()->route('home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/{id}/review', 'HomeController@review')->name('project.review');
Route::post('/{id}/review', 'HomeController@postReview');
Route::get('/{id}/pdf', 'HomeController@getPdf')->name('project.pdf');
