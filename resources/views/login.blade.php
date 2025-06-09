<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login</title>
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

  <div class="login-container">
    <form action="{{ url('/login') }}" method="POST">
      @csrf

      <div class="form-box">
        <input type="text" name="username" placeholder="Masukkan username" value="{{ old('username') }}">
        <input type="password" name="password" placeholder="Masukkan password">
      </div>

      <div class="button-fish-container">
        <img src="{{ asset('asset/fish2.png') }}" alt="Ikan 2" class="fish fish-right">

        <button type="submit" class="login-button">Log-in</button>
        
        <img src="{{ asset('asset/fish1.png') }}" alt="Ikan 1" class="fish fish-left">
      </div>

      @if($errors->any())
        <p class="error-message">{{ $errors->first() }}</p>
      @endif
    </form>
  </div>

</body>
</html>
