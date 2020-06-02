<?php

namespace LamaLama\Breadcrumbs;

use Illuminate\Support\ServiceProvider;
use LamaLama\Breadcrumbs\Breadcrumbs;

class BreadcrumbsServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->registerPublishables();
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/breadcrumbs.php', 'breadcrumbs');

        $this->app->bind('breadcrumbs', function () {
            return new Breadcrumbs();
        });
    }

    protected function registerPublishables(): void
    {
        $this->publishes([
            __DIR__.'/../config/breadcrumbs.php' => config_path('breadcrumbs.php'),
        ], 'config');
    }
}
