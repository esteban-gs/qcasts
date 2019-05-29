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

Route::view('/', 'welcome');
Route::view('contact', 'contact');
Route::view('/', 'home');
Route::view('about', 'about');

//Standard for resource controller
Route::resource('customers', 'CustomersController');
