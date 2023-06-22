<?php

namespace App\Providers;

use App\Models\BookStore;
use App\Repositories\BookStoreRepository;
use App\Repositories\BookStoreRepositoryEloquent;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(BookStoreRepository::class, BookStoreRepositoryEloquent::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
