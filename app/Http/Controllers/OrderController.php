<?php

namespace App\Http\Controllers;

use App\Exceptions\FailedCurlException;
use App\Mail\VideoReady;
use App\Models\Order;
use App\Services\OrderService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class OrderController extends Controller
{
    /*
     * Show the form for creating order
     */
    public function create()
    {
        return view('order');
    }

    /*
     * Store a newly created order in storage
     */
    public function store(Request $request, OrderService $order)
    {

        $hasPromo = $request->cookie('promocode') === config('app.promocode');

        $order->storeOrder(
            $request->cookie('videoId'),
            $request->cookie('clientEmail'),
            $hasPromo
        );

        if ($hasPromo)
            return redirect(route('order.process'));

        return redirect(route('payment.create'));
    }

    /**
     * @throws FailedCurlException
     */
    public function process(Request $request, OrderService $order)
    {
        $order = $order->informApiVideoIsPaid(
            config('vdm.token'),
            $request->cookie('videoId')
        );

        return match ($order->result){
            "ok" => redirect(route('order.ready'))->with('status', Order::STATUS_READY),
            "error" => redirect(route('order.create'))->with('error', $order->msg)
        };
    }

    public function show_ready()
    {
        return view('order_ready');
    }

    public function ready(Request $request)
    {
        if ($request->has('orders')){
            $orders = json_decode($request->orders, true);

//            $orders = json_decode('[{"videoId":"cs9f3VOgfEs","url_540p_mp4":"https://...","url_1080p_mp4":"https://..."}]', true);

            foreach ($orders as $order) {
                Order::video($order['videoId'])
                    ->update([
                        'video_status'=>'ready',
                        'url_540p_mp4'=>$order['url_540p_mp4'],
                        'url_1080p_mp4'=>$order['url_1080p_mp4']]);

                $order = Order::video($order['videoId'])->first();
                Mail::to($order->email)->send(new VideoReady($order['url_1080p_mp4']));
            }
        }
    }

    public function check(Request $request)
    {
        $order = Order::video($request->cookie('videoId'))->first();

        return response()->json($order);
    }
}
