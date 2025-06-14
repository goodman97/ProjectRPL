<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;
use App\Models\Labolatorium;

class ControllerSiswa extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $siswa = Siswa::where('username', $request->username)->first();

        if ($siswa && $request->password == $siswa->password) {
            session([
                'siswa_id' => $siswa->id, 
                'nama_siswa' => $siswa->nama_siswa,
                'nis' => $siswa->nis
            ]);
            return view('siswa.dashboardsiswa');
        } else {
            return back()->withErrors(['login' => 'Username atau Password salah.']);
        }
    }

    public function dashboard()
    {
        if (!session()->has('siswa_id')) {
            return redirect('/login')->withErrors(['login' => 'Silakan login terlebih dahulu.']);
        }

        $siswa = Siswa::where('id_siswa', session('siswa_id'))->first();

        return view('siswa.dashboardsiswa', compact('siswa'));
    }

    public function lihatJadwal()
    {
        if (!session()->has('siswa_id')) {
            return redirect('/login')->withErrors(['login' => 'Silakan login terlebih dahulu.']);
        }

        $siswa = Siswa::where('id_siswa', session('siswa_id'))->first();

        return view('siswa.lihatjadwalsiswa', compact('siswa'));
    }

    public function infoLab()
    {
        if (!session()->has('siswa_id')) {
            return redirect('/login')->withErrors(['login' => 'Silakan login terlebih dahulu.']);
        }
        
        $siswa = Siswa::where('id_siswa', session('siswa_id'))->first();
        $labs = Labolatorium::all();

        return view('siswa.lihatlabsiswa', compact('labs', 'siswa'));
    }

    public function buatLaporan()
    {
        if (!session()->has('siswa_id')) {
            return redirect('/login')->withErrors(['login' => 'Silakan login terlebih dahulu.']);
        }

        $siswa = Siswa::where('id_siswa', session('siswa_id'))->first();

        return view('siswa.buatlaporansiswa', compact('siswa'));
    }

    public function lihatLaporan()
    {
        if (!session()->has('siswa_id')) {
            return redirect('/login')->withErrors(['login' => 'Silakan login terlebih dahulu.']);
        }

        $siswa = Siswa::where('id_siswa', session('siswa_id'))->first();

        return view('siswa.lihatlaporansiswa', compact('siswa'));
    }

    public function profil()
    {
        if (!session()->has('siswa_id')) {
            return redirect('/login')->withErrors(['login' => 'Silakan login terlebih dahulu.']);
        }

        $siswa = Siswa::where('id_siswa', session('siswa_id'))->first();
        
        return view('siswa.profilesiswa', compact('siswa'));
    }

    public function editProfile()
    {
        if (!session()->has('siswa_id')) return redirect('/login');
        $siswa = Siswa::where('id_siswa', session('siswa_id'))->first();
        return view('siswa.editprofilesiswa', compact('siswa'));
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $siswa = Siswa::where('id_siswa', session('siswa_id'))->first();
        $siswa->email = $request->email;

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('foto_siswa'), $filename);
            $siswa->foto = $filename;
        }

        $siswa->save();

        return redirect('/profilesiswa')->with('success', 'Profil berhasil diperbarui.');
    }
}