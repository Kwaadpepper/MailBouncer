<?php

namespace Kwaadpepper\MailBouncer;

use Illuminate\Support\ServiceProvider;

class MailBouncerServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'kwaadpepper');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'kwaadpepper');
        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        // $this->loadRoutesFrom(__DIR__.'/routes.php');

        // Publishing is only necessary when using the CLI.
        if ($this->app->runningInConsole()) {
            $this->bootForConsole();
        }
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/mailbouncer.php', 'mailbouncer');

        // Register the service the package provides.
        $this->app->singleton('mailbouncer', function ($app) {
            return new MailBouncer;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['mailbouncer'];
    }
    
    /**
     * Console-specific booting.
     *
     * @return void
     */
    protected function bootForConsole()
    {
        // Publishing the configuration file.
        $this->publishes([
            __DIR__.'/../config/mailbouncer.php' => config_path('mailbouncer.php'),
        ], 'mailbouncer.config');

        // Publishing the views.
        /*$this->publishes([
            __DIR__.'/../resources/views' => base_path('resources/views/vendor/kwaadpepper'),
        ], 'mailbouncer.views');*/

        // Publishing assets.
        /*$this->publishes([
            __DIR__.'/../resources/assets' => public_path('vendor/kwaadpepper'),
        ], 'mailbouncer.views');*/

        // Publishing the translation files.
        /*$this->publishes([
            __DIR__.'/../resources/lang' => resource_path('lang/vendor/kwaadpepper'),
        ], 'mailbouncer.views');*/

        // Registering package commands.
        // $this->commands([]);
    }
}
