<?php
require_once __DIR__ . '/../vendor/autoload.php';
spl_autoload_register(function($class){$prefix='App\\';if(strncmp($class,$prefix,strlen($prefix))===0){$file=__DIR__.'/../src/'.str_replace('\\','/',substr($class,strlen($prefix))).'.php';if(file_exists($file))require $file;}});

use App\Security\Csrf;
use App\Cart\Cart;

header('Content-Type: application/json');
if (!Csrf::validate($_POST['_csrf'] ?? '')) {
    http_response_code(400);
    echo json_encode(['error'=>'CSRF']);
    exit;
}
$pdo = require __DIR__ . '/../config/db.php';
$id = (int)($_POST['product_id'] ?? 0);
$qty = (int)($_POST['qty'] ?? 1);
$stmt = $pdo->prepare('SELECT id,nombre,precio_venta,imagen_url,stock FROM productos WHERE id=?');
$stmt->execute([$id]);
if (!$p = $stmt->fetch()) {
    http_response_code(404);
    echo json_encode(['error'=>'Producto no encontrado']);
    exit;
}
try {
    Cart::add($p['id'], $p['nombre'], (float)$p['precio_venta'], $qty, $p['imagen_url'], (int)$p['stock']);
    echo json_encode(['ok'=>true,'cart'=>Cart::get()]);
} catch (Throwable $e) {
    http_response_code(400);
    echo json_encode(['error'=>$e->getMessage()]);
}
