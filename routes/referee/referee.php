<?php
Route::get('/','HomeController@index');

Route::get('/refereeing','RefereeingController@index');
Route::post('/refereeing','RefereeingController@store');


Route::get('/judged','RefereeingController@judged');
Route::get('/competiton/{competiton}/complaint','RefereeingController@complaint_create');
Route::post('/competiton/{competiton}/complaint','RefereeingController@complaint_store');
