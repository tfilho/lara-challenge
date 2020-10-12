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

//Route::get('/reports', 'ReportsController@index')->name('reports');

Route::middleware(['auth:web'])->group(function () {

    Route::resource('/reports', 'ReportsController');
    Route::resource('/profiles', 'ProfilesController');
});
