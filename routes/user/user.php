<?php

Route::get('/','HomeController@index');

//competition

Route::resource('competiton','CompetitonController');
