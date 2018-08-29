<?php
namespace Omatech\CheckSupervisor\App\Events;

use Illuminate\Queue\SerializesModels;

class SupervisorRestarted
{
    use SerializesModels;

    protected $log;

    public function __construct($log)
    {
        $this->log = $log;
    }
}