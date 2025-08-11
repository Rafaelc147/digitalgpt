<?php
namespace App\Config;

function env(string $key, $default = null)
{
    static $vars;
    if ($vars === null) {
        $path = __DIR__ . '/../.env';
        if (is_file($path)) {
            $vars = parse_ini_file($path, false, INI_SCANNER_TYPED);
        } else {
            $vars = [];
        }
    }
    return $vars[$key] ?? $default;
}

return [
    'app_url' => env('APP_URL', 'http://localhost'),
    'db' => [
        'host' => env('DB_HOST', 'localhost'),
        'name' => env('DB_NAME', 'ecommerce'),
        'user' => env('DB_USER', 'root'),
        'pass' => env('DB_PASS', ''),
    ],
    'mercadopago' => [
        'access_token' => env('MP_ACCESS_TOKEN', ''),
        'public_key' => env('MP_PUBLIC_KEY', ''),
    ],
    'smtp' => [
        'host' => env('SMTP_HOST', ''),
        'user' => env('SMTP_USER', ''),
        'pass' => env('SMTP_PASS', ''),
        'port' => (int)env('SMTP_PORT', 587),
        'secure' => env('SMTP_SECURE', 'tls'),
    ],
];
