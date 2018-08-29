<?php
namespace Omatech\CheckSupervisor\App\Console\Commands;

use Illuminate\Console\Command;
use Omatech\CheckSupervisor\App\Events\SupervisorIsNotRunning;
use Omatech\CheckSupervisor\App\Events\SupervisorRestarted;

class CheckSupervisor extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'supervisor:check';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        if(strpos(shell_exec('service supervisor status'), 'not running') !== false)
        {
            if(config('check-supervisor.restart-supervisor') === true)
            {
                $log = shell_exec('service supervisor restart');

                event(new SupervisorRestarted($log));

            }else
            {
                event(new SupervisorIsNotRunning());
            }
        }
    }
}