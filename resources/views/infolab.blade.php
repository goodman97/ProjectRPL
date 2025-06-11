<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/siswamenu.css') }}">
    <title>Menu Operator - Status Lab</title>
</head>
<body>
    <div class="container col-lg-4 mt-5">
        <div class="card mb-3">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <div class="row">
                @foreach($labs as $lab)
                    <div class="col-md-6 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <h5>{{ $lab->nama_lab }}</h5>
                                <p>Status: <strong>{{ $lab->status }}</strong></p>
                                <form method="POST" action="{{ route('operator.status-lab.update') }}">
                                    @csrf
                                    <input type="hidden" name="id_lab" value="{{ $lab->id_lab }}">
                                    <select name="status" class="form-select mb-2">
                                        <option value="Tersedia" {{ $lab->status == 'Tersedia' ? 'selected' : '' }}>Tersedia</option>
                                        <option value="Tidak tersedia" {{ $lab->status == 'Tidak tersedia' ? 'selected' : '' }}>Tidak tersedia</option>
                                    </select>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>