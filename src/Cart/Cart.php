<?php
namespace App\Cart;

class Cart
{
    private static function init(): void
    {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = ['items' => [], 'coupon' => null, 'totals' => self::calculateTotals([])];
        }
    }

    private static function calculateTotals(array $items, ?array $coupon = null): array
    {
        $subtotal = 0;
        foreach ($items as $it) {
            $subtotal += $it['precio'] * $it['qty'];
        }
        $descuento = 0;
        if ($coupon) {
            if ($coupon['tipo'] === 'percent') {
                $descuento = $subtotal * ($coupon['valor'] / 100);
            } elseif ($coupon['tipo'] === 'fixed') {
                $descuento = $coupon['valor'];
            }
        }
        $total = max($subtotal - $descuento, 0);
        return [
            'subtotal' => $subtotal,
            'descuento' => $descuento,
            'envio' => 0,
            'impuestos' => 0,
            'total' => $total,
        ];
    }

    public static function get(): array
    {
        self::init();
        return $_SESSION['cart'];
    }

    private static function persist(): void
    {
        $_SESSION['cart']['totals'] = self::calculateTotals($_SESSION['cart']['items'], $_SESSION['cart']['coupon']);
    }

    public static function add(int $id, string $nombre, float $precio, int $qty, string $imagen, int $stock): void
    {
        self::init();
        if ($qty < 1 || $qty > $stock) {
            throw new \InvalidArgumentException('Cantidad inválida');
        }
        if (isset($_SESSION['cart']['items'][$id])) {
            $newQty = $_SESSION['cart']['items'][$id]['qty'] + $qty;
            if ($newQty > $stock) {
                throw new \RuntimeException('Sin stock suficiente');
            }
            $_SESSION['cart']['items'][$id]['qty'] = $newQty;
        } else {
            $_SESSION['cart']['items'][$id] = [
                'id' => $id,
                'nombre' => $nombre,
                'precio' => $precio,
                'qty' => $qty,
                'imagen_url' => $imagen,
            ];
        }
        self::persist();
    }

    public static function update(int $id, int $qty, int $stock): void
    {
        self::init();
        if (!isset($_SESSION['cart']['items'][$id])) {
            return;
        }
        if ($qty < 1) {
            unset($_SESSION['cart']['items'][$id]);
        } elseif ($qty <= $stock) {
            $_SESSION['cart']['items'][$id]['qty'] = $qty;
        } else {
            throw new \RuntimeException('Sin stock suficiente');
        }
        self::persist();
    }

    public static function remove(int $id): void
    {
        self::init();
        unset($_SESSION['cart']['items'][$id]);
        self::persist();
    }

    public static function clear(): void
    {
        self::init();
        $_SESSION['cart'] = ['items' => [], 'coupon' => null, 'totals' => self::calculateTotals([])];
    }

    public static function applyCoupon(?array $coupon): void
    {
        self::init();
        $_SESSION['cart']['coupon'] = $coupon;
        self::persist();
    }
}
