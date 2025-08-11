<?php
require_once __DIR__ . '/../vendor/autoload.php';
spl_autoload_register(function($class){$prefix='App\\';if(strncmp($class,$prefix,strlen($prefix))===0){$file=__DIR__.'/../src/'.str_replace('\\','/',substr($class,strlen($prefix))).'.php';if(file_exists($file))require $file;}});

use App\Payments\MercadoPagoClient;
use App\Orders\OrderService;

$input = file_get_contents('php://input');
$data = json_decode($input, true);
$paymentId = $data['data']['id'] ?? $data['id'] ?? null;
$orderId = $_GET['order_id'] ?? null;
if (!$paymentId || !$orderId) {
    http_response_code(400);
    exit('bad request');
}
$config = require __DIR__ . '/../config/config.php';
$pdo = require __DIR__ . '/../config/db.php';
$mp = new MercadoPagoClient($config['mercadopago']['access_token']);
$payment = $mp->getPayment((int)$paymentId);
    $orderService = new OrderService($pdo, $config);
$orderService->updatePayment((int)$orderId, $payment->status, (string)$payment->id, (float)$payment->transaction_amount, (array)$payment);
http_response_code(200);
echo 'ok';
