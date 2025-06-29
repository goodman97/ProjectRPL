<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;
use App\Models\Labolatorium;
use App\Models\Jadwal;
use App\Models\PermintaanJadwal;
use App\Models\LaporanPraktikum;

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

        $jadwals = PermintaanJadwal::with(['guru', 'mapel', 'kelas'])
            ->where('id_kelas', $siswa->id_kelas)
            ->orderByRaw("FIELD(hari, 'Senin','Selasa','Rabu','Kamis','Jumat')")
            ->orderBy('jam_mulai')
            ->get();

        return view('siswa.lihatjadwalsiswa', compact('jadwals', 'siswa'));
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

        $jadwals = Jadwal::with('mapel')
            ->where('id_kelas', $siswa->id_kelas)
            ->orderByRaw("FIELD(hari, 'Senin','Selasa','Rabu','Kamis','Jumat')")
            ->orderBy('jam_mulai')
            ->get();

        return view('siswa.buatlaporansiswa', compact('siswa', 'jadwals'));
    }

    public function uploadLaporan(Request $request){
        $request->validate([
        'hasil_praktikum' => 'required|mimes:pdf,doc,docx,ppt,pptx,xls,xlsx|max:2048',
        'id_jadwal' => 'required'
        ]);

        $siswaId = session('siswa_id');
        $file = $request->file('hasil_praktikum');
        $filename = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('laporan_siswa'), $filename);

        $total = LaporanPraktikum::where('id_jadwal', $request->id_jadwal)
                    ->where('id_siswa', $siswaId)->count();

        LaporanPraktikum::create([
            'hasil_praktikum' => $filename,
            'id_jadwal' => $request->id_jadwal,
            'id_siswa' => $siswaId,
            'catatan' => 'Laporan ke-' . ($total + 1),
            'tanggal' => now()
        ]);

        return back()->with('success', 'Laporan berhasil dikumpulkan!');
    }

    public function lihatLaporan()
    {
        if (!session()->has('siswa_id')) {
            return redirect('/login')->withErrors(['login' => 'Silakan login terlebih dahulu.']);
        }

        $siswa = Siswa::find(session('siswa_id'));

        $laporans = LaporanPraktikum::with('jadwal.mapel')
            ->where('id_siswa', $siswa->id_siswa)
            ->orderBy('tanggal', 'desc')
            ->get();

        return view('siswa.lihatlaporansiswa', compact('laporans', 'siswa'));
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