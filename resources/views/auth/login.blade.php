<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login — MonUP</title>
    <style>
        body { font-family: system-ui, sans-serif; max-width: 24rem; margin: 4rem auto; padding: 0 1rem; color: #121212; }
        label { display: block; margin-bottom: 1rem; }
        input { width: 100%; padding: 0.5rem; box-sizing: border-box; }
        button { padding: 0.6rem 1rem; cursor: pointer; }
        .error { color: #b00020; font-size: 0.9rem; margin: 0.25rem 0 0; }
        .errors { margin-bottom: 1rem; color: #b00020; }
    </style>
</head>
<body>
    <h1>Admin</h1>

    @if ($errors->any())
        <ul class="errors">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf
        <label>
            Email
            <input type="email" name="email" value="{{ old('email') }}" required autocomplete="username" autofocus>
        </label>
        <label>
            Password
            <input type="password" name="password" required autocomplete="current-password">
        </label>
        <label>
            <input type="checkbox" name="remember" value="1"> Recordarme
        </label>
        <button type="submit">Entrar</button>
    </form>
</body>
</html>
