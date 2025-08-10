<section class="featured">
    <div class="featured-container">
        <h2 class="section-title">Productos de Audio</h2>
        <div class="products-grid" id="audio-products">
            <!-- Productos se cargarán aquí -->
        </div>
    </div>
</section>

<!-- WhatsApp Float Button -->
<a href="https://wa.me/573001234567?text=Hola,%20estoy%20interesado%20en%20sus%20productos%20de%20audio" class="whatsapp-float" target="_blank">
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
        <button class="checkout-btn" onclick="checkout()">Proceder al Pago</button>
    </div>
</div>

<script>
// ===============================
// DATOS DE PRODUCTOS AUDIO
// ===============================
const productosAudio = [
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
// CARGAR PRODUCTOS AUDIO
// ===============================
function cargarProductosAudio() {
    const container = document.getElementById('audio-products');
    container.innerHTML = '';

    productosAudio.forEach(producto => {
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
window.addEventListener('DOMContentLoaded', cargarProductosAudio);

// ===============================
// FUNCIONES EXTRA (EJEMPLO)
// ===============================
function agregarAlCarrito(idProducto) {
    alert(`Producto ${idProducto} agregado al carrito (aquí puedes poner la lógica real)`);
}
</script>
