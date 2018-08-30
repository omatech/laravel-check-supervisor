# Laravel: Check Supervisor Status 
Command to check that Supervisor is running.

## Installation

1.- Require the package in your composer.json.

```
composer require adriaroca/laravel-check-supervisor
```

2.- Register the service provider.

```php
    // config/app.php
    
    'providers' => [
        ...
        Omatech\CheckSupervisor\CheckSupervisorServiceProvider::class,
        ...
    ];
```

3.- Optionally, you can publish the config file of the package if you want to use the automatic restart option

```
php artisan vendor:publish 
```

And then, select:

```
Omatech\CheckSupervisor\App\Providers\PublishServiceProvider
```

## Usage

1.- Use the command to know if supervisor is down. You can automate it in your crontab.

``` 
php artisan supervisor:check en el sistema
```

2.- Create a listener to capture the package events. Here you can create your custom notification. Example:

``` 
php artisan make:listener SupervisorListener
```

```php
<?php

namespace App\Listeners;

use App\Mail\YourCustomEmail;
use Illuminate\Support\Facades\Mail;

class SupervisorListener
{
    protected $log;

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct($log = null)
    {
        $this->log = $log;
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        Mail::to('me@example.com')->send(new YourCustomEmail($this->log));
    }
}
```

You can capture feedback from the package using a param in ```__construct```.

3.- Register the events and listeners in your ```EventServiceProvider```. Example:

```php
    protected $listen = [
        ... 
        
        SupervisorIsNotRunning::class => [
            SupervisorListener::class
        ],
        SupervisorRestarted::class => [
            SupervisorListener::class
        ]
        
        ...
    ];
```

## Credits

* [Adrià Roca](https://github.com/adriaroca)

## Special thanks

* [Christian Bohollo](https://github.com/christian-omatech)

## Organization

* [Omatech](https://www.omatech.com)

## Contributors

See the contributors list [here](https://github.com/adriaroca/laravel-check-supervisor/graphs/contributors).

## License
[MIT license](http://opensource.org/licenses/MIT).
