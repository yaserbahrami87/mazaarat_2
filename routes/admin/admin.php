<?php


//festivals
Route::resource('festival','FestivalController');

//Pillars
Route::resource('pillar','PillarController');

//News
Route::resource('news','NewsController');

//Users
Route::post('/user/{user}/login','UserController@loginWithUser');
Route::get('/user/{user}/accessLevel','UserController@accessLevel');
Route::post('/user/{user}/accessLevel','UserController@accessLevel_store');
Route::post('/user/{user}/changePassword','UserController@changePassword');
Route::resource('user','UserController');

//Comments
Route::resource('comment','CommentController');

//Gallery
Route::resource('gallery','GalleryController');

//Category Gallery
Route::resource('gallery_category','GalleryCategoryController');

//Contact Us
Route::resource('ContactUs','ContactUsController');

//RequestLink
Route::resource('RequestLink','RequestLinkController');

Route::get('/file-manager/ckeditor');

//competiton
Route::get('/competiton/{festival}/{competiton_category}','CompetitonController@category');
Route::get('/competiton/{festival}/{competiton_category}/download','CompetitonController@download');
Route::get('/competiton/{festival}/{competiton}/scores','CompetitonController@showScores')->name('competition.scores');

//Refereeing
Route::get('/{festival}/topRefereeings','RefereeingController@showRankedCompetitions')->name('competition.ranked');

Route::resource('competiton','CompetitonController');

//Settings
//Material
Route::resource('material','MaterialController');

//Settings
Route::prefix('setting')->group(function () {
    Route::get('/basic','SettingController@basic_create');
    Route::post('/basic','SettingController@basic');
    Route::prefix('sliders_home')->group(function () {
        Route::get('/', 'SettingController@sliders_home');
        Route::post('/', 'SettingController@sliders_home_store');
        Route::get('/{setting}/edit', 'SettingController@sliders_home_edit');
        Route::patch('/{setting}', 'SettingController@sliders_home_update');
        Route::delete('/{setting}', 'SettingController@sliders_home_destory');
    });

    Route::prefix('colleagues')->group(function () {
        Route::get('/', 'SettingController@colleagues');
        Route::post('/', 'SettingController@colleagues_store');
        Route::get('/{setting}/edit', 'SettingController@colleagues_edit');
        Route::patch('/{setting}', 'SettingController@colleagues_update');
        Route::delete('/{setting}', 'SettingController@colleagues_destory');
    });

});


//Reports
Route::prefix('report')->group(function()
{
    Route::get('/report','ReportController@index');
    Route::get('/refereeing','ReportController@refereeing');
    Route::get('/refereeing/{user}','ReportController@refereeing_user');
});



Route::get('/panel','AdminController@index');




