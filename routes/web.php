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
})->name('welcome');

Auth::routes();


// Book Routes
Route::get('/home', 'BookController@index')->name('home');

// Create/Edit Book
Route::get('/book/add', 'BookController@add')->name('book.add');
Route::get('/book/update/{book}', 'BookController@update')->name('book.update');
Route::post('/book/store/{book?}', 'BookController@store')->name('book.store');

// Delete Book
Route::delete('/book/delete/{book}', 'BookController@delete')->name('book.delete');

// Update Book Position
Route::put('/book/move/{book}', 'BookController@move')->name('book.move');