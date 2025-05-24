<?php

namespace App\Http\Controllers;

use App\Models\Program;
use App\Models\Seksi;
use App\Models\Sub_seksi;
use Illuminate\Http\Request;

class SubseksiController extends Controller
{
    public function index()
    {
        return view('subseksi.dashboard');
    }
    public function usulan_index()
    {

        $seksiList = Seksi::get();
        $subSeksiList = Sub_seksi::get();

        $listProgram = Program::where('status_usulan','draft')->get();
        return view('subseksi.index_usulan', compact('listProgram', 'seksiList', 'subSeksiList'));
    }
    public function usulan_store(Request $request)
    {
        $validated = $request->validate([
            'program_strategis' => 'required|string|max:255',
            'nama_kegiatan' => 'required|string|max:255',
            'seksi_id' => 'required|exists:seksi,id',
            'sub_seksi_id' => 'nullable|exists:sub_seksi,id',
            'indikator' => 'nullable|string',
            'biaya' => 'required|numeric',
            'tempat_kegiatan' => 'nullable|string',
            'waktu_mulai' => 'required|date',
            'waktu_selesai' => 'required|date|after_or_equal:waktu_mulai',
            'keterangan_waktu' => 'nullable|string',
            'keterangan' => 'nullable|string',
            'tahun' => 'required|integer',
            'tahun_renstra' => 'required|string|max:50',
        ]);

        Program::create($validated);

        return redirect()->back()->with('success', 'Data berhasil ditambahkan');
    }




    public function usulan_update(Request $request, $id)
    {
        $usulan = Program::findOrFail($id);

        $validated = $request->validate([
            'program_strategis' => 'required|string|max:255',
            'nama_kegiatan' => 'required|string|max:255',
            'seksi_id' => 'required|exists:seksi,id',
            'sub_seksi_id' => 'nullable|exists:sub_seksi,id',
            'indikator' => 'nullable|string',
            'biaya' => 'required|numeric',
            'tempat_kegiatan' => 'nullable|string',
            'waktu_mulai' => 'required|date',
            'waktu_selesai' => 'required|date|after_or_equal:waktu_mulai',
            'keterangan_waktu' => 'nullable|string',
            'keterangan' => 'nullable|string',
            'tahun' => 'required|integer',
            'tahun_renstra' => 'required|string|max:50',
        ]);

        $usulan->update($validated);

        return redirect()->back()->with('success', 'Data berhasil diupdate.');
    }

    public function usulan_destroy($id)
    {
        $usulan = Program::findOrFail($id);
        $usulan->delete();
        return redirect()->back()->with('success', 'Data berhasil dihapus.');
    }
}
