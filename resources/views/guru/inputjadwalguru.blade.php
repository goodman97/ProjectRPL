<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Input Jadwal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/guru/inputjadwalguru.css') }}">
</head>
<body>

<div class="container col-lg-4 mt-5">
    <div class="card mb-3">

        <!-- Foto Profile -->
        <a class="profile" href="{{ url('/profileguru') }}">
            <img src="{{ $guru->foto ? asset('foto_guru/' . $guru->foto) : asset('asset/default.png') }}" alt="Foto Guru" class="pf">
            <img src="{{ asset('asset/layerpf3.png') }}" alt="Logo" class="pflogo">
        </a>

        <!-- Daftar Jadwal Praktikum -->
        <div class="lab-list">
            @foreach($jadwals as $jadwal)
            <div class="lab-item">
                <img src="{{ asset('asset/' . $jadwal->gambar_jadwal) }}" alt="{{ $jadwal->nama_jadwal }}" class="lab-img">
                <div class="lab-detail">
                    <div class="lab-title">{{ $jadwal->nama_jadwal }}</div>
                    <div class="lab-time">
                        {{ $jadwal->hari }},
                        {{ \Carbon\Carbon::parse($jadwal->jam_mulai)->format('H.i') }}–{{ \Carbon\Carbon::parse($jadwal->jam_selesai)->format('H.i') }}
                    </div>
                    <div class="lab-status">Status: {{ $jadwal->status }}</div>
                </div>
                <div class="lab-action">
                    <button class="plus-btn">+</button>
                    <button class="minus-btn">−</button>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Navbar Bawah -->
        <nav class="navbar sticky-bottom navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <a class="nav-link" href="{{ url('/dashboardguru') }}">
                            <img src="{{ asset('asset/Vector1.png') }}" alt="Logo" class="logo">
                        </a>
                        <a class="nav-link" href="{{ url('/inputkelasguru') }}">
                            <img src="{{ asset('asset/Vector2.png') }}" alt="Logo" class="logo">
                        </a>
                        <a class="nav-link active" href="{{ url('/inputjadwalguru') }}">
                            <img src="{{ asset('asset/Vector3.png') }}" alt="Logo" class="logo">
                        </a>
                        <a class="nav-link" href="{{ url('/lihatlabguru') }}">
                            <img src="{{ asset('asset/VectorB4.png') }}" alt="Logo" class="logo">
                        </a>
                        <a class="nav-link" href="{{ url('/lihatlaporanguru') }}">
                            <img src="{{ asset('asset/Vector5.png') }}" alt="Logo" class="logo">
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
