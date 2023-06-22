<?php

namespace App\Providers;

use App\Repositories\CartRepository;
use App\Repositories\Eloquent\CartRepositoryEloquent;
use Illuminate\Support\ServiceProvider;

class CartRepositoryProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(CartRepository::class, CartRepositoryEloquent::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
