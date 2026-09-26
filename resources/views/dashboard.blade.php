<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex, nofollow">
    <title>Dashboard — MonUP</title>
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
            width: min(100% - 2rem, 960px);
            margin: 0 auto;
            padding: 1.5rem 0 3rem;
        }

        header {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            align-items: center;
            gap: 1rem;
            margin-bottom: 1.5rem;
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
            font-size: clamp(1.35rem, 3vw, 1.75rem);
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.35rem;
            padding: 0.55rem 0.95rem;
            border-radius: 8px;
            border: 0;
            font: inherit;
            font-weight: 600;
            font-size: 0.9rem;
            text-decoration: none;
            cursor: pointer;
        }

        .btn-primary {
            color: #fff;
            background: var(--orange);
        }

        .btn-primary:hover { background: var(--orange-deep); }

        .btn-ghost {
            color: var(--ink);
            background: transparent;
            border: 1px solid var(--line);
        }

        .btn-ghost:hover { border-color: var(--orange); color: var(--orange); }

        .copy-bar {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            gap: 0.75rem;
            margin-bottom: 1.25rem;
        }

        .copy-bar .status {
            font-size: 0.9rem;
            color: var(--orange-deep);
            min-height: 1.2em;
        }

        .panel {
            background: #fff;
            border: 1px solid var(--line);
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 12px 30px rgba(18, 18, 18, 0.05);
        }

        .table-scroll { overflow-x: auto; }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 520px;
        }

        th, td {
            padding: 0.85rem 1rem;
            text-align: left;
            border-bottom: 1px solid var(--line);
            vertical-align: middle;
        }

        th {
            font-size: 0.78rem;
            text-transform: uppercase;
            letter-spacing: 0.04em;
            color: rgba(18, 18, 18, 0.55);
            background: rgba(241, 90, 36, 0.06);
        }

        tr:last-child td { border-bottom: 0; }

        .empty {
            margin: 0;
            padding: 2rem 1.25rem;
            color: rgba(18, 18, 18, 0.55);
        }

        @media (max-width: 640px) {
            .wrap { width: min(100% - 1.25rem, 960px); padding-top: 1rem; }
            th, td { padding: 0.75rem; font-size: 0.92rem; }
        }
    </style>
</head>
<body>
    <div class="wrap">
        <div class="copy-bar">
            <button class="btn btn-primary" type="button" id="copy-form-link" data-url="{{ route('formulario') }}">
                Copiar link de formulario
            </button>
            <span class="status" id="copy-form-status" aria-live="polite"></span>
        </div>
        <header>
            <div>
                <p class="brand">MonUP</p>
                <h1>Contactos</h1>
            </div>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="btn btn-ghost" type="submit">Salir</button>
            </form>
        </header>

        <div class="panel">
            @if ($contactos->isEmpty())
                <p class="empty">Todavía no hay envíos.</p>
            @else
                <div class="table-scroll">
                    <table>
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Mail</th>
                                <th>Fecha</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($contactos as $contacto)
                                <tr>
                                    <td>{{ $contacto->payload['nombre_completo'] ?? '—' }}</td>
                                    <td>{{ $contacto->payload['correo'] ?? '—' }}</td>
                                    <td>{{ $contacto->created_at?->timezone(config('app.timezone'))->format('Y-m-d H:i') }}</td>
                                    <td>
                                        <a class="btn btn-primary" href="{{ route('dashboard.contactos.show', $contacto) }}">Ver más</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
    <script>
        document.getElementById('copy-form-link').addEventListener('click', async function () {
            const status = document.getElementById('copy-form-status');
            const url = this.dataset.url;

            try {
                await navigator.clipboard.writeText(url);
                status.textContent = 'Link copiado.';
            } catch (error) {
                status.textContent = url;
            }
        });
    </script>
</body>
</html>
