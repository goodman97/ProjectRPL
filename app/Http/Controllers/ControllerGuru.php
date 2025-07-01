<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guru;
use App\Models\Labolatorium;
use App\Models\PermintaanJadwal;
Use App\Models\Jadwal;
use App\Models\LaporanPraktikum;

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
        $guruId = session('guru_id');

        $jadwals = Jadwal::where('id_guru', $guruId)
            ->with(['permintaan' => function ($query) use ($guruId) {
                $query->where('id_guru', $guruId)
                    ->orderByDesc('id_permintaan');
            }])->get();

        foreach ($jadwals as $jadwal) {
            $permintaan = $jadwal->permintaan;
            $jadwal->status_permohonan = $permintaan->status ?? null;
            $jadwal->permintaan_id = $permintaan->id_permintaan ?? null;
        }

        return view('guru.inputjadwalguru', compact('guru', 'jadwals'));
    }

    public function ajukanJadwal(Request $request){
        $request->validate([
            'id_mapel' => 'required',
            'id_kelas' => 'required',
            'id_jadwal' => 'required',
            'hari' => 'required',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required'
        ]);

        $cek = PermintaanJadwal::where([
            ['id_jadwal', '=', $request->id_jadwal],
            ['id_guru', '=', session('guru_id')],
        ])->whereIn('status', ['Pending', 'Diterima'])->exists();

        if ($cek) {
            return redirect()->back()->with('error', 'Permintaan jadwal ini masih dalam proses atau sudah disetujui.');
        }   

        $jadwals = Jadwal::find($request->id_jadwal);
        $gambar = $jadwals->gambar_jadwal ?? 'default.png';

        PermintaanJadwal::create([
            'id_guru' => session('guru_id'),
            'id_mapel' => $request->id_mapel,
            'id_kelas' => $request->id_kelas,
            'id_jadwal' => $request->id_jadwal,
            'hari' => $request->hari,
            'jam_mulai' => $request->jam_mulai,
            'jam_selesai' => $request->jam_selesai,
            'gambar_jadwal' => $gambar,
            'status' => 'Pending'
        ]);

        return redirect()->back()->with('success', 'Permintaan jadwal telah dikirim.');
    }

    public function batalJadwal($id)
    {
        $permintaan = PermintaanJadwal::findOrFail($id);

        if ($permintaan->status === 'Pending') {
            $permintaan->status = 'Dibatalkan';
            $permintaan->save();
            return redirect()->back()->with('success', 'Pengajuan jadwal berhasil dibatalkan.');
        }

        return redirect()->back()->with('error', 'Jadwal sudah tidak bisa dibatalkan.');
    }


    public function lihatJadwal()
    {
        if (!session()->has('guru_id')) {
            return redirect('/login')->withErrors(['login' => 'Silakan login terlebih dahulu.']);
        }

        $guru = Guru::where('id_guru', session('guru_id'))->first();

        $jadwals = PermintaanJadwal::with(['mapel', 'kelas'])
            ->where('id_guru', $guru->id_guru)
            ->where('status', 'Diterima')
            ->orderByRaw("FIELD(hari, 'Senin','Selasa','Rabu','Kamis','Jumat')")
            ->orderBy('jam_mulai')
            ->get();
        
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

        $guru = Guru::with('mapel')->find(session('guru_id'));

        $laporans = LaporanPraktikum::with(['siswa', 'jadwal.mapel'])
            ->whereHas('jadwal', function ($query) use ($guru) {
                $query->whereIn('id_mapel', $guru->mapel->pluck('id_mapel')->toArray());
            })
            ->orderBy('tanggal', 'desc')
            ->get();

        return view('guru.lihatlaporanguru', compact('laporans', 'guru'));
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