<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class alertController extends Controller
{
    
   public function myNotification($type)
   {
       switch ($type) {
           case 'message':
               alert()->message('Sweet Alert with message.');
               break;
           case 'basic':
               alert()->basic('Sweet Alert with basic.','Basic');
               break;
           case 'info':
               alert()->info('Sweet Alert with info.');
               break;
           case 'success':
               alert()->success('Sweet Alert with success.','Welcome to ItSolutionStuff.com')->autoclose(3500);
               break;
           case 'error':
               alert()->error('Sweet Alert with error.');
               break;
           case 'warning':
               alert()->warning('Sweet Alert with warning.');
               break;
           default:
               # code...
               break;
       }


       return view('my-notification');
   }
}
