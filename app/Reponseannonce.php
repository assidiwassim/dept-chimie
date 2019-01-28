<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reponseannonce extends Model
{
    protected $table = 'reponseannonces';
    protected $fillable = [
        'annonce_id', 'etat', 'commentaire',];

    public function user(){
        return $this->belongsTo('App\User');
                          }
             public function annonce()
            {
            return $this->belongsTo('App\Annonce');
            }

            
}
