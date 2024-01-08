<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/public-offer', function () {
    return view('public_offer');
})->name('public_offer');

Route::get('/company-policy', function () {
    return view('company_policy');
})->name('company_policy');

Route::get('/payment-and-refund-policy', function () {
    return view('payment_and_refund_policy');
})->name('payment_and_refund_policy');

Route::name('order.')->group(function (){
    Route::get('/order/create', [OrderController::class, 'create'])
        ->name('create');

    Route::get('/order/store', [OrderController::class, 'store'])
        ->middleware('video.confirmed')
        ->name('store');

    Route::get('/order/process', [OrderController::class, 'process'])
        ->middleware('invoice.paid')
        ->name('process');

//    Route::post('/order/ready', [OrderController::class, 'ready'])
//        ->middleware('webhook.valid')
//        ->name('ready');

    Route::get('/order/ready', [OrderController::class, 'show_ready'])
        ->middleware('invoice.paid');
});

Route::name('payment.')->group(function (){
    Route::get('/pay', [PaymentController::class, 'create'])
        ->middleware(['invoice.created', 'invoice.unpaid'])
        ->name('create');

    Route::get('/pay/check', [PaymentController::class, 'check'])
        ->name('check');
});
