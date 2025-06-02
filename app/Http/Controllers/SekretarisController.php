<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SekretarisController extends Controller
{
    public function index()
    {
        return view('sekretaris.dashboard');
    }

    public function program_index()
    {
        return view('sekretaris.program_index');
    }

    public function profile_index()
    {
        return view('sekretaris.profile_index');
    }

    
}
