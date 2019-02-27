<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Image;
use File;
class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {   
      //  
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'role' => ['required', 'string', 'min:4','max:5'],
            'tel'  => ['required', 'min:8','numeric','unique:users'],
            'logo' => ['required','image','mimes:jpeg,png,jpg,tiff|max:2048'],      
                              ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(\Illuminate\Http\Request $data)
    {     
       if($data->hasFile('logo')){
            
                    $logo = $data->file('logo');
                    $filename = time() . '.' . $logo->getClientOriginalExtension();
                    Image::make($logo)->resize(50,50)->save( public_path('/upload/logo/' . $filename ) );
                    return User::create([
                    'name' => $data['name'],
                    'email' => $data['email'],
                    'password' => Hash::make($data['password']),
                    'role' => $data['role'],
                    'tel' => $data['tel'],
                    'logo' => $filename,
                ]);
        
      
            }
            else
            {

                return User::create([
                    'name' => $data['name'],
                    'email' => $data['email'],
                    'password' => Hash::make($data['password']),
                     'role' => $data['role'],
                    'tel' => $data['tel'],
                ]);
        
            }   

        


    }

    public function register(\Illuminate\Http\Request $request)
    {
        // validate the form 

        $this->validator($request->all())->validate();

        // add the user
        $this->create($request);
        if($request->input('role')=="admin")
        {
            session()->flash('message-success', " l'ajout de l'adminstrateur fait avec succées");
        }
        else
        {
            session()->flash('message-success', "l'ajout de utilisateur fait avec succées");
        }
        
        return redirect("/admin/addNewUser");

    }
 
    
}
