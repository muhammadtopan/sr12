<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class ViewerSyaratController extends Controller
{
    public function index()
    {
        $data['viewer'] = DB::table('tb_viewer_syarat')->get();
        $data['active'] = 'viewer_syarat';
        return  view('backend.page.viewer_syarat.index', $data);
    }
}
