<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit Profil Operator</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link rel="stylesheet" href="{{ asset('css/operator/editprofiloperator.css') }}">
</head>
<body>
<div class="container col-lg-6 mt-5">
    <div class="card-edit card p-4">
        <h3>Edit Profil</h3>
        <form method="POST" action="{{ route('updateprofileoperator') }}" enctype="multipart/form-data" class="form-edit-pf">
            @csrf
            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" value="{{ $operator->email }}" class="form-control">
            </div>
            <div class="mb-3">
                <label>Foto Profil (opsional)</label>
                <input type="file" name="foto" class="form-control">
            </div>

            <img src="{{ asset('asset/wave.png') }}" alt="Wave" class="wave">
            
            <div class="btn-group mt-3 mb-3">
                <button type="submit" class="btn-simpan btn-success">Simpan</button>
                <a href="{{ url('/profile') }}" class="btn-batal btn-secondary">Batal</a>
            </div>
        </form>
    </div>
</div>
</body>
</html>
