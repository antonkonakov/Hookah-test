<?php

namespace App\Providers;

use App\Repositories\BookingRepositoryInterface;
use App\Repositories\Eloquent\BookingRepository;
use App\Repositories\Eloquent\HookahRepository;
use App\Repositories\Eloquent\SmokingBarRepository;
use App\Repositories\HookahRepositoryInterface;
use App\Repositories\SmokingBarRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoriesServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(SmokingBarRepositoryInterface::class, SmokingBarRepository::class);
        $this->app->bind(HookahRepositoryInterface::class, HookahRepository::class);
        $this->app->bind(BookingRepositoryInterface::class, BookingRepository::class);
    }
}
