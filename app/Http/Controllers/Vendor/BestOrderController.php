<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BestOrderController extends Controller
{
    public function index()
    {
        $data['active'] = 'best';
        return view('vendor.best_seller', $data);
    }
}
