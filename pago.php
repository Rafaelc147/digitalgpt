<?php
session_start();
require_once 'conexion.php';

$session_id = session_id();
$total = 0;
$stmt = $conexion->prepare("SELECT p.precio_venta, c.cantidad FROM carrito c JOIN productos p ON c.producto_id = p.id WHERE c.session_id = ?");
$stmt->bind_param('s', $session_id);
$stmt->execute();
$res = $stmt->get_result();
while ($row = $res->fetch_assoc()) {
    $total += $row['precio_venta'] * $row['cantidad'];
}
$stmt->close();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Pago</title>
    <link rel="icon" type="image/png" href="imagenes/logo.png">
    <style>
        body{font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;background:#f5f5f5;margin:0;padding:2rem;text-align:center;}
        h2{margin-bottom:2rem;}
        .pay-options{display:flex;flex-direction:column;gap:1rem;max-width:300px;margin:0 auto;}
        button{padding:0.8rem;border:none;border-radius:8px;cursor:pointer;font-size:1rem;}
        .wompi{background:#00d1b2;color:#fff;}
        .mp{background:#009ee3;color:#fff;}
        .pse{background:#0033a0;color:#fff;}
    </style>
</head>
<body>
    <h2>Total a pagar: $<?php echo number_format($total, 2); ?></h2>
    <div class="pay-options">
        <form action="https://checkout.wompi.co/p/" method="GET">
            <input type="hidden" name="amount" value="<?php echo (int)($total * 100); ?>">
            <input type="hidden" name="currency" value="COP">
            <button class="wompi" type="submit">Pagar con Wompi</button>
        </form>
        <form action="https://www.mercadopago.com.co/checkout/v1/redirect" method="GET">
            <button class="mp" type="submit">Pagar con Mercado Pago</button>
        </form>
        <form action="https://checkout.pagosinteligentes.com/pse" method="GET">
            <button class="pse" type="submit">Pagar con PSE</button>
        </form>
    </div>
</body>
</html>
<?php $conexion->close(); ?>
