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
})->middleware('guest');



Auth::routes();

/* group for link simple user  */
Route::group(['prefix' =>'labo'  ,'middleware'=> 'labo'],function()
{
Route::get('/', 'HomeController@index')->name('tableaudebord_labo');
Route::get('/annonces', 'HomeController@Annonces_labo')->name('Annonces_labo');
Route::get('/mesannonces', 'HomeController@MesAnnonces_labo')->name('MesAnnonces_labo');
Route::get('/magasin', 'HomeController@magasin_labo')->name('magasin_labo');
Route::get('/discussion', 'HomeController@discussion_labo')->name('discussion_labo');
Route::get('/aide', 'HomeController@aide_labo')->name('aide_labo');
Route::get('/parametre', 'HomeController@parametre_labo')->name('parametre_labo');
});


/* group for link admin user  */
Route::group(['prefix' =>'admin'  ,'middleware'=> 'admin'],function()
{
    Route::get('/','AdminController@index')->name('tableaudebord');
    Route::get('/addNewUser', 'AdminController@addNewUser')->name('addNewUser');
Route::get('/comptelabo','AdminController@comptelabo')->name('comptelabo');
Route::get('/compteadmin','AdminController@compteadmin')->name('compteadmin');
//delete end block admin 
Route::post('/compteadmin/delete','AdminController@deleteadmin')->name('delete');
Route::post('/compteadmin/block','AdminController@blockadmin')->name('block');
Route::post('/compteadmin/deblockadmin','AdminController@deblockadmin')->name('deblockadmin');
//delete end block labo
Route::post('/compteadmin/deleteLabo','AdminController@deletelabo')->name('deletelabo');
Route::post('/compteLabo/blocklabo','AdminController@blocklabo')->name('blocklabo');
Route::post('/compteLabo/deblocklabo','AdminController@deblocklabo')->name('deblocklabo');




});


