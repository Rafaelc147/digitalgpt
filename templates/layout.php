<?php
use App\Security\SecurityHeaders;
SecurityHeaders::apply();
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?= htmlspecialchars($title ?? 'Tienda'); ?></title>
<meta property="og:title" content="<?= htmlspecialchars($ogTitle ?? ($title ?? 'Tienda')); ?>">
<meta property="og:type" content="website">
<meta property="og:url" content="<?= htmlspecialchars($ogUrl ?? ''); ?>">
<meta property="og:image" content="<?= htmlspecialchars($ogImage ?? '/public/assets/img/logo.png'); ?>">
<meta name="twitter:card" content="summary_large_image">
<link rel="preconnect" href="https://secure.mlstatic.com">
<link rel="stylesheet" href="/public/assets/css/main.css">
</head>
<body>
<?= $content ?? '' ?>
<script src="/public/assets/js/main.js"></script>
</body>
</html>
