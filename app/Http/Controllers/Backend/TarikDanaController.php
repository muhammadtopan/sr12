<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TarikDanaController extends Controller
{
    public function index()
    {
        $data['active'] = 'tarik';
        return  view('backend.page.tarik.index', $data);
    }
}
