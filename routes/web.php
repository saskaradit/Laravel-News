<?php

use Illuminate\Support\Facades\Route;

//contextPath, nama file controlnya@functionnya, nama saja
Route::get('/', 'HomeController@index')->name('home');

Auth::routes();
Route::get('/temp-reg', 'HomeController@tempReg');
Route::post('/user-additional-data', 'HomeController@insertAdditionalInformation');

// Users
Route::get('/users', 'UserController@index')->name('user');
Route::get('/users/{userID}', 'UserController@show');

// News
Route::get('/news/show/{newsID}', 'NewsController@show');
Route::post('/news/show/{newsID}', 'CommentController@store');

Route::get('/news/{newsID}/edit', 'NewsController@edit');
Route::post('/news/{newsID}/edit', 'NewsController@update');

Route::get('/news/new', 'NewsController@create')->name('createpost');
Route::post('/news/new', 'NewsController@store');

Route::delete('/news/{newsID}','NewsController@destroy');

// Categories and Headlines
Route::get('/news/headline', 'NewsController@headline');
Route::post('/news/headline', 'NewsController@createHeadline');
Route::get('/news/category/{category}','NewsController@categories');
Route::delete('/news/comments/{commentId}','CommentController@destroy');


