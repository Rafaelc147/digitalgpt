<?php
require_once __DIR__ . '/../vendor/autoload.php';
spl_autoload_register(function($class){$prefix='App\\';if(strncmp($class,$prefix,strlen($prefix))===0){$file=__DIR__.'/../src/'.str_replace('\\','/',substr($class,strlen($prefix))).'.php';if(file_exists($file))require $file;}});

use App\Cart\Cart;

Cart::clear();
session_regenerate_id(true);
$title = 'Pago exitoso';
ob_start();
?>
<div class="container">
<h1>Gracias por tu compra</h1>
<p>Tu pago fue procesado correctamente.</p>
<a href="/index.php" class="btn">Volver al inicio</a>
</div>
<?php
$content = ob_get_clean();
include __DIR__ . '/../templates/layout.php';
