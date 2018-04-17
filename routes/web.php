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

Route::group(['middleware' => 'auth'], function (){
    Route::get('/books', 'BooksController@index');
    Route::get('/category/{section_id}', 'SectionBooksController@index');
    Route::get('/news', 'NewsController@index');
    Route::get('/about', 'AboutController@index');
    Route::get('/books/logout', 'BooksController@logout');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
