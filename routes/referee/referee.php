<?php
Route::get('/','HomeController@index');

Route::get('/refereeing','RefereeingController@index');
Route::post('/refereeing','RefereeingController@store');


