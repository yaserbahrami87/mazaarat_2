<?php


//festivals
Route::resource('festival','FestivalController');

//Pillars
Route::resource('pillar','PillarController');

//News
Route::resource('news','NewsController');

Route::get('/panel',function()
{
    return view('admin.index');
});

