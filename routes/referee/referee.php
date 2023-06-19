<?php
Route::get('/','HomeController@index');

Route::resource('refereeing','RefereeingController');


