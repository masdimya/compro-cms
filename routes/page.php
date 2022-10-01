<?php

use Illuminate\Support\Facades\Route;


Route::group(['prefix'=>'berita'], function(){
  Route::get('/'       , 'PageBlogController@index');
  Route::get('/{id}'       , 'PageBlogController@get');
  Route::post('/create' , 'PageBlogController@store');
  Route::put('/{id}/edit'   , 'PageBlogController@update');
  Route::delete('/{id}/delete' , 'PageBlogController@delete');
});

Route::group(['prefix'=>'visi_misi'], function(){
  Route::get('/'       , 'PageContentController@index');
  Route::get('/{id}'       , 'PageContentController@get');
  Route::post('/create' , 'PageContentController@store');
  Route::put('/{id}/edit'   , 'PageContentController@update');
  Route::delete('/{id}/delete' , 'PageContentController@delete');
});

Route::group(['prefix'=>'gallery'], function(){
  Route::get('/'       , 'PageContentController@index');
  Route::get('/{id}'       , 'PageContentController@get');
  Route::post('/create' , 'PageContentController@store');
  Route::put('/{id}/edit'   , 'PageContentController@update');
  Route::delete('/{id}/delete' , 'PageContentController@delete');
});
