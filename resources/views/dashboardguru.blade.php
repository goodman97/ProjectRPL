<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/siswamenu.css') }}">
    <title>Menu Guru</title>
</head>
<body>
    <div class="container col-lg-4 mt-5">
        <div class="card mb-3">
            <a class="profile" href="{{ url('/profileguru') }}">
                <img src="{{ asset('asset/layerpf3.png') }}" alt="Logo" class="pflogo">
            </a>
            <img src="{{ asset('asset/logo.png') }}" alt="Logo" class="mainlogo">

            @if(session('nama_guru'))
                <p><strong>Nama:</strong> {{ session('nama_guru') }}</p>
                <p><strong>NIP:</strong> {{ session('nip') }}</p>
            @endif

            <nav class="navbar sticky-bottom navbar-expand-lg bg-body-tertiary">
                <div class="container-fluid">
                    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                        <div class="navbar-nav">
                            <a class="nav-link active" href="{{ url('/dashboardguru') }}">
                                <img src="{{ asset('asset/VectorB1.png') }}" alt="Logo" class="logo">
                            </a>
                            <a class="nav-link" href="{{ url('/inputkelasguru') }}">
                                <img src="{{ asset('asset/Vector2.png') }}" alt="Logo" class="logo">
                            </a>
                            <a class="nav-link" href="{{ url('/inputjadwalguru') }}">
                                <img src="{{ asset('asset/Vector3.png') }}" alt="Logo" class="logo">
                            </a>
                            <a class="nav-link" href="{{ url('/lihatlabguru') }}">
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