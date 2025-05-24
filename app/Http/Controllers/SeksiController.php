<?php

namespace App\Http\Controllers;

use App\Models\Program;
use Illuminate\Http\Request;

class SeksiController extends Controller
{
    public function index()
    {
        return view('seksi.dashboard');
    }

    public function verifikasi_index()
    {
        
        $listProgram = Program::where('status_usulan', 'draft')->get();        
        return view('seksi.verifikasi',compact('listProgram'));
    }
}
