<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produit;
use App\Annonce;
use Auth;
use App\Reponseannonce;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\ControllerValidatesRequestsvalidate;
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

/**
 * 
 * 
 * 
 */

    public function Annonces_labo()
    {    $annonces=Annonce::orderBy('created_at', 'desc')->paginate(8);
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
        ->orderBy('created_at', 'desc')
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


    public function store_reponse_offre(Request $request)
    {    
        $this->validate($request, [
            'commentaire' => 'required|string|min:1',  
          ]);
     
     $reponseoffre=new Reponseannonce;
     $reponseoffre->user_id=Auth::user()->id;
     $reponseoffre->annonce_id=$request->input('idannonce');
     $reponseoffre->commentaire=$request->input('commentaire');
     $reponseoffre->etat="enattente";
     $reponseoffre->save();
     
     session()->flash('message-success-ajout-offre','Votre demande à cette offre est effecuté avec succées');
     return back()->withInput();   
    }

    public function store_reponse_demande(Request $request)
    {    
        $this->validate($request, [
            'commentaire' => 'required|string|min:1',  
          ]); 
     $reponseoffre=new Reponseannonce;
     $reponseoffre->user_id=Auth::user()->id;
     $reponseoffre->annonce_id=$request->input('idannonce');
     $reponseoffre->commentaire=$request->input('commentaire');
     $reponseoffre->etat="confirmer";
     $reponseoffre->save();
     
     session()->flash('message-success-ajout-demande','Votre demande confimer avec succées');
     return back()->withInput();  
    }




    public function MesAnnonces_labo()
    {

        $annonces=Annonce::whereuser_id(Auth::user()->id)->orderBy('created_at', 'desc')->simplePaginate(8);
        return view('user/MesAnnonces_labo')->with('annonces',$annonces);
        
    }

    public function consulte_demande($id)
    {

        $annonces=Annonce::whereid($id)->get();
        $reponseconfirmer=Reponseannonce::whereannonce_id($id)
        ->orderBy('created_at', 'desc')
        ->whereetat("confirmer")
        ->get();


        return view('user/MesAnnonce_demande')->with('annonces',$annonces)->with('reponseconfirmer',$reponseconfirmer)->with('id',$id);
        
    }
    public function consulte_offre($id)
    {
     $annonce=Annonce::whereid($id)->get();
     $reponse=Reponseannonce::whereannonce_id($id)
     ->orderBy('created_at', 'desc')
     ->get();
     return view('user.MesAnnonce_offre')->with('annonce',$annonce)->with('reponse',$reponse)->with('id',$id);
    }


    public function  consulte_offre_confirmer(Request $request)
    {
       $reponse_id=$request->input('reponse_id');

        $confirmerreponse=Reponseannonce::whereid($reponse_id)->first();
        $confirmerreponse->etat="confirmer";
        $confirmerreponse->save();
        $id=$confirmerreponse->annonce_id;
        $allreponse=Reponseannonce::whereannonce_id($id)->where('id','<>',$reponse_id)->update(['etat' => "annuler"]);
        
        $annonce=Annonce::whereid($id)->get();
        $reponse=Reponseannonce::whereannonce_id($id)
        ->get();
        
        return view('user.MesAnnonce_offre')->with('annonce',$annonce)->with('reponse',$reponse)->with('id',$id);;
    }


    public function  consulte_offre_annuler(Request $request)
    {
      $confirmerreponse=Reponseannonce::whereid($request->input('reponse_id'))->first();
        $confirmerreponse->etat="annuler";
        $confirmerreponse->save();
        $id=$confirmerreponse->annonce_id;
        $annonce=Annonce::whereid($id)->get();
        $reponse=Reponseannonce::whereannonce_id($id)
        ->get();
        return view('user.MesAnnonce_offre')->with('annonce',$annonce)->with('reponse',$reponse)->with('id',$id);;
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
