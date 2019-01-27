<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Mail;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class MailController extends Controller {


   public function sendemail() {

   $data=[
    'email' => "labsharefsm@gmail.com",
    'subject' => "subject",
    'message' => "text",
];



 Mail::send('mail',$data,function($message) use ($data)
 {
     $message->from('labsharefsm@gmail.com');
     $message->to($data['email']);
     $message->subject($data['subject']);
 })
 ->with('title', "Registered Successfully.");
}
}