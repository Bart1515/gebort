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
    return view('home');
});

Route::get('/ads', function () {
    $ads = \App\Advert::all();
    // return $ads;
    return view('ads', ['ads' => $ads]);
});
Route::get('/terms', function () {
    return view('terms');
});
Route::get('/about', function () {
    return view('about');
});
Route::get('/contact', function () {
    return view('contact');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('adverts', 'AdvertsController');
Route::resource('images', 'ImagesController');

Route::get('/admin', 'AdminController@index');

