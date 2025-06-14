<?php

namespace App\Http\Controllers;

use App\Models\Program;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LitbangController extends Controller
{
    public function index()
    {
        $dataProgram = Program::selectRaw('status_usulan, COUNT(*) as total')
            ->groupBy('status_usulan')
            ->get();

        $dataMonev = Program::selectRaw('status_monev, COUNT(*) as total')
            ->groupBy('status_monev')
            ->get();
        return view('litbang.dashboard', compact('dataProgram','dataMonev'));
    }

    public function profile_index()
    {
        return view('litbang.profile_index');
    }

    public function profile_update(Request $request)
    {
        $user = Auth::user();

        $validated = $request->validate([
            'email' => 'required|email',
            'no_hp' => 'nullable|string|max:20',
            'alamat' => 'nullable|string',
            'jabatan' => 'nullable|string',
            'foto' => 'nullable|image|max:2048',
            'password' => 'nullable|string|min:8',
        ]);

        // Upload foto jika ada
        if ($request->hasFile('foto')) {
            $foto = $request->file('foto')->store('user_foto', 'public');
            $user->foto = $foto;
        }

        $user->email = $validated['email'];
        $user->no_hp = $validated['no_hp'] ?? $user->no_hp;
        $user->alamat = $validated['alamat'] ?? $user->alamat;
        $user->jabatan = $validated['jabatan'] ?? $user->jabatan;

        // Jika password tidak kosong, maka update password
        if (!empty($validated['password'])) {
            $user->password = Hash::make($validated['password']);
        }

        $user->save();

        return back()->with('success', 'Profil berhasil diperbarui.');
    }


}
