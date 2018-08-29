<?php

namespace Omatech\CheckSupervisor\App\Providers;

use Illuminate\Support\ServiceProvider;

class PublishServiceProvider extends ServiceProvider
{
    /**
     * Register any other events for your application.
     *
     * @return void
     */
    public function boot()
    {
        $this->publish();
    }

    /**
     * Publish configurations.
     *
     * @return void
     */
    private function publish()
    {
        $this->publishes([
            __DIR__.'/../../config/check-supervisor.php' => config_path('check-supervisor.php'),
        ]);
    }
}