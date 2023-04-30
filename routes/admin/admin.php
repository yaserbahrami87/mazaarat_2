<?php

Route::resource('festival','FestivalController');

Route::get('/panel',function()
{
    return view('admin.index');
});
