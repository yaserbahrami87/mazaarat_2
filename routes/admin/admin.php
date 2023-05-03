<?php


//festivals
Route::resource('festival','FestivalController');

//Pillars
Route::resource('pillar','PillarController');

//News
Route::resource('news','NewsController');

//Users
Route::resource('user','UserController');

Route::get('/panel',function()
{
    return view('admin.index');
});

