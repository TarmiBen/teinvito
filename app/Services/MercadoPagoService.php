<?php

namespace App\Services;

use MercadoPago\SDK;
use MercadoPago\Item;
use MercadoPago\Preference;

class MercadoPagoService
{
    public function __construct()
    {
        SDK::setAccessToken(config('mercadopago.access_token'));
    }

    public function createPreference()
    {
        $preference = new Preference();

        $item = new Item();
        $item->title = 'Paquete X';
        $item->quantity = 1;
        $item->unit_price = 1000;
        $preference->external_reference = '1234';

        $preference->items = [$item];
        // $preference->back_urls = [
        //     'success' => route('subscription.success'),
        //     'failure' => route('subscription.failure'),
        //     'pending' => route('subscription.pending'),
        // ];
        $preference->save();

        return $preference;
    }
}