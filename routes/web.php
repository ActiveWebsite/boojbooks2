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

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('authors', 'AuthorController');
Route::resource('books', 'BookController');

//Route::get('/authors', 'HomeController@authors')->name('authors.index');
//Route::post('/authors', 'HomeController@addAuthor')->name('authors.post');
//Route::get('/authors/delete/{id}', 'HomeController@deleteAuthor')->name('authors.delete');

//Route::get('/books', 'HomeController@books')->name('books');
//Route::post('/books', 'HomeController@addBook');
//Route::get('/books/delete/{id}', 'HomeController@deleteBook');
