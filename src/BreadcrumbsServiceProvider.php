<?php

namespace LamaLama\Breadcrumbs;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class BreadcrumbsServiceProvider extends ServiceProvider
{
    /**
     * Boot.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerBladeDirectives();
        $this->registerPublishables();
    }

    /**
     * Register.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/breadcrumbs.php', 'breadcrumbs');

        $this->app->bind('breadcrumbs', function () {
            return new Breadcrumbs();
        });
    }

    /**
     * Register the Blade directives.
     *
     * @return void
     */
    public function registerBladeDirectives()
    {
        Blade::directive('breadcrumbs', function () {
            return "{!! '<div>Breadcrumbs!</div>' !!}";
        });
    }

    /**
     * Register all publishables.
     *
     * @return void
     */
    protected function registerPublishables(): void
    {
        $this->publishes([
            __DIR__.'/../config/breadcrumbs.php' => config_path('breadcrumbs.php'),
        ], 'config');
    }
}
