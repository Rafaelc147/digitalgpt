<?php
session_start();
require_once 'conexion.php';

$session_id = session_id();
$action = $_GET['action'] ?? 'list';
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($action === 'add' && $id > 0) {
    $stmt = $conexion->prepare("SELECT cantidad FROM carrito WHERE session_id = ? AND producto_id = ?");
    $stmt->bind_param('si', $session_id, $id);
    $stmt->execute();
    $res = $stmt->get_result();
    if ($res->num_rows > 0) {
        $conexion->query("UPDATE carrito SET cantidad = cantidad + 1 WHERE session_id = '".$conexion->real_escape_string($session_id)."' AND producto_id = $id");
    } else {
        $stmtIns = $conexion->prepare("INSERT INTO carrito (session_id, producto_id, cantidad) VALUES (?, ?, 1)");
        $stmtIns->bind_param('si', $session_id, $id);
        $stmtIns->execute();
        $stmtIns->close();
    }
    $stmt->close();
}

if ($action === 'remove' && $id > 0) {
    $stmt = $conexion->prepare("DELETE FROM carrito WHERE session_id = ? AND producto_id = ?");
    $stmt->bind_param('si', $session_id, $id);
    $stmt->execute();
    $stmt->close();
}

if ($action === 'clear') {
    $stmt = $conexion->prepare("DELETE FROM carrito WHERE session_id = ?");
    $stmt->bind_param('s', $session_id);
    $stmt->execute();
    $stmt->close();
}

$items = [];
$total = 0;
$stmt = $conexion->prepare("SELECT c.producto_id as id, p.nombre, p.precio_venta, c.cantidad FROM carrito c JOIN productos p ON c.producto_id = p.id WHERE c.session_id = ?");
$stmt->bind_param('s', $session_id);
$stmt->execute();
$res = $stmt->get_result();
while ($row = $res->fetch_assoc()) {
    $subtotal = $row['precio_venta'] * $row['cantidad'];
    $items[] = [
        'id' => $row['id'],
        'nombre' => $row['nombre'],
        'precio' => (float)$row['precio_venta'],
        'cantidad' => (int)$row['cantidad'],
        'subtotal' => $subtotal
    ];
    $total += $subtotal;
}
$stmt->close();

$count = array_sum(array_column($items, 'cantidad'));

header('Content-Type: application/json');
echo json_encode([
    'items' => $items,
    'count' => $count,
    'total' => $total
]);

$conexion->close();
?>
