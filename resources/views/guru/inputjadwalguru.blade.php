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
            <div class="lab-item">
                <img src="{{ asset('asset/pembenihan.png') }}" alt="Pembenihan" class="lab-img">
                <div class="lab-detail">
                    <div class="lab-title">Pembenihan X1</div>
                    <div class="lab-time">Kamis, 07.30–09.40</div>
                </div>
                <div class="lab-action">
                    <button class="plus-btn">+</button>
                    <button class="minus-btn">−</button>
                </div>
            </div>

            <div class="lab-item">
                <img src="{{ asset('asset/pendederan.png') }}" alt="Pendederan" class="lab-img">
                <div class="lab-detail">
                    <div class="lab-title">Pendederan XI 1</div>
                    <div class="lab-time">Senin, 09.50–11.15</div>
                </div>
                <div class="lab-action">
                    <button class="plus-btn">+</button>
                    <button class="minus-btn">−</button>
                </div>
            </div>

            <!-- Tambah item lainnya di sini -->

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
                            <a class="nav-link" href="{{ url('/inputjadwalguru') }}">
                                <img src="{{ asset('asset/VectorB3.png') }}" alt="Logo" class="logo">
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
            </nav>

    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
