<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ACC Jadwal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/operatormenu.css') }}">
</head>
    <body>
        <div class="container col-lg-4 mt-5">
                <div class="card mb-3">
                    <a class="profile" href="{{ url('/profile') }}">
                        <img src="{{ $operator->foto ? asset('foto_operator/' . $operator->foto) : asset('asset/default.png') }}" alt="Foto operator" class="pf">
                        <img src="{{ asset('asset/layerpf3.png') }}" alt="Logo" class="pflogo">
                    </a>    

                    <!-- List Jadwal -->
            <div class="jadwal-list">
                 @foreach($jadwals as $jadwal)
                <div class="jadwal-item">
                    <img src="{{ asset('asset/' . $jadwal->gambar_jadwal) }}" class="jadwal-img" alt="foto">

                    <div class="jadwal-info">
                        <strong>{{ $jadwal->nama_jadwal }}</strong>
                        <small>{{ $jadwal->hari }}, {{ \Carbon\Carbon::parse($jadwal->jam_mulai)->format('H.i') }}–{{ \Carbon\Carbon::parse($jadwal->jam_selesai)->format('H.i') }}</small>
                    </div>

                    <div class="jadwal-actions">
                       <form action="{{ route('operator.updateStatusJadwal') }}" method="POST">
                            @csrf
                            <input type="hidden" name="id_jadwal" value="{{ $jadwal->id_jadwal }}">
                            <input type="hidden" name="status" id="status-{{ $jadwal->id_jadwal }}" value="{{ $jadwal->status }}">
                            <label class="switch">
                                <input type="checkbox"
                                    {{ $jadwal->status == 'Diterima' ? 'checked' : '' }}
                                    onchange="
                                        document.getElementById('status-{{ $jadwal->id_jadwal }}').value = this.checked ? 'Diterima' : 'Ditolak';
                                        this.form.submit();
                                    "
                                >
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
                                    <a class="nav-link active" href="{{ url('/dashboardoperator')}}">
                                        <img src="{{ asset('asset/VectorB1.png') }}" alt="Logo" class="logo">
                                    </a>
                                    <a class="nav-link" href="{{ url('/lihatjadwal')}}">
                                        <img src="{{ asset('asset/Vector3.png') }}" alt="Logo" class="logo">
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
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
