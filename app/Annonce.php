<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Annonce extends Model
{
    protected $table = 'annonces';
    protected $fillable = [
        'typeannonce', 'natureannonce', 'designation','refproduit','qte','refproduitEchange','qteEchange','file',];

    public function user(){
        return $this->belongsTo('App\User');
        }
        public function reponseannonce(){
            return $this->hasMany('App\Reponseannonce');
            }
    

    
    }

