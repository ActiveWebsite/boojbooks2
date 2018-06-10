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

/* updated the routes to go to specific page controllers */

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/authors', 'AuthorController@authors')->name('authors');
Route::post('/authors', 'AuthorController@addAuthor');
Route::get('/authors/delete/{id}', 'AuthorController@deleteAuthor');

Route::get('/books', 'BookController@books')->name('books');
Route::post('/books', 'BookController@addBook');
Route::get('/books/delete/{id}', 'BookController@deleteBook');

