<?php
namespace App\Orders;

use PDO;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception as MailException;

class OrderService
{
    private PDO $db;
    private array $config;

    public function __construct(PDO $db, array $config)
    {
        $this->db = $db;
        $this->config = $config;
    }

    public function createPending(string $email, string $nombre, array $cart): int
    {
        $this->db->beginTransaction();
        $totals = $cart['totals'];
        $stmt = $this->db->prepare("INSERT INTO pedidos (email, nombre, subtotal, descuentos, envio, impuestos, total, moneda, estado, created_at, updated_at) VALUES (?,?,?,?,?,?,?,?, 'pending', NOW(), NOW())");
        $stmt->execute([
            $email,
            $nombre,
            $totals['subtotal'],
            $totals['descuento'],
            $totals['envio'],
            $totals['impuestos'],
            $totals['total'],
            'COP'
        ]);
        $pedidoId = (int)$this->db->lastInsertId();
        $stmtDet = $this->db->prepare("INSERT INTO detalle_pedido (pedido_id, producto_id, nombre_snapshot, precio_unitario, cantidad, subtotal, impuestos, total) VALUES (?,?,?,?,?,?,?,?)");
        foreach ($cart['items'] as $item) {
            $subtotal = $item['precio'] * $item['qty'];
            $stmtDet->execute([
                $pedidoId,
                $item['id'],
                $item['nombre'],
                $item['precio'],
                $item['qty'],
                $subtotal,
                0,
                $subtotal
            ]);
        }
        $stmtPago = $this->db->prepare("INSERT INTO pagos (pedido_id, provider, status, monto, raw_payload, created_at) VALUES (?, 'mercadopago', 'in_process', ?, NULL, NOW())");
        $stmtPago->execute([$pedidoId, $totals['total']]);
        $this->db->commit();
        return $pedidoId;
    }

    public function updatePayment(int $pedidoId, string $status, string $providerPaymentId, float $monto, array $raw): void
    {
        $stmt = $this->db->prepare("UPDATE pagos SET provider_payment_id=?, status=?, raw_payload=?, reconciled_at=NOW() WHERE pedido_id=?");
        $stmt->execute([$providerPaymentId, $status, json_encode($raw), $pedidoId]);

        if ($status === 'approved') {
            $this->db->beginTransaction();
            $this->db->prepare("UPDATE pedidos SET estado='paid', updated_at=NOW() WHERE id=?")->execute([$pedidoId]);
            $itemsStmt = $this->db->prepare("SELECT producto_id, cantidad, nombre_snapshot, total FROM detalle_pedido WHERE pedido_id=?");
            $itemsStmt->execute([$pedidoId]);
            $items = $itemsStmt->fetchAll(PDO::FETCH_ASSOC);
            foreach ($items as $row) {
                $this->db->prepare("UPDATE productos SET stock = stock - ? WHERE id=?")->execute([$row['cantidad'], $row['producto_id']]);
            }
            $this->db->commit();
            // send email
            $order = $this->db->prepare("SELECT * FROM pedidos WHERE id=?");
            $order->execute([$pedidoId]);
            $orderData = $order->fetch(PDO::FETCH_ASSOC);
            $this->sendEmail($orderData, $items);
        } elseif (in_array($status, ['rejected','refunded','charged_back'], true)) {
            $this->db->prepare("UPDATE pedidos SET estado=? , updated_at=NOW() WHERE id=?")->execute([$status === 'rejected' ? 'canceled' : $status, $pedidoId]);
        }
    }

    private function sendEmail(array $order, array $items): void
    {
        try {
            $mail = new PHPMailer(true);
            $smtp = $this->config['smtp'];
            $mail->isSMTP();
            $mail->Host = $smtp['host'];
            $mail->SMTPAuth = true;
            $mail->Username = $smtp['user'];
            $mail->Password = $smtp['pass'];
            $mail->SMTPSecure = $smtp['secure'];
            $mail->Port = $smtp['port'];
            $mail->setFrom($smtp['user'], 'Tienda');
            $mail->addAddress($order['email'], $order['nombre']);
            $mail->isHTML(true);
            $mail->Subject = 'Confirmación de pedido';
            ob_start();
            $orderVar = $order; // local variable names to pass
            $itemsVar = $items;
            $order = $orderVar; $items = $itemsVar;
            include __DIR__ . '/../../emails/order_confirm.php';
            $mail->Body = ob_get_clean();
            $mail->send();
        } catch (MailException $e) {
            // log error in production
        }
    }
}
