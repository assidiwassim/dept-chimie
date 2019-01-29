<?php

namespace App\Http\Controllers;
use App\User;
use App\Contact;
use Auth;
use Illuminate\Http\Request;
use App\Http\Requests\sendContact;
use Illuminate\Database\Query\Builder;
use App\Http\Controllers\ControllerValidatesRequestsvalidate;
use Illuminate\View\Middleware\ShareErrorsFromSession;
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
        ->orderBy('created_at', 'desc')
        ->get();
        $nbadmin=User::where('role','admin')->count();
        return view('admin/compteadmin')->with('admins',$administrateur)->with('nbadmin',$nbadmin);
    }


    public function comptelabo()
    {    $labos=User::select('id','email', 'name' ,'block')
        ->where('role','user')
        ->orderBy('created_at', 'desc')
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
        
        
        $user = User::find($request->input('laboblock'));  
        $user->block= "true" ; 
        $user->save();
        session()->flash('message-success', " laboratoire  est bloqué avec succées");
        return Redirect()->route('compteadmin');
  
    }
    


    public function deblockadmin(Request $request)
    {
        
            $user = User::find($request->input('admin'));  
            $user->block="false" ; 
            $user->save();       
            session()->flash('message-success', " Administrateur est debloqué avec succées");

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
    

    public function storecontact(Request $request)
    { 
        
        
      $contact= new Contact;
      $contact->name=$request->input('name');
      $contact->email=$request->input('email');
      $contact->subject=$request->input('subject');
      $contact->message=$request->input('message');
      $contact->save();

      session()->flash('message-success-send-message','la nouvelle annonce a été enregistrer correctement!');

      return back()->withInput();

    }
    
}
