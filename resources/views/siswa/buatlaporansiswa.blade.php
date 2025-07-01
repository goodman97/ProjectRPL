<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link rel="stylesheet" href="{{ asset('css/siswa/buatlaporan.css') }}">
    <title>Menu Siswa</title>
</head>
<body>
    <div class="container col-lg-4 mt-5">
        <div class="card mb-3">
            <a class="profile" href="{{ url('/profilesiswa') }}">
                <img src="{{ $siswa->foto ? asset('foto_siswa/' . $siswa->foto) : asset('asset/default.png') }}" alt="Foto Siswa" class="pf">
                <img src="{{ asset('asset/layerpf3.png') }}" alt="Logo" class="pflogo">
            </a>

            <div class="laporan-list">
                @foreach($jadwals as $jadwal)
                    <div class="laporan-card">
                        <div class="laporan-header">
                            <img src="{{ asset('asset/' . $jadwal->gambar_jadwal) }}"  class="laporan-img mb-2" alt="Jadwal">
                            <div class="info-jadwal">
                                <h4>{{ $jadwal->mapel->nama_mapel ?? '-' }}</h4>
                                <p>{{ $jadwal->hari }} - {{ $jadwal->jam_mulai }} s/d {{ $jadwal->jam_selesai }}</p>
                            </div>
                        </div>

                        <form action="{{ route('siswa.uploadLaporan') }}" method="POST" enctype="multipart/form-data" class="form-upload">
                            @csrf
                            <input type="hidden" name="id_jadwal" value="{{ $jadwal->id_jadwal }}">
                            <input type="file" name="hasil_praktikum" class="input-file" accept=".pdf,.doc,.docx,.ppt,.pptx,.xls,.xlsx" required>
                            <button type="submit" class="btn-upload">Upload</button>
                        </form>
                    </div>
                @endforeach
            </div>


            <nav class="navbar sticky-bottom navbar-expand-lg bg-body-tertiary">
                <div class="container-fluid">
                    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                        <div class="navbar-nav">
                            <a class="nav-link" href="{{ url('/dashboardsiswa') }}">
                                <img src="{{ asset('asset/Vector1.png') }}" alt="Logo" class="logo">
                            </a>
                            <a class="nav-link" href="{{ url('/lihatjadwalsiswa') }}">
                                <img src="{{ asset('asset/Vector3.png') }}" alt="Logo" class="logo">
                            </a>
                            <a class="nav-link" href="{{ url('/lihatlabsiswa') }}">
                                <img src="{{ asset('asset/Vector4.png') }}" alt="Logo" class="logo">
                            </a>
                            <a class="nav-link active" href="{{ url('/buatlaporansiswa') }}">
                                <img src="{{ asset('asset/VectorB6.png') }}" alt="Logo" class="logo">
                            </a>
                            <a class="nav-link" href="{{ url('/lihatlaporansiswa') }}">
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