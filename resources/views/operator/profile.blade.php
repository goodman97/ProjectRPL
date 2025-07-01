<!DOCTYPE html>
<html lang="en">
<head>
    <title>Profil Operator</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link rel="stylesheet" href="{{ asset('css//operator/profiloperator.css') }}">
</head>
<body>
<div class="container col-lg-4 mt-5">
    <div class="card mb-3">

            <a class="profile" href="{{ url('/dashboardoperator') }}">
                <img src="{{ $operator->foto ? asset('foto_operator/' . $operator->foto) : asset('asset/default.png') }}" alt="Foto operator" class="pf">
                <img src="{{ asset('asset/profilebar.png') }}" alt="Logo" class="pfbar">
                <img src="{{ asset('asset/fishfp.png') }}" alt="Logo" class="pflogo2">
                <div class="operator-info">
                    <p><strong>{{ $operator->nama }}</strong></p>
                </div>
            </a>

        <div class="detail-box">
            <h2>Detail Pengguna</h2>
            <p><strong>Operator</strong></p>
            <p>Nama: {{ $operator->nama }}</p>
            <p>e-mail: {{ $operator->email }}</p>
        </div>

        <div class="btn-group mt-3 mb-3">
            <a href="{{ url('/editprofileoperator') }}" class="btn-edit btn-primary">Edit Profil</a>
            <a href="/logout" class="btn-logout btn-danger">Logout</a>
        </div>
        <img src="{{ asset('asset/wave.png') }}" alt="Wave" class="wave">
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>