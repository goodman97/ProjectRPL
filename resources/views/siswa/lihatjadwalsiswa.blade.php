<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Lihat Jadwal Siswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link rel="stylesheet" href="{{ asset('css/siswa/lihatjadwalsiswa.css') }}">
</head>
<body>
    <div class="container col-lg-4 mt-5">
        <div class="card mb-3">
            <a class="profile" href="{{ url('/profilesiswa') }}">
                <img src="{{ $siswa->foto ? asset('foto_siswa/' . $siswa->foto) : asset('asset/default.png') }}" alt="Foto Siswa" class="pf">
                <img src="{{ asset('asset/layerpf3.png') }}" alt="Logo" class="pflogo">
            </a>

            <div class="jadwal-list">
                @forelse ($jadwals as $jadwal)
                    <div class="jadwal-card mb-4">
                        <img src="{{ asset('asset/' . $jadwal->gambar_jadwal) }}" class="jadwal-img mb-2" alt="Gambar Jadwal">
                        <div class="jadwal-info px-3 pb-2">
        
                                <strong>{{ $jadwal->mapel->nama_mapel }}</strong>
                                Guru: {{ $jadwal->guru->nama ?? '-' }}<br>
                                Kelas: {{ $jadwal->kelas->nama_kelas ?? '-' }}<br>
                                {{ $jadwal->hari }}, {{ \Carbon\Carbon::parse($jadwal->jam_mulai)->format('H:i') }}–{{ \Carbon\Carbon::parse($jadwal->jam_selesai)->format('H:i') }}
                        </div>
                    </div>
                @empty
                    <p class="text-center">Belum ada jadwal untuk kelas Anda.</p>
                @endforelse
            </div>

            <nav class="navbar sticky-bottom navbar-expand-lg bg-body-tertiary mt-3">
                <div class="container-fluid">
                    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                        <div class="navbar-nav">
                            <a class="nav-link" href="{{ url('/dashboardsiswa') }}">
                                <img src="{{ asset('asset/Vector1.png') }}" alt="Dashboard" class="logo">
                            </a>
                            <a class="nav-link active" href="{{ url('/lihatjadwalsiswa') }}">
                                <img src="{{ asset('asset/VectorB3.png') }}" alt="Jadwal" class="logo">
                            </a>
                            <a class="nav-link" href="{{ url('/lihatlabsiswa') }}">
                                <img src="{{ asset('asset/Vector4.png') }}" alt="Lab" class="logo">
                            </a>
                            <a class="nav-link" href="{{ url('/buatlaporansiswa') }}">
                                <img src="{{ asset('asset/Vector6.png') }}" alt="Input Laporan" class="logo">
                            </a>
                            <a class="nav-link" href="{{ url('/lihatlaporansiswa') }}">
                                <img src="{{ asset('asset/Vector5.png') }}" alt="Laporan" class="logo">
                            </a>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
