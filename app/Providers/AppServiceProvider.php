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
       
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
