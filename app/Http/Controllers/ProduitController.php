<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Produit;
use Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Database\Query\Builder;
use App\Http\Controllers\ControllerValidatesRequestsvalidate;
use Illuminate\View\Middleware\ShareErrorsFromSession;
class ProduitController extends Controller
{
    
    public function addproduit(Request $request)
    {      
        $this->validate($request, [

            'reference' => 'required|string|unique:produits',
            'designation' => 'required|string',
            'formule' => 'required|string',
            'qte' => 'required|numeric',
            'categorie' => 'required|string',
            'unite' => 'required|string',
            
          ]);
     

            $porduit = new Produit;
            $porduit->reference = $request->input('reference');
            $porduit->designation = $request->input('designation');
            $porduit->formule = $request->input('formule');
            $porduit->user_id = Auth()->user()->id;
            $porduit->qte = $request->input('qte');
            $porduit->categorie = $request->input('categorie');
            $porduit->unite = $request->input('unite');
            $porduit->save();
      
           session()->flash('message-success-ajout-produit','la nouvelle produit a été enregistrer correctement!');
            return view('user/ajouter_produit_magasin_labo');
          }



          public function  deleteproduit(Request $request)
          {
           
           $produit = Produit::find($request->input('idproduit'));  
           $produit->delete();
           session()->flash('message-success-delete-produit',"la  produit  été supprimer correctement!");
            return redirect()->route('magasin_labo');

        }
        
       
        
         public function updateproduit(Request $req)
         {
 
        
            $id= $req->get('idproduit');
            $produit= Produit::whereid($id)->update($req->except(['_method','_token','idproduit']));
            session()->flash('message-success-update-produit',"la mise a jour de produit  fait correctement!");
            return redirect()->route('magasin_labo');
            
         }

      
         
         public function  formmodiferproduit(Request $request)
         {
            $produit=Produit::find($request->input('idproduit')); 
            return view('user/modifer_produit_magasin_labo')->with('produit',$produit);
         
 
         }
      
    }

