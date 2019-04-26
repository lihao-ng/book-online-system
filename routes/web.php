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
    // Route::get('login','Admin\AuthController@viewLogin')->name('login.show');
    // Route::post('login','Admin\AuthController@login')->name('login');
  });

  // Route::middleware(['auth', 'admin.auth'])->group(function(){
    // Put in authenticated admin routes here
  // });  
});

// Client Routes

// Route::middleware(['auth', 'client.auth'])->group(function(){
  // Put in authenticated client routes here
// });

Route::get('/','Client\PagesController@home')->name('home');