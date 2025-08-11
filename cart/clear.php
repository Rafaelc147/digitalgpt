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
Cart::clear();
echo json_encode(['ok'=>true]);
