<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SendEmailController extends Controller
{
    function index($email)
    {
     Mail::to($email)->send(new TestMail("Usted ha sido registrado exitosamente"));
     return back();
    }
}

?>
