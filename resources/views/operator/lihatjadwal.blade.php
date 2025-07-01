<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link rel="stylesheet" href="{{ asset('css/operator/lihatjadwal.css') }}">
    <title>Menu Operator - Lihat jadwal</title>
</head>
<body>
    <div class="container col-lg-4 mt-5">
        <div class="card mb-3">
            <a class="profile" href="{{ url('/profile') }}">
                <img src="{{ $operator->foto ? asset('foto_operator/' . $operator->foto) : asset('asset/default.png') }}" alt="Foto operator" class="pf">
                <img src="{{ asset('asset/layerpf3.png') }}" alt="Logo" class="pflogo">
            </a>

            <div class="jadwal-list">
                @foreach($jadwals as $jadwal)
                    <div class="jadwal-item d-flex align-items-center">
                        <img src="{{ asset('asset/gambar_jadwal/' . $jadwal->gambar_jadwal) }}" alt="Jadwal Image" class="jadwal-img">
                        <div class="ms-3">
                            <p class="lab-title mb-0">{{ $jadwal->nama_jadwal }}</p>
                            <small>{{ $jadwal->hari }}, </small>
                            <small>{{ $jadwal->jam_mulai }}</small>
                            <small> - {{ $jadwal->jam_selesai }}</small>
                        </div>
                    </div>
                @endforeach
            </div>

            <nav class="navbar sticky-bottom navbar-expand-lg bg-body-tertiary">
                <div class="container-fluid">
                    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                        <div class="navbar-nav">
                            <a class="nav-link active" href="{{ url('/dashboardoperator')}}">
                                <img src="{{ asset('asset/Vector1.png') }}" alt="Logo" class="logo">
                            </a>
                            <a class="nav-link" href="{{ url('/lihatjadwal')}}">
                                <img src="{{ asset('asset/VectorB3.png') }}" alt="Logo" class="logo">
                            </a>
                            <a class="nav-link" href="{{ url('/accjadwal')}}">
                                <img src="{{ asset('asset/Vector7.png') }}" alt="Logo" class="logo">
                            </a>
                            <a class="nav-link" href="{{ url('/infolab')}}">
                                <img src="{{ asset('asset/Vector4.png') }}" alt="Logo" class="logo">
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