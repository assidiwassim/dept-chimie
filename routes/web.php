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
Route::get('/', 'HomeController@index')->name('home');
});

/* group for link admin user  */
Route::group(['prefix' =>'admin'  ,'middleware'=> 'admin'],function()
{
    Route::get('/','AdminController@index')->name('tableaudebord');
Route::get('/addNewUser', 'AdminController@addNewUser')->name('addNewUser');
Route::get('/comptelabo','AdminController@comptelabo')->name('comptelabo');
Route::get('/compteadmin','AdminController@compteadmin')->name('compteadmin');
});


