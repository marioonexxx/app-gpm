<?php

namespace App\Http\Controllers;

use App\Models\Monev;
use App\Models\Periode_renstra;
use App\Models\Periode_tahun;
use App\Models\Program;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SeksiController extends Controller
{
    public function index()
    {
        $dataProgram = Program::selectRaw('status_usulan, COUNT(*) as total')
            ->where('seksi_id', Auth::user()->seksi_id)           
            ->groupBy('status_usulan')
            ->get();


        $dataMonev = Program::selectRaw('status_monev, COUNT(*) as total')
            ->groupBy('status_monev')
            ->where('seksi_id', Auth::user()->seksi_id)            
            ->get();

        return view('seksi.dashboard', compact('dataProgram', 'dataMonev'));
    }

    public function verifikasi_index()
    {
        //ambil periode renstra dan tahun aktif
        $periodeAktif = Periode_renstra::where('status', 1)->value('nama_periode');
        $tahunAktif = Periode_tahun::where('status', 1)->value('nama_tahun');

        $listProgram = Program::where('status_usulan', '1')
            ->where('seksi_id', Auth::user()->seksi_id)
            ->where('tahun', $tahunAktif)
            ->where('tahun_renstra', $periodeAktif)
            ->get();

        return view('seksi.verifikasi', compact('listProgram'));
    }

    public function verifikasi_prasidang_index()
    {
        //ambil periode renstra dan tahun aktif
        $periodeAktif = Periode_renstra::where('status', 1)->value('nama_periode');
        $tahunAktif = Periode_tahun::where('status', 1)->value('nama_tahun');


        $listProgram = Program::where('status_usulan', '2')
            ->where('seksi_id', Auth::user()->seksi_id)
            ->where('tahun', $tahunAktif)
            ->where('tahun_renstra', $periodeAktif)
            ->get();
        return view('seksi.verifikasi_prasidang', compact('listProgram'));
    }
    public function verifikasi_ditolak_index()
    {
         //ambil periode renstra dan tahun aktif
        $periodeAktif = Periode_renstra::where('status', 1)->value('nama_periode');
        $tahunAktif = Periode_tahun::where('status', 1)->value('nama_tahun');


        $listProgram = Program::where('status_usulan', '4')
            ->where('seksi_id', Auth::user()->seksi_id)
            ->where('tahun', $tahunAktif)
            ->where('tahun_renstra', $periodeAktif)
            ->get();

        return view('seksi.verifikasi_ditolak', compact('listProgram'));
    }
    public function verifikasi_disetujui_index()
    {

        //ambil periode renstra dan tahun aktif
        $periodeAktif = Periode_renstra::where('status', 1)->value('nama_periode');
        $tahunAktif = Periode_tahun::where('status', 1)->value('nama_tahun');

        $listProgram = Program::where('status_usulan', '3')
            ->where('seksi_id', Auth::user()->seksi_id)
            ->where('tahun', $tahunAktif)
            ->where('tahun_renstra', $periodeAktif)
            ->get();
        return view('seksi.verifikasi_disetujui', compact('listProgram'));
    }

    public function verifikasi_update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'status_usulan' => 'required|in:2,3,4',
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
        $listMonev = Monev::with('Program')
            ->whereHas('Program', function ($query) {
                $query->where('status_usulan', '3')
                    ->where('status_monev', '2');
            })
            ->get();


        return view('seksi.monev_index', compact('listMonev'));
    }

    public function monev_verif_index()
    {
        $listMonev = Monev::with('Program')
            ->whereHas('Program', function ($query) {
                $query->where('status_usulan', '3')
                ->where('status_monev', '3');
            })
            ->get();

        return view('seksi.monev_verifikasi_disetujui', compact('listMonev'));
    }
    public function monev_verifikasi($id)
    {
        // Update program terkait
        $program = Program::findOrFail($id);
        $program->status_monev = 3;
        $program->save();
        return redirect()->back()->with('success', 'Status Monev berhasil diverifikasi.');
    }

    public function monev_verifikasi_revisi($id)
    {
        // Update program terkait
        $program = Program::findOrFail($id);
        $program->status_monev = 4;
        $program->save();
        return redirect()->back()->with('success', 'Laporan telah dikembalikan untuk direvisi.');
    }

    public function monev_input_revisi(Request $request)
    {
        $request->validate([
            'program_id' => 'required|exists:program,id',
            'monev_revisi' => 'required|string',
        ]);

        $program = Program::findOrFail($request->program_id);
        $program->status_monev = 4; // Kembali ke 'Menunggu Laporan'
        $program->monev_revisi = $request->monev_revisi;
        $program->save();

        return redirect()->back()->with('success', 'Laporan dan Catatan Revisi berhasil diupdate.');
    }

    public function monev_revisi_index()
    {
         $listMonev = Monev::with('Program')
            ->whereHas('Program', function ($query) {
                $query->where('status_usulan', '3')
                    ->where('status_monev', '4');
            })
            ->get();


        return view('seksi.monev_revisi_index', compact('listMonev'));
    }

    public function profile_index()
    {
        return view('seksi.profile_index');
    }
}
