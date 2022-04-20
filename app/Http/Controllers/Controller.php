<?php

namespace App\Http\Controllers;

class Controller
{
    public function dashboard(){
        return view('admin.dashboard');
    }
    
    public function dashboard_dark(){
        return view('admin.dashboard_dark');
    }
}
