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
            'title' => 'Mail from sr12herbalstore.com',
            'body' => 'This is for testing email using smtp'
        ];
    
        \Mail::to('taufanomt@gmail.com')->send(new \App\Mail\KatalogMail($details));

        dd($details);
    }
}
