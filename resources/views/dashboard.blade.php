<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard — MonUP</title>
    <style>
        body { font-family: system-ui, sans-serif; margin: 2rem; color: #121212; }
        header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.5rem; gap: 1rem; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #ccc; padding: 0.5rem 0.75rem; text-align: left; vertical-align: top; }
        th { background: #f4f2ef; }
        button { padding: 0.4rem 0.8rem; cursor: pointer; }
        .empty { color: #555; }
        .msg { white-space: pre-wrap; max-width: 40rem; }
    </style>
</head>
<body>
    <header>
        <h1>Contactos</h1>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit">Salir</button>
        </form>
    </header>

    @if ($contactos->isEmpty())
        <p class="empty">Todavía no hay envíos.</p>
    @else
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Fecha</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Mensaje</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($contactos as $contacto)
                    <tr>
                        <td>{{ $contacto->id }}</td>
                        <td>{{ $contacto->created_at?->timezone(config('app.timezone'))->format('Y-m-d H:i') }}</td>
                        <td>{{ $contacto->payload['nombre'] ?? '' }}</td>
                        <td>{{ $contacto->payload['apellido'] ?? '' }}</td>
                        <td class="msg">{{ $contacto->payload['mensaje'] ?? '' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</body>
</html>
