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
    Sitemap
*/

Route::get('/sitemap', function()
{
    return redirect('sitemap.xml');
});

/*
    PageController
*/

Route::get('/', 'PageController@home');

Route::get('/donazioni', 'PageController@donazioni');

Route::get('/associarsi', 'PageController@associarsi');

Route::get('/contatti', 'PageController@contatti');

Route::get('/statuto', 'PageController@statuto');

Route::get('/bilanci', 'PageController@bilanci');

Route::get('/progetti-di-ricerca', 'PageController@progetti');

Route::get('/parlanodinoi', 'PageController@parlanodinoi');

Route::get('/organisociali', 'PageController@organisociali');

Route::get('/articoli', 'PageController@articoli');

Route::get('/cookie', 'PageController@cookie');

/*
    Temporanee
*/

/*COVID*/
Route::get('/covid', 'PageController@covid');
/**/

/*
    NewsController
*/

Route::get('/premi/fetch_data', 'NewsController@fetch_data')->name('premi');

Route::get('/premi', 'NewsController@index')->name('premi');

Route::get('/convegni/fetch_data', 'NewsController@fetch_data')->name('convegni');

Route::get('/convegni', 'NewsController@index')->name('convegni');

Route::get('/iniziative/fetch_data', 'NewsController@fetch_data')->name('iniziative');

Route::get('/iniziative', 'NewsController@index')->name('iniziative');

/*
    GalleryController
*/

Route::get('/galleria', 'GalleryController@index');

Route::get('galleria/{id}', 'GalleryController@getPhotos');

/*
    DonationsController
*/

Route::post('donationsPayment', 'DonationsController@payWithpaypal');

Route::get('donationsstatus', 'DonationsController@getPaymentStatus');

/*
    JoinUsController
*/

Route::post('joinusPayment', 'JoinUsController@payWithpaypal');

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

Route::get('/admin/email', 'AdminController@email');

Route::get('/admin/messaggi', 'AdminController@messaggi');

Route::post('/admin/edit_profilo', 'AdminController@edit_profilo');

Route::post('/admin/edit_pssw', 'AdminController@edit_pssw');

/*
    MasterController
*/

Route::get('/admin/users', 'MasterController@users');

Route::post('/admin/edit_users', 'MasterController@edit_users');

Route::post('/admin/add_users', 'MasterController@add_users');

Route::post('/admin/delete_users', 'MasterController@delete_users');

Route::get('/admin/logs', 'MasterController@logs');

Route::get('/admin/clear_logs', 'MasterController@clear_logs');

Route::get('/admin/clear_donazioni', 'MasterController@clear_donazioni');

Route::get('/admin/clear_iscrizioni', 'MasterController@clear_iscrizioni');

Route::get('/admin/clear_messaggi', 'MasterController@clear_messaggi');

/* 
    AdminPagesController
*/

Route::get('/admin/pg_home', 'AdminPageController@pg_home');

Route::get('/admin/pg_donazioni', 'AdminPageController@pg_donazioni');

Route::get('/admin/pg_associarsi', 'AdminPageController@pg_associarsi');

Route::get('/admin/pg_contatti', 'AdminPageController@pg_contatti');

Route::get('/admin/pg_organisociali', 'AdminPageController@pg_organisociali');

Route::get('/admin/pg_statuto', 'AdminPageController@pg_statuto');

Route::get('/admin/pg_attivita', 'AdminPageController@pg_attivita');

Route::get('/admin/pg_premi', 'AdminPageController@pg_attivita');

Route::get('/admin/pg_iniziative', 'AdminPageController@pg_attivita');

Route::get('/admin/pg_convegni', 'AdminPageController@pg_attivita');

Route::get('/admin/pg_bilanci', 'AdminPageController@pg_bilanci');

Route::get('/admin/pg_progetti', 'AdminPageController@pg_progetti');

Route::get('/admin/pg_parlanodinoi', 'AdminPageController@pg_parlanodinoi');

Route::get('/admin/pg_articoli', 'AdminPageController@pg_articoli');

Route::get('/admin/covid', 'AdminPageController@covid');

Route::get('/admin/pg_cookie', 'AdminPageController@pg_cookie');

Route::get('/admin/pg_galleria', 'AdminPageController@pg_galleria');

Route::post('/admin/edit_contacts', 'AdminPageController@edit_contacts');

Route::post('/admin/edit_pages', 'AdminPageController@edit_pages');

/* 
    AdminArticoliController
*/

Route::post('/admin/edit_articoli', 'AdminArticoliController@edit_articoli');

Route::post('/admin/add_articoli', 'AdminArticoliController@add_articoli');

Route::post('/admin/delete_articoli', 'AdminArticoliController@delete_articoli');

/* 
    AdminBilanciController
*/

Route::post('/admin/edit_bilanci', 'AdminBilanciController@edit_bilanci');

Route::post('/admin/add_bilanci', 'AdminBilanciController@add_bilanci');

Route::post('/admin/delete_bilanci', 'AdminBilanciController@delete_bilanci');

/* 
    AdminDocsController
*/

Route::post('/admin/edit_docs', 'AdminDocsController@edit_docs');

/* 
    AdminLinksController
*/

Route::post('/admin/edit_links', 'AdminLinksController@edit_links');

Route::post('/admin/add_links', 'AdminLinksController@add_links');

Route::post('/admin/delete_links', 'AdminLinksController@delete_links');

/*
    AdminTeamController
*/

Route::get('/admin/team', 'AdminTeamController@index');

Route::post('/admin/edit_team', 'AdminTeamController@edit');

Route::post('/admin/add_team', 'AdminTeamController@add');

Route::post('/admin/delete_team', 'AdminTeamController@delete');

/* 
    AdminNewsController
*/

Route::get('/admin/premi', 'AdminNewsController@premi');

Route::get('/admin/iniziative', 'AdminNewsController@iniziative');

Route::get('/admin/convegni', 'AdminNewsController@convegni');

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

/*
    ArchivioController
*/

Route::get('/admin/archivio', 'ArchivioController@index');