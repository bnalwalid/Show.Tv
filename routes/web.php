<?php

Route::get('/about', 'showController@about');
Route::get('/tvshows', 'showController@tvshows');
Route::get('/', 'showController@index');
Route::get('/episodes/{id}', 'showController@episodes');
Route::get('/view/{id}', 'showController@viewepisode');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/getsearch','showController@getsearch');

Route::get('/reg_user','showController@reg_user');
Route::get('/login_user','showController@login_user');

////Follow Router Ajax/////////////////
Route::get('/followupdate','showController@followupdate');

Route::get('/logout','showController@logout');

Route::get('/admin','showController@admin');
