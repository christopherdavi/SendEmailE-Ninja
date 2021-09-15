<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\TestMail;
class MailController extends Controller
{
    public function sendEmail(){
       $details=[
           'title'=>'correo enviado',
           'body'=>'se va enviar'
       ];
      Mail::to("avs.larrea@yavirac.edu.ec")->send(new TestMail($details));
      return "correo electronico";  
    }
}
