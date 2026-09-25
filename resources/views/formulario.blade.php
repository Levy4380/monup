<!DOCTYPE html>
<html lang="es">
<head>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-P81HV53SFF"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-P81HV53SFF');
    </script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex, nofollow">
    <title>Formulario — MonUP</title>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root {
            --orange: #f15a24;
            --orange-deep: #d44512;
            --ink: #121212;
            --chalk: #f4f2ef;
        }

        *, *::before, *::after { box-sizing: border-box; }

        body {
            margin: 0;
            min-height: 100dvh;
            font-family: "Outfit", system-ui, sans-serif;
            color: var(--chalk);
            background:
                radial-gradient(ellipse at top right, rgba(241, 90, 36, 0.16), transparent 48%),
                var(--ink);
        }

        .wrap {
            width: min(100% - 2rem, 720px);
            margin: 0 auto;
            padding: 2.5rem 0 3.5rem;
        }

        .brand {
            margin: 0 0 0.4rem;
            font-weight: 800;
            letter-spacing: 0.06em;
            text-transform: uppercase;
            color: var(--orange);
        }

        h1 { margin: 0 0 0.4rem; font-size: clamp(1.6rem, 4vw, 2.1rem); }

        .lead {
            margin: 0 0 1.75rem;
            color: rgba(244, 242, 239, 0.7);
        }

        form { display: grid; gap: 1.1rem; }

        .row-2 { display: grid; gap: 1.1rem; }

        @media (min-width: 560px) {
            .row-2 { grid-template-columns: 1fr 1fr; }
        }

        label, legend {
            font-size: 0.88rem;
            font-weight: 500;
            color: rgba(244, 242, 239, 0.7);
        }

        label { display: grid; gap: 0.4rem; }

        fieldset { border: 0; padding: 0; margin: 0; }

        input, textarea {
            width: 100%;
            font: inherit;
            color: var(--chalk);
            background: rgba(255, 255, 255, 0.04);
            border: 1px solid rgba(244, 242, 239, 0.14);
            border-radius: 6px;
            padding: 0.85rem 1rem;
            outline: none;
        }

        input:focus, textarea:focus {
            border-color: var(--orange);
            box-shadow: 0 0 0 3px rgba(241, 90, 36, 0.15);
        }

        textarea { min-height: 120px; resize: vertical; }

        .choices {
            display: flex;
            flex-wrap: wrap;
            gap: 0.75rem 1.25rem;
            padding-top: 0.45rem;
        }

        .choices label {
            display: flex;
            align-items: center;
            gap: 0.45rem;
            font-weight: 400;
            color: rgba(244, 242, 239, 0.85);
        }

        .choices input { width: auto; accent-color: var(--orange); }

        button {
            margin-top: 0.4rem;
            border: 0;
            border-radius: 8px;
            padding: 0.95rem 1rem;
            font: inherit;
            font-weight: 700;
            color: #fff;
            background: var(--orange);
            cursor: pointer;
        }

        button:hover { background: var(--orange-deep); }

        .note { margin: 0; font-size: 0.9rem; color: rgba(244, 242, 239, 0.55); }
        .errors { margin: 0 0 1rem; padding-left: 1.1rem; color: #ffb4a8; }
    </style>
</head>

<body>
    <div class="wrap">
        <h1>Monup</h1>
        <p class="lead">Responde estas preguntas para que te podamos dar la solución más personalizada</p>

        @if ($errors->any())
            <ul class="errors" role="alert">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        <form method="POST" action="{{ route('contact.store') }}">
            @csrf
            <label>
                Nombre completo
                <input type="text" name="nombre_completo" autocomplete="name" required maxlength="120" placeholder="Tu nombre completo" value="{{ old('nombre_completo') }}">
            </label>
            <div class="row-2">
                <label>
                    Correo
                    <input type="email" name="correo" autocomplete="email" required maxlength="120" placeholder="tu@email.com" value="{{ old('correo') }}">
                </label>
                <label>
                    Teléfono
                    <input type="tel" name="telefono" autocomplete="tel" required maxlength="40" placeholder="+54 …" value="{{ old('telefono') }}">
                </label>
            </div>
            <div class="row-2">
                <label>
                    Fecha de nacimiento
                    <input type="date" name="fecha_nacimiento" required value="{{ old('fecha_nacimiento') }}">
                </label>
                <label>
                    Ciudad
                    <input type="text" name="ciudad" autocomplete="address-level2" required maxlength="100" placeholder="Tu ciudad" value="{{ old('ciudad') }}">
                </label>
            </div>
            <div class="row-2">
                <label>
                    Nivel de escalada
                    <input type="text" name="nivel_escalada" required maxlength="100" placeholder="Ej: V4 / 6a" value="{{ old('nivel_escalada') }}">
                </label>
                <label>
                    ¿Hace cuánto que escalas? (Tiempo)
                    <input type="text" name="tiempo_escalando" required maxlength="100" placeholder="Ej: 2 años" value="{{ old('tiempo_escalando') }}">
                </label>
            </div>
            <fieldset>
                <legend>Modalidad de escalada que practicás</legend>
                <div class="choices">
                    <label>
                        <input type="checkbox" name="modalidad[]" value="boulder" @checked(in_array('boulder', old('modalidad', []), true))>
                        Boulder
                    </label>
                    <label>
                        <input type="checkbox" name="modalidad[]" value="deportiva" @checked(in_array('deportiva', old('modalidad', []), true))>
                        Deportiva
                    </label>
                </div>
            </fieldset>
            <label>
                ¿Cuál es tu objetivo principal?
                <textarea name="objetivo_principal" required maxlength="400" placeholder="Contame tu objetivo…">{{ old('objetivo_principal') }}</textarea>
            </label>
            <fieldset>
                <legend>¿Tuviste o tenés lesiones?</legend>
                <div class="choices">
                    <label>
                        <input type="radio" name="lesiones" value="si" required @checked(old('lesiones') === 'si')>
                        Sí
                    </label>
                    <label>
                        <input type="radio" name="lesiones" value="no" @checked(old('lesiones') === 'no')>
                        No
                    </label>
                </div>
            </fieldset>
            <label>
                Explicación de la lesión
                <textarea name="lesion_explicacion" maxlength="400" placeholder="Si aplica, contanos brevemente…">{{ old('lesion_explicacion') }}</textarea>
            </label>
            <label>
                ¿Algún otro dato relevante que debamos saber sobre vos?
                <textarea name="dato_relevante" maxlength="400" placeholder="Opcional">{{ old('dato_relevante') }}</textarea>
            </label>
            <fieldset>
                <legend>¿Alguna vez entrenaste de manera online?</legend>
                <div class="choices">
                    <label>
                        <input type="radio" name="entrenamiento_online" value="si" required @checked(old('entrenamiento_online') === 'si')>
                        Sí
                    </label>
                    <label>
                        <input type="radio" name="entrenamiento_online" value="no" @checked(old('entrenamiento_online') === 'no')>
                        No
                    </label>
                </div>
            </fieldset>
            <button type="submit">Empeza a subir de grado</button>
        </form>
    </div>
</body>
</html>
