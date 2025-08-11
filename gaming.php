<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Digital RP | Gaming</title>
  <link rel="icon" type="image/png" href="imagenes/logo.png">
  <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700&display=swap" rel="stylesheet">
  <style>
    /* ======= BASE ======= */
    *{margin:0;padding:0;box-sizing:border-box}
    body{font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;background:linear-gradient(135deg,#667eea 0%,#764ba2 100%);min-height:100vh;color:#333;line-height:1.6}
    header{background:rgba(255,255,255,.95);backdrop-filter:blur(10px);box-shadow:0 8px 32px rgba(0,0,0,.1);position:fixed;width:100%;top:0;z-index:1000;transition:all .3s}
    .header-content{max-width:1200px;margin:0 auto;padding:0 2rem;display:flex;justify-content:space-between;align-items:center;height:80px;position:relative}
    .logo h1{font-size:2rem;font-weight:700;background:linear-gradient(45deg,#667eea,#764ba2);-webkit-background-clip:text;-webkit-text-fill-color:transparent}
    nav ul{display:flex;list-style:none;gap:2rem;align-items:center}
    nav a{text-decoration:none;color:#333;font-weight:500;padding:.5rem 1rem;border-radius:25px;transition:all .3s}
    nav a:hover{background:linear-gradient(45deg,#667eea,#764ba2);color:white;transform:translateY(-2px)}
    .active{background:linear-gradient(45deg,#667eea,#764ba2);color:white!important}
    .cart-btn{background:linear-gradient(45deg,#667eea,#764ba2);color:white!important;padding:.7rem 1.5rem!important;border-radius:30px;font-weight:600;box-shadow:0 4px 15px rgba(102,126,234,.4);position:relative}
    .cart-count{background:#ff4757;color:white;border-radius:50%;width:20px;height:20px;display:inline-flex;align-items:center;justify-content:center;font-size:.8rem;margin-left:.5rem;transition:transform .3s}
    .cart-btn .cart-count.animate{animation:bounce .5s ease}
    @keyframes bounce{0%,100%{transform:scale(1)}30%{transform:scale(1.5)}50%{transform:scale(.9)}70%{transform:scale(1.2)}}

    /* HERO */
    .hero{margin-top:150px;min-height:50vh;display:flex;align-items:center;justify-content:center;text-align:center;color:white;padding:4rem 2rem;position:relative;overflow:hidden;background:linear-gradient(135deg,#1a1a2e 0%,#16213e 100%);border-bottom:3px solid #00eeff;box-shadow:inset 0 0 50px rgba(0,238,255,.2)}
    .hero::before{content:'';position:absolute;inset:0;background:url('https://images.unsplash.com/photo-1550745165-9bc0b252726f?q=80&w=2070') center/cover no-repeat;opacity:.2;z-index:1}
    .hero-content{position:relative;z-index:2;max-width:800px;animation:fadeInUp 1s ease-out}
    .hero h1{font-size:3.5rem;margin-bottom:1rem;text-shadow:0 2px 10px rgba(0,0,0,.5);background:linear-gradient(45deg,#00eeff,#ff00aa);-webkit-background-clip:text;-webkit-text-fill-color:transparent;font-family:'Orbitron',sans-serif}
    .hero p{font-size:1.3rem;margin-bottom:2rem;opacity:.9;max-width:600px;margin:0 auto 2rem}

    /* FEATURED / GRID BASE */
    .featured{padding:6rem 2rem;background:rgba(255,255,255,.95);position:relative;overflow:hidden}
    .featured::before{content:'';position:absolute;inset:0;background:none;z-index:1}
    .featured-container{max-width:1200px;margin:0 auto;position:relative;z-index:2}
    .section-title{text-align:center;font-size:2.5rem;margin-bottom:1.2rem;color:#333;position:relative;font-family:'Orbitron',sans-serif;text-transform:uppercase;letter-spacing:2px}
    .section-title::after{content:'';position:absolute;bottom:-10px;left:50%;transform:translateX(-50%);width:100px;height:4px;background:linear-gradient(45deg,#00eeff,#ff00aa);border-radius:2px}

    :root{--neon-cyan:#00eeff;--neon-magenta:#ff00aa;--neon-glow:0 12px 40px rgba(0,238,255,.12)}

    /* ===== SHOWCASE (carrusel) estilos actualizados: slides uniformes ===== */
    .showcase-wrap{margin-top:2.5rem;padding:20px;border-radius:16px;background:linear-gradient(180deg,rgba(0,0,0,.03),rgba(0,0,0,.01));box-shadow:0 20px 50px rgba(0,0,0,.08);position:relative;overflow:visible}
    .showcase{position:relative;width:100%;padding:18px 8px;display:flex;align-items:center;justify-content:center;gap:18px;perspective:1400px;user-select:none}
    .showcase-track{display:flex;gap:22px;transition:transform .55s cubic-bezier(.22,.9,.25,1);will-change:transform;align-items:center;padding:6px 18px}
    .showcase-slide{flex:0 0 auto;width:360px;height:480px;border-radius:14px;background:linear-gradient(180deg,#0b0b12,#0f0f18);color:#fff;box-shadow:0 10px 30px rgba(0,0,0,.45);overflow:hidden;position:relative;border:1px solid rgba(255,255,255,.04);display:flex;flex-direction:column}
    .visual{height:56%;display:flex;align-items:center;justify-content:center;overflow:hidden;background:linear-gradient(135deg,rgba(0,238,255,.03),rgba(255,0,170,.02))}
    .showcase-slide img{width:82%;height:auto;max-height:100%;object-fit:contain;transition:transform .45s ease;filter:drop-shadow(0 10px 30px rgba(0,0,0,.6))}
    .showcase-meta{padding:14px 16px;display:flex;flex-direction:column;gap:8px;flex:1}
    .showcase-brand{color:var(--neon-cyan);font-weight:700;font-size:.9rem;letter-spacing:1px}
    .showcase-title{font-size:1.05rem;font-weight:800;color:#fff;min-height:44px}
    .showcase-desc{color:#bfc6d2;font-size:.9rem;min-height:48px}
    .showcase-price{color:var(--neon-magenta);font-weight:900;font-size:1.2rem}
    .showcase-cta{margin-top:8px;align-self:stretch;display:flex;gap:8px}
    .btn-neon{background:linear-gradient(45deg,var(--neon-cyan),var(--neon-magenta));border:none;color:white;padding:.6rem .9rem;border-radius:10px;cursor:pointer;font-weight:800;box-shadow:var(--neon-glow);transition:transform .18s,box-shadow .18s;flex:1}
    .btn-outline{background:transparent;border:2px solid rgba(255,255,255,.06);color:#fff;padding:.5rem .8rem;border-radius:10px;cursor:pointer;font-weight:700}
    .slide-badge{position:absolute;left:14px;top:14px;background:linear-gradient(45deg,var(--neon-magenta),var(--neon-cyan));padding:6px 10px;border-radius:999px;font-weight:800;font-size:.82rem;color:#fff;z-index:8;box-shadow:0 8px 28px rgba(255,0,170,.12)}
    .center-glow{position:absolute;bottom:-45px;left:50%;transform:translateX(-50%);width:40%;height:60px;background:radial-gradient(ellipse at center, rgba(0,238,255,.18), rgba(255,0,170,.06) 40%, transparent 70%);filter:blur(30px);z-index:2;pointer-events:none}
    .showcase-arrow{position:absolute;top:50%;transform:translateY(-50%);width:56px;height:56px;border-radius:999px;border:none;display:flex;align-items:center;justify-content:center;font-size:1.8rem;cursor:pointer;z-index:30;background:linear-gradient(45deg,rgba(0,238,255,.12),rgba(255,0,170,.12));color:#fff;box-shadow:0 8px 30px rgba(0,0,0,.35)}
    .showcase-arrow.left{left:8px}.showcase-arrow.right{right:8px}
    .showcase-dots{display:flex;gap:10px;justify-content:center;margin-top:12px}
    .showcase-dot{width:12px;height:12px;border-radius:999px;background:rgba(255,255,255,.12);cursor:pointer;transition:transform .18s}
    .showcase-dot.active{background:linear-gradient(45deg,var(--neon-cyan),var(--neon-magenta));transform:scale(1.25);box-shadow:0 8px 26px rgba(102,126,234,.12)}
    @media(max-width:1024px){.showcase-slide{width:320px;height:440px}}
    @media(max-width:768px){.showcase-slide{width:86%;height:420px}.showcase-track{gap:12px;padding:6px 12px}.showcase-arrow{width:46px;height:46px}}

    /* ====== PRODUCT CARDS: REDISEÑO GAMING ====== */
    .products-grid{display:grid;grid-template-columns:repeat(auto-fit,minmax(240px,1fr));gap:1.5rem;margin-top:1rem;align-items:start}
    .product-card{position:relative;border-radius:14px;overflow:hidden;padding:0;background:linear-gradient(180deg,#0f1224,#0b0d16);color:#fff;border:1px solid rgba(255,255,255,0.04);box-shadow:0 18px 40px rgba(0,0,0,0.5);transition:transform .28s ease,box-shadow .28s;display:flex;flex-direction:column}
    .product-card:hover{transform:translateY(-8px) scale(1.01);box-shadow:0 28px 70px rgba(0,0,0,0.6)}
    .product-ribbon{position:absolute;right:12px;top:12px;background:linear-gradient(45deg,#ffcc00,#ff6b00);color:#111;padding:6px 10px;border-radius:999px;font-weight:800;z-index:9;box-shadow:0 8px 24px rgba(255,107,0,.12)}
    .pc-image-wrap{background:linear-gradient(135deg,rgba(0,238,255,.03),rgba(255,0,170,.02));display:flex;align-items:center;justify-content:center;height:180px;position:relative;border-bottom:1px solid rgba(255,255,255,0.03)}
    .pc-image-wrap img{width:75%;height:75%;object-fit:contain;transition:transform .35s ease}
    .product-card:hover .pc-image-wrap img{transform:scale(1.06) rotate(-2deg)}
    .pc-body{padding:14px;display:flex;flex-direction:column;gap:8px}
    .pc-brand{color:var(--neon-cyan);font-weight:800;font-size:.85rem;letter-spacing:.8px}
    .pc-title{font-size:1.05rem;font-weight:800;color:#fff;min-height:44px}
    .pc-desc{color:#bfc6d2;font-size:.92rem;min-height:36px}
    .pc-specs{display:flex;gap:8px;flex-wrap:wrap;margin-top:6px}
    .spec{background:rgba(255,255,255,0.04);padding:6px 8px;border-radius:8px;font-size:.82rem;color:#e6eefc;border:1px solid rgba(255,255,255,0.03)}
    .pc-footer{display:flex;align-items:center;justify-content:space-between;gap:12px;margin-top:8px}
    .pc-price{color:var(--neon-magenta);font-weight:900;font-size:1.18rem}
    .pc-cta{display:flex;gap:8px;align-items:center}
    .buy-btn{background:linear-gradient(45deg,var(--neon-cyan),var(--neon-magenta));color:#fff;padding:.55rem .9rem;border-radius:10px;border:none;font-weight:900;cursor:pointer;box-shadow:0 12px 36px rgba(102,126,234,.12)}
    .info-btn{background:transparent;color:#fff;padding:.45rem .7rem;border-radius:8px;border:1px solid rgba(255,255,255,.06);cursor:pointer;font-weight:700}
    .gaming-tag{position:absolute;top:12px;left:12px;background:linear-gradient(45deg,var(--neon-cyan),#00a7ff);color:#002;padding:6px 10px;border-radius:999px;font-weight:800;z-index:9;box-shadow:0 8px 24px rgba(0,238,255,.08)}

    /* ====== NUEVA SECCIÓN DE REDES SOCIALES ====== */
    .social-section {
      padding: 4rem 2rem;
      background: linear-gradient(270deg, #ff007f, #7f00ff, #00fff7, #ff007f);
      background-size: 600% 600%;
      animation: neonGradient 8s ease infinite;
      color: #fff;
      text-align: center;
      margin-top: 32px;
      border-radius: 15px;
      box-shadow: 0 0 30px rgba(255, 0, 150, 0.4);
    }
    @keyframes neonGradient {
      0% { background-position: 0% 50%; }
      50% { background-position: 100% 50%; }
      100% { background-position: 0% 50%; }
    }
    .social-container {
      max-width: 1200px;
      margin: 0 auto;
    }
    .social-links {
      display: flex;
      justify-content: center;
      gap: 1rem;
      margin-top: 1.25rem;
      flex-wrap: wrap;
    }
    .social-link {
      display: flex;
      align-items: center;
      gap: 0.6rem;
      background: rgba(0, 0, 0, 0.6);
      padding: 0.9rem 1.4rem;
      border-radius: 30px;
      text-decoration: none;
      color: #fff;
      font-weight: bold;
      transition: all 0.22s ease;
      box-shadow: 0 0 15px rgba(255, 0, 150, 0.6);
      animation: pulse 1.5s infinite;
    }
    .social-link svg {
      width: 20px;
      height: 20px;
      fill: currentColor;
    }
    .social-link:hover {
      transform: scale(1.08);
      box-shadow: 0 0 25px rgba(0, 255, 247, 0.8), 0 0 45px rgba(255, 0, 150, 0.7);
    }
    @keyframes pulse {
      0%, 100% {
        box-shadow: 0 0 15px rgba(255, 0, 150, 0.6);
      }
      50% {
        box-shadow: 0 0 25px rgba(0, 255, 247, 0.9);
      }
    }

    /* Cart modal neutral / verde checkout */
    .cart-modal{display:none;position:fixed;top:0;left:0;width:100%;height:100%;background:rgba(0,0,0,.6);z-index:2000;backdrop-filter:blur(4px)}
    .cart-content{position:absolute;top:50%;left:50%;transform:translate(-50%,-50%);background:#fff;border-radius:14px;padding:18px;max-width:520px;width:92%;max-height:80vh;overflow-y:auto;border:2px solid rgba(0,0,0,.06);box-shadow:0 20px 60px rgba(0,0,0,.3)}
    .cart-header{display:flex;justify-content:space-between;align-items:center;margin-bottom:1rem}
    .cart-header h3{color:#222;font-family:inherit}
    .close-cart{background:none;border:none;font-size:1.6rem;cursor:pointer;color:#222}
    .cart-item{display:flex;justify-content:space-between;align-items:center;padding:8px 0;border-bottom:1px solid #eee}
    .cart-total{font-size:1.15rem;font-weight:700;text-align:right;margin-top:12px;color:#222}
    .payment-methods{margin-top:1rem;text-align:center;display:none}
    .payment-methods h4{margin-bottom:.5rem}
    .pay-btn{display:block;background:linear-gradient(45deg,#667eea,#764ba2);color:#fff;padding:.7rem;border-radius:20px;text-decoration:none;margin:.3rem 0}

    footer{background:#333;color:white;padding:3rem 2rem 1rem;text-align:center}
    .footer-content{max-width:1200px;margin:0 auto}
    .footer-links{display:flex;justify-content:center;gap:2rem;margin-bottom:2rem}
    .footer-links a{color:#ccc;text-decoration:none;transition:color .3s}
    .footer-links a:hover{color:#667eea}

    @keyframes fadeInUp{from{opacity:0;transform:translateY(30px)}to{opacity:1;transform:translateY(0)}}
    @media(max-width:768px){.products-grid{grid-template-columns:1fr}.hero h1{font-size:2.5rem}}
  </style>
</head>
<body>
  <header>
    <div class="header-content">
      <div class="logo">
        <a href="index.php" style="text-decoration:none;color:inherit;"><h1>DIGITAL RP</h1></a>
      </div>
      <nav>
        <ul>
        <li><a href="componentes.php">Componentes</a></li>
        <li><a href="audio.php">Audio</a></li>
        <li><a href="cableado.php">Cableado</a></li>
        <li><a href="gaming.php" class="active">Gaming</a></li>
        <li><a href="electronica.php">Electrónica</a></li>
        <li><a href="varios.php">Varios</a></li>
      </ul>
    </nav>
      <a href="#" class="cart-btn" onclick="toggleCart()">🛒 Carrito <span class="cart-count" id="cart-count">0</span></a>
    </div>

    <form class="search-container" action="buscar.php" method="GET" style="display:flex;justify-content:center;padding:1rem 2rem;background:rgba(255,255,255,.95);">
      <input type="text" id="search-bar" name="q" placeholder="Buscar productos..." style="width:50%;padding:.8rem 1.5rem;border-radius:25px 0 0 25px;border:1px solid #ddd;border-right:none;font-size:1rem;">
      <button class="search-btn" type="submit" style="padding:.8rem 1.5rem;border-radius:0 25px 25px 0;border:1px solid #ddd;background:#f8f8f8;cursor:pointer;">🔍</button>
    </form>
  </header>

  <section class="hero">
    <div class="hero-content">
      <h1>Mundo Gaming</h1>
      <p>Descubre los productos más vendidos para llevar tu experiencia de juego al siguiente nivel</p>
    </div>
  </section>

  <section class="featured">
    <div class="featured-container">
      <h2 class="section-title">Productos Gaming Más Vendidos</h2>

      <!-- PRODUCT GRID -->
      <div class="products-grid" id="gaming-products"></div>

      <!-- CARRUSEL GAMING -->
      <div class="showcase-wrap" aria-label="Carrusel Gaming Destacado">
        <div class="showcase" id="showcase">
          <button class="showcase-arrow left" id="show-left" aria-label="Anterior">‹</button>
          <div class="showcase-track" id="showcase-track" role="list"></div>
          <button class="showcase-arrow right" id="show-right" aria-label="Siguiente">›</button>
          <div class="center-glow" aria-hidden="true"></div>
        </div>
        <div style="margin-top:12px;display:flex;flex-direction:column;align-items:center;">
          <div class="showcase-dots" id="showcase-dots" role="tablist" aria-label="Navegación del carrusel"></div>
        </div>
      </div>

      <!-- Nueva sección de redes sociales -->
      <div class="social-section" aria-label="Síguenos en redes">
        <div class="social-container">
          <h2 class="section-title" style="color:#fff; font-size:1.9rem; margin-bottom:.6rem;">
            Síguenos en Redes Sociales
          </h2>
          <p style="color:#f8f8f8; margin-bottom:1rem;">Mantente al día con nuestras ofertas y productos nuevos</p>
          <div class="social-links">
            <a href="https://wa.me/573001234567" class="social-link" target="_blank">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M380.9 97.1C339 55.2 283.2 32 224 32 100.3 32 0 132.3 0 256c0 45 11.8 88.9 34.3 127.2L0 480l100.1-33.1C137.6 466.6 180.1 480 224 480c123.7 0 224-100.3 224-224 0-59.2-23.2-115-67.1-158.9zM224 438.4c-40.8 0-80.4-12.2-114.1-35.1l-8.2-5.6-59.3 19.6 19.8-57.9-5.3-8.3C38.3 315 26 286.4 26 256c0-109.2 88.8-198 198-198 53 0 102.9 20.7 140.4 58.1 37.4 37.4 58.1 87.4 58.1 140.4 0 109.2-88.8 198-198 198zm101.1-138.7c-5.5-2.8-32.5-16-37.5-17.9-5-1.9-8.6-2.8-12.2 2.8s-14 17.9-17.2 21.6c-3.2 3.7-6.3 4.1-11.8 1.4-32.1-16-53.1-28.6-74.2-64.5-5.6-9.7 5.6-9 16-30.1 1.8-3.7.9-6.9-.5-9.7-1.4-2.8-12.2-29.4-16.7-40.3-4.4-10.6-8.9-9.1-12.2-9.3-3.1-.2-6.9-.2-10.6-.2s-9.7 1.4-14.8 6.9c-5 5.5-19.5 19.1-19.5 46.6s20 54.1 22.8 57.8c2.8 3.7 39.3 60.1 95.1 84.3 13.3 5.7 23.6 9.1 31.7 11.6 13.3 4.2 25.4 3.6 35-2.2 10.8-6.6 32.5-31.9 37.1-44.6 4.6-12.8 4.6-23.7 3.2-26.5-1.3-2.9-5-4.5-10.5-7.3z"/></svg>
              WhatsApp
            </a>
            <a href="https://instagram.com/digitalrp.store" class="social-link" target="_blank">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9S160.5 370.8 224.1 370.8 339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.6-74.7-74.7s33.6-74.7 74.7-74.7 74.7 33.6 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zM398.8 80C362 43.2 314.4 24 262.1 24H185.9C133.6 24 86 43.2 49.2 80 12.3 116.8-7 164.4-7 216.9V295c0 52.5 19.3 100.1 56.2 137 36.8 36.8 84.3 56.2 137 56.2H262c52.5 0 100.1-19.3 137-56.2 36.8-36.8 56.2-84.3 56.2-137V216.9c0-52.5-19.3-100.1-56.2-137zM224.1 338c-45.4 0-82.1-36.7-82.1-82.1s36.7-82.1 82.1-82.1 82.1 36.7 82.1 82.1-36.7 82.1-82.1 82.1z"/></svg>
              Instagram
            </a>
            <a href="https://facebook.com/digitalrp.store" class="social-link" target="_blank">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path d="M279.14 288l14.22-92.66h-88.91v-60.13c0-25.35 12.42-50.06 52.24-50.06h40.42V6.26S293.32 0 269.4 0c-73.22 0-121.06 44.38-121.06 124.72V195.3H86.41V288h61.93v224h92.66V288z"/></svg>
              Facebook
            </a>
            <a href="mailto:info@digitalrp.store" class="social-link">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M502.3 190.8L327.4 338.5c-15.5 12.6-38.3 12.6-53.8 0L9.7 190.8C3.9 186.5 0 179.1 0 171.2V128c0-26.5 21.5-48 48-48h416c26.5 0 48 21.5 48 48v43.2c0 7.9-3.9 15.3-9.7 19.6zM480 208L336 320c-35.3 28.6-86.7 28.6-122 0L32 208v176c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V208z"/></svg>
              Email
            </a>
          </div>
        </div>
      </div>

    </div>
  </section>

  <!-- WhatsApp Float Button -->
  <a href="https://wa.me/573001234567?text=Hola,%20estoy%20interesado%20en%20sus%20productos%20gaming" class="whatsapp-float" target="_blank" style="position:fixed;bottom:20px;right:20px;background:#25d366;color:#fff;border-radius:50%;width:60px;height:60px;display:flex;align-items:center;justify-content:center;z-index:1000;box-shadow:0 4px 15px rgba(37,211,102,.4);">📱</a>

  <!-- Cart Modal (neutral + verde checkout) -->
  <div class="cart-modal" id="cart-modal">
    <div class="cart-content">
      <div class="cart-header">
        <h3>Tu Carrito</h3>
        <button class="close-cart" onclick="toggleCart()">×</button>
      </div>
      <div id="cart-items"></div>
      <div class="cart-total">Total: $<span id="cart-total">0</span></div>
      <div class="payment-methods" id="payment-methods">
        <h4>Métodos de Pago</h4>
        <a href="https://checkout.wompi.co" target="_blank" class="pay-btn">Wompi</a>
        <a href="https://www.mercadopago.com" target="_blank" class="pay-btn">MercadoPago</a>
        <a href="https://www.pse.com.co" target="_blank" class="pay-btn">PSE</a>
      </div>
    </div>
  </div>

  <footer>
    <div class="footer-content">
      <div class="footer-links">
        <a href="#">Términos y Condiciones</a>
        <a href="#">Política de Privacidad</a>
        <a href="#">Contacto</a>
        <a href="#">Soporte</a>
      </div>
      <p>&copy; 2025 Digital RP - Todos los derechos reservados</p>
      <p>Visítanos en: <strong>digitalrp.store</strong></p>
      <p>📱 WhatsApp: +57 300 123 4567 | ✉️ info@digitalrp.store</p>
    </div>
</footer>

  <script src="carrito.js"></script>
  <script>
    /***** Datos de productos (igual a lo que tenías) *****/
    const productosGaming = [
      { id:1, nombre:"PlayStation 5", precio:2200000, imagenes:["https://images.unsplash.com/photo-1606144042614-b2417e99c4e3?q=80&w=2070"], descripcion:"Consola de última generación con SSD ultrarrápido", marca:"SONY", nuevo:true },
      { id:2, nombre:"Xbox Series X", precio:2100000, imagenes:["https://images.unsplash.com/photo-1605901309584-818e25960a8f?q=80&w=1618"], descripcion:"Potente consola con compatibilidad con 4K y 120 FPS", marca:"MICROSOFT" },
      { id:3, nombre:"Nintendo Switch OLED", precio:1500000, imagenes:["https://images.unsplash.com/photo-1550745165-9bc0b252726f?q=80&w=2070"], descripcion:"Consola híbrida con pantalla OLED de 7 pulgadas", marca:"NINTENDO" },
      { id:4, nombre:"RTX 4090", precio:8500000, imagenes:["https://images.unsplash.com/photo-1593640408182-31c70c8268f5?q=80&w=2042"], descripcion:"Tarjeta gráfica más potente del mercado para gaming en 4K", marca:"NVIDIA", nuevo:true },
      { id:5, nombre:"Monitor Gamer 240Hz", precio:1800000, imagenes:["https://images.unsplash.com/photo-1546435770-a3e426bf472b?q=80&w=2065"], descripcion:"Monitor curvo de 27 pulgadas con 240Hz y 1ms de respuesta", marca:"SAMSUNG" },
      { id:6, nombre:"Teclado Mecánico RGB", precio:450000, imagenes:["https://images.unsplash.com/photo-1618384887929-16ec33fab9ef?q=80&w=1780"], descripcion:"Teclado mecánico con switches Cherry MX y RGB personalizable", marca:"RAZER" },
      { id:7, nombre:"Mouse Gamer Inalámbrico", precio:350000, imagenes:["https://images.unsplash.com/photo-1625842267909-4148ab8a5b7a?q=80&w=2070"], descripcion:"Mouse inalámbrico con sensor de 25K DPI y 70h de batería", marca:"LOGITECH" },
      { id:8, nombre:"Auriculares 7.1 Surround", precio:550000, imagenes:["https://images.unsplash.com/photo-1606220588910-4a5d5a0f6c6c?q=80&w=2070"], descripcion:"Auriculares con sonido envolvente 7.1 y micrófono retráctil", marca:"STEELSERIES" },
      { id:9, nombre:"Silla Gamer Ergonómica", precio:1200000, imagenes:["https://images.unsplash.com/photo-1593642632823-8f785ba67e45?q=80&w=1932"], descripcion:"Silla ergonómica con soporte lumbar y reposacabezas ajustable", marca:"COOLER MASTER" },
      { id:10, nombre:"Volante Gamer Force Feedback", precio:1800000, imagenes:["https://images.unsplash.com/photo-1576153192396-180ecef15b0c?q=80&w=1974"], descripcion:"Volante con force feedback 900° y pedales metálicos", marca:"LOGITECH" }
    ];

    // animación de contador
    function animarCarrito(){ const cc = document.getElementById('cart-count'); cc.classList.add('animate'); setTimeout(()=>cc.classList.remove('animate'),500); }

    function agregarAlCarrito(id){
      const producto = productosGaming.find(p=>p.id===id);
      if(producto){
        agregarProductoCarrito(producto);
        animarCarrito();
      }
    }

    /* ====== GRID RENDER ====== */
    function cargarProductosGaming(){
      const container = document.getElementById('gaming-products');
      container.innerHTML = '';
      productosGaming.forEach((p, idx) => {
        const card = document.createElement('div');
        card.className = 'product-card';
        const specs = [
          (p.marca||''),
          (p.nombre.includes('RTX') ? '4K Ready' : 'Alta Precisión'),
          (p.nombre.includes('Monitor') ? '240Hz' : 'RGB')
        ];
        const ribbon = (p.nuevo) ? `<div class="product-ribbon">NUEVO</div>` : (idx<3 ? `<div class="product-ribbon">TOP</div>` : '');
        card.innerHTML = `\n          ${ribbon}\n          <div class="gaming-tag">GAMING</div>\n          <div class="pc-image-wrap">\n            <img src="${p.imagenes[0]}" alt="${p.nombre}" onerror="this.style.display='none'">\n          </div>\n          <div class="pc-body">\n            <div class="pc-brand">${p.marca}</div>\n            <div class="pc-title">${p.nombre}</div>\n            <div class="pc-desc">${p.descripcion}</div>\n            <div class="pc-specs">${specs.map(s=>`<div class="spec">${s}</div>`).join('')}</div>\n            <div class="pc-footer">\n              <div class="pc-price">$${p.precio.toLocaleString()}</div>\n              <div class="pc-cta">\n                <button class="buy-btn" onclick="agregarAlCarrito(${p.id})">COMPRAR</button>\n                <button class="info-btn" onclick="window.open('https://wa.me/573001234567?text=Hola%20quiero%20info%20del%20producto%20${encodeURIComponent(p.nombre)}','_blank')">INFO</button>\n              </div>\n            </div>\n          </div>\n        `;
        container.appendChild(card);
      });
    }

    /* ====== CARRUSEL (showcase) logic - uniforme ====== */
    const showcaseState = { idx:0, slidesPerView:3, autoplay:true, interval:3000, timer:null, touch:{startX:0,endX:0} };

    function buildShowcase(){
      const track = document.getElementById('showcase-track');
      track.innerHTML = '';
      const slides = productosGaming.slice();
      slides.forEach((p,i)=>{
        const s = document.createElement('div');
        s.className = 'showcase-slide';
        const badge = (p.nuevo) ? '<div class="slide-badge">NUEVO</div>' : (i<3 ? '<div class="slide-badge">TOP</div>' : '');
        s.innerHTML = `\n          ${badge}\n          <div class="visual"><img src="${p.imagenes[0]}" alt="${p.nombre}" onerror="this.style.display='none'"></div>\n          <div class="showcase-meta">\n            <div class="showcase-brand">${p.marca}</div>\n            <div class="showcase-title">${p.nombre}</div>\n            <div class="showcase-desc">${p.descripcion}</div>\n            <div style="display:flex;align-items:center;justify-content:space-between;margin-top:6px">\n              <div class="showcase-price">$${p.precio.toLocaleString()}</div>\n            </div>\n            <div class="showcase-cta">\n              <button class="btn-neon" onclick="agregarAlCarrito(${p.id})">Comprar</button>\n              <button class="btn-outline" onclick="window.open('https://wa.me/573001234567?text=Hola%20quiero%20info%20del%20producto%20${encodeURIComponent(p.nombre)}','_blank')">Info</button>\n            </div>\n          </div>\n        `;
        s.dataset.index = i;
        track.appendChild(s);
      });
      buildDotsAndControls();
      adjustSlidesPerView();
      updateShowcaseTransform();
      startShowcaseAutoplay();
      attachInteraction();
    }

    function buildDotsAndControls(){
      const dots = document.getElementById('showcase-dots'); dots.innerHTML='';
      for(let i=0;i<productosGaming.length;i++){
        const d = document.createElement('div'); d.className='showcase-dot'; d.dataset.i=i;
        d.addEventListener('click', ()=>{ showcaseGoTo(i); resetShowcaseAutoplay(); });
        dots.appendChild(d);
      }
      document.getElementById('show-left').addEventListener('click', ()=>{ showcasePrev(); resetShowcaseAutoplay(); });
      document.getElementById('show-right').addEventListener('click', ()=>{ showcaseNext(); resetShowcaseAutoplay(); });
    }

    function adjustSlidesPerView(){
      const w = window.innerWidth;
      if (w >= 1280) showcaseState.slidesPerView = 3;
      else if (w >= 900) showcaseState.slidesPerView = 2;
      else showcaseState.slidesPerView = 1;
      document.querySelectorAll('.showcase-slide').forEach(slide=>{
        if (showcaseState.slidesPerView === 1) slide.style.width = '86%';
        else if (showcaseState.slidesPerView === 2) slide.style.width = '46%';
        else slide.style.width = '360px';
      });
    }

    function updateShowcaseTransform(){
      const track = document.getElementById('showcase-track');
      const slides = document.querySelectorAll('.showcase-slide');
      if (!slides.length) return;

      let idx = showcaseState.idx;
      if (idx < 0) idx = 0;
      if (idx > slides.length - 1) idx = slides.length - 1;
      showcaseState.idx = idx;

      const container = document.getElementById('showcase');
      const containerWidth = container.getBoundingClientRect().width;

      let offset = 0;
      for (let i = 0; i < idx; i++) {
        offset += slides[i].getBoundingClientRect().width + parseFloat(getComputedStyle(slides[i]).marginRight || 22);
      }

      const active = slides[idx];
      const activeWidth = active.getBoundingClientRect().width;
      const target = offset - (containerWidth / 2 - activeWidth / 2);
      track.style.transform = `translateX(-${Math.max(0, target)}px)`;

      slides.forEach((s, i) => {
        const distance = i - idx;
        const abs = Math.abs(distance);
        if (distance === 0) {
          s.style.transform = 'translateZ(28px) scale(1.02) rotateY(0deg)';
          s.style.boxShadow = '0 26px 64px rgba(0,0,0,.48)';
          s.style.filter = 'brightness(1)';
        } else {
          const rotate = distance * 10;
          const translateZ = Math.max(0, 0 - abs * 6);
          const scale = Math.max(.86, 1 - abs * 0.08);
          s.style.transform = `translateZ(${translateZ}px) scale(${scale}) rotateY(${rotate}deg)`;
          s.style.boxShadow = '0 12px 36px rgba(0,0,0,.36)';
          s.style.filter = 'brightness(.9)';
        }
        s.style.transition = 'transform .5s cubic-bezier(.22,.9,.25,1), box-shadow .35s';
      });

      document.querySelectorAll('.showcase-dot').forEach(d => d.classList.remove('active'));
      const dot = document.querySelector(`.showcase-dot[data-i="${idx}"]`);
      if (dot) dot.classList.add('active');
    }

    function showcaseNext(){ const max = productosGaming.length - 1; if (showcaseState.idx < max) showcaseState.idx++; else showcaseState.idx = 0; updateShowcaseTransform(); }
    function showcasePrev(){ if (showcaseState.idx > 0) showcaseState.idx--; else showcaseState.idx = productosGaming.length - 1; updateShowcaseTransform(); }
    function showcaseGoTo(i){ showcaseState.idx = i; updateShowcaseTransform(); }

    function startShowcaseAutoplay(){ stopShowcaseAutoplay(); if (showcaseState.autoplay) showcaseState.timer = setInterval(()=> showcaseNext(), showcaseState.interval); }
    function stopShowcaseAutoplay(){ if (showcaseState.timer){ clearInterval(showcaseState.timer); showcaseState.timer = null; } }
    function resetShowcaseAutoplay(){ stopShowcaseAutoplay(); startShowcaseAutoplay(); }

    function attachInteraction(){
      const container = document.getElementById('showcase');
      container.addEventListener('mouseenter', stopShowcaseAutoplay);
      container.addEventListener('mouseleave', startShowcaseAutoplay);
      window.addEventListener('keydown', (e)=>{ if(e.key==='ArrowLeft'){ showcasePrev(); resetShowcaseAutoplay(); } if(e.key==='ArrowRight'){ showcaseNext(); resetShowcaseAutoplay(); } });
      container.addEventListener('touchstart', (e)=>{ showcaseState.touch.startX = e.touches[0].clientX; }, {passive:true});
      container.addEventListener('touchmove', (e)=>{ showcaseState.touch.endX = e.touches[0].clientX; }, {passive:true});
      container.addEventListener('touchend', ()=>{
        const dx = showcaseState.touch.endX - showcaseState.touch.startX;
        if (Math.abs(dx) > 40) { if (dx < 0) showcaseNext(); else showcasePrev(); resetShowcaseAutoplay(); }
        showcaseState.touch.startX = showcaseState.touch.endX = 0;
      });
      window.addEventListener('resize', ()=>{ adjustSlidesPerView(); updateShowcaseTransform(); });
    }

    /* Inicialización */
    document.addEventListener('DOMContentLoaded', ()=>{
      cargarProductosGaming();
      actualizarCarrito();
      setTimeout(()=>{ buildShowcase(); }, 120);

      const searchBar = document.getElementById('search-bar');
      if (searchBar) {
        searchBar.addEventListener('input', (e) => {
          const term = e.target.value.toLowerCase();
          document.querySelectorAll('.product-card').forEach(card => {
            const title = card.querySelector('.pc-title')?.textContent.toLowerCase() || '';
            const desc = card.querySelector('.pc-desc')?.textContent.toLowerCase() || '';
            card.style.display = (title.includes(term) || desc.includes(term)) ? 'flex' : 'none';
          });
        });
      }
    });
  </script>
</body>
</html>