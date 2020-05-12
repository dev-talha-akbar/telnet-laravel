<?php

namespace DevTalhaAkbar\TelnetLaravel;

use Illuminate\Support\ServiceProvider;

class TelnetLaravelServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        /*
         * Optional methods to load your package assets
         */
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'telnet-laravel');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'telnet-laravel');
        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        // $this->loadRoutesFrom(__DIR__.'/routes.php');

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/config.php' => config_path('telnet-laravel.php'),
            ], 'config');

            // Publishing the views.
            /*$this->publishes([
                __DIR__.'/../resources/views' => resource_path('views/vendor/telnet-laravel'),
            ], 'views');*/

            // Publishing assets.
            /*$this->publishes([
                __DIR__.'/../resources/assets' => public_path('vendor/telnet-laravel'),
            ], 'assets');*/

            // Publishing the translation files.
            /*$this->publishes([
                __DIR__.'/../resources/lang' => resource_path('lang/vendor/telnet-laravel'),
            ], 'lang');*/

            // Registering package commands.
            // $this->commands([]);
        }
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        // Automatically apply the package configuration
        $this->mergeConfigFrom(__DIR__.'/../config/config.php', 'telnet-laravel');

        // Register the main class to use with the facade
        $this->app->bind('DevTalhaAkbar\TelnetLaravel\TelnetLaravel', function ($app) {
            $telnet = Graze\TelnetClient\TelnetClient::factory();
            $telnet->connect(config('telnet-laravel.host').':'.config('telnet-laravel.port'));
            return $telnet;
        });
    }
}
