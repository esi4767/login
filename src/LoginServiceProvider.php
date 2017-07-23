<?php

namespace Teknoto\Login;

use Illuminate\Support\ServiceProvider;

class LoginServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/routes.php');
        $this->loadViewsFrom(__DIR__.'/Views', 'teknotoview');
        //$this->loadMigrationsFrom(__DIR__.'/Migrations');
        $this->publishes([
            __DIR__.'/Migrations'=>database_path('migrations')
            ],'teknoto');
        $this->publishes([
            __DIR__.'/Views' => resource_path('views/vendor/teknoto'),
        ],'teknoto');
        $this->publishes([
            __DIR__.'/public' => public_path(''),
        ], 'teknoto');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/Config/Config.php', 'MyConfig'
        );
    }
}
