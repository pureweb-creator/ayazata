<?php

namespace App\Http\Middleware;

use App\Models\Order;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureInvoiceIsUnpaid
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $order = Order::video($request->cookie('videoId'))->first();

        if ($order==null)
            return $next($request);

        if ($order->pay_status==Order::STATUS_PAID)
            return redirect('/');

        return $next($request);
    }
}
