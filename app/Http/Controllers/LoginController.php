<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
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

        // Cek dari 3 tabel
        $siswa = DB::table('siswa')
            ->join('role', 'siswa.id_role', '=', 'role.id_role')
            ->where('siswa.username', $request->username)
            ->select('siswa.*', 'role.nama_role')
            ->first();

        $guru = DB::table('guru')
            ->join('role', 'guru.id_role', '=', 'role.id_role')
            ->where('guru.username', $request->username)
            ->select('guru.*', 'role.nama_role')
            ->first();

        $operator = DB::table('operator')
            ->join('role', 'operator.id_role', '=', 'role.id_role')
            ->where('operator.username', $request->username)
            ->select('operator.*', 'role.nama_role')
            ->first();

        $user = $siswa ?? $guru ?? $operator;

        if ($user && $user->password === $request->password) {
            // Simpan ke session
            $id = $user->id_siswa ?? $user->id_guru ?? $user->id_operator;
            Session::put('user_id', $id);
            Session::put('username', $user->username);
            Session::put('role', $user->nama_role);

            if ($user->nama_role === 'siswa') {
                Session::put('siswa_id', $id); // Tambahkan ini
                return redirect('dashboardsiswa');
            } elseif ($user->nama_role === 'guru') {
                Session::put('guru_id', $id);
                return redirect('dashboardguru');
            } elseif ($user->nama_role === 'operator') {
                 Session::put('operator_id', $id);
                return redirect('dashboardoperator');
            } else {
                return back()->withErrors(['login' => 'Role tidak dikenali.']);
            }
        }

        return back()->withErrors(['login' => 'Username atau Password salah.']);
    }

    public function logout()
    {
        Session::flush();
        return redirect('/login');
    }
}