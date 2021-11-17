<?php

namespace App\Providers;

use App\Events\receiveTestEmail;
use App\Listeners\testEmailReceived;
use Illuminate\Contracts\Events\Dispatcher as DispatcherContract;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        receiveTestEmail::class => [
            testEmailReceived::class,
        ],
        'App\Events\SendMail' => [
            'App\Listeners\SendMailFired',
        ],
    ];
    public function boot()
    {
        parent::boot();
    }
}
