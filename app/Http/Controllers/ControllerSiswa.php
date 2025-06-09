<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;
use Illuminate\Support\Facades\Hash;

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
            return view('dashboardsiswa');
        } else {
            return back()->withErrors(['login' => 'Username atau Password salah.']);
        }
    }

    public function dashboard()
    {
        if (!session()->has('siswa_id')) {
            return redirect('/login')->withErrors(['login' => 'Silakan login terlebih dahulu.']);
        }

        return view('dashboardsiswa');
    }

}

