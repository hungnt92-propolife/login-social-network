<?php

namespace HungNguyen\LoginSocialNetwork\Provider;

use Illuminate\Support\ServiceProvider;

class LoginSocialNetworkServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/../../routes/hungnt.php');
    }
}
