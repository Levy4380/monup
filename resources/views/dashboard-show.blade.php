<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle contacto — MonUP</title>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root {
            --orange: #f15a24;
            --orange-deep: #d44512;
            --ink: #121212;
            --chalk: #f4f2ef;
            --line: rgba(18, 18, 18, 0.1);
        }

        *, *::before, *::after { box-sizing: border-box; }

        body {
            margin: 0;
            min-height: 100dvh;
            font-family: "Outfit", system-ui, sans-serif;
            color: var(--ink);
            background:
                radial-gradient(ellipse at top left, rgba(241, 90, 36, 0.12), transparent 45%),
                linear-gradient(180deg, #fff, var(--chalk));
        }

        .wrap {
            width: min(100% - 2rem, 720px);
            margin: 0 auto;
            padding: 1.5rem 0 3rem;
        }

        header {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            align-items: center;
            gap: 1rem;
            margin-bottom: 1.25rem;
        }

        .brand {
            margin: 0;
            font-size: 0.85rem;
            font-weight: 800;
            letter-spacing: 0.06em;
            text-transform: uppercase;
            color: var(--orange);
        }

        h1 {
            margin: 0.15rem 0 0;
            font-size: clamp(1.25rem, 3vw, 1.6rem);
        }

        .btn {
            display: inline-flex;
            align-items: center;
            padding: 0.55rem 0.95rem;
            border-radius: 8px;
            border: 1px solid var(--line);
            font: inherit;
            font-weight: 600;
            font-size: 0.9rem;
            text-decoration: none;
            color: var(--ink);
            background: #fff;
        }

        .btn:hover { border-color: var(--orange); color: var(--orange); }

        .panel {
            background: #fff;
            border: 1px solid var(--line);
            border-radius: 12px;
            padding: clamp(1rem, 3vw, 1.5rem);
            box-shadow: 0 12px 30px rgba(18, 18, 18, 0.05);
        }

        .meta {
            margin: 0 0 1.25rem;
            color: rgba(18, 18, 18, 0.55);
            font-size: 0.9rem;
        }

        dl {
            margin: 0;
            display: grid;
            gap: 1rem;
        }

        dt {
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 0.04em;
            color: var(--orange-deep);
            margin-bottom: 0.2rem;
        }

        dd {
            margin: 0;
            white-space: pre-wrap;
            line-height: 1.45;
            padding-bottom: 1rem;
            border-bottom: 1px solid var(--line);
        }

        dl > div:last-child dd { border-bottom: 0; padding-bottom: 0; }

        @media (max-width: 640px) {
            .wrap { width: min(100% - 1.25rem, 720px); padding-top: 1rem; }
        }
    </style>
</head>
<body>
    @php
        $p = $contacto->payload ?? [];
        $modalidad = $p['modalidad'] ?? [];
        if (is_array($modalidad)) {
            $modalidad = implode(', ', $modalidad);
        }
        $rows = [
            'Nombre completo' => $p['nombre_completo'] ?? '—',
            'Correo' => $p['correo'] ?? '—',
            'Teléfono' => $p['telefono'] ?? '—',
            'Fecha de nacimiento' => $p['fecha_nacimiento'] ?? '—',
            'Ciudad' => $p['ciudad'] ?? '—',
            'Nivel de escalada' => $p['nivel_escalada'] ?? '—',
            'Tiempo escalando' => $p['tiempo_escalando'] ?? '—',
            'Modalidad' => $modalidad !== '' ? $modalidad : '—',
            'Objetivo principal' => $p['objetivo_principal'] ?? '—',
            'Lesiones' => $p['lesiones'] ?? '—',
            'Explicación de la lesión' => $p['lesion_explicacion'] ?: '—',
            'Dato relevante' => $p['dato_relevante'] ?: '—',
            'Entrenamiento online' => $p['entrenamiento_online'] ?? '—',
        ];
    @endphp

    <div class="wrap">
        <header>
            <div>
                <p class="brand">MonUP</p>
                <h1>Detalle del contacto</h1>
            </div>
            <a class="btn" href="{{ route('dashboard') }}">Volver</a>
        </header>

        <div class="panel">
            <p class="meta">
                #{{ $contacto->id }} ·
                {{ $contacto->created_at?->timezone(config('app.timezone'))->format('Y-m-d H:i') }}
            </p>
            <dl>
                @foreach ($rows as $label => $value)
                    <div>
                        <dt>{{ $label }}</dt>
                        <dd>{{ $value }}</dd>
                    </div>
                @endforeach
            </dl>
        </div>
    </div>
</body>
</html>
