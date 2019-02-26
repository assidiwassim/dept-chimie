<?php

namespace App\Http\Controllers;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Produit;
use App\Annonce;
use App\User;
use App\Chat;
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

    public function home()
    {
        return view('home');
    }


    public function AddMsg(Request $request){
        $Chat = new Chat;
        $Chat->from = $request->input('from');
        $Chat->to = $request->input('to');
        $Chat->text = $request->input('text');
        $Chat->save();

       return response()->json( $response, 200);
    }

    
    public function GetListMessage(Request $request){
       
         $message=Chat::where('from',$request->input('from'))
                       ->where('to',$request->input('to'))
                       ->orwhere('to',$request->input('from'))
                       ->where('from',$request->input('to'))
                       ->get();
                   
             $url_to   = User::select('logo')->whereid($request->input('from'))->get();
             $url_from   = User::select('logo')->whereid($request->input('to'))->get();

             $j=["data_msg" => $message,
             "url_to" => $url_to,
            "url_from" =>$url_from 
            ];
                 
             
       return response()->json( $j, 200);
    }

    
    


    public function Annonces_labo()
    {    $annonces=Annonce::where('user_id','!=',Auth::user()->id)
                ->orderBy('created_at', 'desc')->paginate(8);
        return view('user/Annonces_labo')->with('annonces',$annonces);
    }

    
    public function Annonces_labo_search(Request $request)
    {   
        $designation=$request->input('designation');
        $typeannonce=$request->input('typeannonce');
        $natureannonce=$request->input('natureannonce');
        $annonces=Annonce::where('user_id','!=',Auth::user()->id)
        ->where('designation','like','%'.$designation.'%')
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

/***** problem stock   *****/
    public function store_reponse_offre(Request $request)
    {     $this->validate($request, [
        'commentaire' => 'required|string|min:1',  
      ]); 

        $annonce=Annonce::select('natureannonce','refproduit','refproduitEchange','qte','qteEchange')->whereid($request->input('idannonce'))->first();
        if($annonce->natureannonce=="Changement")
        {
                $produit=Produit::select('qte')->whereid($annonce->refproduit)->first();
                $produitEchange=Produit::select('qte')->whereid($annonce->refproduitEchange)->whereuser_id(Auth::user()->id)->first();
                  if(!empty($produitEchange))
                  {
                    if($produit->qte >= $annonce->qte && $produitEchange->qte >= $annonce->qteEchange  )
                    {  
                        $reponseoffre=new Reponseannonce;
                        $reponseoffre->user_id=Auth::user()->id;
                        $reponseoffre->annonce_id=$request->input('idannonce');
                        $reponseoffre->commentaire=$request->input('commentaire');
                        $reponseoffre->etat="confirmer";
                        $reponseoffre->save();
                       // $allreponse=Produit::where($)->where('id','<>',$reponse_id)->update(['etat' => "annuler"]);
                        //*update produit fornisseur -qte
                        //*update produit haj +qteechange
                    }
                    else
                    {
                        if($produit->qte < $annonce->qte)
                            session()->flash('message-error-ajout-offre','le produit de votre fournisseur est non disponible' );   
                        elseif($produitEchange->qte < $annonce->qteEchange)
                            session()->flash('message-error-ajout-offre','Quantite insuffisante' );   
                       
                    }
                    
                }else
                {session()->flash('message-error-ajout-offre','Vous navais pas ce type de produit dans votre stock' ); }

         }
        else
        {
                        $produit=Produit::whereid($annonce->refproduit)->first();
                        if($produit->qte >= $annonce->qte)
                        {
                            $reponseoffre=new Reponseannonce;
                            $reponseoffre->user_id=Auth::user()->id;
                            $reponseoffre->annonce_id=$request->input('idannonce');
                            $reponseoffre->commentaire=$request->input('commentaire');
                            $reponseoffre->etat="confirmer";
                            $reponseoffre->save();
                            //*update produit fornisseur + qte
                            //ajout produit a le meme informations que le de fr

                            //*
                        }
                        else
                        {
                            session()->flash('message-error-ajout-offre','le produit de votre fournisseur est non disponible' );  
                        }

                    }
                        return back()->withInput();  
     
   
    }


    public function store_reponse_demande(Request $request)
    {   
            $this->validate($request, [
                'commentaire' => 'required|string|min:1',  
              ]);
         $annonce=Annonce::whereid($request->input('idannonce'))->get();
         
         $reponseoffre=new Reponseannonce;
         $reponseoffre->user_id=Auth::user()->id;
         $reponseoffre->annonce_id=$request->input('idannonce');
         $reponseoffre->commentaire=$request->input('commentaire');
         $reponseoffre->etat="enattente";
         $reponseoffre->save();
    
        
 }




    public function MesAnnonces_labo()
    {

        $annonces=Annonce::whereuser_id(Auth::user()->id)->orderBy('created_at', 'desc')->simplePaginate(8);
        return view('user/MesAnnonces_labo')->with('annonces',$annonces);
        
    }

    public function consulte_demande($id)
    {

        $annonces=Annonce::whereid($id)->first();
        $ann=Annonce::whereid($id)->select('user_id')->first();
        $reponseconfirmer=Reponseannonce::whereannonce_id($id)
        ->whereetat("confirmer")
        ->first();

        if(!empty($reponseconfirmer)){
           
      $w=User::select('name')->whereid($annonces->user_id)->first();
    $reponseconfirmer=$w->name;
        }


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
        $produits=Produit::where('user_id',Auth::user()->id)->orderBy('created_at','desc')->paginate(8);

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
        $user=User::select('email','name')->whereid(Auth::user()->id)->first();
        return view('user/parametre_labo')->with('user',$user);
    }
    public function ajouter_produit_magasin_labo()
    {
        return view('user/ajouter_produit_magasin_labo');
    }
    
}
