<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit Profil Guru</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/guru/gurumenu.css') }}">
</head>
<body>
<div class="container col-lg-6 mt-5">
    <div class="card-edit card p-4">
        <h3>Edit Profil</h3>
        <form method="POST" action="{{ route('updateprofileguru') }}" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" value="{{ $guru->email }}" class="form-control">
            </div>
            <div class="mb-3">
                <label>Foto Profil (opsional)</label>
                <input type="file" name="foto" class="form-control">
            </div>

            <img src="{{ asset('asset/wave.png') }}" alt="Wave" class="wave">
            
            <div class="btn-group mt-3 mb-3">
                <button type="submit" class="btn-simpan btn-success">Simpan</button>
                <a href="{{ url('/profileguru') }}" class="btn-batal btn-secondary">Batal</a>
            </div>
        </form>
    </div>
</div>
</body>
</html>
