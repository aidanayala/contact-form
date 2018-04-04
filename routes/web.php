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

// throttle the contact post route to 10 requests per minute
Route::post('/contact', 'ContactController@submit')->middleware(['honey', 'throttle:10,1']);

Route::get('/enquiries', 'ViewsController@enquires');