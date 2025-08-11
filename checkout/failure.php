<?php
require_once __DIR__ . '/../vendor/autoload.php';
spl_autoload_register(function($class){$prefix='App\\';if(strncmp($class,$prefix,strlen($prefix))===0){$file=__DIR__.'/../src/'.str_replace('\\','/',substr($class,strlen($prefix))).'.php';if(file_exists($file))require $file;}});

$title = 'Pago fallido';
ob_start();
?>
<div class="container">
<h1>Pago rechazado</h1>
<p>Tu pago no pudo ser procesado. Inténtalo nuevamente.</p>
<a href="/cart/view.php" class="btn">Volver al carrito</a>
</div>
<?php
$content = ob_get_clean();
include __DIR__ . '/../templates/layout.php';
