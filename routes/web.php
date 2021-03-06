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

  Route::middleware(['ifAuth:admins', 'admin.auth'])->group(function(){
    Route::get('dashboard','Admin\DashboardController@dashboard')->name('dashboard');

    Route::get('logout','Admin\AuthController@logout')->name('logout');

    Route::get('settings','Admin\DashboardController@viewProfile')->name('profile.show');
    Route::post('settings','Admin\DashboardController@updateProfile')->name('profile.update');
    Route::put('settings/password', "Admin\DashboardController@updatePassword")->name("password.change");

    Route::post('admins/search','Admin\AdminsController@search')->name('admins.search');
    Route::resource('admins', 'Admin\AdminsController')->except(['show', 'edit', 'update']);

    Route::resource('customers', 'Admin\CustomersController')->except(['show', 'edit', 'update', 'delete']);

    Route::resource('sales', 'Admin\SalesController')->except(['show', 'edit', 'update']);

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

Route::middleware(['ifAuth:customers', 'client.auth'])->group(function(){
  Route::get('books/{book}/add-to-cart','Client\BooksController@addCart')->name('books.add.cart');
  
  Route::post('cart-update','Client\CartsController@update')->name('cart.update');
  Route::post('cart-delete','Client\CartsController@delete')->name('cart.delete');
  Route::post('checkout','Client\CartsController@checkout')->name('checkout');

  Route::get('cart','Client\CustomersController@showCart')->name('show.cart');
  Route::get('edit-profile','Client\CustomersController@editProfile')->name('customer.edit.profile');
  Route::post('update-profile','Client\CustomersController@updateProfile')->name('customer.update.profile');
  Route::post('customer/address','Client\CustomersController@addAddress')->name('customer.address');
  Route::post('customer/mobile','Client\CustomersController@updateMobile')->name('customer.mobile');
  Route::post('customer/email','Client\CustomersController@updateEmail')->name('customer.email');

  Route::get('customer-logout','Client\AuthController@logout')->name('customer.logout');
});

Route::middleware('guest')->group(function(){
  Route::get('login','Client\AuthController@showLogin')->name('customer.login.show');
  Route::post('login','Client\AuthController@login')->name('customer.login');

  Route::get('register','Client\AuthController@showRegister')->name('customer.register.show');
  Route::post('register','Client\AuthController@register')->name('customer.register');

  Route::get('request-email','Client\AuthController@showRequestEmail')->name('request.email.show');
  Route::post('request-email','Client\AuthController@requestEmail')->name('request.email');

  Route::get('request-password/{Code}','Client\AuthController@showRequestPassword')->name('request.password.show');
  Route::post('request-password/{Code}','Client\AuthController@requestPassword')->name('request.password');
});

Route::get('/','Client\PagesController@home')->name('home');

Route::get('contact-us','Client\PagesController@contactUs')->name('contact');
Route::post('contact-us','Client\PagesController@sendContactUs')->name('contact.send');

Route::post('books/search','Client\BooksController@search')->name('books.search');
Route::resource('books','Client\BooksController')->only(['index', 'show']);

Route::post('authors/search','Client\AuthorsController@search')->name('authors.search');

Route::post('categories/search','Client\CategoriesController@search')->name('categories.search');