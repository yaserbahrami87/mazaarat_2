<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/farsi/home',function()
{
    return view('farsi.home');
});

Route::get('/farsi/gallery',function()
{
    return view('farsi.gallery');
});

Route::get('/farsi/news',function()
{
    return view('farsi.news');
});

Route::get('/farsi/pillars_category',function()
{
    return view('farsi.pillars_category');
});


Route::get('/farsi/pillars',function()
{
    return view('farsi.pillars_single');
});

Route::get('/', function () {
    return view('index');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
