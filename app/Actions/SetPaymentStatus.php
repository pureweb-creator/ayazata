<?php

namespace App\Actions;

use App\Models\Order;

class SetPaymentStatus
{
    public function handle($invoiceId, $status): bool
    {
        return Order::where('invoice_id', $invoiceId)
            ->update([
                'pay_status' => $status
            ]);
    }
}
