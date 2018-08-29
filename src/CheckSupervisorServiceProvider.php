<?php

namespace Omatech\CheckSupervisor;

use Illuminate\Support\ServiceProvider;

use Omatech\CheckSupervisor\App\Providers\CommandsServiceProvider;
use Omatech\CheckSupervisor\App\Providers\ConfigurationServiceProvider;
use Omatech\CheckSupervisor\App\Providers\PublishServiceProvider;

class CheckSupervisorServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
    }

    /**
     * Register the application service providers.
     *
     * @return void
     */
    public function register()
    {
        $this->providers();

    }

    private function providers()
    {
        $this->app->register(CommandsServiceProvider::class);
        $this->app->register(ConfigurationServiceProvider::class);
        $this->app->register(PublishServiceProvider::class);
    }

}