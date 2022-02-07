<?php

namespace HungNguyen\LoginSocialNetwork\Provider;

use Exception;
use HungNguyen\LoginSocialNetwork\Commands\MigrationCommandSocialNetwork;
use Illuminate\Support\Facades\Log;
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
        $this->loadRoutesFrom(__DIR__.'/../../routes/hungnt.php');
    }

    private function registerConsoleCommands() {
        $this->commands(MigrationCommandSocialNetwork::class);
    }
}
