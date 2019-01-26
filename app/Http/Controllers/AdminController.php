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
        ->where('id','<>',Auth::user()->id)
        ->get();
        $nbadmin=User::where('role','admin')->count();
        return view('admin/compteadmin')->with('admins',$administrateur)->with('nbadmin',$nbadmin);
    }


    public function comptelabo()
    {    $labos=User::select('id','email', 'name' ,'block')
        ->where('role','user')
        ->get();
        $nblabo=User::where('role','user')->count();

        return view('admin/comptelabo')->with('nblabo',$nblabo)->with('labos',$labos);
    }


    public function addNewUser()
    {
        return view('auth/register');
    }



    public function deleteadmin(Request $request)
    {
        
        
            
            $user = User::find($request->input('admindel'));    
            $user->delete();
            session()->flash('message-success', " Administrateur supprimer avec succées");
            return Redirect()->route('compteadmin');
    }


    
    public function blockadmin(Request $request)
    {
        
        session()->flash('message-success', " laboratoire  est bloqué avec succées");
        $user = User::find($request->input('laboblock'));  
        $user->block= "true" ; 
        $user->save();
        return Redirect()->route('compteadmin');
  
    }
    


    public function deblockadmin(Request $request)
    {
        
            session()->flash('message-success', " Administrateur est debloqué avec succées");
            $user = User::find($request->input('admin'));  
            $user->block="false" ; 
            $user->save();       
            return Redirect()->route('compteadmin');
    }

    

    












    public function deletelabo(Request $request)
    {
        
        if($request->input('labodel') == Auth::user()->id)
        {
            session()->flash('message-error', " opération non autorisé ");
     
        }
       
        else
        {
            
            $user = User::find($request->input('labodel'));    
            $user->delete();
            session()->flash('message-success', " laboratoire supprimer avec succées");

        }
        
        return Redirect()->route('comptelabo');
    }


    
    public function blocklabo(Request $request)
    {

            session()->flash('message-success', " laboratoire  est bloqué avec succées");
            $user = User::find($request->input('laboblock'));  
            $user->block= "true" ; 
            $user->save();
            return Redirect()->route('comptelabo');
    }


    public function deblocklabo(Request $request)
    {

            session()->flash('message-success', " laboratoire  est debloqué avec succées");
            $user = User::find($request->input('laboblock'));  
            $user->block= "false" ; 
            $user->save();
            return Redirect()->route('comptelabo');
    }
    
    
}
