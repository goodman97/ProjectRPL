<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guru;
use App\Models\Labolatorium;
use App\Models\PermintaanJadwal;
Use App\Models\Jadwal;

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
            return view('guru.dashboardguru');
        } else {
            return back()->withErrors(['login' => 'Username atau Password salah.']);
        }
    }

    public function dashboard()
    {
        if (!session()->has('guru_id')) {
            return redirect('/login')->withErrors(['login' => 'Silakan login terlebih dahulu.']);
        }

        $guru = Guru::where('id_guru', session('guru_id'))->first();

        return view('guru.dashboardguru', compact('guru'));
    }

    public function inputJadwal(){
        if (!session()->has('guru_id')) {
            return redirect('/login')->withErrors(['login' => 'Silakan login terlebih dahulu.']);
        }

    $guru = Guru::with('mapel')->where('id_guru', session('guru_id'))->first();

    // Ambil semua ID mapel yang diampu guru
    $mapelIds = $guru->mapel->pluck('id_mapel');

    // Ambil semua jadwal yang terkait mapel itu
    $jadwals = \App\Models\Jadwal::whereIn('id_mapel', $mapelIds)->get();

    return view('guru.inputjadwalguru', compact('guru', 'jadwals'));
    }

    public function ajukanJadwal(Request $request){
        $request->validate([
            'id_mapel' => 'required',
            'id_kelas' => 'required',
            'hari' => 'required',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required'
        ]);

        PermintaanJadwal::create([
            'id_guru' => session('guru_id'),
            'id_mapel' => $request->id_mapel,
            'id_kelas' => $request->id_kelas,
            'hari' => $request->hari,
            'jam_mulai' => $request->jam_mulai,
            'jam_selesai' => $request->jam_selesai,
            'status' => 'Pending'
        ]);

        dd(PermintaanJadwal::latest()->first());
        return redirect()->back()->with('success', 'Permintaan jadwal telah dikirim.');
    }

    public function simpanPermintaan(Request $request){
        $request->validate([
            'id_mapel' => 'required',
            'id_kelas' => 'required',
            'hari' => 'required',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required'
        ]);

        PermintaanJadwal::create([
            'id_guru' => session('guru_id'),
            'id_mapel' => $request->id_mapel,
            'id_kelas' => $request->id_kelas,
            'hari' => $request->hari,
            'jam_mulai' => $request->jam_mulai,
            'jam_selesai' => $request->jam_selesai,
            'status' => 'Pending'
        ]);

        return back()->with('success', 'Permintaan jadwal berhasil diajukan.');
    }

    public function lihatJadwal(){
        $jadwals = Jadwal::where('id_guru', session('guru_id'))->where('status', 'Aktif')->get();
        $guru = Guru::where('id_guru', session('guru_id'))->first();
        
        return view('guru.lihatjadwalguru', compact('jadwals', 'guru'));
    }

    public function infoLab()
    {
        if (!session()->has('guru_id')) {
            return redirect('/login')->withErrors(['login' => 'Silakan login terlebih dahulu.']);
        }

        $guru = Guru::where('id_guru', session('guru_id'))->first();
        $labs = Labolatorium::all();

        return view('guru.lihatlabguru', compact('labs', 'guru'));
    }
    public function infoLaporan()
    {
        if (!session()->has('guru_id')) {
            return redirect('/login')->withErrors(['login' => 'Silakan login terlebih dahulu.']);
        }

        $guru = Guru::where('id_guru', session('guru_id'))->first();

        return view('guru.lihatlaporanguru', compact('guru'));
    }

    public function profil()
    {
        if (!session()->has('guru_id')) {
            return redirect('/login')->withErrors(['login' => 'Silakan login terlebih dahulu.']);
        }

        $guru = Guru::where('id_guru', session('guru_id'))->first();

        return view('guru.profileguru', compact('guru'));
    }

    public function editProfile()
    {
        if (!session()->has('guru_id')) return redirect('/login');
        $guru = Guru::where('id_guru', session('guru_id'))->first();
        return view('guru.editprofileguru', compact('guru'));
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $guru = Guru::where('id_guru', session('guru_id'))->first();
        $guru->email = $request->email;

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('foto_guru'), $filename);
            $guru->foto = $filename;
        }

        $guru->save();

        return redirect('/profileguru')->with('success', 'Profil berhasil diperbarui.');
    }

}