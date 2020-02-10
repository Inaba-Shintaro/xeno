<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



////////////////////////////////////////
//group/////////////////////////////
Route::get('/groups/search', 'GroupController@search')->name('groups.search');
Route::resource('groups', 'GroupController');
////////////////////////////////////////

////////////////////////////////////////
//xeno/////////////////////////////
Route::post('/xenos/chat', 'XenoController@chat')->name('xenos.chat'); // この行を追加します。
Route::get('/xenos/ready/{group_id}', 'XenoController@ready')->name('xenos.ready'); // この行を追加します。
Route::get('/xenos/roomEnter/{group_id}', 'XenoController@roomEnter')->name('xenos.roomEnter');
Route::resource('xenos', 'XenoController');
////////////////////////////////////////
