let carrito = JSON.parse(localStorage.getItem('carrito')) || [];

function guardarCarrito(){
    localStorage.setItem('carrito', JSON.stringify(carrito));
}

function agregarProductoCarrito(producto){
    carrito.push(producto);
    guardarCarrito();
    actualizarCarrito();
    mostrarNotificacion('Producto agregado al carrito');
}

function eliminarDelCarrito(index){
    carrito.splice(index,1);
    guardarCarrito();
    actualizarCarrito();
}

function actualizarCarrito(){
    const cartCount = document.getElementById('cart-count');
    const cartItems = document.getElementById('cart-items');
    const cartTotal = document.getElementById('cart-total');
    const paymentMethods = document.getElementById('payment-methods');
    if(cartCount) cartCount.textContent = carrito.length;
    if(cartItems){
        cartItems.innerHTML='';
        let total=0;
        carrito.forEach((item,idx)=>{
            const div=document.createElement('div');
            div.className='cart-item';
            div.innerHTML=`<span>${item.nombre}</span><span>$${item.precio.toLocaleString()}</span><button onclick="eliminarDelCarrito(${idx})" style="background:#ff4757;color:white;border:none;padding:0.2rem 0.5rem;border-radius:5px;cursor:pointer;">×</button>`;
            cartItems.appendChild(div);
            total+=item.precio;
        });
        if(cartTotal) cartTotal.textContent=total.toLocaleString();
    }
    if(paymentMethods) paymentMethods.style.display = carrito.length>0?'block':'none';
}

function toggleCart(){
    const modal=document.getElementById('cart-modal');
    if(modal) modal.style.display = modal.style.display==='block'?'none':'block';
}

function mostrarNotificacion(mensaje){
    const n=document.createElement('div');
    n.style.cssText='position:fixed;top:100px;right:20px;background:#28a745;color:white;padding:15px 25px;border-radius:8px;box-shadow:0 5px 15px rgba(0,0,0,0.2);z-index:3000;';
    n.textContent=mensaje;
    document.body.appendChild(n);
    setTimeout(()=>{n.remove();},2000);
}

document.addEventListener('DOMContentLoaded', actualizarCarrito);
