<?php

namespace App\Http\Controllers;

use App\Models\Monev;
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

        $listProgram = Program::where('status_usulan', 'Pending')->get();
        return view('subseksi.index_usulan', compact('listProgram', 'seksiList', 'subSeksiList'));
    }

    public function usulan_approve()
    {
        $listProgram = Program::where('status_usulan', 'Disetujui')->get();
        return view('subseksi.usulan_disetujui', compact('listProgram'));
    }

    public function usulan_rejected()
    {
        $listProgram = Program::where('status_usulan', 'Ditolak')->get();
        return view('subseksi.usulan_ditolak', compact('listProgram'));
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


    public function monev_index()
    {
        $listProgram = Program::where('status_usulan', 'Disetujui')
                                ->where('status_monev','Waiting')    
                                ->get();

        return view('subseksi.monev', compact('listProgram'));
    }

    public function monev_store(Request $request)
    {
        $request->validate([
            'program_id' => 'required|exists:program,id',
            'kesesuaian_waktu' => 'required|string',
            'realisasi_anggaran' => 'required|numeric',
            'tingkat_kes_anggaran' => 'required|string',
            'tingkat_par_jemaat' => 'required|string',
            'output_kegiatan' => 'required|string',
            'kendala' => 'nullable|string',
            'rencana_tin_lanjut' => 'nullable|string',
            'upload_laporan' => 'required|mimes:pdf|max:5120',
        ]);

        $path = $request->file('upload_laporan')->store('laporan_monev', 'public');

        Monev::create([
            'program_id' => $request->program_id,
            'kesesuaian_waktu' => $request->kesesuaian_waktu,
            'realisasi_anggaran' => $request->realisasi_anggaran,
            'tingkat_kes_anggaran' => $request->tingkat_kes_anggaran,
            'tingkat_par_jemaat' => $request->tingkat_par_jemaat,
            'output_kegiatan' => $request->output_kegiatan,
            'kendala' => $request->kendala,
            'rencana_tin_lanjut' => $request->rencana_tin_lanjut,
            'upload_laporan' => $path,
        ]);

        // Update status program menjadi sedang menunggu verifikasi monev
        Program::where('id', $request->program_id)->update([
            'status_monev' => 'Menunggu Verifikasi',
        ]);


        return back()->with('success', 'Laporan MONEV berhasil disimpan.');
    }

    public function monev_waiting()
    {
        $listMonev = Monev::with('Program')->get();
        return view('subseksi.monev_waiting', compact('listMonev'));

    }
}
