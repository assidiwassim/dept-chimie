<?php

namespace App\Http\Controllers;
use App\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
class AdminController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
 
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    {  
        $nbadmin=User::where('role','admin')->count();
        $nblabo=User::where('role','user')->count();
        return view('admin/tableaudebord')->with('nblabo',$nblabo)->with('nbadmin',$nbadmin);
    }

    

  

    public function compteadmin()
    {   $administrateur=User::select('id','email', 'name' )
        ->where('role','admin')
        ->get();
        $nbadmin=User::where('role','admin')->count();
        return view('admin/compteadmin')->with('admins',$administrateur)->with('nbadmin',$nbadmin);
    }


    public function comptelabo()
    {   $labo=User::where('role','labo');

        return view('admin/comptelabo')->with('labo',$labo);
    }
    public function addNewUser()
    {
        return view('auth/register');
    }


    public function deleteadmin(Request $request)
    {
        
        if($request->input('admindel') == Auth::user()->id)
        {
            session()->flash('message-error', " opération non autorisé ");
     
        }
       
        else
        {
            
            $user = User::find($request->input('admindel'));    
            $user->delete();
            session()->flash('message-success', " Administrateur supprimer avec succées");

        }
        
        return Redirect()->route('compteadmin');
    }


    
    public function blockadmin(Request $request)
    {
        
        if($request->input('admin')==Auth::user()->id)
        {
            session()->flash('message-error', " opération non autorisé ");

        }
        else
        {
            session()->flash('message-success', " Administrateur est bloqué avec succées");
            $user = User::find($request->input('admin'));  
            $user->block="true" ; 
            $user->save();


        }
        
        return Redirect()->route('compteadmin');
    }

    
    
}
