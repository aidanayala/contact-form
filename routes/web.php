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

Route::get('/', 'ViewsController@index');

Route::post('/contact', 'ContactController@submit')->middleware(['honey']);

Route::get('/enquiries', 'ViewsController@enquires');