<?php
/** @var array $order */
/** @var array $items */
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Confirmación de pedido</title>
</head>
<body>
<h1>Gracias por tu compra</h1>
<p>Pedido #<?= htmlspecialchars($order['id']); ?> confirmado.</p>
<table>
<tr><th>Producto</th><th>Cant</th><th>Total</th></tr>
<?php foreach ($items as $it): ?>
<tr><td><?= htmlspecialchars($it['nombre_snapshot']); ?></td><td><?= $it['cantidad']; ?></td><td>$<?= number_format($it['total'],2); ?></td></tr>
<?php endforeach; ?>
</table>
<p>Total pagado: $<?= number_format($order['total'],2); ?></p>
</body>
</html>
