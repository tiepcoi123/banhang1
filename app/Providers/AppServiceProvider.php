<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\User\CustomersRepository;
use App\Repositories\User\CustomersRepositoryInterface;
use Illuminate\Database\DatabaseManager;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(CustomersRepositoryInterface::class, CustomersRepository::class);
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
