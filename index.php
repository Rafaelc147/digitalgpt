<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Digital RP | Tienda de Tecnología</title>
    <link rel="icon" type="image/png" href="imagenes/logo.png">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            color: #333;
            line-height: 1.6;
        }

        /* Header Styles */
        header {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
            transition: all 0.3s ease;
        }

        .header-content {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            height: 80px;
            position: relative;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .logo h1 {
            font-size: 2rem;
            font-weight: 700;
            background: linear-gradient(45deg, #667eea, #764ba2);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .logo span {
            font-size: 0.9rem;
            color: #666;
        }

        nav ul {
            display: flex;
            list-style: none;
            gap: 2rem;
            align-items: center;
        }

        nav a {
            text-decoration: none;
            color: #333;
            font-weight: 500;
            padding: 0.5rem 1rem;
            border-radius: 25px;
            transition: all 0.3s ease;
            position: relative;
        }

        nav a:hover {
            background: linear-gradient(45deg, #667eea, #764ba2);
            color: white;
            transform: translateY(-2px);
        }

        .cart-btn {
            background: linear-gradient(45deg, #667eea, #764ba2);
            color: white !important;
            padding: 0.7rem 1.5rem !important;
            border-radius: 30px;
            font-weight: 600;
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.4);
        }

        .cart-count {
            background: #ff4757;
            color: white;
            border-radius: 50%;
            width: 20px;
            height: 20px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 0.8rem;
            margin-left: 0.5rem;
        }

        /* Hero Section */
        .hero {
            margin-top: 150px;
            min-height: 60vh;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: white;
            padding: 4rem 2rem;
            position: relative;
            overflow: hidden;
        }

        .hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.3);
            z-index: 1;
        }

        .hero-content {
            position: relative;
            z-index: 2;
            max-width: 800px;
            animation: fadeInUp 1s ease-out;
        }

        .hero h1 {
            font-size: 3.5rem;
            margin-bottom: 1rem;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        }

        .hero p {
            font-size: 1.3rem;
            margin-bottom: 2rem;
            opacity: 0.9;
        }

        .hero-btn {
            background: linear-gradient(45deg, #ff6b6b, #ee5a52);
            color: white;
            padding: 1rem 2rem;
            border: none;
            border-radius: 30px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
            box-shadow: 0 8px 25px rgba(255, 107, 107, 0.3);
        }

        .hero-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 35px rgba(255, 107, 107, 0.4);
        }

        /* Categories Section */
        .categories {
            padding: 6rem 2rem;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
        }

        .categories-container {
            max-width: 1200px;
            margin: 0 auto;
        }

        .section-title {
            text-align: center;
            font-size: 2.5rem;
            margin-bottom: 3rem;
            color: #333;
            position: relative;
        }

        .section-title::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 60px;
            height: 4px;
            background: linear-gradient(45deg, #667eea, #764ba2);
            border-radius: 2px;
        }

        .categories-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 2rem;
            margin-top: 4rem;
        }

        .category-card {
            background: white;
            border-radius: 20px;
            padding: 2rem;
            text-align: center;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            cursor: pointer;
            position: relative;
            overflow: hidden;
        }

        .category-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(102, 126, 234, 0.1), transparent);
            transition: left 0.5s ease;
        }

        .category-card:hover::before {
            left: 100%;
        }

        .category-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.15);
        }

        .product-card {
            transition: all 0.4s ease;
        }

        .category-icon {
            width: 80px;
            height: 80px;
            margin: 0 auto 1.5rem;
            background: linear-gradient(45deg, #667eea, #764ba2);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
            color: white;
            transition: all 0.3s ease;
        }

        .category-card:hover .category-icon {
            transform: scale(1.1);
        }

        .category-card h3 {
            font-size: 1.4rem;
            margin-bottom: 1rem;
            color: #333;
        }

        .category-card p {
            color: #666;
            margin-bottom: 1.5rem;
        }

        .category-btn {
            background: linear-gradient(45deg, #667eea, #764ba2);
            color: white;
            padding: 0.8rem 2rem;
            border: none;
            border-radius: 25px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
        }

        .category-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
        }

        /* Social Media Section */
        .social-section {
            padding: 4rem 2rem;
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            color: white;
            text-align: center;
        }

        .social-container {
            max-width: 1200px;
            margin: 0 auto;
        }

        .social-links {
            display: flex;
            justify-content: center;
            gap: 2rem;
            margin-top: 2rem;
        }

        .social-link {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            background: rgba(255, 255, 255, 0.2);
            padding: 1rem 2rem;
            border-radius: 30px;
            text-decoration: none;
            color: white;
            transition: all 0.3s ease;
            backdrop-filter: blur(10px);
        }

        .social-link:hover {
            background: rgba(255, 255, 255, 0.3);
            transform: translateY(-3px);
        }

        .whatsapp-float {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background: #25d366;
            color: white;
            border-radius: 50%;
            width: 60px;
            height: 60px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            text-decoration: none;
            box-shadow: 0 4px 15px rgba(37, 211, 102, 0.4);
            z-index: 1000;
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.1); }
            100% { transform: scale(1); }
        }

        /* Featured Products - pequeño ajuste (subí el título) */
        .featured {
            padding: 4.2rem 2rem 2.5rem; /* antes 6rem, lo bajé para subir el título */
            background: rgba(255, 255, 255, 0.95);
        }

        .featured-container {
            max-width: 1200px;
            margin: 0 auto;
        }

        /* ====== NUEVAS REGLAS PARA EL CARRUSEL MEJORADO ====== */
        .promo-carousel {
            position: relative;
            border-radius: 16px;
            padding: 12px;
            background: linear-gradient(180deg, rgba(102,126,234,0.04), rgba(118,75,162,0.02));
            box-shadow: 0 14px 40px rgba(102,126,234,0.07);
            overflow: hidden;
        }

        .promo-track {
            display: flex;
            gap: 14px;
            transition: transform 0.55s cubic-bezier(.22,.9,.15,1);
            will-change: transform;
            padding: 6px;
        }

        .promo-slide {
            flex: 0 0 auto;
            min-width: 280px;
            border-radius: 12px;
            background: linear-gradient(180deg,#fff,#fbfbff);
            overflow: hidden;
            border: 1px solid rgba(102,126,234,0.06);
            box-shadow: 0 10px 30px rgba(0,0,0,0.05);
            transform-style: preserve-3d;
        }

        .promo-media {
            height: 160px;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            background: linear-gradient(45deg,#f7f9ff,#eef6ff);
        }

        .promo-media img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform .45s ease, filter .3s;
        }

        .promo-body {
            padding: .9rem 1rem;
            display: flex;
            flex-direction: column;
            gap: .4rem;
        }

        .promo-title {
            font-weight: 800;
            color: #2c3e50;
        }

        .promo-desc {
            color: #6b7280;
            font-size: .95rem;
            min-height: 42px;
        }

        .promo-bottom {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: .4rem;
        }

        .promo-price {
            font-weight: 900;
            color: #543ee0;
        }

        .promo-cta {
            background: linear-gradient(45deg, #667eea, #764ba2);
            color: white;
            padding: .45rem .7rem;
            border-radius: 10px;
            border: none;
            font-weight: 800;
            cursor: pointer;
        }

        .carousel-arrow {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background: linear-gradient(45deg, #667eea, #764ba2);
            color: white;
            border: none;
            width: 46px;
            height: 46px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            z-index: 20;
            box-shadow: 0 8px 24px rgba(102,126,234,0.22);
        }

        .carousel-arrow.prev { left: 12px; }
        .carousel-arrow.next { right: 12px; }

        .carousel-controls {
            margin-top: 12px;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 10px;
        }

        .carousel-dots {
            display: flex;
            gap: 8px;
        }

        .dot {
            width: 10px;
            height: 10px;
            border-radius: 999px;
            background: rgba(102,126,234,0.28);
            cursor: pointer;
            transition: transform .2s;
        }

        .dot.active {
            background: #667eea;
            transform: scale(1.25);
            box-shadow: 0 8px 20px rgba(102,126,234,0.16);
        }

        .carousel-thumbs {
            display: flex;
            gap: 8px;
            overflow-x: auto;
            padding: 6px;
        }

        .thumb {
            width: 64px;
            height: 44px;
            border-radius: 6px;
            overflow: hidden;
            border: 2px solid transparent;
            cursor: pointer;
            opacity: .85;
            transition: transform .18s, border-color .18s, opacity .18s;
        }

        .thumb img { width:100%; height:100%; object-fit:cover; }
        .thumb.active { border-color: #667eea; opacity: 1; transform: translateY(-4px); box-shadow: 0 12px 30px rgba(102,126,234,0.12); }

        /* keep original product card styles for featured grid if needed */
        .products-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            margin-top: 3rem;
        }

        .product-card {
            background: white;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            color: #333;
        }

        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.15);
        }

        /* Cart Modal (unchanged) */
        .cart-modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.8);
            z-index: 2000;
            backdrop-filter: blur(5px);
        }

        .cart-content {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: white;
            border-radius: 20px;
            padding: 2rem;
            max-width: 500px;
            width: 90%;
            max-height: 80vh;
            overflow-y: auto;
        }

        .cart-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
            border-bottom: 1px solid #eee;
            padding-bottom: 1rem;
        }

        .close-cart {
            background: none;
            border: none;
            font-size: 1.5rem;
            cursor: pointer;
            color: #999;
        }

        .cart-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem 0;
            border-bottom: 1px solid #eee;
        }

        .cart-total {
            font-size: 1.5rem;
            font-weight: 700;
            text-align: center;
            margin: 2rem 0;
            color: #667eea;
        }

        .checkout-btn {
            background: linear-gradient(45deg, #28a745, #20c997);
            color: white;
            padding: 1rem 2rem;
            border: none;
            border-radius: 25px;
            font-weight: 600;
            cursor: pointer;
            width: 100%;
            font-size: 1.1rem;
            transition: all 0.3s ease;
        }

        .checkout-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(40, 167, 69, 0.4);
        }

        /* Footer */
        footer {
            background: #333;
            color: white;
            padding: 3rem 2rem 1rem;
            text-align: center;
        }

        .footer-content {
            max-width: 1200px;
            margin: 0 auto;
        }

        .footer-links {
            display: flex;
            justify-content: center;
            gap: 2rem;
            margin-bottom: 2rem;
        }

        .footer-links a {
            color: #ccc;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .footer-links a:hover {
            color: #667eea;
        }

        /* Animations */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fade-in {
            animation: fadeInUp 0.8s ease-out;
        }

        /* Responsive Design for carousel */
        @media (max-width: 1024px) {
            .promo-media { height: 140px; }
            .promo-slide { min-width: 42%; }
        }
        @media (max-width: 768px) {
            .header-content {
                flex-direction: column;
                height: auto;
                padding: 1rem;
            }

            nav ul {
                flex-direction: column;
                gap: 1rem;
                margin-top: 1rem;
            }

            .hero {
                margin-top: 120px;
                padding: 2rem 1rem;
            }

            .hero h1 {
                font-size: 2.5rem;
            }

            .categories-grid {
                grid-template-columns: 1fr;
            }

            .products-grid {
                grid-template-columns: 1fr;
            }

            .social-links {
                flex-direction: column;
                align-items: center;
            }

            .promo-slide { min-width: 82%; }
        }

        .search-container {
            display: flex;
            justify-content: center;
            padding: 1rem 2rem;
            background: rgba(255, 255, 255, 0.95);
        }

        #search-bar {
            width: 50%;
            padding: 0.8rem 1.5rem;
            border-radius: 25px 0 0 25px;
            border: 1px solid #ddd;
            border-right: none;
            font-size: 1rem;
        }

        .search-btn {
            padding: 0.8rem 1.5rem;
            border-radius: 0 25px 25px 0;
            border: 1px solid #ddd;
            background: #f8f8f8;
            cursor: pointer;
            font-size: 1rem;
        }
    </style>
</head>
<body>
    <header>
        <div class="header-content">
            <div class="logo">
                <a href="index.php" style="text-decoration: none; color: inherit;">
                    <h1>DIGITAL RP</h1>
                </a>
            </div>
            <nav>
                <ul>
                    <li><a href="componentes.php">Componentes</a></li>
                    <li><a href="audio.php">Audio</a></li>
                    <li><a href="cableado.php">Cableado</a></li>
                    <li><a href="gaming.php">Gaming</a></li>
                    <li><a href="electronica.php">Electrónica</a></li>
                    <li><a href="varios.php">Varios</a></li>
                </ul>
            </nav>
            <a href="#" class="cart-btn" onclick="toggleCart()">
                🛒 Carrito <span class="cart-count" id="cart-count">0</span>
            </a>
        </div>
        <form class="search-container" action="buscar.php" method="GET">
            <input type="text" id="search-bar" name="q" placeholder="Buscar productos...">
            <button class="search-btn" type="submit">🔍</button>
        </form>
    </header>

    <section class="hero">
        <div class="hero-content">
            <h1>Ofertas Exclusivas en Tecnología</h1>
            <p>Descubre los mejores productos electrónicos a precios increíbles</p>
            <a href="#categorias" class="hero-btn">Explorar Productos</a>
        </div>
    </section>

    <section class="categories" id="categorias">
        <div class="categories-container">
            <h2 class="section-title">Nuestras Categorías</h2>
            <div class="categories-grid">
                <div class="category-card" onclick="window.location.href='componentes.php'">
                    <div class="category-icon">🖥️</div>
                    <h3>Componentes y Periféricos</h3>
                    <p>Mouses, teclados, monitores y más componentes esenciales</p>
                    <a href="componentes.php" class="category-btn">Ver Productos</a>
                </div>
                <div class="category-card" onclick="window.location.href='audio.php'">
                    <div class="category-icon">🎵</div>
                    <h3>Audio</h3>
                    <p>Audífonos, bocinas y equipos de sonido profesional</p>
                    <a href="audio.php" class="category-btn">Ver Productos</a>
                </div>
                <div class="category-card" onclick="window.location.href='cableado.php'">
                    <div class="category-icon">🔌</div>
                    <h3>Cableado</h3>
                    <p>Cables, adaptadores y accesorios de conectividad</p>
                    <a href="cableado.php" class="category-btn">Ver Productos</a>
                </div>
                <div class="category-card" onclick="window.location.href='gaming.php'">
                    <div class="category-icon">🎮</div>
                    <h3>Gaming</h3>
                    <p>Sillas gamer, pantallas y accesorios para gamers</p>
                    <a href="gaming.php" class="category-btn">Ver Productos</a>
                </div>
                <div class="category-card" onclick="window.location.href='electronica.php'">
                    <div class="category-icon">💡</div>
                    <h3>Electrónica</h3>
                    <p>Componentes y dispositivos electrónicos</p>
                    <a href="electronica.php" class="category-btn">Ver Productos</a>
                </div>
                <div class="category-card" onclick="window.location.href='varios.php'">
                    <div class="category-icon">📦</div>
                    <h3>Varios</h3>
                    <p>Productos y accesorios diversos</p>
                    <a href="varios.php" class="category-btn">Ver Productos</a>
                </div>
            </div>
        </div>
    </section>

    <!-- ================== SOLO CAMBIÉ ESTA SECCIÓN (CARRUSEL MEJORADO) ================== -->
    <section class="featured">
        <div class="featured-container">
            <h2 class="section-title">Productos Destacados</h2>

            <!-- Carrusel mejorado (usa el contenedor existing #featured-products para la pista) -->
            <div class="promo-carousel" aria-label="Carrusel de Productos Destacados">
                <button class="carousel-arrow prev" aria-label="Anterior">‹</button>
                <div class="promo-track" id="featured-products">
                    <!-- slides generadas dinámicamente -->
                </div>
                <button class="carousel-arrow next" aria-label="Siguiente">›</button>
            </div>

            <!-- controles (dots + thumbs) -->
            <div class="carousel-controls" aria-hidden="false">
                <div class="carousel-dots" id="carousel-dots"></div>
                <div class="carousel-thumbs" id="carousel-thumbs"></div>
            </div>

        </div>
    </section>
    <!-- ================== FIN CAMBIOS DEL CARRUSEL ================== -->

    <section class="social-section">
        <div class="social-container">
            <h2 class="section-title">Síguenos en Redes Sociales</h2>
            <p>Mantente al día con nuestras ofertas y productos nuevos</p>
            <div class="social-links">
                <a href="https://wa.me/573001234567" class="social-link" target="_blank">
                    📱 WhatsApp
                </a>
                <a href="https://instagram.com/digitalrp.store" class="social-link" target="_blank">
                    📷 Instagram
                </a>
                <a href="https://facebook.com/digitalrp.store" class="social-link" target="_blank">
                    📘 Facebook
                </a>
                <a href="mailto:info@digitalrp.store" class="social-link">
                    ✉️ Email
                </a>
            </div>
        </div>
    </section>

    <!-- WhatsApp Float Button -->
    <a href="https://wa.me/573001234567?text=Hola,%20estoy%20interesado%20en%20sus%20productos" class="whatsapp-float" target="_blank">
        📱
    </a>

    <!-- Cart Modal -->
    <div class="cart-modal" id="cart-modal">
        <div class="cart-content">
            <div class="cart-header">
                <h3>Tu Carrito</h3>
                <button class="close-cart" onclick="toggleCart()">×</button>
            </div>
            <div id="cart-items">
                <!-- Los items del carrito se mostrarán aquí -->
            </div>
            <div class="cart-total">
                Total: $<span id="cart-total">0</span>
            </div>
            <button class="checkout-btn" onclick="checkout()">Proceder al Pago</button>
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

    <script>
        // Datos de productos con sistema de imágenes
        const productos = {
            componentes: [
                {
                    id: 1,
                    nombre: "Mouse Gamer RGB",
                    precio: 80000,
                    imagen: "imagenes/imagen1.jpg", // AQUÍ cambias por tu imagen
                    descripcion: "Mouse gamer con iluminación RGB y alta precisión"
                },
                {
                    id: 2,
                    nombre: "Teclado Mecánico",
                    precio: 120000,
                    imagen: "imagenes/imagen2.jpg", // AQUÍ cambias por tu imagen
                    descripcion: "Teclado mecánico con switches azules"
                },
            ],
            audio: [
                {
                    id: 5,
                    nombre: "Audífonos Bluetooth",
                    precio: 95000,
                    imagen: "imagenes/imagen5.jpg", // AQUÍ cambias por tu imagen
                    descripcion: "Audífonos inalámbricos con cancelación de ruido"
                },
                {
                    id: 6,
                    nombre: "Bocina Inteligente",
                    precio: 180000,
                    imagen: "imagenes/imagen6.jpg", // AQUÍ cambias por tu imagen
                    descripcion: "Bocina con asistente de voz integrado"
                },
            ]
        };


        // Función para mostrar notificaciones
        function mostrarNotificacion(mensaje) {
            const notificacion = document.createElement('div');
            notificacion.style.cssText = `
                position: fixed;
                top: 100px;
                right: 20px;
                background: #28a745;
                color: white;
                padding: 15px 25px;
                border-radius: 8px;
                box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
                z-index: 3000;
                animation: fadeInOut 3s ease;
            `;
            notificacion.textContent = mensaje;
            document.body.appendChild(notificacion);

            // Crear animación
            const style = document.createElement('style');
            style.textContent = `
                @keyframes fadeInOut {
                    0% { opacity: 0; transform: translateY(-20px); }
                    10% { opacity: 1; transform: translateY(0); }
                    90% { opacity: 1; transform: translateY(0); }
                    100% { opacity: 0; transform: translateY(-20px); }
                }
            `;
            document.head.appendChild(style);

            // Eliminar después de 3 segundos
            setTimeout(() => {
                if (notificacion.parentElement) document.body.removeChild(notificacion);
                if (style.parentElement) document.head.removeChild(style);
            }, 3000);
        }

        /* ============================
           NUEVO: CARRUSEL DINÁMICO (solo esta parte cambió)
           ============================ */

        // Estado del carrusel
        const carousel = {
            index: 0,
            slidesPerView: 3,
            autoplayInterval: 3500,
            autoplayTimer: null
        };

        // Construye la lista de productos a mostrar en el carrusel
        function obtenerProductosParaCarrusel() {
            // Tomamos todos los productos existentes en el objeto 'productos'
            let arr = [];
            for (const cat in productos) {
                arr = arr.concat(productos[cat]);
            }
            // Si hay pocos productos, repetimos hasta tener mínimo 3
            if (arr.length < 3) {
                // fallback duplicando
                while (arr.length < 3) arr = arr.concat(arr);
            }
            // Limitar a 8 por estética
            return arr.slice(0, 8);
        }

        // Renderiza slides dentro de #featured-products
        function renderCarrusel() {
            const track = document.getElementById('featured-products');
            const dotsContainer = document.getElementById('carousel-dots');
            const thumbsContainer = document.getElementById('carousel-thumbs');
            track.innerHTML = '';
            dotsContainer.innerHTML = '';
            thumbsContainer.innerHTML = '';

            const slides = obtenerProductosParaCarrusel();

            slides.forEach((p, i) => {
                const slide = document.createElement('div');
                slide.className = 'promo-slide product-card';
                slide.setAttribute('data-i', i);
                slide.innerHTML = `
                    <div class="promo-media product-image">
                        <img src="${p.imagen}" alt="${p.nombre}" onerror="this.style.display='none'">
                    </div>
                    <div class="promo-body product-info">
                        <div class="promo-title"><h4 style="margin:0;">${p.nombre}</h4></div>
                        <div class="promo-desc"><p style="margin:0.4rem 0;">${p.descripcion}</p></div>
                        <div class="promo-bottom">
                            <div class="promo-price">$${p.precio.toLocaleString()}</div>
                            <button class="promo-cta" onclick="agregarAlCarrito(${p.id})">Comprar</button>
                        </div>
                    </div>
                `;
                // tilt effect: add listeners
                attachTilt(slide);
                track.appendChild(slide);

                // dots (una posición por desplazamiento posible)
                const dot = document.createElement('div');
                dot.className = 'dot';
                dot.dataset.pos = i;
                dot.addEventListener('click', () => { goTo(i); resetAutoplay(); });
                dotsContainer.appendChild(dot);

                // thumbs
                const thumb = document.createElement('div');
                thumb.className = 'thumb';
                thumb.dataset.pos = i;
                thumb.innerHTML = `<img src="${p.imagen}" alt="${p.nombre}">`;
                thumb.addEventListener('click', () => { goTo(i); resetAutoplay(); });
                thumbsContainer.appendChild(thumb);
            });

            ajustarSlidesPorVista();
            updatePosition();
            refreshControls();
        }

        // Efecto tilt/parallax simple
        function attachTilt(slide) {
            const mediaImg = slide.querySelector('.promo-media img');
            slide.addEventListener('mousemove', (e) => {
                const rect = slide.getBoundingClientRect();
                const x = (e.clientX - rect.left) / rect.width;
                const y = (e.clientY - rect.top) / rect.height;
                const rx = (y - 0.5) * 8; // rotación X
                const ry = (x - 0.5) * -10; // rotación Y
                slide.style.transform = `rotateX(${rx}deg) rotateY(${ry}deg)`;
                if (mediaImg) mediaImg.style.transform = `scale(1.06) translate3d(${(x - .5) * 8}px, ${(y - .5) * 6}px, 0)`;
                slide.style.boxShadow = '0 22px 50px rgba(0,0,0,0.16)';
            });
            slide.addEventListener('mouseleave', () => {
                slide.style.transform = 'none';
                if (mediaImg) mediaImg.style.transform = '';
                slide.style.boxShadow = '';
            });
        }

        // Ajusta cuántas slides se ven según ancho
        function ajustarSlidesPorVista() {
            const w = window.innerWidth;
            if (w >= 1024) carousel.slidesPerView = 3;
            else if (w >= 768) carousel.slidesPerView = 2;
            else carousel.slidesPerView = 1;

            const slides = document.querySelectorAll('#featured-products .promo-slide');
            slides.forEach(s => {
                s.style.flex = `0 0 calc(${100 / carousel.slidesPerView}% - 14px)`;
            });

            // corregir índice si queda fuera de rango
            if (carousel.index > slides.length - carousel.slidesPerView) {
                carousel.index = Math.max(0, slides.length - carousel.slidesPerView);
            }
        }

        // Mover pista
        function updatePosition() {
            const track = document.getElementById('featured-products');
            const slides = document.querySelectorAll('#featured-products .promo-slide');
            if (!track || slides.length === 0) return;
            const slideWidth = slides[0].getBoundingClientRect().width + parseFloat(getComputedStyle(track).gap || 14);
            const x = carousel.index * slideWidth;
            track.style.transform = `translateX(-${x}px)`;
            refreshControls();
        }

        function goTo(i) {
            const slides = document.querySelectorAll('#featured-products .promo-slide');
            carousel.index = Math.max(0, Math.min(i, slides.length - carousel.slidesPerView));
            updatePosition();
        }

        function next() {
            const slides = document.querySelectorAll('#featured-products .promo-slide');
            if (carousel.index < slides.length - carousel.slidesPerView) carousel.index++;
            else carousel.index = 0;
            updatePosition();
        }

        function prev() {
            const slides = document.querySelectorAll('#featured-products .promo-slide');
            if (carousel.index > 0) carousel.index--;
            else carousel.index = Math.max(0, slides.length - carousel.slidesPerView);
            updatePosition();
        }

        function buildControls() {
            document.querySelector('.carousel-arrow.prev').addEventListener('click', () => { prev(); resetAutoplay(); });
            document.querySelector('.carousel-arrow.next').addEventListener('click', () => { next(); resetAutoplay(); });

            const carouselEl = document.querySelector('.promo-carousel');
            carouselEl.addEventListener('mouseenter', stopAutoplay);
            carouselEl.addEventListener('mouseleave', startAutoplay);

            window.addEventListener('resize', () => {
                ajustarSlidesPorVista();
                updatePosition();
            });
        }

        function refreshControls() {
            const dots = document.querySelectorAll('#carousel-dots .dot');
            dots.forEach(d => d.classList.remove('active'));
            const pos = Math.min(carousel.index, dots.length - 1);
            if (dots[pos]) dots[pos].classList.add('active');

            const thumbs = document.querySelectorAll('#carousel-thumbs .thumb');
            thumbs.forEach(t => t.classList.remove('active'));
            const firstThumb = carousel.index;
            if (thumbs[firstThumb]) thumbs[firstThumb].classList.add('active');
        }

        function startAutoplay() {
            stopAutoplay();
            carousel.autoplayTimer = setInterval(() => { next(); }, carousel.autoplayInterval);
        }

        function stopAutoplay() {
            if (carousel.autoplayTimer) {
                clearInterval(carousel.autoplayTimer);
                carousel.autoplayTimer = null;
            }
        }

        function resetAutoplay() {
            stopAutoplay();
            startAutoplay();
        }

        /* ============================
           FIN CARRUSEL
           ============================ */

        // SEARCH (igual que antes)
        document.addEventListener('DOMContentLoaded', () => {
            const searchBar = document.getElementById('search-bar');
            if (searchBar) {
                searchBar.addEventListener('input', (e) => {
                    const searchTerm = e.target.value.toLowerCase();
                    const productCards = document.querySelectorAll('.product-card');

                    productCards.forEach(card => {
                        const h = card.querySelector('h4');
                        const p = card.querySelector('p');
                        const productName = h ? h.textContent.toLowerCase() : '';
                        const productDescription = p ? p.textContent.toLowerCase() : '';

                        if (productName.includes(searchTerm) || productDescription.includes(searchTerm)) {
                            card.style.display = 'flex';
                        } else {
                            card.style.display = 'none';
                        }
                    });
                });
            }

            // inicializar carrito desde servidor
            actualizarCarrito();

            // inicializar carrusel
            renderCarrusel();
            buildControls();
            startAutoplay();
        });
    </script>
    <script src="carrito.js"></script>
</body>
</html>
