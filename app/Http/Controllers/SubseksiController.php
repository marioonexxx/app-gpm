<?php

namespace App\Http\Controllers;

use App\Models\Monev;
use App\Models\Periode_renstra;
use App\Models\Periode_tahun;
use App\Models\Program;
use App\Models\Program_strategis;
use App\Models\Seksi;
use App\Models\Sub_seksi;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SubseksiController extends Controller
{
    public function index()
    {
        
        $dataProgram = Program::selectRaw('status_usulan, COUNT(*) as total')
            ->where('seksi_id', Auth::user()->seksi_id)
            ->where('sub_seksi_id', Auth::user()->sub_seksi_id)
            ->groupBy('status_usulan')
            ->get();


        $dataMonev = Program::selectRaw('status_monev, COUNT(*) as total')
            ->groupBy('status_monev')
            ->where('seksi_id', Auth::user()->seksi_id)
            ->where('sub_seksi_id', Auth::user()->sub_seksi_id)
            ->get();

        return view('subseksi.dashboard', compact('dataProgram', 'dataMonev'));
    }
    public function usulan_index()
    {
        // dd(Auth::user()->sub_seksi_id);

        $seksiList = Seksi::where('id', Auth::user()->seksi_id)->get();
        $subSeksiList = Sub_seksi::where('id', Auth::user()->sub_seksi_id)->get();
        $listProgramStrategis = Program_strategis::get();

        //ambil periode renstra aktif
        $periodeAktif = Periode_renstra::where('status', 1)->value('nama_periode');
        $tahunAktif = Periode_tahun::where('status', 1)->value('nama_tahun');

        $listProgram = Program::where('status_usulan', '1')
            ->where('sub_seksi_id', Auth::user()->sub_seksi_id)
            ->where('tahun', $tahunAktif)
            ->where('tahun_renstra', $periodeAktif)
            ->get();

        return view('subseksi.usulan_index', compact('listProgram', 'seksiList', 'subSeksiList', 'listProgramStrategis', 'periodeAktif', 'tahunAktif'));
    }

    public function usulan_pra()
    {
        //ambil periode renstra aktif
        $periodeAktif = Periode_renstra::where('status', 1)->value('nama_periode');
        $tahunAktif = Periode_tahun::where('status', 1)->value('nama_tahun');

        $listProgram = Program::where('status_usulan', '2')
         ->where('sub_seksi_id', Auth::user()->sub_seksi_id)
            ->where('tahun', $tahunAktif)
            ->where('tahun_renstra', $periodeAktif)
            ->get();
        return view('subseksi.usulan_prasidang', compact('listProgram'));
    }

    public function usulan_approve()
    {
        //ambil periode renstra aktif
        $periodeAktif = Periode_renstra::where('status', 1)->value('nama_periode');
        $tahunAktif = Periode_tahun::where('status', 1)->value('nama_tahun');

        $listProgram = Program::where('status_usulan', '3')       
            ->where('sub_seksi_id', Auth::user()->sub_seksi_id)
            ->where('tahun', $tahunAktif)
            ->where('tahun_renstra', $periodeAktif)
            ->get();
        return view('subseksi.usulan_disetujui', compact('listProgram'));
    }

    public function usulan_rejected()
    {
        //ambil periode renstra aktif
        $periodeAktif = Periode_renstra::where('status', 1)->value('nama_periode');
        $tahunAktif = Periode_tahun::where('status', 1)->value('nama_tahun');
        
        $listProgram = Program::where('status_usulan', '4')
            ->where('sub_seksi_id', Auth::user()->sub_seksi_id)
            ->where('tahun', $tahunAktif)
            ->where('tahun_renstra', $periodeAktif)
            ->get();
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
            'kelompok_sasaran' => 'nullable|string',
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
            'kelompok_sasaran' => 'required|string',
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
        $listProgram = Program::where('status_usulan', '3')
            ->where('status_monev', '1')
            ->get();

        return view('subseksi.monev_input', compact('listProgram'));
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
            'status_monev' => '2',
        ]);


        return back()->with('success', 'Laporan MONEV berhasil disimpan.');
    }

    public function monev_waiting()
    {
        $listMonev = Monev::with('Program')
            ->whereHas('Program', function ($query) {
                $query->where('status_usulan', '3')
                    ->where('status_monev', '2');
            })
            ->get();

        return view('subseksi.monev_waiting', compact('listMonev'));
    }

    public function monev_verifikasi()
    {
        $listMonev = Monev::with('Program')->get();
        return view('subseksi.monev_waiting', compact('listMonev'));
    }

    public function monev_revisi_input()
    {
        $listMonev = Monev::with('Program')
            ->whereHas('Program', function ($query) {
                $query->where('status_usulan', '3')
                    ->where('status_monev', '4');
            })
            ->get();

        return view('subseksi.monev_revisi_input', compact('listMonev'));
    }

    public function monev_approve()
    {
        $listMonev = Monev::with('Program')
            ->whereHas('Program', function ($query) {
                $query->where('status_usulan', '3')
                    ->where('status_monev', '3');
            })
            ->get();

        return view('subseksi.monev_disetujui', compact('listMonev'));
    }

    public function monev_update_revisi(Request $request, $id)
    {
        $data = $request->validate([
            'kesesuaian_waktu' => 'required|string',
            'realisasi_anggaran' => 'required|numeric',
            'tingkat_kes_anggaran' => 'required|string',
            'tingkat_par_jemaat' => 'required|string',
            'output_kegiatan' => 'required|string',
            'kendala' => 'required|string',
            'rencana_tin_lanjut' => 'required|string',
            'upload_laporan' => 'nullable|file|mimes:pdf|max:5120',
        ]);

        $monev = Monev::findOrFail($id);

        if ($request->hasFile('upload_laporan')) {
            $data['upload_laporan'] = $request->file('upload_laporan')->store('laporan', 'public');
        }

        $monev->update($data);

        // ✅ Update langsung ke tabel programs
        DB::table('program')->where('id', $monev->program_id)->update(['status_monev' => 2]);


        return redirect()->back()->with('success', 'Data MONEV berhasil diperbarui');
    }

    // MANAGE PROFIL AKUN
    public function profile_index()
    {
        return view('subseksi.profile_index');
    }

    // PRINT PDF

    public function printpdf_usulan()
    {
        $seksiList = Seksi::where('id', Auth::user()->seksi_id)->get();
        $subSeksiList = Sub_seksi::where('id', Auth::user()->sub_seksi_id)->get();
        $listProgramStrategis = Program_strategis::get();

        //ambil periode renstra aktif
        $periodeAktif = Periode_renstra::where('status', 1)->value('nama_periode');
        $tahunAktif = Periode_tahun::where('status', 1)->value('nama_tahun');

        $listProgram = Program::where('status_usulan', '1')
            ->where('sub_seksi_id', Auth::user()->sub_seksi_id)
            ->get();

        $pdf = Pdf::loadView('print.subseksi.usulan_subseksi', compact('listProgram'))
            ->setPaper('A4', 'landscape');
        return $pdf->stream('Usulan-Kegiatan.pdf');
    }
}
