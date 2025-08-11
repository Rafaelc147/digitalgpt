<?php
require_once __DIR__ . '/../vendor/autoload.php';
spl_autoload_register(function($class){$prefix='App\\';if(strncmp($class,$prefix,strlen($prefix))===0){$file=__DIR__.'/../src/'.str_replace('\\','/',substr($class,strlen($prefix))).'.php';if(file_exists($file))require $file;}});

$title = 'Pago pendiente';
ob_start();
?>
<div class="container">
<h1>Pago pendiente</h1>
<p>Estamos procesando tu pago. Te notificaremos cuando se confirme.</p>
<a href="/index.php" class="btn">Volver</a>
</div>
<?php
$content = ob_get_clean();
include __DIR__ . '/../templates/layout.php';
