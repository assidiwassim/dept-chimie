<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','block','role','tel','logo'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function produit(){
        return $this->hasMany('App\Produit');
      }
      public function annonce(){
        return $this->hasMany('App\Annonce');
      }
    protected static function boot() {
        parent::boot();

        static::deleting(function($user) { // before delete() method call this
            $user->produit()->delete();  
            $user->annonce()->delete();           
        });
    }
}

