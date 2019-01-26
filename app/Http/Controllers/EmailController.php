<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
class EmailController extends Controller
{
    public function sendemail(Request $requset)
    {
       $data=[
           'email' => $requset->input('email'),
           'subject' => $requset->input('subject'),
           'message' => $requset->input('message'),
       ];



        Mail::send('mail.mail',$data,function($message) use ($data)
        {
            $message->from('saifeddinhajji@gmail.com');
            $message->to($data['email']);
            $message->subject($data['subject']);
        });
    }
}
