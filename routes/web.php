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

Route::get('/', 'ProductController@index')->name('product');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/create/product', function(){
    return view('add-product');
})->name('create-product');

Route::post('/add','ProductController@store')->name('add');
Route::get('/delete/{id}','ProductController@delete')->name('delete');
Route::get('/edit/{id}','ProductController@edit')->name('edit');
Route::post('/update/{id}','ProductController@update')->name('update');

Route::get('/home', 'HomeController@index')->name('home');
