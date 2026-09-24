@verbatim
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>MonUP — Entrenamiento de escalada online</title>
  <meta name="description" content="MonUP: entrenamiento de escalada 100% online. Entendé cómo subir tu grado." />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@600;700;800&family=Outfit:wght@400;500;600&display=swap" rel="stylesheet" />
  <style>
    :root {
      --orange: #f15a24;
      --orange-deep: #d44512;
      --ink: #121212;
      --stone: #2a2a2a;
      --chalk: #f4f2ef;
      --mist: rgba(244, 242, 239, 0.78);
      --ease: cubic-bezier(0.22, 1, 0.36, 1);
    }

    *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

    html { scroll-behavior: smooth; }

    body {
      font-family: "Outfit", sans-serif;
      color: var(--chalk);
      background: var(--ink);
      line-height: 1.5;
      overflow-x: hidden;
    }

    img { max-width: 100%; display: block; }

    a { color: inherit; text-decoration: none; }

    /* —— Header —— */
    .topbar {
      position: absolute;
      inset: 0 0 auto;
      z-index: 10;
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 1.25rem clamp(1.25rem, 4vw, 3rem);
      animation: fadeDown 0.9s var(--ease) both;
    }

    .brand {
      display: flex;
      align-items: center;
      gap: 0.75rem;
    }

    .brand svg { width: 42px; height: 42px; }

    .brand-name {
      font-family: "Barlow Condensed", sans-serif;
      font-weight: 800;
      font-size: 1.35rem;
      letter-spacing: 0.12em;
      text-transform: uppercase;
    }

    .ig-link {
      display: inline-flex;
      align-items: center;
      gap: 0.45rem;
      font-size: 0.9rem;
      font-weight: 500;
      opacity: 0.9;
      transition: opacity 0.25s, transform 0.25s var(--ease);
    }

    .ig-link:hover {
      opacity: 1;
      transform: translateY(-1px);
      color: var(--orange);
    }

    .ig-link svg { width: 18px; height: 18px; }

    /* —— Hero —— */
    .hero {
      position: relative;
      min-height: 100svh;
      display: grid;
      align-items: end;
      padding: clamp(5.5rem, 12vh, 7rem) clamp(1.25rem, 4vw, 3rem) clamp(2.5rem, 6vh, 4rem);
      isolation: isolate;
    }

    .hero-bg {
      position: absolute;
      inset: 0;
      z-index: -2;
      background:
        linear-gradient(180deg, rgba(18, 18, 18, 0.35) 0%, rgba(18, 18, 18, 0.55) 45%, rgba(18, 18, 18, 0.92) 100%),
        url("https://images.unsplash.com/photo-1522163182402-834f871fd851?auto=format&fit=crop&w=1920&q=80") center / cover no-repeat;
      transform: scale(1.06);
      animation: kenBurns 18s ease-in-out infinite alternate;
    }

    .hero-grain {
      position: absolute;
      inset: 0;
      z-index: -1;
      opacity: 0.18;
      pointer-events: none;
      background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 200 200' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.85' numOctaves='3' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)'/%3E%3C/svg%3E");
    }

    .hero-copy {
      max-width: 38rem;
      animation: riseIn 1s var(--ease) 0.15s both;
    }

    .hero-brand {
      font-family: "Barlow Condensed", sans-serif;
      font-weight: 800;
      font-size: clamp(3.8rem, 14vw, 7.5rem);
      line-height: 0.88;
      letter-spacing: 0.04em;
      text-transform: uppercase;
      margin-bottom: 1rem;
    }

    .hero-brand span {
      color: var(--orange);
    }

    .hero-title {
      font-family: "Barlow Condensed", sans-serif;
      font-weight: 700;
      font-size: clamp(1.45rem, 3.6vw, 2.1rem);
      letter-spacing: 0.02em;
      text-transform: uppercase;
      max-width: 18ch;
      margin-bottom: 0.75rem;
    }

    .hero-lead {
      font-size: clamp(1rem, 2.2vw, 1.15rem);
      color: var(--mist);
      max-width: 32ch;
      margin-bottom: 1.75rem;
    }

    .cta-row {
      display: flex;
      flex-wrap: wrap;
      gap: 0.85rem;
      align-items: center;
    }

    .btn {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      gap: 0.5rem;
      border: none;
      cursor: pointer;
      font-family: inherit;
      font-weight: 600;
      font-size: 0.95rem;
      padding: 0.9rem 1.45rem;
      border-radius: 2px;
      transition: transform 0.25s var(--ease), background 0.25s, box-shadow 0.25s;
    }

    .btn-primary {
      background: var(--orange);
      color: #fff;
      box-shadow: 0 10px 28px rgba(241, 90, 36, 0.28);
    }

    .btn-primary:hover {
      background: var(--orange-deep);
      transform: translateY(-2px);
    }

    .btn-ghost {
      background: transparent;
      color: var(--chalk);
      border: 1px solid rgba(244, 242, 239, 0.35);
    }

    .btn-ghost:hover {
      border-color: var(--orange);
      color: var(--orange);
      transform: translateY(-2px);
    }

    /* —— About —— */
    .section {
      padding: clamp(3.5rem, 8vw, 6rem) clamp(1.25rem, 4vw, 3rem);
    }

    .about {
      background:
        radial-gradient(ellipse 70% 60% at 100% 0%, rgba(241, 90, 36, 0.12), transparent 55%),
        var(--ink);
    }

    .about-inner {
      max-width: 1100px;
      margin: 0 auto;
      display: grid;
      gap: clamp(2rem, 5vw, 4rem);
      grid-template-columns: 1fr;
      align-items: center;
    }

    @media (min-width: 820px) {
      .about-inner { grid-template-columns: 1.05fr 0.95fr; }
    }

    .eyebrow {
      font-family: "Barlow Condensed", sans-serif;
      font-weight: 700;
      letter-spacing: 0.18em;
      text-transform: uppercase;
      color: var(--orange);
      font-size: 0.9rem;
      margin-bottom: 0.75rem;
    }

    .section h2 {
      font-family: "Barlow Condensed", sans-serif;
      font-weight: 800;
      font-size: clamp(2rem, 5vw, 3.1rem);
      line-height: 1;
      text-transform: uppercase;
      letter-spacing: 0.02em;
      margin-bottom: 1rem;
    }

    .section p {
      color: rgba(244, 242, 239, 0.78);
      font-size: 1.05rem;
      max-width: 42ch;
    }

    .about-visual {
      position: relative;
      min-height: 280px;
      overflow: hidden;
      border-radius: 2px;
    }

    .about-visual img {
      width: 100%;
      height: 100%;
      min-height: 320px;
      object-fit: cover;
      filter: saturate(0.9) contrast(1.05);
      transition: transform 0.8s var(--ease);
    }

    .about-visual:hover img { transform: scale(1.04); }

    .about-visual::after {
      content: "";
      position: absolute;
      inset: auto 0 0;
      height: 45%;
      background: linear-gradient(transparent, rgba(18, 18, 18, 0.75));
      pointer-events: none;
    }

    /* —— Contact —— */
    .contact {
      background:
        linear-gradient(180deg, #1a1a1a 0%, #101010 100%);
      border-top: 1px solid rgba(244, 242, 239, 0.06);
    }

    .contact-inner {
      max-width: 720px;
      margin: 0 auto;
    }

    .contact .section-lead {
      margin-bottom: 2rem;
    }

    form {
      display: grid;
      gap: 1.1rem;
    }

    .row-2 {
      display: grid;
      gap: 1.1rem;
    }

    @media (min-width: 560px) {
      .row-2 { grid-template-columns: 1fr 1fr; }
    }

    label {
      display: grid;
      gap: 0.4rem;
      font-size: 0.88rem;
      font-weight: 500;
      color: rgba(244, 242, 239, 0.7);
    }

    input, textarea {
      width: 100%;
      font: inherit;
      color: var(--chalk);
      background: rgba(255, 255, 255, 0.04);
      border: 1px solid rgba(244, 242, 239, 0.14);
      border-radius: 2px;
      padding: 0.85rem 1rem;
      outline: none;
      transition: border-color 0.2s, background 0.2s, box-shadow 0.2s;
    }

    input:focus, textarea:focus {
      border-color: var(--orange);
      background: rgba(241, 90, 36, 0.06);
      box-shadow: 0 0 0 3px rgba(241, 90, 36, 0.15);
    }

    textarea {
      min-height: 140px;
      resize: vertical;
    }

    .choices {
      display: flex;
      flex-wrap: wrap;
      gap: 0.75rem 1.25rem;
      padding-top: 0.15rem;
    }

    .choices label {
      display: flex;
      align-items: center;
      gap: 0.45rem;
      font-weight: 400;
      color: rgba(244, 242, 239, 0.85);
    }

    .choices input {
      width: auto;
      margin: 0;
      accent-color: var(--orange);
    }

    .form-note {
      font-size: 0.85rem;
      color: rgba(244, 242, 239, 0.5);
      margin-top: -0.25rem;
    }

    .btn-submit {
      width: 100%;
      margin-top: 0.35rem;
    }

    .btn-submit svg { width: 18px; height: 18px; }

    /* —— Footer —— */
    footer {
      padding: 1.5rem clamp(1.25rem, 4vw, 3rem) 2rem;
      display: flex;
      flex-wrap: wrap;
      gap: 0.75rem 1.5rem;
      justify-content: space-between;
      align-items: center;
      border-top: 1px solid rgba(244, 242, 239, 0.06);
      font-size: 0.85rem;
      color: rgba(244, 242, 239, 0.45);
    }

    footer a:hover { color: var(--orange); }

    @keyframes kenBurns {
      from { transform: scale(1.06) translate(0, 0); }
      to { transform: scale(1.14) translate(-1.5%, -1%); }
    }

    @keyframes riseIn {
      from { opacity: 0; transform: translateY(28px); }
      to { opacity: 1; transform: translateY(0); }
    }

    @keyframes fadeDown {
      from { opacity: 0; transform: translateY(-12px); }
      to { opacity: 1; transform: translateY(0); }
    }

    @media (prefers-reduced-motion: reduce) {
      *, *::before, *::after {
        animation: none !important;
        transition: none !important;
      }
      .hero-bg { transform: none; }
    }
  </style>
</head>
<body>
  <header class="topbar">
    <a class="brand" href="#top" aria-label="MonUP inicio">
      <!-- Logo inspirado en @monupclimb -->
      <svg viewBox="0 0 64 64" fill="none" aria-hidden="true">
        <!-- Pico / A de la marca MonUP -->
        <path d="M8 54 L30 8 L34 18 L18 54 Z" fill="#f15a24"/>
        <path d="M30 8 L56 54 L42 54 L30 24 Z" fill="#1a1a1a"/>
        <path d="M30 8 L34 18 L30 24 Z" fill="#f15a24"/>
      </svg>
      <span class="brand-name">MonUP</span>
    </a>
    <a class="ig-link" href="https://www.instagram.com/monupclimb/" target="_blank" rel="noopener noreferrer">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true">
        <rect x="3" y="3" width="18" height="18" rx="5"/>
        <circle cx="12" cy="12" r="4"/>
        <circle cx="17.5" cy="6.5" r="1" fill="currentColor" stroke="none"/>
      </svg>
      @monupclimb
    </a>
  </header>

  <main id="top">
    <section class="hero" aria-label="Inicio">
      <div class="hero-bg" role="img" aria-label="Escalador en una pared de roca"></div>
      <div class="hero-grain" aria-hidden="true"></div>
      <div class="hero-copy">
        <p class="hero-brand">Mon<span>UP</span></p>
        <h1 class="hero-title">Entrenamiento de escalada 100% online</h1>
        <p class="hero-lead">Entendé cómo subir tu grado con un plan pensado para vos.</p>
        <div class="cta-row">
          <a class="btn btn-primary" href="#contacto">Empezar ahora</a>
          <a class="btn btn-ghost" href="https://www.instagram.com/monupclimb/" target="_blank" rel="noopener noreferrer">Ver Instagram</a>
        </div>
      </div>
    </section>

    <section class="section about" id="metodo" aria-labelledby="about-title">
      <div class="about-inner">
        <div>
          <p class="eyebrow">El método</p>
          <h2 id="about-title">Subí de grado con foco y constancia</h2>
          <p>
            Entrenamiento personalizado, feedback claro y progreso medible.
            Ideal si querés mejorar técnica, fuerza y lectura de vías sin depender
            solo del tiempo en el muro.
          </p>
        </div>
        <div class="about-visual">
          <img
            src="https://images.unsplash.com/photo-1564769662533-4f00a87b4056?auto=format&fit=crop&w=1200&q=80"
            alt="Persona escalando en boulder indoor"
            width="1200"
            height="800"
            loading="lazy"
          />
        </div>
      </div>
    </section>

@endverbatim

    <section class="section contact" id="contacto" aria-labelledby="contact-title">
      <div class="contact-inner">
        <p class="eyebrow">Contacto</p>
        <h2 id="contact-title">Escribime y arrancamos</h2>
        <p class="section-lead">
          Completá el formulario y te respondo a la brevedad.
        </p>

        @if (session('success'))
          <p class="form-note" role="status">{{ session('success') }}</p>
        @endif

        @if ($errors->any())
          <ul class="form-note" role="alert">
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        @endif

        <form id="contact-form" method="POST" action="{{ route('contact.store') }}">
          @csrf
          <label>
            Nombre completo
            <input type="text" name="nombre_completo" id="nombre_completo" autocomplete="name" required maxlength="120" placeholder="Tu nombre completo" value="{{ old('nombre_completo') }}" />
          </label>
          <div class="row-2">
            <label>
              Correo
              <input type="email" name="correo" id="correo" autocomplete="email" required maxlength="120" placeholder="tu@email.com" value="{{ old('correo') }}" />
            </label>
            <label>
              Teléfono
              <input type="tel" name="telefono" id="telefono" autocomplete="tel" required maxlength="40" placeholder="+54 …" value="{{ old('telefono') }}" />
            </label>
          </div>
          <div class="row-2">
            <label>
              Fecha de nacimiento
              <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" required value="{{ old('fecha_nacimiento') }}" />
            </label>
            <label>
              Ciudad
              <input type="text" name="ciudad" id="ciudad" autocomplete="address-level2" required maxlength="100" placeholder="Tu ciudad" value="{{ old('ciudad') }}" />
            </label>
          </div>
          <div class="row-2">
            <label>
              Nivel de escalada
              <input type="text" name="nivel_escalada" id="nivel_escalada" required maxlength="100" placeholder="Ej: V4 / 6a" value="{{ old('nivel_escalada') }}" />
            </label>
            <label>
              ¿Hace cuánto que escalas? (Tiempo)
              <input type="text" name="tiempo_escalando" id="tiempo_escalando" required maxlength="100" placeholder="Ej: 2 años" value="{{ old('tiempo_escalando') }}" />
            </label>
          </div>
          <fieldset style="border:0;padding:0;margin:0">
            <legend style="font-size:0.88rem;font-weight:500;color:rgba(244,242,239,0.7);margin-bottom:0.4rem">Modalidad de escalada que practicás</legend>
            <div class="choices">
              <label>
                <input type="checkbox" name="modalidad[]" value="boulder" @checked(in_array('boulder', old('modalidad', []), true)) />
                Boulder
              </label>
              <label>
                <input type="checkbox" name="modalidad[]" value="deportiva" @checked(in_array('deportiva', old('modalidad', []), true)) />
                Deportiva
              </label>
            </div>
          </fieldset>
          <label>
            ¿Cuál es tu objetivo principal?
            <textarea name="objetivo_principal" id="objetivo_principal" required maxlength="400" placeholder="Contame tu objetivo…">{{ old('objetivo_principal') }}</textarea>
          </label>
          <fieldset style="border:0;padding:0;margin:0">
            <legend style="font-size:0.88rem;font-weight:500;color:rgba(244,242,239,0.7);margin-bottom:0.4rem">¿Tuviste o tenés lesiones?</legend>
            <div class="choices">
              <label>
                <input type="radio" name="lesiones" value="si" required @checked(old('lesiones') === 'si') />
                Sí
              </label>
              <label>
                <input type="radio" name="lesiones" value="no" @checked(old('lesiones') === 'no') />
                No
              </label>
            </div>
          </fieldset>
          <label>
            Explicación de la lesión
            <textarea name="lesion_explicacion" id="lesion_explicacion" maxlength="400" placeholder="Si aplica, contanos brevemente…">{{ old('lesion_explicacion') }}</textarea>
          </label>
          <label>
            ¿Algún otro dato relevante que debamos saber sobre vos?
            <textarea name="dato_relevante" id="dato_relevante" maxlength="400" placeholder="Opcional">{{ old('dato_relevante') }}</textarea>
          </label>
          <fieldset style="border:0;padding:0;margin:0">
            <legend style="font-size:0.88rem;font-weight:500;color:rgba(244,242,239,0.7);margin-bottom:0.4rem">¿Alguna vez entrenaste de manera online?</legend>
            <div class="choices">
              <label>
                <input type="radio" name="entrenamiento_online" value="si" required @checked(old('entrenamiento_online') === 'si') />
                Sí
              </label>
              <label>
                <input type="radio" name="entrenamiento_online" value="no" @checked(old('entrenamiento_online') === 'no') />
                No
              </label>
            </div>
          </fieldset>
          <p class="form-note">Te escribo a la brevedad.</p>
          <button class="btn btn-primary btn-submit" type="submit">
            Empeza a subir de grado
          </button>
        </form>
      </div>
    </section>
  </main>

  <footer>
    <span>© <span id="year"></span> MonUP</span>
    <a href="https://www.instagram.com/monupclimb/" target="_blank" rel="noopener noreferrer">instagram.com/monupclimb</a>
  </footer>

  <script>
    document.getElementById("year").textContent = new Date().getFullYear();
  </script>
</body>
</html>
