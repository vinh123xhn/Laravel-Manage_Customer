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

Route::group(['prefix' => 'cities'], function () {
    Route::get('/','CityController@index')->name('cities.index');

    Route::get('/create','CityController@create')->name('cities.create');

    Route::post('/create','CityController@store')->name('cities.store');

    Route::get('/{id}/edit','CityController@edit')->name('cities.edit');

    Route::post('/{id}/edit','CityController@update')->name('cities.update');

    Route::get('/{id}/delete','CityController@delete')->name('cities.delete');
});

Route::group(['prefix' => 'customer'], function (){
    Route::get('/','CustomerController@index')->name('customers.index');
    Route::get('/create', 'CustomerController@create')->name('customers.create');
    Route::post('/create', 'CustomerController@store')->name('customers.store');
    Route::get('/{id}/edit', 'CustomerController@edit')->name('customers.edit');
    Route::post('/{id}/edit', 'CustomerController@update')->name('customers.update');
    Route::get('/{id}/delete', 'CustomerController@delete')->name('customers.delete');
    Route::get('/filter','CustomerController@filterByCity')->name('customers.filterByCity');
    Route::get('/search','CustomerController@search')->name('customers.search');
});



