<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function home_page()
    {
        return view('pages.home');
    }
}
