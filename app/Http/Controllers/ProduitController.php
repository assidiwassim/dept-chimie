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

            'reference' => 'required|string|bail|min:2|max:20',
            'designation' => 'required|bail|string|min:5|max:300',
            'formule' => 'required|bail|string|min:1|max:50',
            'qte' => 'required|bail|numeric|min:0|max:3000',
            'categorie' => 'required|string|bail|min:2|max:50',
            'unite' => 'required|bail|string|min:1|max:20',
            
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
           session()->flash('message-success-produit',"la  produit  été supprimer correctement!");
            return redirect()->route('magasin_labo');

        }
      
    }

