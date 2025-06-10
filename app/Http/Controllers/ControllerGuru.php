<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guru;

class ControllerGuru extends Controller
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

        $guru = Guru::where('username', $request->username)->first();

        if ($guru && $request->password == $guru->password) {
            session([
                'guru_id' => $guru->id, 
                'nama_guru' => $guru->nama_guru,
                'nip' => $guru->nip
            ]);
            return view('dashboardguru');
        } else {
            return back()->withErrors(['login' => 'Username atau Password salah.']);
        }
    }

    public function dashboard()
    {
        if (!session()->has('guru_id')) {
            return redirect('/login')->withErrors(['login' => 'Silakan login terlebih dahulu.']);
        }

        return view('dashboardguru');
    }

    public function inputKelas()
    {
        if (!session()->has('guru_id')) {
            return redirect('/login')->withErrors(['login' => 'Silakan login terlebih dahulu.']);
        }

        return view('inputkelasguru');
    }

    public function inputJadwal()
    {
        if (!session()->has('guru_id')) {
            return redirect('/login')->withErrors(['login' => 'Silakan login terlebih dahulu.']);
        }

        return view('inputjadwalguru');
    }
    public function infoLab()
    {
        if (!session()->has('guru_id')) {
            return redirect('/login')->withErrors(['login' => 'Silakan login terlebih dahulu.']);
        }

        return view('lihatlabguru');
    }
    public function infoLaporan()
    {
        if (!session()->has('guru_id')) {
            return redirect('/login')->withErrors(['login' => 'Silakan login terlebih dahulu.']);
        }

        return view('lihatlaporanguru');
    }

}