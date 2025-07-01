<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
   <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link rel="stylesheet" href="{{ asset('css/siswa/lihatlabsiswa.css') }}">
    <title>Menu Siswa</title>
</head>
<body>
    <div class="container col-lg-4 mt-5">
        <div class="card mb-3">
            <a class="profile" href="{{ url('/profilesiswa') }}">
                <img src="{{ $siswa->foto ? asset('foto_siswa/' . $siswa->foto) : asset('asset/default.png') }}" alt="Foto Siswa" class="pf">
                <img src="{{ asset('asset/layerpf3.png') }}" alt="Logo" class="pflogo">
            </a>

            <div class="lab-list">
                @foreach($labs as $lab)
                    <div class="lab-item d-flex align-items-center">
                        <img src="{{ asset('asset/gambar_lab/' . $lab->gambar) }}" alt="Lab Image" class="lab-img">
                        <div class="ms-3">
                            <p class="lab-title mb-0">{{ $lab->nama_lab }}</p>
                            <small>Status: <strong>{{ $lab->status }}</strong></small>
                        </div>
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
                            <a class="nav-link active" href="{{ url('/lihatlabsiswa') }}">
                                <img src="{{ asset('asset/VectorB4.png') }}" alt="Logo" class="logo">
                            </a>
                            <a class="nav-link" href="{{ url('/buatlaporansiswa') }}">
                                <img src="{{ asset('asset/Vector6.png') }}" alt="Logo" class="logo">
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