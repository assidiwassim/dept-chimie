<?php

namespace App\Http\Controllers;
use Auth;
use App\User;
use Image;
use File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\ControllerValidatesRequestsvalidate;
class ParametreProfil extends Controller
{
  public function __construct()
    {
        $this->middleware('auth');
    }
    public function Modifier_profile_general(Request $request)
    {  
         
      $this->validate($request, [
            'username' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
      ]);
      
    
       $x= User::whereemail($request->input('email'))->count();
     if($x==0 || $x==1)
        {$user=User::whereid(Auth::user()->id)->update(['name' => $request->input('username'),'email' => $request->input('email')]);
        session()->flash('message-success-modification-profil','Votre profil à eté  modifier avec succées');
       }
       return back()->withInput();
    }


    public function changepassoword(Request $request)
    { 


        $this->validate($request, [              
            'EcienPassword' => 'required',
            'NewPassword' => 'required|string|min:6',
                                  ]);

                            
    $ancien_password=Auth::user()->password;
    $pass_form_ancien_password=$request->input('EcienPassword');
    $new_ecien=$request->input('NewPassword');

    if (Hash::check($pass_form_ancien_password,$ancien_password))
 {
  $n=User::whereid(Auth::user()->id)->update(['password' => Hash::make($new_ecien)]);
  session()->flash('message-success-modification-profil','Votre mot de passe  à eté  modifier avec succées');
  
      return back()->withInput();
    }
    else
    {
      session()->flash('message-success-modification-profil','3afsa');
  
      return back()->withInput();
    }
    }
   
   
        
      
      
       
      
    



    
                  public function changeavatar(Request $request)
                  {
                            $this->validate($request, [
                                'logo' => 'required|image|mimes:jpeg,png,jpg',   
                              ]);
                              $ancien=User::whereid(Auth::user()->id)->select('logo')->first();
                              if($request->hasFile('logo'))
                              {
                                
                                $logo = $request->file('logo');
                                $filename = time() . '.' . $logo->getClientOriginalExtension();
                                Image::make($logo)->save( public_path('/upload/logo/' . $filename ));
                                $user=User::whereid(Auth::user()->id)->update(['logo' => $filename]);
                                
                                file::delete(public_path() . '/uploads/avatars/'. $ancien);
                                session()->flash('message-success-modification-avatar','Votre  photo de profil à eté  modifier avec succées');
                             
                              }
                             
                              return back()->withInput(); 
                  }
}
