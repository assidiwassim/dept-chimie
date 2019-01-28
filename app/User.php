<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;


    protected $fillable = [
        'name', 'email', 'password','block','role','tel','logo',
                          ];

 
    protected $hidden = [
        'password', 'remember_token',
    ];

                        public function produit(){
                            return $this->hasMany('App\Produit');
                        }

                        public function annonce(){
                            return $this->hasMany('App\Annonce');
                        }
                        public function reponseannonce(){
                            return $this->hasMany('App\Reponseannonce');
                        }
                   

                protected static function boot() {
                    parent::boot();

                            static::deleting(function($user) { 
                                $user->produit()->delete();  
                                $user->annonce()->delete();
                                $user->reponseannonce()->delete();    
                                        
                            });
                }
}

