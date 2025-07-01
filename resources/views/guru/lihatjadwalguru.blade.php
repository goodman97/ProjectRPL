<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Lihat Jadwal Guru</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link rel="stylesheet" href="{{ asset('css/guru/lihatjadwalguru.css') }}">
</head>
<body>

<div class="container col-lg-4 mt-5">
    <div class="card mb-3">
            <a class="profile" href="{{ url('/profileguru') }}">
                <img src="{{ $guru->foto ? asset('foto_guru/' . $guru->foto) : asset('asset/default.png') }}" alt="Foto Guru" class="pf">
                <img src="{{ asset('asset/layerpf3.png') }}" alt="Logo" class="pflogo">
            </a>

        <div class="jadwal-list">
            @forelse($jadwals as $jadwal)
                <div class="jadwal-item mb-4">
                <img src="{{ asset('asset/' . $jadwal->gambar_jadwal) }}" class="jadwal-img mb-2" alt="Gambar Jadwal">

                    <div class="jadwal-detail px-3 pb-2">
                        <p class="jadwal-title fw-bold">{{ $jadwal->mapel->nama_mapel }}</p>
                        <p class="jadwal-sub mb-1">Kelas: {{ $jadwal->kelas->nama_kelas }}</p>
                        <p class="jadwal-time mb-0">
                            {{ $jadwal->hari }}, 
                            {{ \Carbon\Carbon::parse($jadwal->jam_mulai)->format('H.i') }}–{{ \Carbon\Carbon::parse($jadwal->jam_selesai)->format('H.i') }}
                        </p>
                    </div>
                </div>
            @empty
                <p class="text-center">Belum ada jadwal yang disetujui.</p>
            @endforelse
        </div>

        <nav class="navbar sticky-bottom navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <a class="nav-link" href="{{ url('/dashboardguru') }}">
                            <img src="{{ asset('asset/Vector1.png') }}" alt="Dashboard" class="logo">
                        </a>
                        <a class="nav-link" href="{{ url('/inputjadwalguru') }}">
                            <img src="{{ asset('asset/Vector2.png') }}" alt="Kelas" class="logo">
                        </a>
                        <a class="nav-link active" href="{{ url('/lihatjadwalguru') }}">
                            <img src="{{ asset('asset/VectorB3.png') }}" alt="Jadwal" class="logo">
                        </a>
                        <a class="nav-link" href="{{ url('/lihatlabguru') }}">
                            <img src="{{ asset('asset/Vector4.png') }}" alt="Lihat Jadwal" class="logo">
                        </a>
                        <a class="nav-link" href="{{ url('/lihatlaporanguru') }}">
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