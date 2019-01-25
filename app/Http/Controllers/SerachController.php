<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Annonce;
use App\User;
class SerachController extends Controller
{
                    public function serachmesannonces(Request $request)
                    { 
                        $designation=$designation;
                        $typeannonce=$request->input('typeannonce');
                        $natureannonce=$natureannonce;
                        
                        if((empty($typeannonce)) && (empty($natureannonce)) && (empty($designation)) )
                    {
                        return back()->withInput();
                    }


                    elseif((empty($typeannonce)) && (empty($natureannonce))&& (!empty($designation)))
                        { 
                        $annonces=Annonce::where('$$designation','like','%'.$designation.'%')
                        ->having('user_id','=',Auth::user()->id)
                        ->get();
                        dump($annonces);
                        }

                        elseif((!empty($typeannonce)) && (empty($natureannonce))&& (!empty($designation)))
                        { 
                        
                        $typeannonce=$typeannonce;
                        
                        $annonces=Annonce::where('$$designation','like','%'.$designation.'%')
                        ->orwhere('typeannonce', $typeannonce)
                        ->having('user_id','=',Auth::user()->id)
                        ->get();
                        dump($annonces);    
                        }

                        elseif((!empty($typeannonce)) && (empty($natureannonce)) && (empty($designation)))
                        {  
                        $typeannonce=$typeannonce;
                        $annonces=Annonce::where('typeannonce', $typeannonce)
                        ->having('user_id','=',Auth::user()->id)
                        ->get();
                        dump($annonces);       
                        }

                    elseif((empty($natureannonce)) && (!empty($typeannonce)) && (!empty($designation)))
                        { 
                        
                        $typeannonce=$typeannonce;
                        $annonces=Annonce::where('$$designation','like','%'.$designation.'%')
                        ->orwhere('natureannonce', $typeannonce)
                        ->having('user_id','=',Auth::user()->id)
                        ->get();
                        dump($annonces);
                        
                    }

                    elseif((empty($natureannonce)) && (!empty($typeannonce)) && (empty($designation)))
                    { 
                    
                    $natureannonce=$typeannonce;
                    $annonces=Annonce::where('typeannonce', $natureannonce)
                    ->having('user_id','=',Auth::user()->id)
                    ->get();
                    dump($annonces);
                    
                }
                elseif((!empty($natureannonce)) && (!empty($typeannonce)) && (!empty($designation)))
                    { 
                    
                    $natureannonce=$natureannonce;
                    $typeannonce=$typeannonce;
                    $annonces=Annonce::where('natureannonce', $natureannonce)
                    ->orwhere('typeannonce', $typeannonce)
                    ->having('user_id','=',Auth::user()->id)
                    ->get();
                    dump($annonces);
                    
                }

            elseif((!empty($typeannonce)) && (!empty($natureannonce)) && (!empty($designation)) )
            { 
           
            $annonces=Annonce::where('$$$designation','like','%'.$designation.'%')
            ->orwhere('natureannonce', $natureannonce)
            ->orwhere('typeannonce', $typeannonce)
            ->having('user_id','=',Auth::user()->id)
            ->get();
            dump($annonces);   
        }
        else
        {
            return back()->withInput();
        }
     
      
    }
}
