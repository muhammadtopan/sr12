<?php

namespace App\Http\Controllers\Mail;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mail\KatalogMail;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function katalog()
    {
        $details = [
            'title' => 'Email dari sr12herbalstore.com',
            'body' => 'This is for testing email using smtp'
        ];
    
        \Mail::to('sr12herbalstore.com@gmail.com')->send(new \App\Mail\KatalogMail($details));

    }

    public function forgotPassAccount()
    {
        $details = [
            'title' => 'Email dari sr12herbalstore.com',
            'body' => 'This is for testing email using smtp'
        ];
    
        \Mail::to('sr12herbalstore.com@gmail.com')->send(new \App\Mail\ConfirmationFPAMail($details));

    }
}
