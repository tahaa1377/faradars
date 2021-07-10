<?php
Route::get('/taha','ProductController@taha');


Route::get('/','ProductController@loadData');
//Route::get('/','UserController@t');
Route::get('/courses/{href}','ProductController@course');
Route::get('/how-to-learn/{href}','ProductController@how_to_learn');
Route::get('/my-account','UserController@account');
Route::post('/my-account','UserController@a');
Route::get('/logout','UserController@logout');
Route::get('/explore-topics','ProductController@explore_topics');
Route::get('/search_gcse','ProductController@search_gcse');
Route::get('/add_product','ProductController@add_product');
Route::post('/add_product','ProductController@add_product_db');
Route::post('/pagination_search','ProductController@pagination_search');
Route::post('/add_to_cart','ProductController@add_to_cart');
Route::post('/show_cart','ProductController@show_cart');
