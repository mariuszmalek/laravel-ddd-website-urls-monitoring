<?php

namespace App\Providers;

use Monitor\Contracts\MonitorRepositoryInterface;
use Monitor\Repositories\MonitorRepository;
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
        $this->app->bind(MonitorRepositoryInterface::class, MonitorRepository::class);
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
