<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;

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
        $nblabo=User::where('role','labo')->count();
        return view('admin/tableaudebord')->with('nblabo',$nblabo)->with('nbadmin',$nbadmin);
    }

    

  

    public function compteadmin()
    {   $administrateur=User::where('role','admin');
        return view('admin/compteadmin')->with('admin',$administrateur);
    }


    public function comptelabo()
    {   $labo=User::where('role','labo');

        return view('admin/comptelabo')->with('labo',$labo);
    }
    public function addNewUser()
    {
        return view('auth/register');
    }

    
}
