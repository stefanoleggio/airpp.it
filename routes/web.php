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

/*
    PageController
*/

Route::get('/', 'PageController@home');

Route::get('/donazioni', 'PageController@donazioni');

Route::get('/associarsi', 'PageController@associarsi');

Route::get('/contatti', 'PageController@contatti');

Route::get('/statuto', 'PageController@statuto');

Route::get('/cookies', 'PageController@cookies');

Route::get('/segnalazioni', 'PageController@segnalazioni');

/*
    NewsController
*/

Route::get('/convegni', 'NewsController@convegni');

Route::get('/premi', 'NewsController@premi');

Route::get('/iniziative', 'NewsController@iniziative');

/*
    GalleryController
*/

Route::get('/galleria', 'GalleryController@index');

/*
    DonationsController
*/

Route::post('paypal', 'DonationsController@payWithpaypal');

Route::get('status', 'DonationsController@getPaymentStatus');

/*
    JoinusController
*/


/* 
    AdminController
*/

Auth::routes();

Route::get('/admin', 'AdminController@index');

Route::get('/admin/donazioni', 'AdminController@donazioni');

Route::get('/admin/iscrizioni', 'AdminController@iscrizioni');

Route::get('/admin/premi', 'AdminController@premi');

Route::get('/admin/iniziative', 'AdminController@iniziative');

Route::get('/admin/convegni', 'AdminController@convegni');

Route::get('/admin/pagine', 'AdminController@pagine');

Route::get('/admin/componenti', 'AdminController@componenti');

Route::post('/admin/edit_news', 'AdminController@edit_news');

Route::post('/admin/add_news', 'AdminController@add_news');

Route::post('/admin/delete_news', 'AdminController@delete_news');