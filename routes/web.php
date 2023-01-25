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

Route::group(['middleware' => 'check'], function () {
    Route::get('/drills/new', 'drillsController@new')->name('drills.new');
    Route::post('/drills', 'drillsController@create')->name('drills.create');
    Route::get('/drills', 'drillsController@index')->name('drills');
    Route::get('/drills/{id}/edit', 'DrillsController@edit')->name('drills.edit');
    Route::post('/drills/{id}', 'DrillsController@update')->name('drills.update');
    Route::post('/drills/{id}/delete', 'DrillsController@destroy')->name('drills.delete');
    Route::get('/drills/{id}', 'DrillsController@show')->name('drills.show');
    Route::get('/mypage', 'DrillsController@mypage')->name('drills.mypage');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
