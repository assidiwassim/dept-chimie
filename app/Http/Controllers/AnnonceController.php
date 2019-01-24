<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnnonceController extends Controller
{
 
    public function ajouter_annonce()
    {
        return view('user/ajouter_annonce');
    }
}
