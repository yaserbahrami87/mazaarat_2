<?php

Route::get('/','HomeController@index')->name('verification.notice');
Route::get('/profile','UserController@create');
Route::patch('/profile','UserController@store');


//competition
Route::get('/competiton/{competition}/qrcode','CompetitonController@generateQrCode');
Route::get('/competiton/{competiton}/complaint','CompetitonController@complaint_create');
Route::post('/competiton/{competiton}/complaint','CompetitonController@complaint_store');
Route::resource('competiton','CompetitonController');


//Referee
Route::get('/competitions/next-vote', 'CompetitonController@showNextCompetitionForVote')->name('competitions.next.vote');
Route::post('/competitions/{competiton}/vote', 'CompetitonController@storeUserVote')->name('competitions.vote.store');

//Request Link
Route::resource('RequestLink','RequestLinkController');


Route::prefix('english')->group(function()
{
    //dashboard
    Route::get('/','HomeController@index_en');

    //competition
    Route::get('/competiton/{competiton}/edit','CompetitonController@edit_en');
    Route::get('/competiton/create','CompetitonController@create_en');
//    Route::resource('competiton','CompetitonController');
});

