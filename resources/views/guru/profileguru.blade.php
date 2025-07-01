<!DOCTYPE html>
<html lang="en">
<head>
    <title>Profil Guru</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link rel="stylesheet" href="{{ asset('css/guru/profilguru.css') }}">
</head>
<body>
<div class="container col-lg-4 mt-5">
    <div class="card mb-3">

            <a class="profile" href="{{ url('/dashboardguru') }}">
                <img src="{{ $guru->foto ? asset('foto_guru/' . $guru->foto) : asset('asset/default.png') }}" alt="Foto Guru" class="pf">
                <img src="{{ asset('asset/profilebar.png') }}" alt="Logo" class="pfbar">
                <img src="{{ asset('asset/fishfp.png') }}" alt="Logo" class="pflogo2">
                <div class="guru-info">
                    <p><strong>{{ $guru->nama }}</strong></p>
                    <p>{{ $guru->nip }}</p>
                </div>
            </a>

        <div class="detail-box">
            <h2>Detail Pengguna</h2>
            <p><strong>Guru</strong></p>
            <p>Nama: {{ $guru->nama }}</p>
            <p>NIP: {{ $guru->nip }}</p>
            <p>Mapel:</p>
                <ul>
                    @foreach ($guru->mapel as $mapel)
                        <li>{{ $mapel->nama_mapel }}</li>
                    @endforeach
                </ul>
            <p>e-mail: {{ $guru->email }}</p>
        </div>
        <div class="btn-group mt-3 mb-3">
            <a href="{{ url('/editprofileguru') }}" class="btn-edit btn-primary">Edit Profil</a>
            <a href="/logout" class="btn-logout btn-danger">Logout</a>
        </div>
        <img src="{{ asset('asset/wave.png') }}" alt="Wave" class="wave">
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>