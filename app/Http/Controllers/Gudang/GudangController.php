<?php

namespace App\Http\Controllers\Gudang;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GudangController extends Controller
{
    public function index()
    {
        $data['active'] = 'dashboard';
        return view('gudang/page/index', $data);
    }

    public function profile()
    {
        $data['active'] = 'profile';
        return view('gudang/page/profile', $data);
    }

    public function stock()
    {
        $data['active'] = 'stock';
        return view('gudang/page/stock', $data);
    }

    public function mitra()
    {
        $data['active'] = 'mitra';
        return view('gudang/page/mitra', $data);
    }

    public function orderan()
    {
        $data['active'] = 'orderan';
        return view('gudang/page/orderan', $data);
    }

    public function ro()
    {
        $data['active'] = 'ro';
        return view('gudang/page/ro', $data);
    }

    public function sale()
    {
        $data['active'] = 'sale';
        return view('gudang/page/sale', $data);
    }

    public function best_seller()
    {
        $data['active'] = 'best_seller';
        return view('gudang/page/best_seller', $data);
    }
    
        public function history()
        {
            $data['active'] = 'history';
            return view('gudang/page/history', $data);
        }

    public function profit()
    {
        $data['active'] = 'profit';
        return view('gudang/page/profit', $data);
    }

    public function laporan()
    {
        $data['active'] = 'laporan';
        return view('gudang/page/laporan', $data);
    }

    public function setting()
    {
        $data['active'] = 'setting';
        return view('gudang/page/setting', $data);
    }
}
