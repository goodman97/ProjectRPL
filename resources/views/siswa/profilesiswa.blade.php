<!DOCTYPE html>
<html lang="en">
<head>
    <title>Profil Siswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link rel="stylesheet" href="{{ asset('css/siswa/profilsiswa.css') }}">
</head>
<body>
<div class="container col-lg-4 mt-5">
    <div class="card mb-3">

            <a class="profile" href="{{ url('/dashboardsiswa') }}">
                <img src="{{ $siswa->foto ? asset('foto_siswa/' . $siswa->foto) : asset('asset/default.png') }}" alt="Foto Siswa" class="pf">
                <img src="{{ asset('asset/profilebar.png') }}" alt="Logo" class="pfbar">
                <img src="{{ asset('asset/fishfp.png') }}" alt="Logo" class="pflogo2">
                <div class="siswa-info">
                    <p><strong>{{ $siswa->nama }}</strong></p>
                    <p><strong>{{ $siswa->nis }}</strong></p>
                </div>
            </a>

        <div class="detail-box">
            <h2>Detail Pengguna</h2>
            <p><strong>Siswa</strong></p>
            <p>Nama: {{ $siswa->nama }}</p>
            <p>NIS: {{ $siswa->nis }}</p>
            <p>Kelas: {{ $siswa->kelas }}</p>
            <p>Jurusan: {{ $siswa->jurusan }}</p>
            <p>e-mail: {{ $siswa->email }}</p>
        </div>

        <div class="btn-group mt-3 mb-3">
            <a href="{{ url('/editprofilesiswa') }}" class="btn-edit btn-primary">Edit Profil</a>
            <a href="/logout" class="btn-logout btn-danger">Logout</a>
        </div>
        <img src="{{ asset('asset/wave.png') }}" alt="Wave" class="wave">
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>