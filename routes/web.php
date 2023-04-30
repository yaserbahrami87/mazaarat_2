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

Route::get('/farsi/call',function()
{
    return view('farsi.call');
});

Route::get('/farsi/upload',function()
{
    if(Auth::check())
    {
        return redirect('/');
    }
    else
    {
        return redirect('/farsi/login');
    }

});

Route::get('/farsi/login',function()
{
    return view('farsi.auth.login');
});

Route::get('/farsi/register',function()
{
    return view('farsi.auth.register');
});

Route::get('/farsi/password/reset',function()
{
    return view('farsi.auth.passwords.reset');
});





Route::get('/', function () {
    return view('index');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/english/home',function()
{
    return view('english.home');
});

Route::get('/english/gallery',function()
{
    return view('english.gallery');
});

Route::get('/english/news',function()
{
    return view('english.news');
});


Route::get('/english/pillars_category',function()
{
    return view('english.pillars_category');
});


Route::get('/english/pillars',function()
{
    return view('english.pillars_single');
});

Route::get('/english/upload',function()
{
    if(Auth::check())
    {
        return redirect('/');
    }
    else
    {
        return redirect('/english/login');
    }

});

Route::get('/english/call',function()
{
    return view('english.call');
});


Route::get('/english/login',function()
{
    return view('english.auth.login');
});

Route::get('/english/register',function()
{
    return view('english.auth.register');
});

Route::get('/english/password/reset',function()
{
    return view('english.auth.passwords.reset');
});



Route::get('/test',function(){
    return view('test');
});

Route::post('/test','HomeController@test');
