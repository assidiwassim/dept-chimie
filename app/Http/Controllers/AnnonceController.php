<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use Image;
use File;
use App\Produit;
use App\Annonce;
class AnnonceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
 
    public function ajouter_annonce()
    {
      $refuser=Produit::select('id','reference' )
      ->where('user_id',Auth::user()->id)
      ->orderBy('created_at', 'desc')
      ->get();
      $reftotal=Produit::select('id','reference' )
      ->get();
       return view('user/ajouter_annonce')->with('reftotal',$reftotal)->with('refuser',$refuser);
    }






    public function addannoncefrom(Request $request)
    {
            $logo = $request->file('file');
            $filename = time() . '.' . $logo->getClientOriginalExtension();
            Image::make($logo)->save( public_path('/upload/PictureAnnonce/' . $filename ) );
            $x=Produit::whereid( $request->input('refproduit'))->select('qte')->first();
         if(empty($request->input('qte')) || (!empty($request->input('qte')) && $request->input('qte') <= $x->qte))
           {
                        $Annonce=new Annonce;
                    $Annonce->typeannonce = $request->input('typeannonce');
                    $Annonce->natureannonce  = $request->input('natureannonce');
                    $Annonce->designation  = $request->input('designation');
                    $Annonce->refproduit = $request->input('refproduit');
                    $Annonce->qte = $request->input('qte');
                    $Annonce->refproduitEchange = $request->input('refproduitEchange');
                    $Annonce->qteEchange = $request->input('qtetEchange');
                    $Annonce->file = $filename;
                    $Annonce->user_id  = Auth::user()->id;
                    $Annonce->save();
                    session()->flash('message-success-ajout-annonce','la nouvelle annonce a été enregistrer correctement!');
        }else{
            session()->flash('message-success-ajout-annonce','Quantité indisponible!');  
        }
         
          return back()->withInput();
         
                    
    }



}
