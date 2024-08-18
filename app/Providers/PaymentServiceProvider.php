<?php

namespace App\Providers;

use App\Services\PaymentService;
use Illuminate\Support\ServiceProvider;

class PaymentServiceProvider extends ServiceProvider
{

    /**
     * Register services in the container.
     *
     * This method binds the PaymentService class into the service container
     * as a singleton, ensuring only one instance of PaymentService is created
     * during the application's lifecycle.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->singleton(PaymentService::class, function ($app) {
            return new PaymentService();
        });
    }

    /**
     * Bootstrap any application services.
     *
     * This method is used to boot any application services. Currently,
     * it is empty, but it can be used to perform any necessary actions
     * during the application's bootstrapping process.
     *
     * @return void
     */
    public function boot(): void {}

}
