<?php

namespace App\Providers;

use App\Services\PaymentService;
use Illuminate\Support\ServiceProvider;

class PaymentServiceProvider extends ServiceProvider
{

    public function register(): void
    {
        $this->app->singleton(PaymentService::class, function ($app) {
            return new PaymentService();
        });
    }

    public function boot(): void {}

}
