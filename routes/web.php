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

Route::get('galleria/{id}', 'GalleryController@getPhotos');

/*
    DonationsController
*/

Route::post('donationspaypal', 'DonationsController@payWithpaypal');

Route::get('donationsstatus', 'DonationsController@getPaymentStatus');

/*
    JoinUsController
*/

Route::post('joinuspaypal', 'JoinUsController@payWithpaypal');

Route::get('joinusstatus', 'JoinUsController@getPaymentStatus');

/*
    TextUsController
*/

Route::post('textus', 'TextUsController@send');


/* 
    AdminController general
*/

Auth::routes([
    'register' => false,
    'reset' => false,
    'verify' => false
]);

Route::get('/admin', 'AdminController@index');

Route::get('/admin/profilo', 'AdminController@profilo');

Route::get('/admin/donazioni', 'AdminController@donazioni');

Route::get('/admin/iscrizioni', 'AdminController@iscrizioni');

Route::get('/admin/team', 'AdminController@team');

Route::get('/admin/email', 'AdminController@email');

Route::get('/admin/messaggi', 'AdminController@messaggi');

Route::post('/admin/edit_team', 'AdminController@edit_team');

Route::post('/admin/edit_profilo', 'AdminController@edit_profilo');

Route::post('/admin/edit_pssw', 'AdminController@edit_pssw');

/*
    MasterController
*/

Route::get('/admin/users', 'MasterController@users');

Route::post('/admin/edit_users', 'MasterController@edit_users');

Route::post('/admin/add_users', 'MasterController@add_users');

Route::post('/admin/delete_users', 'MasterController@delete_users');


/* 
    AdminPagesController
*/

Route::get('/admin/pg_home', 'AdminPageController@pg_home');

Route::get('/admin/pg_donazioni', 'AdminPageController@pg_donazioni');

Route::get('/admin/pg_associarsi', 'AdminPageController@pg_associarsi');

Route::get('/admin/pg_contatti', 'AdminPageController@pg_contatti');

Route::get('/admin/pg_statuto', 'AdminPageController@pg_statuto');

Route::get('/admin/pg_cookies', 'AdminPageController@pg_cookies');

Route::get('/admin/pg_segnalazioni', 'AdminPageController@pg_segnalazioni');

Route::get('/admin/pg_galleria', 'AdminPageController@pg_galleria');

Route::post('/admin/edit_pages', 'AdminPageController@edit_pages');

/* 
    AdminNewsController
*/

Route::get('/admin/premi', 'AdminNewsController@premi');

Route::get('/admin/iniziative', 'AdminNewsController@iniziative');

Route::get('/admin/convegni', 'AdminNewsController@convegni');

Route::get('/admin/pg_notizie', 'AdminNewsController@pg_notizie');

Route::post('/admin/edit_news', 'AdminNewsController@edit_news');

Route::post('/admin/add_news', 'AdminNewsController@add_news');

Route::post('/admin/delete_news', 'AdminNewsController@delete_news');

/*
    AdminGalleryController
*/

Route::get('/admin/galleria', 'AdminGalleryController@galleria');

Route::get('/admin/galleria/{id}', 'AdminGalleryController@foto');

Route::post('/admin/edit_album', 'AdminGalleryController@edit_album');

Route::post('/admin/add_album', 'AdminGalleryController@add_album');

Route::post('/admin/delete_album', 'AdminGalleryController@delete_album');

Route::post('/admin/delete_photo', 'AdminGalleryController@delete_photo');

Route::post('/admin/add_photo', 'AdminGalleryController@add_photo');

Route::view('/email', 'mails.textus_sec');