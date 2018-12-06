<?php

namespace Rogercbe\Detective;

use Illuminate\Support\ServiceProvider;

class DetectiveServiceProvider extends ServiceProvider
{
    /**
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/detective.php' => config_path('detective.php'),
        ], 'config');
    }

    /**
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/detective.php', 'detective'
        );
    }
}
