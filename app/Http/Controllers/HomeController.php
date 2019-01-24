<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produit;
use App\Annonce;
use Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('user/tableaudebord_labo');
    }



    public function Annonces_labo()
    {    $annonces=Annonce::all();
        return view('user/Annonces_labo')->with('annonces',$annonces);
    }


    public function MesAnnonces_labo()
    {

        $annonces=Annonce::whereuser_id(Auth::user()->id)->get();
        return view('user/MesAnnonces_labo')->with('annonces',$annonces);
        
    }



    public function magasin_labo()
    {
        $produits=Produit::where('user_id',Auth::user()->id)->get();
        return view('user/magasin_labo')->with('produits',$produits);
    }
    public function discussion_labo()
    {
        return view('user/discussion_labo');
    }
    public function aide_labo()
    {
        return view('user/aide_labo');
    }
    public function parametre_labo()
    {
        return view('user/parametre_labo');
    }
    public function ajouter_produit_magasin_labo()
    {
        return view('user/ajouter_produit_magasin_labo');
    }
    
}
