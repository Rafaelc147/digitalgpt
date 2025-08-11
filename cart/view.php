<?php
require_once __DIR__ . '/../vendor/autoload.php';
spl_autoload_register(function($class){$prefix='App\\';if(strncmp($class,$prefix,strlen($prefix))===0){$file=__DIR__.'/../src/'.str_replace('\\','/',substr($class,strlen($prefix))).'.php';if(file_exists($file))require $file;}});

use App\Cart\Cart;
use App\Security\Csrf;

$cart = Cart::get();
$title = 'Carrito';
ob_start();
?>
<div class="container">
<h1>Carrito</h1>
<?php if (empty($cart['items'])): ?>
<p>Tu carrito está vacío.</p>
<?php else: ?>
<table class="cart-table">
<tr><th>Producto</th><th>Cantidad</th><th>Precio</th><th>Total</th><th></th></tr>
<?php foreach ($cart['items'] as $item): ?>
<tr>
<td><?= htmlspecialchars($item['nombre']); ?></td>
<td>
  <form class="cart-update" method="post" action="/cart/update.php">
    <input type="hidden" name="_csrf" value="<?= Csrf::token(); ?>">
    <input type="hidden" name="product_id" value="<?= $item['id']; ?>">
    <input type="number" name="qty" value="<?= $item['qty']; ?>" min="1">
    <button type="submit" class="btn">Actualizar</button>
  </form>
</td>
<td>$<?= number_format($item['precio'],2); ?></td>
<td>$<?= number_format($item['precio']*$item['qty'],2); ?></td>
<td>
  <form class="cart-update" method="post" action="/cart/remove.php">
    <input type="hidden" name="_csrf" value="<?= Csrf::token(); ?>">
    <input type="hidden" name="product_id" value="<?= $item['id']; ?>">
    <button type="submit" class="btn">Eliminar</button>
  </form>
</td>
</tr>
<?php endforeach; ?>
</table>
<p>Subtotal: $<?= number_format($cart['totals']['subtotal'],2); ?><br>
Descuento: $<?= number_format($cart['totals']['descuento'],2); ?><br>
Total: $<?= number_format($cart['totals']['total'],2); ?></p>
<a class="btn" href="/cart/checkout.php">Checkout</a>
<form class="cart-update" method="post" action="/cart/clear.php">
  <input type="hidden" name="_csrf" value="<?= Csrf::token(); ?>">
  <button type="submit" class="btn">Vaciar</button>
</form>
<?php endif; ?>
</div>
<?php
$content = ob_get_clean();
include __DIR__ . '/../templates/layout.php';
