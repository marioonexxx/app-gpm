<?php

namespace App\Http\Controllers;

use App\Models\Monev;
use App\Models\Periode_renstra;
use App\Models\Periode_tahun;
use App\Models\Program;
use App\Models\Program_strategis;
use App\Models\Seksi;
use App\Models\Sub_seksi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SekretarisController extends Controller
{
    public function index()
    {

        $dataProgram = Program::selectRaw('status_usulan, COUNT(*) as total')
            ->groupBy('status_usulan')
            ->get();

        $dataMonev = Program::selectRaw('status_monev, COUNT(*) as total')
            ->groupBy('status_monev')
            ->get();

        return view('sekretaris.dashboard', compact('dataProgram', 'dataMonev'));
    }

    public function program_index()
    {
        $seksiList = Seksi::get();
        $subSeksiList = Sub_seksi::get();

        $listProgram = Program::where('status_usulan', '1')->get();
        return view('sekretaris.program_usulan_index', compact('listProgram', 'seksiList', 'subSeksiList'));
    }

    public function program_prasidang_index()
    {
        $seksiList = Seksi::get();
        $subSeksiList = Sub_seksi::get();

        $listProgram = Program::where('status_usulan', '2')->get();
        return view('sekretaris.program_prasidang_index', compact('listProgram', 'seksiList', 'subSeksiList'));
    }

    public function program_penetapan_index()
    {
        $seksiList = Seksi::get();
        $subSeksiList = Sub_seksi::get();

        $listProgram = Program::where('status_usulan', '3')->get();
        return view('sekretaris.program_penetapan_index', compact('listProgram', 'seksiList', 'subSeksiList'));
    }

    public function program_ditolak_index()
    {
        $seksiList = Seksi::get();
        $subSeksiList = Sub_seksi::get();

        $listProgram = Program::where('status_usulan', '4')->get();
        return view('sekretaris.program_usulan_ditolak', compact('listProgram', 'seksiList', 'subSeksiList'));
    }



    public function profile_index()
    {
        return view('sekretaris.profile_index');
    }


    public function pengaturan_periode_renstra()
    {

        $listPeriode = Periode_renstra::all();

        return view('sekretaris.pengaturan_periode_renstra', compact('listPeriode'));
    }

    public function periode_renstra_store(Request $request)
    {
        $request->validate([
            'nama_periode' => 'required|string|max:255',
            'status' => 'required|in:0,1',
        ]);

        Periode_renstra::create([
            'nama_periode' => $request->nama_periode,
            'status' => $request->status,
        ]);
        return redirect()->back()->with('success', 'Data berhasil ditambahkan');
    }

    public function periode_renstra_update(Request $request, $id)
    {
        $request->validate([
            'nama_periode' => 'required|string|max:255',
            'status' => 'required|in:0,1',
        ]);
        $periode = Periode_renstra::findOrFail($id);
        $periode->update([
            'nama_periode' => $request->nama_periode,
            'status' => $request->status,
        ]);
        return redirect()->back()->with('success', 'Data berhasil diupdate.');
    }

    public function periode_renstra_destroy($id)
    {
        $periode = Periode_renstra::findOrFail($id);
        $periode->delete();
        return redirect()->back()->with('success', 'Data berhasil dihapus.');
    }

    public function periode_renstra_aktif($id)
    {
        DB::table('periode_renstra')->update(['status' => 0]);
        Periode_renstra::where('id', $id)->update(['status' => 1]);
        return redirect()->back()->with('success', 'Periode Renstra berhasil diaktifkan.');
    }

    public function pengaturan_periode_tahun()
    {
        $listTahun = Periode_tahun::all();
        return view('sekretaris.pengaturan_tahun', compact('listTahun'));
    }
    public function periode_tahun_store(Request $request)
    {
        $request->validate([
            'nama_tahun' => 'required|string|max:255',
            'status' => 'required|in:0,1',
        ]);

        Periode_tahun::create([
            'nama_tahun' => $request->nama_tahun,
            'status' => $request->status,
        ]);
        return redirect()->back()->with('success', 'Data berhasil ditambahkan');
    }

    public function periode_tahun_update(Request $request, $id)
    {
        $request->validate([
            'nama_tahun' => 'required|string|max:255',
            'status' => 'required|in:0,1',
        ]);
        $periode = Periode_tahun::findOrFail($id);
        $periode->update([
            'nama_tahun' => $request->nama_tahun,
            'status' => $request->status,
        ]);
        return redirect()->back()->with('success', 'Data berhasil diupdate.');
    }

    public function periode_tahun_destroy($id)
    {
        $periode = Periode_tahun::findOrFail($id);
        $periode->delete();
        return redirect()->back()->with('success', 'Data berhasil dihapus.');
    }

    public function periode_tahun_aktif($id)
    {
        DB::table('periode_tahun')->update(['status' => 0]);
        Periode_tahun::where('id', $id)->update(['status' => 1]);
        return redirect()->back()->with('success', 'Periode Tahun berhasil diaktifkan.');
    }

    public function program_strategis()
    {
        $listProgram = Program_strategis::all();
        return view('sekretaris.programstrategis', compact('listProgram'));
    }

    public function program_strategis_store(Request $request)
    {
        $request->validate([
            'nama_program' => 'required|string|max:255',
            'periode_renstra' => 'required|string|max:255',
        ]);

        Program_strategis::create([
            'nama_program' => $request->nama_program,
            'periode_renstra' => $request->periode_renstra,
        ]);

        return back()->with('success', 'Data berhasil ditambahkan.');
    }

    public function program_stretegis_update(Request $request, $id) 
    {

        // dd($request->all());
        $request->validate([
            'nama_program' => 'required|string|max:255',
            'periode_renstra' => 'required|string|max:255',
        ]);

        $program = Program_strategis::findOrFail($id);
        $program->update([
            'nama_program' => $request->nama_program,
            'periode_renstra' => $request->periode_renstra,
        ]);

        return back()->with('success', 'Data berhasil diupdate.');
    }

    public function program_strategis_destroy($id) 
    {
        $program_strategis = Program_strategis::findOrFail($id);
        $program_strategis->delete();

        return back()->with('success', 'Program Strategis berhasil dihapus.');
    }

    public function monev_index()
    {
        $listProgram = Program::where('status_usulan', '3')
            ->where('status_monev', '1')
            ->get();
        return view('sekretaris.monev_input_index', compact('listProgram'));
    }

    public function monev_wait_verifikasi()
    {
        $listMonev = Monev::with('Program')
            ->whereHas('Program', function ($query) {
                $query->where('status_usulan', '3')
                    ->where('status_monev', '2');
            })
            ->get();

        return view('sekretaris.monev_wait_verifikasi', compact('listMonev'));
    }

    public function monev_terverifikasi()
    {
        $listMonev = Monev::with('Program')
            ->whereHas('Program', function ($query) {
                $query->where('status_usulan', '3')
                    ->where('status_monev', '3');
            })
            ->get();

        return view('sekretaris.monev_terverifikasi', compact('listMonev'));
    }

    public function monev_revisi()
    {
        $listMonev = Monev::with('Program')
            ->whereHas('Program', function ($query) {
                $query->where('status_usulan', '3')
                    ->where('status_monev', '4');
            })
            ->get();

        return view('sekretaris.monev_revisi', compact('listMonev'));
    }

    public function manajemen_akun()
    {
        $listUsersSeksi = User::with(['seksi'])->whereIn('role', [1, 2])->get();

        $listSeksi = Seksi::all();
        $listSubSeksi = Sub_seksi::all();

        return view('sekretaris.pengaturan_akun', compact('listUsersSeksi', 'listSeksi', 'listSubSeksi'));
    }

    public function manajemen_akun_store(Request $request)
    {

        //dd($request->all());

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'no_hp' => 'nullable|string|max:20',
            'alamat' => 'nullable|string|max:255',
            'role' => 'required|in:1,2',
            'seksi_id' => 'nullable|exists:seksi,id',
            'sub_seksi_id' => 'nullable|exists:sub_seksi,id',
            'password' => 'required|string|min:6',
        ]);


        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
            'role' => $request->role,
            'seksi_id' => $request->seksi_id,
            'sub_seksi_id' => $request->sub_seksi_id, // ✅ tambahkan ini
            'password' => $request->password,
        ]);

        return redirect()->back()->with('success', 'Data berhasil ditambahkan.');
    }


    public function manajemen_akun_update(Request $request, $id)
    {
        $request->validate([
            'name'       => 'required|string|max:255',
            'email'      => 'required|email',
            'no_hp'      => 'nullable|string|max:20',
            'alamat'     => 'nullable|string|max:255',
            'role'       => 'required|in:1,2',
            'seksi_id'   => 'nullable|exists:seksi,id',
            'sub_seksi_id' => 'nullable|exists:sub_seksi,id',
            'password'   => 'nullable|string|min:6',
        ]);

        $user = User::findOrFail($id);

        $dataUpdate = [
            'name' => $request->name,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
            'role' => $request->role,
            'seksi_id' => $request->seksi_id,
            'sub_seksi_id' => $request->role == 2 ? $request->sub_seksi_id : null,
        ];

        if ($request->filled('password')) 
        {           
            $dataUpdate['password'] = $request->password;
        }

        $user->update($dataUpdate);

        return redirect()->back()->with('success', 'Data berhasil diperbarui.');
    }

    public function manajemen_akun_destory($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->back()->with('success', 'Data berhasil dihapus.');
    }
}
