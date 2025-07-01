<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link rel="stylesheet" href="{{ asset('css/guru/lihatlaporanguru.css') }}">
    <title>Lihat Laporan</title>
</head>
<body>
    <div class="container col-lg-4 mt-5">
        <div class="card mb-3">
            <a class="profile" href="{{ url('/profileguru') }}">
                <img src="{{ $guru->foto ? asset('foto_guru/' . $guru->foto) : asset('asset/default.png') }}" alt="Foto Guru" class="pf">
                <img src="{{ asset('asset/layerpf3.png') }}" alt="Logo" class="pflogo">
            </a>

                <div class="laporan-box">
                @foreach($laporans as $laporan)
                    <div class="laporan-item d-flex align-items-center">
                        <img src="{{ asset('asset/' . ($laporan->jadwal->gambar_jadwal ?? 'default.png')) }}" alt="Gambar Jadwal" class="laporan-img me-3">
                        <div class="laporan-isi">
                            <strong>Laporan {{ $laporan->jadwal->mapel->nama_mapel ?? '-' }}</strong><br>
                                Nama: {{ $laporan->siswa->nama }}<br>
                                NIS: {{ $laporan->siswa->nis }}<br>
                                Laporan: {{ $laporan->catatan }}<br>
                                Tanggal Pengumpulan: {{ \Carbon\Carbon::parse($laporan->tanggal)->format('d-m-Y') }}
                            <br>
                            <a href="{{ asset('laporan_siswa/' . $laporan->hasil_praktikum) }}" download class="btn btn-download btn-outline-dark ms-auto">Download</a>
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
                                <img src="{{ asset('asset/Vector2.png') }}" alt="Logo" class="logo">
                            </a>
                            <a class="nav-link" href="{{ url('/lihatjadwalguru') }}">
                                <img src="{{ asset('asset/Vector3.png') }}" alt="Logo" class="logo">
                            </a>
                            <a class="nav-link" href="{{ url('/lihatlabguru') }}">
                                <img src="{{ asset('asset/Vector4.png') }}" alt="Logo" class="logo">
                            </a>
                            <a class="nav-link active" href="{{ url('/lihatlaporanguru') }}">
                                <img src="{{ asset('asset/VectorB5.png') }}" alt="Logo" class="logo">
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