<?php
use Illuminate\Http\Request;
Route::get('createcaptcha', 'CaptchaController@create');
Route::post('captcha', 'CaptchaController@captchaValidate');
Route::get('refreshcaptcha', 'CaptchaController@refreshCaptcha');

Route::get('/', function () {
    return view('welcome');
})->middleware('guest');
//Route::post('sendmessage', 'chatController@sendMessage');
Route::post('/send-contact','AdminController@storecontact')->name('sendcontact')->middleware('guest');
//Route::get('my-notification/{type}', 'alertController@myNotification');
Auth::routes(['verify' => true]);
Route::auth();
/* group for link simple user  */
Route::middleware(['auth','verified'])->group(function () {
    
    Route::middleware(['Check_Admin'])->group(function () {
     
        Route::prefix('labo')->group(function()
        {
            Route::get('/home', 'HomeController@home')->name('home');
            Route::post('/AddMsg', 'HomeController@AddMsg');
            Route::post('/GetListMessage', 'HomeController@GetListMessage');
            /* Home */
            Route::get('/', 'HomeController@index')->name('tableaudebord_labo');
            /* Annonce */
            Route::get('/annonces', 'HomeController@Annonces_labo')->name('Annonces_labo');
            Route::post('/annonces', 'HomeController@Annonces_labo_search')->name('Annonces_labo_search');
            /* Annonce des offre*/
            Route::get('/annonces/offre/{id}', 'HomeController@reponse_offre')->name('reponse_offre');
            Route::post('/annonces/offre', 'HomeController@store_reponse_offre')->name('store_reponse_offre');
            /* Annonce des demande*/
            Route::get('/annonces/demande/{id}', 'HomeController@reponse_demande')->name('reponse_demande');
            Route::post('/annonces/demande', 'HomeController@store_reponse_demande')->name('store_reponse_demande');
            /* Mes annonces curd */
            Route::get('/mesannonces', 'HomeController@MesAnnonces_labo')->name('MesAnnonces_labo');
            Route::post('/mesannonces', 'HomeController@MesAnnonces_labo_search')->name('MesAnnonces_labo_search');
            Route::get('/mesannonces/ajouter-annonce', 'AnnonceController@ajouter_annonce')->name('ajouter_annonce');
            Route::post('/mesannonces/ajouter-annonce-from', 'AnnonceController@addannoncefrom')->name('addannonce');
            /* Annonce */
            Route::get('/mesannonces/demande/{id}', 'HomeController@consulte_demande')->name('consulte_demande');
            Route::get('/mesannonces/offre/{id}', 'HomeController@consulte_offre')->name('consulte_offre');
            Route::post('/mesannonces/demande', 'HomeController@consulte_offre_confirmer')->name('consulte_offre_confirmer');
            Route::post('/mesannonces/offre', 'HomeController@consulte_offre_annuler')->name('consulte_offre_annuler');
            Route::post('/mesannonces/supprimer', 'AnnonceController@supprimer_annonce')->name('supprimer_annonce');
            
            
            /* MAgasin */
            Route::get('/magasin', 'HomeController@magasin_labo')->name('magasin_labo');
            Route::post('/magasin', 'HomeController@magasin_labo_search')->name('magasin_labo_search');
            Route::get('/magasin/ajouter-produit', 'HomeController@ajouter_produit_magasin_labo')->name('ajouter_produit_magasin_labo');
            Route::post('/magasin/ajouter-produit', 'ProduitController@addproduit')->name('addproduit');
            Route::post('/magasin/supprimer-produit', 'ProduitController@deleteproduit')->name('delete-produit');
            Route::post('/magasin/form-modifier-produit', 'ProduitController@formmodiferproduit')->name('form_modifer-produit');
            Route::post('/magasin/modiferproduit', 'ProduitController@updateproduit')->name('updateproduit');
            /* Option */
            Route::get('/discussion', 'HomeController@discussion_labo')->name('discussion_labo');
            Route::get('/aide', 'HomeController@aide_labo')->name('aide_labo');
            Route::get('/parametre', 'HomeController@parametre_labo')->name('parametre_labo');
            Route::post('/parametre/Modifier_profile_general', 'ParametreProfil@Modifier_profile_general')->name('Modifier_profile_general');
            Route::post('/parametre/changepassoword', 'ParametreProfil@changepassoword')->name('changepassoword');
            Route::post('/parametre/changeavatar', 'ParametreProfil@changeavatar')->name('changeavatar');
        });
        
        /* group for link admin user  */
        Route::prefix('admin')->group(function()
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
       });
});