<?php
// Conectarse a la base de datos
include 'conexion.php';

// Consultar todos los productos de la tabla
$sql = "SELECT * FROM productos";
$resultado = $conexion->query($sql);

// Verificar si hay productos
if ($resultado->num_rows > 0) {
    while ($p = $resultado->fetch_assoc()) {
        echo "
        <div class='product-card'>
            <div class='product-image'>
                <img src='{$p['imagen_url']}' alt='{$p['nombre']}' style='width:100%; height:200px; object-fit:cover;'>
            </div>
            <div class='product-info'>
                <h4>{$p['nombre']}</h4>
                <p>{$p['descripcion']}</p>
                <p class='product-price'>$" . number_format($p['precio_venta'], 0, ',', '.') . "</p>
                <button class='add-to-cart'>Agregar al carrito</button>
            </div>
        </div>
        ";
    }
} else {
    echo "<p>No hay productos disponibles.</p>";
}

// Cierra la conexión
$conexion->close();
?>
