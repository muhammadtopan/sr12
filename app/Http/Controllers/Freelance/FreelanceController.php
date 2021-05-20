<?php

namespace App\Http\Controllers\Freelance;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FreelanceController extends Controller
{
    public function login()
    {
        $data['active'] = '';
        return view('freelance/auth/login', $data);
    }
}
