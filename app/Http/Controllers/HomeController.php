<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produit;
use App\Annonce;
use Auth;
use Illuminate\Support\Facades\DB;
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
    {    $annonces=Annonce::paginate(8);
        return view('user/Annonces_labo')->with('annonces',$annonces);
    }

    
    public function Annonces_labo_search(Request $request)
    {   
        $designation=$request->input('designation');
        $typeannonce=$request->input('typeannonce');
        $natureannonce=$request->input('natureannonce');
      
       $annonces=Annonce::where('designation','like','%'.$designation.'%')
       ->where('typeannonce','like','%'.$typeannonce.'%')
       ->where('natureannonce','like','%'.$natureannonce.'%')
       ->paginate(8);

        return view('user/Annonces_labo')->with('annonces',$annonces);
    }

    public function reponse_offre($id)
    {    
        return view('user/reponse_offre')->with('id',$id);
    }

    public function reponse_demande($id)
    {    
        return view('user/reponse_demande')->with('id',$id);
    }


    public function store_reponse_offre($id)
    {    
        return view('user/store_reponse_offre');
    }

    public function store_reponse_demande($id)
    {    
        return view('user/store_reponse_demande');
    }




    public function MesAnnonces_labo()
    {

        $annonces=Annonce::whereuser_id(Auth::user()->id)->simplePaginate(8);
        return view('user/MesAnnonces_labo')->with('annonces',$annonces);
        
    }

    public function MesAnnonces_labo_search(Request $request)
    {   
        $designation=$request->input('designation');
        $typeannonce=$request->input('typeannonce');
        $natureannonce=$request->input('natureannonce');
      
       $annonces=Annonce::where('designation','like','%'.$designation.'%')
       ->where('typeannonce','like','%'.$typeannonce.'%')
       ->where('natureannonce','like','%'.$natureannonce.'%')
       ->whereuser_id(Auth::user()->id)
       ->paginate(8);

        return view('user/MesAnnonces_labo')->with('annonces',$annonces);
    }



    public function magasin_labo()
    {
        $produits=Produit::where('user_id',Auth::user()->id)->get();

        $categorie=Produit::select('categorie')
        ->where('user_id',Auth::user()->id)
        ->distinct('categorie')
        ->get();

        $formule=Produit::select('formule')
        ->where('user_id',Auth::user()->id)
        ->distinct('formule')
        ->get();

          
        return view('user/magasin_labo')->with('produits',$produits)
        ->with('categorie',$categorie)
        ->with('formule',$formule);

    }


    //test
    public function magasin_labo_search(Request $request)
    { 
        
        $designation=$request->input('designation');
        $categorie=$request->input('categorie');
        $formule=$request->input('formule');
      
       $produits=Produit::where('designation','like','%'.$designation.'%')
       ->orwhere('qte','like','%'.$designation.'%')
       ->orwhere('unite','like','%'.$designation.'%')
       ->orwhere('reference','like','%'.$designation.'%')
       ->where('categorie','like','%'.$categorie.'%')
       ->where('formule','like','%'.$formule.'%')
       ->whereuser_id(Auth::user()->id)
       ->paginate(8);

       $categorie=Produit::select('categorie')
       ->where('user_id',Auth::user()->id)
       ->distinct('categorie')
       ->get();

       $formule=Produit::select('formule')
       ->where('user_id',Auth::user()->id)
       ->distinct('formule')
       ->get();

       return view('user/magasin_labo')->with('produits',$produits)
        ->with('categorie',$categorie)
        ->with('formule',$formule);
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
