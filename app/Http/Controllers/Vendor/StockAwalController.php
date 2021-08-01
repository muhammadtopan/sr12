<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StockAwalController extends Controller
{
    public function index()
    {
        $data['active'] = 'awal';
        return view('vendor.first_stock', $data);
    }
}
