<?php

Route::get('/','HomeController@index');

//competition

Route::resource('competition','CompetitonController');
