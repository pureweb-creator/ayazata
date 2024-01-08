<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Order;
use Symfony\Component\HttpFoundation\Response;

class EnsureInvoiceIsPaid
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $order = Order::video($request->cookie('videoId'))->firstOrFail();

        if ($order->pay_status==Order::STATUS_PAID)
            return $next($request);

        return redirect('/');
    }
}
