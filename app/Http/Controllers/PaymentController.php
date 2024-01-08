<?php

namespace App\Http\Controllers;

use App\Actions\SetPaymentStatus;
use App\Exceptions\FailedPaymentException;
use App\Exceptions\SuccessfulPaymentException;
use App\Exceptions\PendingPaymentException;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Contracts\PaymentGatewayInterface;

class PaymentController extends Controller
{
    public function create(Request $request, PaymentGatewayInterface $payment)
    {
        if ($request->session()->has('error'))
            return view('pay');

        $orderId = Order::video($request->cookie('videoId'))->first()->invoice_id;

        return view('pay', [
            'paymentObject' => $payment->createPayment(
                invoiceId: $orderId,
                amount: 3500
            )
        ]);
    }

    public function check(Request $request, PaymentGatewayInterface $payment, SetPaymentStatus $setPaymentStatus)
    {
        $orderId = Order::video($request->cookie('videoId'))->firstOrFail()->invoice_id;

        try {
            $payment->handlePaymentResponse($orderId);
        } catch (SuccessfulPaymentException $e) {
            $setPaymentStatus->handle(invoiceId: $orderId, status: Order::STATUS_PAID);
            return redirect(route('order.process'));
        } catch (PendingPaymentException $e) {
            dd($e->getMessage());
        } catch (FailedPaymentException $e) {
            $setPaymentStatus->handle(invoiceId: $orderId, status: Order::STATUS_FAILED);
            return redirect(route('payment.create'))->with('error', $e->getMessage());
        }

        return true;
    }
}
