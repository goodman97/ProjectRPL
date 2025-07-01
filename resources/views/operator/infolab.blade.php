<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link rel="stylesheet" href="{{ asset('css/operator/infolab.css') }}">
    <title>Menu Operator - Status Lab</title>
</head>
<body>
    <div class="container col-lg-4 mt-5">
        <div class="card mb-3">
            <a class="profile" href="{{ url('/profile') }}">
                <img src="{{ $operator->foto ? asset('foto_operator/' . $operator->foto) : asset('asset/default.png') }}" alt="Foto operator" class="pf">
                <img src="{{ asset('asset/layerpf3.png') }}" alt="Logo" class="pflogo">
            </a>

            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <div class="lab-list">
                @foreach($labs as $lab)
                <div class="lab-item mb-3">
                    <img src="{{ asset('asset/gambar_lab/' . $lab->gambar) }}" class="lab-img mb-2" alt="Gambar Lab">

                    <div class="lab-detail px-3 pb-2 pt-1 d-flex justify-content-between align-items-center">
                        <p class="lab-title mb-0">{{ $lab->nama_lab }}</p>
                        <form action="{{ route('statuslab.update') }}" method="POST" class="mb-0">
                            @csrf
                            <input type="hidden" name="id_lab" value="{{ $lab->id_lab }}">
                            <input type="hidden" name="status" value="Tidak tersedia">
                            <label class="switch">
                                <input type="checkbox" name="status" value="Tersedia"
                                    onchange="this.form.submit()" {{ $lab->status == 'Tersedia' ? 'checked' : '' }}>
                                <span class="slider"></span>
                            </label>
                        </form>
                    </div>
                </div>
                @endforeach
            </div>

            <nav class="navbar sticky-bottom navbar-expand-lg bg-body-tertiary">
                <div class="container-fluid">
                    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                        <div class="navbar-nav">
                            <a class="nav-link" href="{{ url('/dashboardoperator')}}">
                                <img src="{{ asset('asset/Vector1.png') }}" alt="Logo" class="logo">
                            </a>
                            <a class="nav-link" href="{{ url('/lihatjadwal')}}">
                                <img src="{{ asset('asset/Vector3.png') }}" alt="Logo" class="logo">
                            </a>
                            <a class="nav-link" href="{{ url('/accjadwal')}}">
                                <img src="{{ asset('asset/Vector7.png') }}" alt="Logo" class="logo">
                            </a>
                            <a class="nav-link active" href="{{ url('/infolab')}}">
                                <img src="{{ asset('asset/VectorB4.png') }}" alt="Logo" class="logo">
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