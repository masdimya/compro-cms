<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function(){
  return view('admin.pages.home');
});


Route::get('/page', 'PageSettingController@index')->name('page_setting');

Route::post('/page/create', 'PageSettingController@create');
Route::get('/page/edit', 'PageSettingController@edit');
Route::get('/page/delete', 'PageSettingController@delete');


