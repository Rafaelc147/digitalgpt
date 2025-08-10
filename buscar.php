<?php
require_once 'conexion.php';

$q = isset($_GET['q']) ? trim($_GET['q']) : '';
$results = [];
if ($q !== '') {
    $stmt = $conexion->prepare("SELECT id, nombre, descripcion, precio_venta, imagen_url FROM productos WHERE nombre LIKE ? OR descripcion LIKE ?");
    $like = '%' . $q . '%';
    $stmt->bind_param('ss', $like, $like);
    $stmt->execute();
    $res = $stmt->get_result();
    while ($row = $res->fetch_assoc()) {
        $results[] = $row;
    }
    $stmt->close();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Resultados de búsqueda</title>
    <link rel="icon" type="image/png" href="imagenes/logo.png">
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background: #f5f5f5; margin: 0; padding: 2rem; }
        h2 { text-align: center; margin-bottom: 2rem; }
        .results { max-width: 900px; margin: 0 auto; }
        .product { display: flex; gap: 1rem; background: #fff; padding: 1rem; border-radius: 8px; box-shadow: 0 2px 6px rgba(0,0,0,0.1); margin-bottom: 1rem; }
        .product img { width: 100px; height: 100px; object-fit: contain; }
        .product-info h3 { margin: 0 0 .5rem; }
        .product-info p { margin: .3rem 0; }
    </style>
</head>
<body>
    <h2>Resultados de búsqueda para "<?php echo htmlspecialchars($q, ENT_QUOTES, 'UTF-8'); ?>"</h2>
    <div class="results">
        <?php if (!empty($results)): ?>
            <?php foreach ($results as $prod): ?>
                <div class="product">
                    <?php if (!empty($prod['imagen_url'])): ?>
                        <img src="<?php echo htmlspecialchars($prod['imagen_url'], ENT_QUOTES, 'UTF-8'); ?>" alt="<?php echo htmlspecialchars($prod['nombre'], ENT_QUOTES, 'UTF-8'); ?>">
                    <?php endif; ?>
                    <div class="product-info">
                        <h3><?php echo htmlspecialchars($prod['nombre'], ENT_QUOTES, 'UTF-8'); ?></h3>
                        <?php if (!empty($prod['descripcion'])): ?>
                            <p><?php echo htmlspecialchars($prod['descripcion'], ENT_QUOTES, 'UTF-8'); ?></p>
                        <?php endif; ?>
                        <p>Precio: $<?php echo number_format($prod['precio_venta'], 2); ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>No se encontraron productos.</p>
        <?php endif; ?>
    </div>
</body>
</html>
<?php $conexion->close(); ?>
