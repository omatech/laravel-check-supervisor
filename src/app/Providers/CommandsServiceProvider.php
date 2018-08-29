<?php

namespace Omatech\CheckSupervisor\App\Providers;

use Illuminate\Support\ServiceProvider;
use Omatech\CheckSupervisor\App\Console\Commands\CheckSupervisor;

class CommandsServiceProvider extends ServiceProvider
{
    /**
     * Register any other events for your application.
     *
     * @return void
     */
    public function register()
    {
        $this->consoleCommands();
    }

    /**
     * Register console commands.
     *
     * @return void
     */
    private function consoleCommands()
    {
        $this->commands(CheckSupervisor::class);
    }
}