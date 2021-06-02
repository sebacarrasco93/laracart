<?php

namespace SebaCarrasco93\LaraCart;

use Illuminate\Support\ServiceProvider;
use SebaCarrasco93\LaraCart\LaraCart;

class LaraCartServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/laracart.php' => base_path('config/laracart.php')
        ], 'laracart-config');
    }

    public function register()
    {
        $this->app->bind('laracart', function() {
            return new LaraCart();
        });

        $this->mergeConfigFrom(__DIR__ . '/../config/laracart.php', 'laracart');
    }
}
