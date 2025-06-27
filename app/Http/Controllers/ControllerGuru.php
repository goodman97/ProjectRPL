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
            
            return redirect()->route('dashboardguru'); // redirect bukan return view
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

    public function inputJadwal()
    {
        if (!session()->has('guru_id')) {
            return redirect('/login')->withErrors(['login' => 'Silakan login terlebih dahulu.']);
        }

        $guru = Guru::with('mapel')->where('id_guru', session('guru_id'))->first();

        // Ambil semua ID mapel yang diampu guru
        $mapelIds = $guru->mapel->pluck('id_mapel');

        // Ambil semua jadwal yang terkait mapel itu
        $jadwals = Jadwal::whereIn('id_mapel', $mapelIds)->get();

        // Cek apakah ada pengajuan permintaan jadwal untuk setiap jadwal
        foreach ($jadwals as $jadwal) {
            $permintaan = PermintaanJadwal::where([
                ['id_guru', session('guru_id')],
                ['id_mapel', $jadwal->id_mapel],
                ['id_kelas', $jadwal->id_kelas],
                ['hari', $jadwal->hari],
                ['jam_mulai', $jadwal->jam_mulai],
                ['jam_selesai', $jadwal->jam_selesai]
            ])->first();

            // Tambahkan properti dinamis
            $jadwal->status_permohonan = $permintaan->status ?? null;
            $jadwal->permintaan_id = $permintaan->id_permintaan ?? null;
        }

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

        return redirect()->back()->with('success', 'Permintaan jadwal telah dikirim.');
    }

    public function batalJadwal($id)
    {
        $jadwals = Jadwal::findOrFail($id);

        // Hanya bisa dibatalkan kalau masih "Menunggu"
        if ($jadwals->status === 'Menunggu') {
            $jadwals->status = null; // atau bisa juga 'Dibatalkan' atau hapus record, tergantung desain
            $jadwals->save();
            return redirect()->back()->with('success', 'Pengajuan jadwal berhasil dibatalkan.');
        }

        return redirect()->back()->with('error', 'Jadwal sudah tidak bisa dibatalkan.');
    }

    public function lihatJadwal(){
        $jadwals = Jadwal::with('mapel')->where('id_guru', session('guru_id'))->where('status', 'Aktif')->get();
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