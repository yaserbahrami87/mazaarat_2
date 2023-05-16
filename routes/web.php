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

//Route::get('/farsi/home',function()
//{
//    return view('farsi.home');
//});

Route::prefix('farsi')->group(function ()
{
    //Auth
    Route::get('/login',function()
    {
        return view('farsi.auth.login');
    });


    Route::get('/register','SiteController@register');

    Route::get('/password/reset',function()
    {
        return view('farsi.auth.passwords.reset');
    });


    //Gallery
    Route::get('/gallery/{festival}','GalleryController@show');


    //News
    Route::get('/news/{festival}','NewsController@show');
    Route::get('/news/{news}/show','NewsController@news_single');


    //ContactUs
    Route::get('/contactUs/create_fa','ContactUsController@create_fa');
    Route::resource('contactUs','ContactUsController');


    //pillars
    Route::get('/pillars/{festival}','PillarController@show');

    //Call
    Route::get('/call','CallController@show');


    Route::get('/upload',function()
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

});

//Route::get('/farsi/gallery',function()
//{
//    return view('farsi.gallery');
//});

//Route::get('/farsi/pillars_category',function()
//{
//    return view('farsi.pillars_category');
//});









//Route::get('/farsi/register',function()
//{
//    return view('farsi.auth.register');
//});





Route::get('/', function () {
    return view('index');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::prefix('english')->group(function ()
{
    Route::get('/gallery/{festival}','GalleryController@show_en');


    //News
    Route::get('/news/{festival}','NewsController@show');
    Route::get('/news/{news}/show','NewsController@news_single_en');

    //Auth
    Route::post('/register','Auth_en\RegisterEnController@store');
    Route::post('/login','Auth_en\LoginEnController@store');

//    Route::get('/register',function()
//    {
//        return view('english.auth.register');
//    });

    Route::get('/register','SiteController@register');

    //ContactUs
    Route::resource('contactUs','ContactUsController');

    Route::get('/news/{festival}','NewsController@show_en');



    Route::get('/pillars_category',function()
    {
        return view('english.pillars_category');
    });


    Route::get('/pillars/{festival}','PillarController@show_en');

    Route::get('/upload',function()
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

    Route::get('/call','CallController@show_en');


    Route::get('/login',function()
    {
        return view('english.auth.login');
    });


    Route::get('/password/reset',function()
    {
        return view('english.auth.passwords.reset');
    });

});


Route::get('/{language}/home','SiteController@setLanguage');
//{
//    return view('english.home');
//});

//Route::get('/english/gallery',function()
//{
//    return view('english.gallery');
//});








Route::get('/test',function(){
    return view('test');
});

Route::post('/test','HomeController@test');


//ajax State
Route::get('/state/{state}','StateController@show');



Route::get('/migrate',function()
{
   Artisan::call('migrate');
   return "Migration";
});



Route::get('/clear_cache',function()
{
    Artisan::call('cache:clear');
    return "Clear cache";
});

