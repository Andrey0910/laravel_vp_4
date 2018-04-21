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

use Illuminate\Support\Facades\Auth;

if (empty(Auth::id())) {
    Route::get('/', function () {
        return view('auth/login');
    });
}

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', 'BooksController@index');
    Route::get('/books', 'BooksController@index');
    Route::get('/category/{section_id}', 'SectionBooksController@index');
    Route::get('/news', 'NewsController@index');
    Route::get('/about', 'AboutController@index');
    Route::get('/books/logout', 'BooksController@logout');
    Route::get('/product/{book_id}', 'ProductController@index');
    Route::get('/order/store/{book_id}', 'OrderController@store');
//Админка
    //Категории
    Route::get('/admin', ['middleware' => 'admin', 'uses' => 'SectionBooksAdminController@index']);
    Route::get('/admin/category/delete/{category_id}', ['middleware' => 'admin', 'uses' => 'SectionBooksAdminController@delete']);
    Route::get('/admin/category/edit/{category_id}', ['middleware' => 'admin', 'uses' => 'SectionBooksAdminController@edit']);
    Route::post('/admin/category/update/{category_id}', ['middleware' => 'admin', 'uses' => 'SectionBooksAdminController@update']);
    Route::get('/admin/category/create', ['middleware' => 'admin', 'uses' => 'SectionBooksAdminController@create']);
    Route::post('/admin/category/store', ['middleware' => 'admin', 'uses' => 'SectionBooksAdminController@store']);
    //Книги
    Route::get('/admin/books', ['middleware' => 'admin', 'uses' => 'BooksAdminController@index']);
    Route::get('/admin/books/delete/{books_id}', ['middleware' => 'admin', 'uses' => 'BooksAdminController@delete']);
    Route::get('/admin/books/edit/{books_id}', ['middleware' => 'admin', 'uses' => 'BooksAdminController@edit']);
    Route::post('/admin/books/update/{books_id}', ['middleware' => 'admin', 'uses' => 'BooksAdminController@update']);
    Route::get('/admin/books/create', ['middleware' => 'admin', 'uses' => 'BooksAdminController@create']);
    Route::post('/admin/books/store', ['middleware' => 'admin', 'uses' => 'BooksAdminController@store']);
    //Заказы
    Route::get('/admin/orders', ['middleware' => 'admin', 'uses' => 'OrdersAdminController@index']);
    Route::get('/admin/orders/edit/{orders_id}', ['middleware' => 'admin', 'uses' => 'OrdersAdminController@edit']);
    Route::post('/admin/orders/update/{orders_id}', ['middleware' => 'admin', 'uses' => 'OrdersAdminController@update']);
});
//Route::middleware('auth:api', 'throttle:rate_limit,1')->group(function () {

Auth::routes();
