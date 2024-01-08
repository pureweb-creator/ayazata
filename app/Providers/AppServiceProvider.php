<?php

namespace App\Providers;

use App\Contracts\PaymentGatewayInterface;
use App\Services\PaymentGateway;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $credentials = match(config('app.env')){
            'local'=>config('epay.test'),
            'production'=>config('epay.production')
        };

        $this->app->bind(PaymentGatewayInterface::class, function () use ($credentials) {
            return new PaymentGateway($credentials);
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
