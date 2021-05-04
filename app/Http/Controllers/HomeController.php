<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $active = "home";
        return view(
            'frontend/page/home',
            [
                'active' => $active
            ]
        );
    }

    public function about()
    {
        $active = "about";
        return view(
            'frontend/page/about',
            [
                'active' => $active
            ]
        );
    }

    public function product()
    {
        $active = "product";
        return view(
            'frontend/page/product',
            [
                'active' => $active
            ]
        );
    }

    public function partnership()
    {
        $active = "partnership";
        return view(
            'frontend/page/partnership',
            [
                'active' => $active
            ]
        );
    }

    public function contact()
    {
        $active = "contact";
        return view(
            'frontend/page/contact',
            [
                'active' => $active
            ]
        );
    }
}
