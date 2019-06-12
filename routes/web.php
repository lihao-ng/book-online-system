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

// Admin Routes

Route::prefix('admin')->name('admin.')->group(function(){
  Route::middleware('guest')->group(function(){
    Route::get('login','Admin\AuthController@viewLogin')->name('login.show');
    Route::post('login','Admin\AuthController@login')->name('login');

    Route::middleware('admin.count')->group(function(){
      Route::get('register','Admin\AuthController@viewRegister')->name('register.show');
      Route::post('register','Admin\AuthController@register')->name('register');
    });
  });

  Route::middleware(['auth', 'admin.auth'])->group(function(){
    Route::get('dashboard','Admin\DashboardController@dashboard')->name('dashboard');

    Route::get('logout','Admin\AuthController@logout')->name('logout');

    Route::get('settings','Admin\DashboardController@viewProfile')->name('profile.show');
    Route::post('settings','Admin\DashboardController@updateProfile')->name('profile.update');
    Route::put('settings/password', "Admin\DashboardController@updatePassword")->name("password.change");

    Route::post('admins/search','Admin\AdminsController@search')->name('admins.search');
    Route::resource('admins', 'Admin\AdminsController')->except(['show']);

    Route::resource('customers', 'Admin\CustomersController');

    Route::post('books/search','Admin\BooksController@search')->name('books.search');
    Route::post('books/{book}','Admin\BooksController@update')->name('books.post.update'); // bug with form data - unable to use PUT or PATCH
    Route::resource('books', 'Admin\BooksController')->except(['show']);

    Route::post('authors/search','Admin\AuthorsController@search')->name('authors.search');
    Route::post('authors/{author}','Admin\AuthorsController@update')->name('authors.post.update'); // bug with form data - unable to use PUT or PATCH
    Route::resource('authors', 'Admin\AuthorsController')->except(['show']);

    Route::post('categories/search','Admin\CategoriesController@search')->name('categories.search');
    Route::resource('categories', 'Admin\CategoriesController')->except(['show']);
  });  
});

// Client Routes

// Route::middleware(['auth', 'client.auth'])->group(function(){
  // Put in authenticated client routes here
// });

Route::get('/','Client\PagesController@home')->name('home');
Route::get('/cartPage','Client\PagesController@cartPage')->name('cartPage');
Route::get('/contactUs','Client\PagesController@contactUs')->name('contactUs');
Route::get('/customerLogin','Client\PagesController@customerLogin')->name('customerLogin');

Route::post('books/search','Client\BooksController@search')->name('books.search');
Route::resource('books','Client\BooksController')->only(['index', 'show']);

Route::post('authors/search','Client\AuthorsController@search')->name('authors.search');

Route::post('categories/search','Client\CategoriesController@search')->name('categories.search');
