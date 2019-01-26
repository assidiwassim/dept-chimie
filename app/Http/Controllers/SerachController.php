<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Annonce;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
class SerachController extends Controller
{
                public function serachmesannonces(Request $request)
                { 
                    $designation=$request->input('designation');
                    $typeannonce=$request->input('typeannonce');
                    $natureannonce=$request->input('natureannonce');
                    $url=URL::current();

                    

            if(!strrpos($url,"/labo/mesannonces/serach") === false) //existe 
                {
                    if((empty($typeannonce)) && (empty($natureannonce)) && (empty($designation)) )
                    {
                        return back()->withInput();
                    }
                    elseif((empty($typeannonce)) && (empty($natureannonce))&& (!empty($designation)))
                    { 
                    $annonces=Annonce::where('designation','like','%'.$designation.'%')
                    ->where('user_id', '=',Auth::user()->id)
                    ->paginate(8);
                    }
                    elseif((!empty($natureannonce)) && (empty($typeannonce)) && (empty($designation)))
                    { 
                    $annonces=Annonce::where('natureannonce', $natureannonce) 
                    ->where('user_id', '=',Auth::user()->id)
                    ->paginate(8); 
                    }
                    elseif((!empty($typeannonce)) && (empty($natureannonce)) && (empty($designation)))
                    {  
                    $annonces=Annonce::where('typeannonce', $typeannonce) 
                    ->where('user_id', '=',Auth::user()->id)
                    ->paginate(8);            
                    }
                    elseif((!empty($typeannonce)) && (empty($natureannonce)) && (!empty($designation)))
                    { 
                    $annonces=Annonce::where('designation','like','%'.$designation.'%')
                    ->orwhere('typeannonce', $typeannonce) 
                    ->paginate(8); 
                    }
                    elseif((empty($typeannonce)) && (!empty($natureannonce)) && (!empty($designation)))
                    { 
                    $annonces=Annonce::where('designation','like','%'.$designation.'%')
                    ->orwhere('natureannonce', $natureannonce)
                    ->paginate(8); 
                    }
                    elseif((!empty($typeannonce)) && (!empty($natureannonce)) && (empty($designation)))
                    { 
                    $annonces=Annonce::where('typeannonce',$typeannonce)
                    ->orwhere('natureannonce', $natureannonce)
                    ->paginate(8); 
                    }
                    elseif((!empty($typeannonce)) && (!empty($natureannonce)) && (!empty($designation)) )
                    { 
                    $annonces=Annonce::where('designation','like','%'.$designation.'%')
                    ->orwhere('natureannonce', $natureannonce)
                    ->where('user_id', '=', Auth::user()->id)
                    ->paginate(8); 
                    }
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
                    ->paginate(8);
                    }

                    elseif((!empty($natureannonce)) && (empty($typeannonce)) && (empty($designation)))
                    { 
                    $annonces=Annonce::where('natureannonce', $natureannonce) 
                    ->paginate(8);  
                    }
                    elseif((!empty($typeannonce)) && (empty($natureannonce)) && (empty($designation)))
                    {  
                    $annonces=Annonce::where('typeannonce', $typeannonce) 
                    ->paginate(8);            
                    }
                elseif((!empty($typeannonce)) && (empty($natureannonce)) && (!empty($designation)))
                    { 
                    $annonces=Annonce::where('designation','like','%'.$designation.'%')
                    ->orwhere('typeannonce', $typeannonce)
                    ->paginate(8); 
                    }
                    elseif((empty($typeannonce)) && (!empty($natureannonce)) && (!empty($designation)))
                    { 
                    $annonces=Annonce::where('designation','like','%'.$designation.'%')
                    ->orwhere('natureannonce', $natureannonce)
                    ->paginate(8); 
                    }
                    elseif((!empty($typeannonce)) && (!empty($natureannonce)) && (empty($designation)))
                    { 
                    $annonces=Annonce::where('typeannonce',$typeannonce)
                    ->orwhere('natureannonce', $natureannonce)
                    ->paginate(8); 
                    }
                    elseif((!empty($typeannonce)) && (!empty($natureannonce)) && (!empty($designation)) )
                    { 
                    $annonces=Annonce::where('designation','like','%'.$designation.'%')
                    ->orwhere('natureannonce', $natureannonce)
                    ->orwhere('typeannonce', $typeannonce)
                    ->paginate(8);
                    }

                 return view('user.serachannonces')->with('annonces',$annonces);

                }

         }
        
}
szd
