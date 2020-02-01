<?php

use Illuminate\Http\Request;


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
/*
API For Episode
*////////////////////////////////////////////////////
Route::get('episodeapi', 'episodeController@index');
Route::get('episodeapi/{id}', 'episodeController@show');
Route::post('episodeapi', 'episodeController@store');
Route::put('episodeapi/{id}', 'episodeController@update');
Route::delete('episodeapi/{id}', 'episodeController@delete');
/////////////////////////////////////////////////////
/*
API For SeriesTV
*////////////////////////////////////////////////////
Route::get('seriestvsapi', 'seriestvsController@index');
Route::get('seriestvsapi/{id}', 'seriestvsController@show');
Route::post('seriestvsapi', 'seriestvsController@store');
Route::put('seriestvsapi/{id}', 'seriestvsController@update');
Route::delete('seriestvsapi/{id}', 'seriestvsController@delete');
/////////////////////////////////////////////////////
 /*
API For Users
*////////////////////////////////////////////////////
Route::get('usersapi', 'usersController@index');
Route::get('usersapi/{id}', 'usersController@show');
Route::post('usersapi', 'usersController@store');
Route::put('usersapi/{id}', 'usersController@update');
Route::delete('usersapi/{id}', 'usersController@delete');
/////////////////////////////////////////////////////