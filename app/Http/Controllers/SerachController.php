<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Annonce;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\URL;

class SerachController extends Controller
{
                public function serachmesannonces(Request $request)
                { 
                    $designation=$request->input('designation');
                    $typeannonce=$request->input('typeannonce');
                    $natureannonce=$request->input('natureannonce');
                    $url=URL::current();
                    
                 

            if(!strrpos($url,"/labo/mesannonces/") === false   ) //existe 
                {
                    if((empty($typeannonce)) && (empty($natureannonce)) && (empty($designation)))
                    {
                        return back()->withInput();
                    }
                    elseif((empty($typeannonce)) && (empty($natureannonce))&& (!empty($designation)))
                    { 
                    $ann=Annonce::where('designation','like','%'.$designation.'%')
                    ->where('user_id', '=',Auth::user()->id)
                    ->get();
                    }
                    elseif((!empty($natureannonce)) && (empty($typeannonce)) && (empty($designation)))
                    { 
                    $ann=Annonce::where('natureannonce', $natureannonce) 
                    ->where('user_id', '=',Auth::user()->id)
                    ->get(); 
                    }
                    elseif((!empty($typeannonce)) && (empty($natureannonce)) && (empty($designation)))
                    {  
                    $ann=Annonce::where('typeannonce', $typeannonce) 
                    ->where('user_id', '=',Auth::user()->id)
                    ->get();            
                    }
                    elseif((!empty($typeannonce)) && (empty($natureannonce)) && (!empty($designation)))
                    { 
                    $ann=Annonce::where('designation','like','%'.$designation.'%')
                    ->orwhere('typeannonce', $typeannonce) 
                    ->get(); 
                    }
                    elseif((empty($typeannonce)) && (!empty($natureannonce)) && (!empty($designation)))
                    { 
                    $ann=Annonce::where('designation','like','%'.$designation.'%')
                    ->orwhere('natureannonce', $natureannonce)
                    ->get(); 
                    }
                    elseif((!empty($typeannonce)) && (!empty($natureannonce)) && (empty($designation)))
                    { 
                    $ann=Annonce::where('typeannonce',$typeannonce)
                    ->where('natureannonce', $natureannonce)
                    ->get(); 
                    }
                    elseif((!empty($typeannonce)) && (!empty($natureannonce)) && (!empty($designation)) )
                    { 
                    $ann=Annonce::where('designation','like','%'.$designation.'%')
                    ->orwhere('natureannonce', $natureannonce)
                    ->where('user_id', '=', Auth::user()->id)
                    ->get(); 
                    }
                                            
                    $annonces = $ann->filter(function($annonce)
                    {
                        if($annonce->user_id == Auth::user()->id)
                         {
                            return true;
                         }
                    });   
                    return view('user.serachmesannonces')->with('annonces',$annonces);
                         
                }
               
                
                elseif(!strrpos($url,"/labo/annonces/serach") === false) //existe 
                 {
                    if((empty($typeannonce)) && (empty($natureannonce)) && (empty($designation)) )
                    {
                        return back()->withInput();
                    }
                    elseif((empty($typeannonce)) && (empty($natureannonce))&& (!empty($designation)))
                    { 
                    $annonces=Annonce::where('designation','like','%'.$designation.'%')
                    ->get();
                    }

                    elseif((!empty($natureannonce)) && (empty($typeannonce)) && (empty($designation)))
                    { 
                    $annonces=Annonce::where('natureannonce', $natureannonce) 
                    ->get();  
                    }
                    elseif((!empty($typeannonce)) && (empty($natureannonce)) && (empty($designation)))
                    {  
                    $annonces=Annonce::where('typeannonce', $typeannonce) 
                    ->get();            
                    }
                elseif((!empty($typeannonce)) && (empty($natureannonce)) && (!empty($designation)))
                    { 
                    $annonces=Annonce::where('designation','like','%'.$designation.'%')
                    ->orwhere('typeannonce', $typeannonce)
                    ->get(); 
                    }
                    elseif((empty($typeannonce)) && (!empty($natureannonce)) && (!empty($designation)))
                    { 
                    $annonces=Annonce::where('designation','like','%'.$designation.'%')
                    ->orwhere('natureannonce', $natureannonce)
                    ->get(); 
                    }
                    elseif((!empty($typeannonce)) && (!empty($natureannonce)) && (empty($designation)))
                    { 
                    $annonces=Annonce::where('typeannonce',$typeannonce)
                    ->orwhere('natureannonce', $natureannonce)
                    ->get(); 
                    }
                    elseif((!empty($typeannonce)) && (!empty($natureannonce)) && (!empty($designation)) )
                    { 
                    $annonces=Annonce::where('designation','like','%'.$designation.'%')
                    ->orwhere('natureannonce', $natureannonce)
                    ->orwhere('typeannonce', $typeannonce)
                    ->get();
                    }

                 return view('user.serachannonces')->with('annonces',$annonces);

                }

   else
                {
                    return back()->withInput(); 
                }

     }
        
}
