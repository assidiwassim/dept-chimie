<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
    protected $table = 'pictures';
  
  //  protected $fillable =['name','body'] ;
   public    $timestamps = false;
  protected $fillable = ['name',];

  public function produit(){
     return $this->belongsTo('App\Produit');
     }
     
}
