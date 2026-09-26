<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex, nofollow">
    <title>Login — MonUP</title>
    <style>
        :root {
            --orange: #f15a24;
            --orange-deep: #d44512;
            --ink: #121212;
            --chalk: #f4f2ef;
            --mist: #ebe7e2;
        }

        *, *::before, *::after { box-sizing: border-box; }

        body {
            margin: 0;
            min-height: 100dvh;
            display: grid;
            place-items: center;
            padding: 1.25rem;
            font-family: "Outfit", system-ui, sans-serif;
            color: var(--ink);
            background:
                radial-gradient(ellipse at top right, rgba(241, 90, 36, 0.18), transparent 50%),
                linear-gradient(160deg, var(--chalk), var(--mist));
        }

        .card {
            width: min(100%, 26rem);
            background: #fff;
            border: 1px solid rgba(18, 18, 18, 0.08);
            border-radius: 12px;
            padding: clamp(1.5rem, 4vw, 2rem);
            box-shadow: 0 18px 40px rgba(18, 18, 18, 0.08);
        }

        .brand {
            font-weight: 800;
            letter-spacing: 0.04em;
            text-transform: uppercase;
            color: var(--orange);
            margin: 0 0 0.35rem;
            font-size: 1.35rem;
        }

        h1 {
            margin: 0 0 1.25rem;
            font-size: 1.15rem;
            font-weight: 600;
        }

        label {
            display: grid;
            gap: 0.35rem;
            margin-bottom: 1rem;
            font-size: 0.9rem;
            font-weight: 500;
        }

        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 0.75rem 0.9rem;
            border: 1px solid rgba(18, 18, 18, 0.18);
            border-radius: 8px;
            font: inherit;
        }

        input:focus {
            outline: none;
            border-color: var(--orange);
            box-shadow: 0 0 0 3px rgba(241, 90, 36, 0.18);
        }

        .remember {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            margin-bottom: 1.25rem;
            font-weight: 400;
        }

        .remember input { accent-color: var(--orange); }

        button {
            width: 100%;
            border: 0;
            border-radius: 8px;
            padding: 0.85rem 1rem;
            font: inherit;
            font-weight: 600;
            color: #fff;
            background: var(--orange);
            cursor: pointer;
        }

        button:hover { background: var(--orange-deep); }

        .errors {
            margin: 0 0 1rem;
            padding: 0.75rem 0.9rem;
            list-style: none;
            color: #8a1f1f;
            background: #ffe8e5;
            border-radius: 8px;
            font-size: 0.9rem;
        }
    </style>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;600;700;800&display=swap" rel="stylesheet">
</head>
<body>
    <div class="card">
        <p class="brand">MonUP</p>
        <h1>Ingresar al panel</h1>

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
            <label class="remember">
                <input type="checkbox" name="remember" value="1"> Recordarme
            </label>
            <button type="submit">Entrar</button>
        </form>
    </div>
</body>
</html>
