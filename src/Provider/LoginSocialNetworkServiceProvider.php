<?php

namespace HungNguyen\LoginSocialNetwork\Provider;

use HungNguyen\LoginSocialNetwork\Commands\MigrationCommandSocialNetwork;
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
        if ($this->app->runningInConsole()) {
            $this->registerConsoleCommands();
        }
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    private function registerConsoleCommands() {
        $this->commands(MigrationCommandSocialNetwork::class);
    }
}
