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
})->name('admin-home');


Route::get('/page', 'PageSettingController@index')->name('page_setting');
Route::get('/page/create', 'PageSettingController@create')->name('page_create');
Route::post('/page/create', 'PageSettingController@store')->name('page_store');

Route::get('/page/{id}/edit', 'PageSettingController@edit')->name('page_edit');
Route::put('/page/{id}/edit', 'PageSettingController@update')->name('page_update');

Route::delete('/page/{id}/delete', 'PageSettingController@delete')->name('page_delete');


