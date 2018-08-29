<?php

namespace Omatech\CheckSupervisor\App\Providers;

use Illuminate\Support\ServiceProvider;

class ConfigurationServiceProvider extends ServiceProvider
{
    /**
     * Register any other events for your application.
     *
     * @return void
     */
    public function register()
    {
        $this->configuration();
    }

    /**
     * Register configurations.
     *
     * @return void
     */
    private function configuration()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../../config/check-supervisor.php', 'check-supervisor'
        );
    }
}