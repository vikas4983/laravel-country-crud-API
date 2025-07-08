<?php

namespace CountryList;

use Illuminate\Support\ServiceProvider;

class CountryListServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/config/countrylist.php', 'countrylist');
    }

    public function boot(): void
    {
        //$this->loadRoutesFrom(__DIR__ . '/routes/web.php');
        $this->loadRoutesFrom(__DIR__ . '/../src/routes/api.php');
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
        $this->publishes([
            __DIR__ . '/../config/countrylist.php' => config_path('countrylist.php'),
        ], 'countrylist-config');
    }
}
