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
                __DIR__.'/../config/telnet.php' => config_path('telnet.php'),
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
        $this->mergeConfigFrom(__DIR__.'/../config/telnet.php', 'telnet');

        $this->app->bind('DevTalhaAkbar\TelnetLaravel\Telnet', function ($app) {
            $telnet = \Graze\TelnetClient\TelnetClient::factory();

            $telnet->connect(
                config('telnet.host') . ':' . config('telnet.port'),
                config('telnet.prompt'),
                config('telnet.promptError'),
                config('telnet.lineEnding')
            );
            return $telnet;
        });
    }
}
