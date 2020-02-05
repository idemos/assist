<?php

namespace App\Providers;

//use Illuminate\Auth\Events\Registered;
//use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{

     protected $listen = [
         Registered::class => [
             SendEmailVerificationNotification::class,
            ],
        ];

/*
    protected $listen = [
        'App\Events\RegisteredUserEvent' => [
            'App\Notification\SendEmailRegistrationNotification',
        ],
    ];
*/      
    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
