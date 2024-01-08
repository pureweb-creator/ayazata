<?php

namespace App\Contracts;

interface PaymentGatewayInterface
{
    public function createPayment($invoiceId, $amount, $currency="KZT");
    public function getOrderStatus($invoiceId);
    public function handlePaymentResponse($invoiceId);
}