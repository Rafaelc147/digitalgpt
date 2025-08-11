<?php
require_once __DIR__ . '/../vendor/autoload.php';
spl_autoload_register(function($class){$prefix='App\\';if(strncmp($class,$prefix,strlen($prefix))===0){$file=__DIR__.'/../src/'.str_replace('\\','/',substr($class,strlen($prefix))).'.php';if(file_exists($file))require $file;}});

$pdo = require __DIR__ . '/../config/db.php';
$config = require __DIR__ . '/../config/config.php';
header('Content-Type: application/xml');
$base = rtrim($config['app_url'], '/');
$urls = [
    $base . '/index.php',
    $base . '/audio.php',
    $base . '/cableado.php',
    $base . '/componentes.php',
    $base . '/electronica.php',
    $base . '/gaming.php',
    $base . '/varios.php',
];
$stmt = $pdo->query('SELECT id FROM productos');
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $urls[] = $base . '/producto.php?id=' . $row['id'];
}

echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
echo "<urlset xmlns=\"http://www.sitemaps.org/schemas/sitemap/0.9\">\n";
foreach ($urls as $u) {
    echo "  <url><loc>{$u}</loc></url>\n";
}
echo "</urlset>";
