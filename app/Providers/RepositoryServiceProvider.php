<?php

namespace App\Providers;

use App\Interfaces\ReserveRepositoryInterface;
use App\Interfaces\RoomRepositoryInterface;
use App\Repositories\ReserveRepository;
use App\Repositories\RoomRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(RoomRepositoryInterface::class, RoomRepository::class);
        $this->app->bind(ReserveRepositoryInterface::class, ReserveRepository::class);

    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
