<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class KatalogController extends Controller
{
    public function index()
    {
        $data['katalog'] = DB::table('tb_katalog')->get();
        $data['active'] = 'katalog';
        return  view('backend.page.katalog.index', $data);
    }
}
