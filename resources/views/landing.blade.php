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
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>MonUP — Entrenamiento de escalada online</title>
  <meta name="description" content="MonUP: entrenamiento de escalada 100% online. Entendé cómo subir tu grado." />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@600;700;800&family=Outfit:wght@400;500;600&display=swap" rel="stylesheet" />
  <style>
@verbatim
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

    html {
      scroll-behavior: smooth;
      overflow-x: clip;
      max-width: 100%;
    }

    body {
      font-family: "Outfit", sans-serif;
      color: var(--chalk);
      background: var(--ink);
      line-height: 1.5;
      overflow-x: clip;
      max-width: 100%;
      overscroll-behavior-x: none;
    }

    img { max-width: 100%; display: block; }

    a { color: inherit; text-decoration: none; }

    /* —— Header —— */
    .topbar {
      position: fixed;
      top: 0;
      left: 0;
      right: 0;
      z-index: 40;
      display: flex;
      align-items: center;
      justify-content: space-between;
      gap: 0.75rem;
      max-width: 100%;
      overflow: hidden;
      padding: max(0.7rem, env(safe-area-inset-top)) max(clamp(1rem, 4vw, 3rem), env(safe-area-inset-right)) 0.7rem max(clamp(1rem, 4vw, 3rem), env(safe-area-inset-left));
      background: transparent;
      animation: fadeDown 0.9s var(--ease) both;
    }

    .topbar::before,
    .topbar::after {
      content: "";
      position: absolute;
      inset: 0;
      z-index: -1;
      pointer-events: none;
      transition: opacity 0.45s var(--ease);
    }

    .topbar::before {
      background: linear-gradient(
        180deg,
        rgba(255, 255, 255, 0.5) 0%,
        rgba(255, 255, 255, 0.4) 16%,
        rgba(255, 255, 255, 0.3) 34%,
        rgba(255, 255, 255, 0.21) 50%,
        rgba(255, 255, 255, 0.14) 64%,
        rgba(255, 255, 255, 0.08) 76%,
        rgba(255, 255, 255, 0.04) 88%,
        rgba(255, 255, 255, 0) 100%
      );
      opacity: 1;
    }

    .topbar::after {
      background: #fff;
      opacity: 0;
    }

    .topbar.is-solid::before { opacity: 0; }
    .topbar.is-solid::after { opacity: 1; }

    .brand {
      display: flex;
      align-items: center;
      min-width: 0;
      flex: 1 1 auto;
    }

    .brand svg {
      display: block;
      width: min(9.5rem, 46vw);
      height: auto;
      aspect-ratio: 1339.13 / 445;
      max-width: 100%;
    }

    .ig-link {
      display: inline-flex;
      align-items: center;
      flex: 0 1 auto;
      min-width: 0;
      gap: 0.5rem;
      color: #121212;
      font-size: 1.05rem;
      font-weight: 600;
      white-space: nowrap;
      transition: color 0.25s, transform 0.25s var(--ease);
    }

    .ig-link:hover {
      transform: translateY(-1px);
      color: var(--orange);
    }

    .ig-link svg { width: 22px; height: 22px; }

    @media (max-width: 640px) {
      .brand svg { width: min(7.2rem, 42vw); }
      .ig-link { font-size: 0.82rem; gap: 0.35rem; }
      .ig-link svg { width: 18px; height: 18px; flex-shrink: 0; }
    }

    @media (max-width: 380px) {
      .ig-link { font-size: 0.75rem; }
    }

    /* —— Hero —— */
    .hero {
      position: relative;
      min-height: 100svh;
      display: grid;
      align-items: end;
      padding: clamp(5.5rem, 12svh, 7rem) clamp(1rem, 4vw, 3rem) clamp(2.5rem, 6svh, 4rem);
      overflow: clip;
      isolation: isolate;
    }

    .hero-bg {
      position: absolute;
      inset: -8%;
      z-index: -2;
      background:
        linear-gradient(180deg, rgba(18, 18, 18, 0.35) 0%, rgba(18, 18, 18, 0.55) 45%, rgba(18, 18, 18, 0.92) 100%),
        url("https://images.unsplash.com/photo-1522163182402-834f871fd851?auto=format&fit=crop&w=1920&q=80") center / cover no-repeat;
      transform: scale(1.04);
      animation: kenBurns 18s ease-in-out infinite alternate;
      will-change: transform;
    }

    .hero-grain {
      position: absolute;
      inset: 0;
      z-index: -1;
      opacity: 0.18;
      pointer-events: none;
      background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 200 200' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.85' numOctaves='3' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)'/%3E%3C/svg%3E");
    }

    .hero::before {
      content: "";
      position: absolute;
      inset: -12%;
      z-index: 0;
      pointer-events: none;
      background: linear-gradient(
        90deg,
        rgba(255, 255, 255, 0.48) 0%,
        rgba(255, 255, 255, 0.32) 26rem,
        rgba(255, 255, 255, 0.1) 38rem,
        rgba(18, 18, 18, 0.22) 46rem,
        rgba(18, 18, 18, 0.55) 100%
      );
    }

    .hero-copy {
      position: relative;
      z-index: 1;
      max-width: 38rem;
      animation: riseIn 1s var(--ease) 0.15s both;
    }

    .hero-brand {
      display: none;
    }

    .hero-title {
      margin: 0 0 1rem;
      max-width: 100%;
      overflow: hidden;
    }

    .hero-title svg {
      display: block;
      height: auto;
      max-width: 100%;
      width: min(100%, calc(clamp(8.5rem, 28svh, 13.5rem) * 770 / 620));
    }

    .hero-lead {
      font-size: clamp(1rem, 2.2vw, 1.15rem);
      color: rgba(18, 18, 18, 0.78);
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

    .hero .btn-ghost {
      color: #121212;
      border-color: rgba(18, 18, 18, 0.35);
    }

    .hero .btn-ghost:hover {
      background: #121212;
      color: var(--orange);
      border-color: var(--orange);
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
      padding: clamp(3.5rem, 8vw, 6rem) clamp(1rem, 4vw, 3rem);
      overflow-x: clip;
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
      max-width: 640px;
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

    .reveal {
      opacity: 0;
      transition: opacity 0.85s var(--ease), transform 0.85s var(--ease);
    }

    .reveal[data-reveal="up"] { transform: translateY(42px); }
    .reveal[data-reveal="left"] { transform: translateX(-52px); }
    .reveal[data-reveal="right"] { transform: translateX(52px); }

    .reveal.is-in {
      opacity: 1;
      transform: none;
    }

    @keyframes kenBurns {
      from { transform: scale(1.04) translate3d(0, 0, 0); }
      to { transform: scale(1.1) translate3d(-1.2%, -0.8%, 0); }
    }

    @keyframes riseIn {
      from { opacity: 0; transform: translateY(28px); }
      to { opacity: 1; transform: none; }
    }

    @keyframes fadeDown {
      from { opacity: 0; }
      to { opacity: 1; }
    }

    @media (max-width: 820px) {
      .hero-bg {
        animation: none;
        inset: 0;
        transform: none;
        will-change: auto;
      }

      .hero-title svg {
        width: min(100%, 15rem);
      }

      .hero::before { inset: 0; }

      .reveal[data-reveal="left"],
      .reveal[data-reveal="right"] {
        transform: translateY(28px);
      }

      .reveal.is-in { transform: none; }

      html { scroll-behavior: auto; }
    }

    .thanks {
      position: fixed;
      inset: 0;
      z-index: 80;
      display: grid;
      place-items: center;
      padding: 1.25rem;
    }

    .thanks-backdrop {
      position: absolute;
      inset: 0;
      border: 0;
      background: rgba(18, 18, 18, 0.62);
      cursor: pointer;
    }

    .thanks-card {
      position: relative;
      width: min(100%, 22rem);
      padding: 2.25rem 1.75rem 1.9rem;
      text-align: center;
      background: var(--chalk);
      color: var(--ink);
      border-radius: 2px;
      box-shadow: 0 24px 60px rgba(0, 0, 0, 0.35);
    }

    .thanks-tick {
      width: 4.25rem;
      height: 4.25rem;
      margin: 0 auto 1.1rem;
      border-radius: 50%;
      background: var(--orange);
      color: #fff;
      display: grid;
      place-items: center;
    }

    .thanks-tick svg { width: 2.15rem; height: 2.15rem; }

    .thanks-card p {
      margin: 0;
      font-family: "Barlow Condensed", sans-serif;
      font-weight: 800;
      font-size: 1.85rem;
      line-height: 1.05;
      text-transform: uppercase;
      letter-spacing: 0.02em;
    }

    .thanks-close {
      position: absolute;
      top: 0.55rem;
      right: 0.55rem;
      width: 2rem;
      height: 2rem;
      border: 0;
      background: transparent;
      color: rgba(18, 18, 18, 0.55);
      font-size: 1.4rem;
      line-height: 1;
      cursor: pointer;
    }

    .thanks-close:hover { color: var(--ink); }

    @media (prefers-reduced-motion: reduce) {
      *, *::before, *::after {
        animation: none !important;
        transition: none !important;
      }
      .hero-bg { transform: none; }
      .reveal {
        opacity: 1;
        transform: none;
      }
    }
@endverbatim
  </style>
</head>
<body>
  <header class="topbar">
    <a class="brand" href="#top">
      {!! str_replace('<svg ', '<svg role="img" aria-label="MonUP" ', file_get_contents(public_path('logo-black-horizontal.svg'))) !!}
    </a>
    <a class="ig-link" href="https://www.instagram.com/monupclimb/" target="_blank" rel="noopener noreferrer">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true">
        <rect x="3" y="3" width="18" height="18" rx="5"/>
        <circle cx="12" cy="12" r="4"/>
        <circle cx="17.5" cy="6.5" r="1" fill="currentColor" stroke="none"/>
      </svg>
      @@monupclimb
    </a>
  </header>

  <main id="top">
    <section class="hero" aria-label="Inicio">
      <div class="hero-bg" role="img" aria-label="Escalador en una pared de roca"></div>
      <div class="hero-grain" aria-hidden="true"></div>
      <div class="hero-copy">
        <p class="hero-brand">Mon<span>UP</span></p>
        <h1 class="hero-title">
          {!! str_replace('<svg ', '<svg role="img" aria-label="Entrenamiento de escalada 100% online" ', file_get_contents(public_path('logo-black.svg'))) !!}
        </h1>
        <p class="hero-lead">Entendé cómo subir tu grado con un plan pensado para vos.</p>
        <div class="cta-row">
          <a class="btn btn-primary" href="#contacto">Subir de grado</a>
          <a class="btn btn-ghost" href="https://www.instagram.com/monupclimb/" target="_blank" rel="noopener noreferrer">Ver Instagram</a>
        </div>
      </div>
    </section>

    <section class="section about" id="metodo" aria-labelledby="about-title">
      <div class="about-inner">
        <div class="reveal" data-reveal="left">
          <p class="eyebrow">El método</p>
          <h2 id="about-title">Subí de grado con foco y constancia</h2>
          <p>
            Entrenamiento personalizado, feedback claro y progreso medible.
            Ideal si querés mejorar técnica, fuerza y lectura de vías sin depender
            solo del tiempo en el muro.
          </p>
        </div>
        <div class="about-visual reveal" data-reveal="right">
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

    <section class="section contact" id="contacto" aria-labelledby="contact-title">
      <div class="contact-inner reveal" data-reveal="up">
        <p class="eyebrow">Contacto</p>
        <h2 id="contact-title">Escribime y arrancamos</h2>
        <p class="section-lead">
          Completá el formulario y la seguimos por WhatsApp.
        </p>

        <form id="contact-form" novalidate>
          <div class="row-2">
            <label>
              Nombre
              <input type="text" name="nombre" id="nombre" autocomplete="given-name" required placeholder="Tu nombre" />
            </label>
            <label>
              Apellido
              <input type="text" name="apellido" id="apellido" autocomplete="family-name" required placeholder="Tu apellido" />
            </label>
          </div>
          <label>
            Mensaje
            <textarea name="mensaje" id="mensaje" required placeholder="Contame tu nivel, objetivos o dudas…"></textarea>
          </label>
          <p class="form-note" style="opacity: 0;">Hablemos por WhatsApp.</p>
          <button class="btn btn-primary btn-submit" type="submit">
            <svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
              <path d="M12.04 2C6.58 2 2.15 6.4 2.15 11.83c0 2.08.62 4.02 1.7 5.65L2 22l4.7-1.77a9.8 9.8 0 0 0 5.34 1.56h.01c5.46 0 9.89-4.4 9.89-9.83C21.94 6.4 17.5 2 12.04 2Zm5.74 13.95c-.24.67-1.4 1.23-1.93 1.31-.5.07-1.12.1-1.81-.11-.42-.13-.96-.31-1.65-.61-2.9-1.25-4.78-4.17-4.93-4.36-.14-.2-1.2-1.6-1.2-3.05 0-1.46.76-2.17 1.03-2.47.27-.3.59-.37.79-.37h.57c.18 0 .42-.07.66.5.24.58.82 2 .89 2.15.07.14.12.32.02.51-.1.2-.15.32-.3.49-.14.17-.3.38-.43.51-.14.14-.29.29-.12.57.16.28.72 1.19 1.55 1.93 1.06.94 1.96 1.23 2.24 1.37.28.14.44.12.6-.07.17-.2.7-.81.89-1.09.18-.28.37-.23.62-.14.26.1 1.64.77 1.92.91.28.14.47.21.54.33.07.12.07.7-.17 1.37Z"/>
            </svg>
            Abrir WhatsApp
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
    const WHATSAPP_NUMBER = "5492966275693";

    document.getElementById("year").textContent = new Date().getFullYear();

    const topbar = document.querySelector(".topbar");
    const hero = document.querySelector(".hero");
    let topbarFrame = 0;

    function syncTopbar() {
      topbarFrame = 0;
      const pastHero = hero.getBoundingClientRect().bottom <= topbar.getBoundingClientRect().bottom;
      topbar.classList.toggle("is-solid", pastHero);
    }

    function requestTopbarSync() {
      if (topbarFrame) return;
      topbarFrame = requestAnimationFrame(syncTopbar);
    }

    syncTopbar();
    window.addEventListener("scroll", requestTopbarSync, { passive: true });
    window.addEventListener("resize", requestTopbarSync);

    const reveals = document.querySelectorAll(".reveal");
    if ("IntersectionObserver" in window) {
      const observer = new IntersectionObserver(function (entries) {
        entries.forEach(function (entry) {
          if (!entry.isIntersecting) return;
          entry.target.classList.add("is-in");
          observer.unobserve(entry.target);
        });
      }, { threshold: 0.2, rootMargin: "0px 0px -8% 0px" });
      reveals.forEach(function (el) { observer.observe(el); });
    } else {
      reveals.forEach(function (el) { el.classList.add("is-in"); });
    }

    document.getElementById("contact-form").addEventListener("submit", function (event) {
      event.preventDefault();

      const nombre = document.getElementById("nombre").value.trim();
      const apellido = document.getElementById("apellido").value.trim();
      const mensaje = document.getElementById("mensaje").value.trim();

      if (!nombre || !apellido || !mensaje) {
        alert("Completá nombre, apellido y mensaje para continuar.");
        return;
      }

      const texto =
        "Nombre: " + nombre + " " + apellido + "\n" +
        "Tu mensaje: \n" +
        mensaje;

      const url =
        "https://wa.me/" + WHATSAPP_NUMBER +
        "?text=" + encodeURIComponent(texto);

      window.open(url, "_blank", "noopener,noreferrer");
    });
  </script>
  @if (session('contacto_enviado'))
    <div class="thanks" role="dialog" aria-modal="true" aria-labelledby="thanks-title">
      <button class="thanks-backdrop" type="button" data-thanks-close aria-label="Cerrar"></button>
      <div class="thanks-card">
        <button class="thanks-close" type="button" data-thanks-close aria-label="Cerrar">&times;</button>
        <div class="thanks-tick" aria-hidden="true">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.6" stroke-linecap="round" stroke-linejoin="round">
            <path d="M5 12.5 9.5 17 19 7.5"/>
          </svg>
        </div>
        <p id="thanks-title">Gracias por tus respuestas.</p>
      </div>
    </div>
    <script>
      document.querySelectorAll("[data-thanks-close]").forEach(function (button) {
        button.addEventListener("click", function () {
          var dialog = document.querySelector(".thanks");
          if (dialog) dialog.remove();
        });
      });
      document.addEventListener("keydown", function (event) {
        if (event.key !== "Escape") return;
        var dialog = document.querySelector(".thanks");
        if (dialog) dialog.remove();
      });
    </script>
  @endif
</body>
</html>
