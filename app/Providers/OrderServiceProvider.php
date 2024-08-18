<?php

namespace App\Providers;

use App\Services\OrderService;
use Illuminate\Support\ServiceProvider;

class OrderServiceProvider extends ServiceProvider
{

    /**
     * Register services in the container.
     *
     * This method binds the OrderService class into the service container
     * as a singleton, ensuring only one instance of OrderService is created
     * during the application's lifecycle.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->singleton(OrderService::class, function ($app) {
            return new OrderService();
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

}
