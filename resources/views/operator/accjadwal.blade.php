<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ACC Jadwal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/operator/accjadwal.css') }}">
</head>
<body>
    <div class="container col-lg-4 mt-5">
        <div class="card mb-3">

            <!-- Profil -->
            <a class="profile" href="{{ url('/profile') }}">
                <img src="{{ $operator->foto ? asset('foto_operator/' . $operator->foto) : asset('asset/default.png') }}" alt="Foto operator" class="pf">
                <img src="{{ asset('asset/layerpf3.png') }}" alt="Logo" class="pflogo">
            </a>

            <!-- List Jadwal -->
            <div class="jadwal-list p-3">
                @forelse($permintaan as $item)
                    <div class="jadwal-item p-3 mb-3">
                        <p><strong>Guru:</strong> {{ $item->guru->nama }}</p>
                        <p><strong>Mapel:</strong> {{ $item->mapel->nama_mapel }}</p>
                        <p><strong>Kelas:</strong> {{ $item->kelas->nama_kelas }}</p>
                        <p><strong>Hari:</strong> {{ $item->hari }}</p>
                        <p><strong>Jam:</strong> 
                            {{ \Carbon\Carbon::parse($item->jam_mulai)->format('H.i') }} -
                            {{ \Carbon\Carbon::parse($item->jam_selesai)->format('H.i') }}
                        </p>
                        <p><strong>Status:</strong> {{ $item->status }}</p>

                        @if($item->status == 'Pending')
                            <form action="{{ route('operator.setujuiJadwal', $item->id_permintaan) }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-success btn-sm">Setujui</button>
                            </form>
                        @else
                            <span class="text-muted">{{ $item->status == 'Diterima' ? 'Disetujui' : 'Ditolak' }}</span>
                        @endif
                    </div>
                @empty
                    <p class="text-center">Belum ada permintaan jadwal dari guru.</p>
                @endforelse
                
                @foreach($jadwals as $jadwal)
                <div class="jadwal-item mb-3">
                    <img src="{{ asset('asset/' . $jadwal->gambar_jadwal) }}" class="jadwal-img mb-2" alt="foto">

                    <div class="jadwal-detail px-3 pb-2 pt-1 d-flex justify-content-between align-items-center">
                        <div>
                            <p class="mb-1 fw-bold">{{ $jadwal->nama_jadwal }}</p>
                            <small class="text-muted">
                                {{ $jadwal->hari }},
                                {{ \Carbon\Carbon::parse($jadwal->jam_mulai)->format('H.i') }}–{{ \Carbon\Carbon::parse($jadwal->jam_selesai)->format('H.i') }}
                            </small>
                        </div>

                        <div class="text-end">
                            <form action="{{ route('operator.updateStatusJadwal') }}" method="POST" class="mb-1">
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

                            @if($jadwal->status == 'Diterima')
                                <span class="badge bg-success">Diterima</span>
                            @elseif($jadwal->status == 'Ditolak')
                                <span class="badge bg-danger">Ditolak</span>
                            @else
                                <span class="badge bg-warning text-dark">Pending</span>
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <!-- Bottom Navbar -->
            <nav class="navbar sticky-bottom navbar-expand-lg bg-body-tertiary">
                <div class="container-fluid">
                    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                        <div class="navbar-nav">
                            <a class="nav-link" href="{{ url('/dashboardoperator') }}">
                                <img src="{{ asset('asset/Vector1.png') }}" class="logo" alt="Logo">
                            </a>
                            <a class="nav-link" href="{{ url('/lihatjadwal') }}">
                                <img src="{{ asset('asset/Vector3.png') }}" class="logo" alt="Logo">
                            </a>
                            <a class="nav-link active" href="{{ url('/accjadwal') }}">
                                <img src="{{ asset('asset/VectorB7.png') }}" class="logo" alt="Logo">
                            </a>
                            <a class="nav-link" href="{{ url('/infolab') }}">
                                <img src="{{ asset('asset/Vector4.png') }}" class="logo" alt="Logo">
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
