<?php

namespace App\Providers;

use App\Console\Commands\CmsInstall;
use App\Console\Commands\ImportUsers;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
    * Register any application services.
    *
    * @return void
    */
    public function register()
    {
        //
    }

    /**
    * Bootstrap any application services.
    *
    * @return void
    */
    public function boot()
    {
        Schema::defaultStringLength(191);
        $this->loadRoutesFrom(__DIR__.'/../../routes/dofleini.php');
        $this->loadRoutesFrom(__DIR__.'/../../routes/backpack/custom.php');
        $this->loadMigrationsFrom(__DIR__.'/../../database/migrations');
        $this->loadViewsFrom(__DIR__.'/../../resources/views', 'laravel-cms');
        $this->publishes([
            __DIR__.'/../../public' => public_path('vendor/dofleini'),
            __DIR__.'/../../config/app.php' => config_path('dofleini.php'),
            __DIR__.'/../../config/date.php' => config_path('date.php'),
        ], 'public');
        if ($this->app->runningInConsole()) {
            $this->commands([
                CmsInstall::class,
                ImportUsers::class,
                ]);
            }
        }
    }
