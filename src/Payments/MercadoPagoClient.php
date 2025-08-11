<?php
namespace App\Payments;

use MercadoPago\SDK;
use MercadoPago\Preference;
use MercadoPago\Item;
use MercadoPago\Payment;

class MercadoPagoClient
{
    public function __construct(string $accessToken)
    {
        SDK::setAccessToken($accessToken);
    }

    public function createPreference(array $cartItems, string $payerEmail, string $backSuccess, string $backPending, string $backFailure, string $notificationUrl): Preference
    {
        $preference = new Preference();
        $items = [];
        foreach ($cartItems as $item) {
            $i = new Item();
            $i->title = $item['nombre'];
            $i->quantity = $item['qty'];
            $i->unit_price = $item['precio'];
            $items[] = $i;
        }
        $preference->items = $items;
        $preference->payer = ['email' => $payerEmail];
        $preference->back_urls = [
            'success' => $backSuccess,
            'pending' => $backPending,
            'failure' => $backFailure,
        ];
        $preference->auto_return = 'approved';
        $preference->notification_url = $notificationUrl;
        $preference->save();
        return $preference;
    }

    public function getPayment(int $id): Payment
    {
        return Payment::find_by_id($id);
    }
}
