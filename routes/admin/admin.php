<?php


//festivals
Route::resource('festival','FestivalController');

//Pillars
Route::resource('pillar','PillarController');

//News
Route::resource('news','NewsController');

//Users
Route::post('/user/{user}/login','UserController@loginWithUser');
Route::resource('user','UserController');

//Comments
Route::resource('comment','CommentController');

//Gallery
Route::resource('gallery','GalleryController');

//Category Gallery
Route::resource('gallery_category','GalleryCategoryController');

//Contact Us
Route::resource('ContactUs','ContactUsController');

//
Route::resource('RequestLink','RequestLinkController');

Route::get('/panel','AdminController@index');

