<?php

namespace App\Http\Controllers;

use App\Models\Program;
use Illuminate\Http\Request;

class SeksiController extends Controller
{
    public function index()
    {
        $countProgram = Program::count();
        return view('seksi.dashboard', compact('countProgram'));
        

    }

    public function verifikasi_index()
    {

        $listProgram = Program::where('status_usulan', 'Pending')->get();
        return view('seksi.verifikasi', compact('listProgram'));
    }
    public function verifikasi_ditolak_index()
    {

        $listProgram = Program::where('status_usulan', 'Ditolak')->get();
        return view('seksi.verifikasi_disetujui', compact('listProgram'));
    }
    public function verifikasi_disetujui_index()
    {

        $listProgram = Program::where('status_usulan', 'Disetujui')->get();
        return view('seksi.verifikasi_disetujui', compact('listProgram'));
    }

    public function verifikasi_update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'status_usulan' => 'required|in:Pending,Disetujui,Ditolak',
        ]);

        // Cari data program berdasarkan ID
        $program = Program::findOrFail($id);

        // Update status usulan
        $program->status_usulan = $request->input('status_usulan');
        $program->save();

        // Redirect balik dengan pesan sukses
        return redirect()->back()->with('success', 'Status usulan berhasil diperbarui.');
    }

    public function monev_index()
    {
        
    }
}
