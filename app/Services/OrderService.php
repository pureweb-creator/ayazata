<?php

namespace App\Services;

use App\Exceptions\FailedCurlException;
use App\Models\Order;

class OrderService
{
    public function storeOrder($videoId, $clientEmail, $hasPromo): void
    {
        $invoiceId = time();
        $order = Order::firstOrNew(['video_id'=>$videoId]);
        $order->invoice_id = $invoiceId;
        $order->email = $clientEmail;

        if ($hasPromo)
            $order->pay_status = Order::STATUS_PAID;

        $order->save();
    }

    /**
     * @throws FailedCurlException
     */
    public function informApiVideoIsPaid($token, $videoId)
    {
        $ch = curl_init(config('vdm.url'));
        curl_setopt_array($ch, [
            CURLOPT_POST=>true,
            CURLOPT_RETURNTRANSFER=>true,
            CURLOPT_POSTFIELDS=> [
                'videoId'=>$videoId,
                'token'=>$token
            ]
        ]);

        $result = json_decode(curl_exec($ch));

        if (curl_errno($ch))
            throw new FailedCurlException(curl_error($ch));

        if (curl_getinfo($ch, CURLINFO_HTTP_CODE!=200))
            throw new FailedCurlException(__("messages.curl.failed"));

        return $result;
    }
}
