<?php
require_once __DIR__ . '/../vendor/autoload.php';
spl_autoload_register(function($class){$prefix='App\\';if(strncmp($class,$prefix,strlen($prefix))===0){$file=__DIR__.'/../src/'.str_replace('\\','/',substr($class,strlen($prefix))).'.php';if(file_exists($file))require $file;}});

use App\Cart\Cart;
use App\Security\Csrf;
use App\Orders\OrderService;
use App\Payments\MercadoPagoClient;

$cart = Cart::get();
if (empty($cart['items'])) {
    header('Location: /cart/view.php');
    exit;
}
$config = require __DIR__ . '/../config/config.php';
$pdo = require __DIR__ . '/../config/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!Csrf::validate($_POST['_csrf'] ?? '')) {
        http_response_code(400);
        exit('CSRF');
    }
    $email = filter_var($_POST['email'] ?? '', FILTER_SANITIZE_EMAIL);
    $nombre = htmlspecialchars(trim($_POST['nombre'] ?? ''));
    foreach ($cart['items'] as $item) {
        $stmt = $pdo->prepare('SELECT stock FROM productos WHERE id=?');
        $stmt->execute([$item['id']]);
        $stock = (int)($stmt->fetchColumn() ?: 0);
        if ($item['qty'] > $stock) {
            exit('Sin stock de ' . $item['nombre']);
        }
    }
    $orderService = new OrderService($pdo, $config);
    $orderId = $orderService->createPending($email, $nombre, $cart);
    session_regenerate_id(true);

    $mp = new MercadoPagoClient($config['mercadopago']['access_token']);
    $pref = $mp->createPreference(
        $cart['items'],
        $email,
        $config['app_url'] . '/checkout/success.php',
        $config['app_url'] . '/checkout/pending.php',
        $config['app_url'] . '/checkout/failure.php',
        $config['app_url'] . '/webhooks/mercadopago.php?order_id=' . $orderId
    );
    header('Location: ' . $pref->init_point);
    exit;
}

$title = 'Checkout';
ob_start();
?>
<div class="container">
<h1>Checkout</h1>
<table class="cart-table">
<tr><th>Producto</th><th>Cant</th><th>Total</th></tr>
<?php foreach ($cart['items'] as $item): ?>
<tr>
<td><?= htmlspecialchars($item['nombre']); ?></td>
<td><?= $item['qty']; ?></td>
<td>$<?= number_format($item['precio']*$item['qty'],2); ?></td>
</tr>
<?php endforeach; ?>
</table>
<p>Total a pagar: $<?= number_format($cart['totals']['total'],2); ?></p>
<form method="post">
<input type="hidden" name="_csrf" value="<?= Csrf::token(); ?>">
<label>Email <input type="email" name="email" required></label><br>
<label>Nombre <input type="text" name="nombre" required></label><br>
<button type="submit" class="btn">Pagar con Mercado Pago</button>
</form>
</div>
<?php
$content = ob_get_clean();
include __DIR__ . '/../templates/layout.php';
