<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Input Jadwal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
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
        <div class="jadwal-list">
            @foreach($jadwals as $jadwal)
                <div class="jadwal-item">
                    <img src="{{ asset('asset/gambar_jadwal/' . $jadwal->gambar_jadwal) }}" alt="{{ $jadwal->nama_jadwal }}" class="jadwal-img">

                    <div class="jadwal-detail">
                        <div class="jadwal-title">{{ $jadwal->nama_jadwal }}</div>
                        <div class="jadwal-time">
                            {{ $jadwal->hari }},
                            {{ \Carbon\Carbon::parse($jadwal->jam_mulai)->format('H.i') }}–{{ \Carbon\Carbon::parse($jadwal->jam_selesai)->format('H.i') }}
                        </div>
                        <div class="jadwal-status">
                            Status: {{ $jadwal->status_permohonan ?? 'Belum Diajukan' }}
                        </div>

                    </div>

                    <div class="jadwal-action">
                        @if (in_array($jadwal->status_permohonan, [null, 'Ditolak', 'Dibatalkan']))
                            <form action="{{ route('guru.ajukanJadwal') }}" method="POST">
                                @csrf
                                <input type="hidden" name="id_jadwal" value="{{ $jadwal->id_jadwal }}">
                                <input type="hidden" name="id_mapel" value="{{ $jadwal->id_mapel }}">
                                <input type="hidden" name="id_kelas" value="{{ $jadwal->id_kelas }}">
                                <input type="hidden" name="id_jadwal" value="{{ $jadwal->id_jadwal }}">
                                <input type="hidden" name="hari" value="{{ $jadwal->hari }}">
                                <input type="hidden" name="jam_mulai" value="{{ $jadwal->jam_mulai }}">
                                <input type="hidden" name="jam_selesai" value="{{ $jadwal->jam_selesai }}">
                                <button type="submit" class="plus-btn">+</button>
                            </form>
                        @elseif ($jadwal->status_permohonan === 'Pending')
                            <form action="{{ route('guru.batalJadwal', $jadwal->permintaan_id) }}" method="POST" onsubmit="return confirm('Batalkan pengajuan jadwal ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="minus-btn">−</button>
                            </form>
                        @else
                            <button class="minus-btn" disabled>−</button>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>

        <nav class="navbar sticky-bottom navbar-expand-lg bg-body-tertiary">
                <div class="container-fluid">
                    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                        <div class="navbar-nav">
                            <a class="nav-link" href="{{ url('/dashboardguru') }}">
                                <img src="{{ asset('asset/Vector1.png') }}" alt="Logo" class="logo">
                            </a>
                            <a class="nav-link" href="{{ url('/inputjadwalguru') }}">
                                <img src="{{ asset('asset/VectorB2.png') }}" alt="Logo" class="logo">
                            </a>
                            <a class="nav-link" href="{{ url('/lihatjadwalguru') }}">
                                <img src="{{ asset('asset/Vector3.png') }}" alt="Logo" class="logo">
                            </a>
                            <a class="nav-link active" href="{{ url('/lihatlabguru') }}">
                                <img src="{{ asset('asset/Vector4.png') }}" alt="Logo" class="logo">
                            </a>
                            <a class="nav-link" href="{{ url('/lihatlaporanguru') }}">
                                <img src="{{ asset('asset/Vector5.png') }}" alt="Logo" class="logo">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </nav>

    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
