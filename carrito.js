async function agregarAlCarrito(id){
    await fetch(`carrito.php?action=add&id=${id}`);
    if (typeof mostrarNotificacion === 'function') {
        mostrarNotificacion('Producto agregado al carrito');
    }
    actualizarCarrito();
}

async function actualizarCarrito(){
    const res = await fetch('carrito.php?action=list');
    const data = await res.json();
    const cartCount = document.getElementById('cart-count');
    const cartItems = document.getElementById('cart-items');
    const cartTotal = document.getElementById('cart-total');
    if(cartCount) cartCount.textContent = data.count;
    if(cartItems){
        cartItems.innerHTML = '';
        data.items.forEach(item => {
            const div = document.createElement('div');
            div.className = 'cart-item';
            div.innerHTML = `<span>${item.nombre} x${item.cantidad}</span><span>$${item.subtotal.toLocaleString()}</span>\n            <button onclick="eliminarDelCarrito(${item.id})" style="background:#ff4757;color:#fff;border:none;padding:0.2rem 0.5rem;border-radius:5px;cursor:pointer;">×</button>`;
            cartItems.appendChild(div);
        });
    }
    if(cartTotal) cartTotal.textContent = data.total.toLocaleString();
}

async function eliminarDelCarrito(id){
    await fetch(`carrito.php?action=remove&id=${id}`);
    actualizarCarrito();
}

function toggleCart(){
    const cartModal = document.getElementById('cart-modal');
    if(!cartModal) return;
    cartModal.style.display = cartModal.style.display === 'block' ? 'none' : 'block';
    if(cartModal.style.display === 'block') actualizarCarrito();
}

function checkout(){
    window.location.href = 'pago.php';
}

document.addEventListener('DOMContentLoaded', actualizarCarrito);
