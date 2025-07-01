<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ACC Jadwal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link rel="stylesheet" href="{{ asset('css/operator/accjadwal.css') }}">
</head>
<body>
    <div class="container col-lg-4 mt-5">
        <div class="card mb-3">

            <a class="profile" href="{{ url('/profile') }}">
                <img src="{{ isset($operator) && $operator->foto ? asset('foto_operator/' . $operator->foto) : asset('asset/default.png') }}" alt="Foto operator" class="pf">
                <img src="{{ asset('asset/layerpf3.png') }}" alt="Logo" class="pflogo">
            </a>

            <div class="jadwal-list p-3">
                @forelse($permintaan as $item)
                    <div class="jadwal-item p-3 mb-3 border rounded shadow-sm">
                        <p><strong>Guru:</strong> {{ $item->guru->nama }}</p>
                        <p><strong>Mapel:</strong> {{ $item->mapel->nama_mapel }}</p>
                        <p><strong>Kelas:</strong> {{ $item->kelas->nama_kelas }}</p>
                        <p><strong>Hari:</strong> {{ $item->hari }}</p>
                        <p><strong>Jam:</strong> 
                            {{ \Carbon\Carbon::parse($item->jam_mulai)->format('H.i') }} -
                            {{ \Carbon\Carbon::parse($item->jam_selesai)->format('H.i') }}
                        </p>
                        <p>
                            <strong>Status:</strong>
                            @if($item->status === 'Pending')
                                <span class="badge bg-secondary">Pending</span>
                            @elseif($item->status === 'Diterima')
                                <span class="badge bg-success">Disetujui</span>
                            @elseif($item->status === 'Ditolak')
                                <span class="badge bg-danger">Ditolak</span>
                            @elseif($item->status === 'Dibatalkan')
                                <span class="badge bg-warning text-dark">Dibatalkan oleh Guru</span>
                            @else
                                <span class="badge bg-light text-dark">Status Tidak Dikenal</span>
                            @endif
                        </p>

                        @if($item->status === 'Pending')
                            <form action="{{ route('operator.prosesJadwal', $item->id_permintaan) }}" method="POST" class="d-inline me-2">
                                @csrf
                                <input type="hidden" name="status" value="Diterima">
                                <button type="submit" class="btn btn-success btn-sm">Setujui</button>
                            </form>
                            <form action="{{ route('operator.prosesJadwal', $item->id_permintaan) }}" method="POST" class="d-inline">
                                @csrf
                                <input type="hidden" name="status" value="Ditolak">
                                <button type="submit" class="btn btn-danger btn-sm">Tolak</button>
                            </form>
                        @endif
                    </div>
                @empty
                    <p class="text-center">Belum ada permintaan jadwal dari guru.</p>
                @endforelse
            </div>

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
