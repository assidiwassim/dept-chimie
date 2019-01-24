<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    protected $table = 'produits';
  
  //  protected $fillable =['name','body'] ;
  //  public    $timestamps = false;
  protected $fillable = ['reference', 'designation,','formule', 'qte','categorie',];

  public function user(){
     return $this->belongsTo('App\User');
     }
     
          
}
