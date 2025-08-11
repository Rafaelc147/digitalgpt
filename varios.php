<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Digital RP | Varios</title>
    <link rel="icon" type="image/png" href="imagenes/logo.png">
    <!-- Usa el mismo estilo de la página principal -->
    <style>
        /* ESTILOS GENERALES (iguales para todas las páginas) */
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

/* HEADER (igual en todas las páginas) */
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

/* PRODUCTOS DE AUDIO */
.featured {
    padding: 150px 2rem 4rem; /* Más espacio arriba para el header */
    background: rgba(255, 255, 255, 0.95);
}

.featured-container {
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

.products-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 2.5rem;
}

.product-card {
    background: white;
    border-radius: 20px;
    overflow: hidden;
    box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease;
    color: #333;
    position: relative;
}

.product-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 25px 50px rgba(0, 0, 0, 0.15);
}

.product-card {
    transition: all 0.4s ease;
}

.product-image {
    width: 100%;
    height: 250px; /* Más alto para mejores imágenes */
    background: #f7f9fc;
    display: flex;
    align-items: center;
    justify-content: center;
    position: relative;
    overflow: hidden;
}

.product-image img {
    width: 100%;
    height: 100%;
    object-fit: contain; /* Muestra toda la imagen sin recortar */
    padding: 20px;
    transition: transform 0.3s ease;
}

.product-card:hover .product-image img {
    transform: scale(1.05);
}

.product-info {
    padding: 1.5rem;
    text-align: center;
}

.product-info h4 {
    font-size: 1.3rem;
    margin-bottom: 0.8rem;
    color: #2c3e50;
}

.product-info p {
    color: #7f8c8d;
    margin-bottom: 1.2rem;
    font-size: 1rem;
    min-height: 60px; /* Espacio fijo para descripciones */
}

.product-price {
    font-size: 1.6rem;
    font-weight: 700;
    color: #667eea;
    margin-bottom: 1.5rem;
    display: block;
}

.add-to-cart {
    background: linear-gradient(45deg, #667eea, #764ba2);
    color: white;
    padding: 0.9rem 1.8rem;
    border: none;
    border-radius: 30px;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
    width: 90%;
    margin: 0 auto 1rem;
    display: block;
    font-size: 1.1rem;
}

.add-to-cart:hover {
    transform: translateY(-3px);
    box-shadow: 0 8px 20px rgba(102, 126, 234, 0.4);
}

/* CARRITO Y WHATSAPP (igual en todas) */
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

        .payment-methods {
            margin-top: 1rem;
            text-align: center;
            display: none;
        }

        .payment-methods h4 {
            margin-bottom: 0.5rem;
        }

        .pay-btn {
            display: block;
            background: linear-gradient(45deg, #667eea, #764ba2);
            color: white;
            padding: 0.7rem;
            border-radius: 20px;
            text-decoration: none;
            margin: 0.3rem 0;
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
    font-size: 1.8rem;
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

/* FOOTER (igual en todas) */
footer {
    background: #2c3e50;
    color: white;
    padding: 3rem 2rem 1.5rem;
    text-align: center;
}

.footer-content {
    max-width: 1200px;
    margin: 0 auto;
}

.footer-links {
    display: flex;
    justify-content: center;
    flex-wrap: wrap;
    gap: 1.5rem;
    margin-bottom: 2rem;
}

.footer-links a {
    color: #ecf0f1;
    text-decoration: none;
    transition: color 0.3s ease;
    font-size: 1.1rem;
}

.footer-links a:hover {
    color: #667eea;
}

footer p {
    margin: 0.5rem 0;
    color: #bdc3c7;
}

footer strong {
    color: #ecf0f1;
}

/* RESPONSIVE (para móviles) */
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

    .products-grid {
        grid-template-columns: 1fr;
    }

    .product-image {
        height: 220px;
    }

    .featured {
        padding: 130px 1rem 2rem;
    }

    .section-title {
        font-size: 2rem;
    }

    .social-links {
        flex-direction: column;
        align-items: center;
    }
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
        /* NUEVOS ESTILOS PARA EL CARRUSEL */
        .carousel-container {
            position: relative;
            width: 100%;
            height: 250px;
            overflow: hidden;
            background: #f7f9fc;
        }

        .carousel-slides {
            display: flex;
            transition: transform 0.5s ease-in-out;
            height: 100%;
        }

        .carousel-slide {
            min-width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .carousel-slide img {
            max-width: 80%;
            max-height: 90%;
            object-fit: contain;
            padding: 10px;
        }

        .carousel-nav {
            position: absolute;
            top: 50%;
            width: 100%;
            display: flex;
            justify-content: space-between;
            transform: translateY(-50%);
            z-index: 10;
        }

        .carousel-btn {
            background: rgba(102, 126, 234, 0.7);
            color: white;
            border: none;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            font-size: 1.5rem;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
            margin: 0 10px;
        }

        .carousel-btn:hover {
            background: rgba(118, 75, 162, 0.9);
            transform: scale(1.1);
        }

        .carousel-dots {
            position: absolute;
            bottom: 10px;
            width: 100%;
            display: flex;
            justify-content: center;
            z-index: 10;
        }

        .carousel-dot {
            width: 10px;
            height: 10px;
            border-radius: 50%;
            background: rgba(102, 126, 234, 0.5);
            margin: 0 5px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .carousel-dot.active {
            background: #667eea;
            transform: scale(1.2);
        }

        .carousel-thumbnails {
            display: flex;
            justify-content: center;
            margin-top: 10px;
            gap: 5px;
        }

        .carousel-thumb {
            width: 50px;
            height: 50px;
            border: 2px solid transparent;
            border-radius: 5px;
            overflow: hidden;
            cursor: pointer;
            opacity: 0.7;
            transition: all 0.3s ease;
        }

        .carousel-thumb:hover, .carousel-thumb.active {
            opacity: 1;
            border-color: #667eea;
        }

        .carousel-thumb img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
    </style>
</head>
<body>
    <header>
        <!-- Mismo header que la página principal -->
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
                    <li><a href="varios.php" class="active">Varios</a></li>
                    <li><a href="metodos_pago.php">Métodos de Pago</a></li>
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

    <h2 class="section-title">Productos Varios</h2>
<section class="featured">
    <div class="featured-container">
        <h2 class="section-title">Productos de Varios</h2>
        <div class="products-grid" id="varios-products">
            <!-- Productos se cargarán aquí -->
        </div>
    </div>
</section>

<!-- WhatsApp Float Button -->
<a href="https://wa.me/573001234567?text=Hola,%20estoy%20interesado%20en%20sus%20productos%20de%20varios" class="whatsapp-float" target="_blank">
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
            <!-- Items del carrito -->
        </div>
        <div class="cart-total">
            Total: $<span id="cart-total">0</span>
        </div>
        <div class="payment-methods" id="payment-methods">
            <h4>Métodos de Pago</h4>
            <a href="https://checkout.wompi.co" target="_blank" class="pay-btn">Wompi</a>
            <a href="https://www.mercadopago.com" target="_blank" class="pay-btn">MercadoPago</a>
            <a href="https://www.pse.com.co" target="_blank" class="pay-btn">PSE</a>
        </div>
    </div>
</div>

<script src="carrito.js"></script>
<script>
// ===============================
// DATOS DE PRODUCTOS VARIOS
// ===============================
const productosVarios = [
    {
        id: 1,
        nombre: "Parlante Portatil Recargable Tranyoo",
        precio: 80000,
        imagenes: [
            "imagenes/audio/T-B16-3.jpeg",
            "imagenes/audio/T-B16-4.jpeg",
    "imagenes/audio/T-B16-2.jpeg",
            "imagenes/audio/T-B16-1.jpeg",
    "imagenes/audio/T-B16-5.jpeg",
            "imagenes/audio/T-B16-6.jpeg",
        ],
        descripcion: "Parlante Portatil Recargable Tranyoo"
    },
    {
        id: 2,
        nombre: "Auriculares Bluetooth con orejas de Gato",
        precio: 33000,
        imagenes: [
            "imagenes/audio/EJ-S28PRO11.jpeg",
            "imagenes/audio/EJ-S28PRO2.jpeg",
            "imagenes/audio/EJ-S28PRO3.jpeg",
	        "imagenes/audio/EJ-S28PRO4.jpeg",
	        "imagenes/audio/EJ-S28PRO5.jpeg",
	        "imagenes/audio/EJ-S28PRO6.jpeg",
        ],
        descripcion: "Auriculares Bluetooth con orejas de Gato niña"
    },
    {
        id: 3,
        nombre: "Auriculares Bluetooth con orejas de Gato",
        precio: 33000,
        imagenes: [
            "imagenes/audio/EJ-S28PRO11.jpeg",
            "imagenes/audio/EJ-S28PRO2.jpeg",
            "imagenes/audio/EJ-S28PRO3.jpeg",
	        "imagenes/audio/EJ-S28PRO4.jpeg",
	        "imagenes/audio/EJ-S28PRO5.jpeg",
	        "imagenes/audio/EJ-S28PRO6.jpeg",
        ],
        descripcion: "Auriculares Bluetooth con orejas de Gato niña"
    }
    ,
    {
        id: 4,
        nombre: "Auriculares Bluetooth con orejas de Gato",
        precio: 33000,
        imagenes: [
            "imagenes/audio/EJ-S28PRO11.jpeg",
            "imagenes/audio/EJ-S28PRO2.jpeg",
            "imagenes/audio/EJ-S28PRO3.jpeg",
	        "imagenes/audio/EJ-S28PRO4.jpeg",
	        "imagenes/audio/EJ-S28PRO5.jpeg",
	        "imagenes/audio/EJ-S28PRO6.jpeg",
        ],
        descripcion: "Auriculares Bluetooth con orejas de Gato niña"
    }
    ,
    {
        id: 5,
        nombre: "Auriculares Bluetooth con orejas de Gato",
        precio: 33000,
        imagenes: [
            "imagenes/audio/EJ-S28PRO11.jpeg",
            "imagenes/audio/EJ-S28PRO2.jpeg",
            "imagenes/audio/EJ-S28PRO3.jpeg",
	        "imagenes/audio/EJ-S28PRO4.jpeg",
	        "imagenes/audio/EJ-S28PRO5.jpeg",
	        "imagenes/audio/EJ-S28PRO6.jpeg",
        ],
        descripcion: "Auriculares Bluetooth con orejas de Gato niña"
    }
    ,
    {
        id: 6,
        nombre: "Auriculares Bluetooth con orejas de Gato",
        precio: 33000,
        imagenes: [
            "imagenes/audio/EJ-S28PRO11.jpeg",
            "imagenes/audio/EJ-S28PRO2.jpeg",
            "imagenes/audio/EJ-S28PRO3.jpeg",
	        "imagenes/audio/EJ-S28PRO4.jpeg",
	        "imagenes/audio/EJ-S28PRO5.jpeg",
	        "imagenes/audio/EJ-S28PRO6.jpeg",
        ],
        descripcion: "Auriculares Bluetooth con orejas de Gato niña"
    }
    ,
    {
        id: 7,
        nombre: "Auriculares Bluetooth con orejas de Gato",
        precio: 33000,
        imagenes: [
            "imagenes/audio/EJ-S28PRO11.jpeg",
            "imagenes/audio/EJ-S28PRO2.jpeg",
            "imagenes/audio/EJ-S28PRO3.jpeg",
	        "imagenes/audio/EJ-S28PRO4.jpeg",
	        "imagenes/audio/EJ-S28PRO5.jpeg",
	        "imagenes/audio/EJ-S28PRO6.jpeg",
        ],
        descripcion: "Auriculares Bluetooth con orejas de Gato niña"
    }
    ,
    {
        id: 8,
        nombre: "Auriculares Bluetooth con orejas de Gato",
        precio: 33000,
        imagenes: [
            "imagenes/audio/EJ-S28PRO11.jpeg",
            "imagenes/audio/EJ-S28PRO2.jpeg",
            "imagenes/audio/EJ-S28PRO3.jpeg",
	        "imagenes/audio/EJ-S28PRO4.jpeg",
	        "imagenes/audio/EJ-S28PRO5.jpeg",
	        "imagenes/audio/EJ-S28PRO6.jpeg",
        ],
        descripcion: "Auriculares Bluetooth con orejas de Gato niña"
    }
    ,
    {
        id: 9,
        nombre: "Auriculares Bluetooth con orejas de Gato",
        precio: 33000,
        imagenes: [
            "imagenes/audio/EJ-S28PRO11.jpeg",
            "imagenes/audio/EJ-S28PRO2.jpeg",
            "imagenes/audio/EJ-S28PRO3.jpeg",
	        "imagenes/audio/EJ-S28PRO4.jpeg",
	        "imagenes/audio/EJ-S28PRO5.jpeg",
	        "imagenes/audio/EJ-S28PRO6.jpeg",
        ],
        descripcion: "Auriculares Bluetooth con orejas de Gato niña"
    }
    ,
    {
        id: 10,
        nombre: "Auriculares Bluetooth con orejas de Gato",
        precio: 33000,
        imagenes: [
            "imagenes/audio/EJ-S28PRO11.jpeg",
            "imagenes/audio/EJ-S28PRO2.jpeg",
            "imagenes/audio/EJ-S28PRO3.jpeg",
	        "imagenes/audio/EJ-S28PRO4.jpeg",
	        "imagenes/audio/EJ-S28PRO5.jpeg",
	        "imagenes/audio/EJ-S28PRO6.jpeg",
        ],
        descripcion: "Auriculares Bluetooth con orejas de Gato niña"
    }
    ,
    {
        id: 11,
        nombre: "Auriculares Bluetooth con orejas de Gato",
        precio: 33000,
        imagenes: [
            "imagenes/audio/EJ-S28PRO11.jpeg",
            "imagenes/audio/EJ-S28PRO2.jpeg",
            "imagenes/audio/EJ-S28PRO3.jpeg",
	        "imagenes/audio/EJ-S28PRO4.jpeg",
	        "imagenes/audio/EJ-S28PRO5.jpeg",
	        "imagenes/audio/EJ-S28PRO6.jpeg",
        ],
        descripcion: "Auriculares Bluetooth con orejas de Gato niña"
    }
    ,
    {
        id: 12,
        nombre: "Auriculares Bluetooth con orejas de Gato",
        precio: 33000,
        imagenes: [
            "imagenes/audio/EJ-S28PRO11.jpeg",
            "imagenes/audio/EJ-S28PRO2.jpeg",
            "imagenes/audio/EJ-S28PRO3.jpeg",
	        "imagenes/audio/EJ-S28PRO4.jpeg",
	        "imagenes/audio/EJ-S28PRO5.jpeg",
	        "imagenes/audio/EJ-S28PRO6.jpeg",
        ],
        descripcion: "Auriculares Bluetooth con orejas de Gato niña"
    }

    // Puedes agregar más productos aquí...
];

// ===============================
// CREAR CARRUSEL
// ===============================
function createCarouselHTML(imagenes, productId) {
    return `
    <div class="carousel-container" id="carousel-${productId}">
        <div class="carousel-slides">
            ${imagenes.map((img, index) => `
                <div class="carousel-slide">
                    <img src="${img}" alt="Imagen ${index+1}"
                         onerror="this.src='imagenes/placeholder.jpg'">
                </div>
            `).join('')}
        </div>

        <div class="carousel-nav">
            <button class="carousel-btn prev-btn">&#10094;</button>
            <button class="carousel-btn next-btn">&#10095;</button>
        </div>

        <div class="carousel-dots">
            ${imagenes.map((_, index) => `
                <div class="carousel-dot" data-index="${index}"></div>
            `).join('')}
        </div>

        <div class="carousel-thumbnails">
            ${imagenes.map((img, index) => `
                <div class="carousel-thumb" data-index="${index}">
                    <img src="${img}" alt="Miniatura ${index+1}">
                </div>
            `).join('')}
        </div>
    </div>
    `;
}

// ===============================
// INICIALIZAR CARRUSEL
// ===============================
function initCarousel(containerId) {
    const container = document.getElementById(containerId);
    if (!container) return;

    const slides = container.querySelector('.carousel-slides');
    const slidesCount = container.querySelectorAll('.carousel-slide').length;
    const dots = container.querySelectorAll('.carousel-dot');
    const thumbs = container.querySelectorAll('.carousel-thumb');
    const prevBtn = container.querySelector('.prev-btn');
    const nextBtn = container.querySelector('.next-btn');

    let currentIndex = 0;
    let autoSlideInterval;

    function goToSlide(index) {
        if (index < 0) index = slidesCount - 1;
        if (index >= slidesCount) index = 0;
        slides.style.transform = `translateX(-${index * 100}%)`;
        currentIndex = index;
        dots.forEach(dot => dot.classList.remove('active'));
        dots[index].classList.add('active');
        thumbs.forEach(thumb => thumb.classList.remove('active'));
        thumbs[index].classList.add('active');
    }

    function startAutoSlide() {
        autoSlideInterval = setInterval(() => {
            goToSlide(currentIndex + 1);
        }, 5000);
    }

    function stopAutoSlide() {
        clearInterval(autoSlideInterval);
    }

    prevBtn.addEventListener('click', () => {
        stopAutoSlide();
        goToSlide(currentIndex - 1);
        startAutoSlide();
    });

    nextBtn.addEventListener('click', () => {
        stopAutoSlide();
        goToSlide(currentIndex + 1);
        startAutoSlide();
    });

    dots.forEach((dot, index) => {
        dot.addEventListener('click', () => {
            stopAutoSlide();
            goToSlide(index);
            startAutoSlide();
        });
    });

    thumbs.forEach((thumb, index) => {
        thumb.addEventListener('click', () => {
            stopAutoSlide();
            goToSlide(index);
            startAutoSlide();
        });
    });

    startAutoSlide();
    container.addEventListener('mouseenter', stopAutoSlide);
    container.addEventListener('mouseleave', startAutoSlide);
    goToSlide(0);
}

// ===============================
// CARGAR PRODUCTOS VARIOS
// ===============================
function cargarProductosVarios() {
    const container = document.getElementById('varios-products');
    container.innerHTML = '';

    productosVarios.forEach(producto => {
        const productCard = document.createElement('div');
        productCard.className = 'product-card animate-fade-in';
        productCard.innerHTML = `
            <div class="product-image">
                ${createCarouselHTML(producto.imagenes, producto.id)}
            </div>
            <div class="product-info">
                <h4>${producto.nombre}</h4>
                <p>${producto.descripcion}</p>
                <p class="product-price">$${producto.precio.toLocaleString()}</p>
                <button class="add-to-cart" onclick="agregarAlCarrito(${producto.id})">
                    Agregar al Carrito
                </button>
            </div>
        `;
        container.appendChild(productCard);
        setTimeout(() => initCarousel(`carousel-${producto.id}`), 100);
    });
}

// ===============================
// INICIO AUTOMÁTICO AL CARGAR
// ===============================
window.addEventListener('DOMContentLoaded', cargarProductosVarios);

// ===============================
// FUNCIONES EXTRA (EJEMPLO)
// ===============================
function agregarAlCarrito(idProducto) {
    const producto = productosVarios.find(p => p.id === idProducto);
    if (producto) {
        agregarProductoCarrito(producto);
    }
}
</script>

    <footer>
        <!-- Mismo footer que la página principal -->
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

</body>
</html>