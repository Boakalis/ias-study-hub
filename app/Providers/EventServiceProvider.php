<?php

namespace App\Providers;

use App\Events\CookieSave;
use App\Listeners\StoreCookieToDB;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        \App\Events\IasTestMail::class => [
            App\Listeners\SendReportMail::class,
        ],
        \App\Events\IasPaymentMail::class => [
            App\Listeners\SendIasPaymentMail::class,
        ],
        \App\Events\PyqPaymentMail::class => [
            App\Listeners\SendPyqPaymentMail::class,
        ],
        \App\Events\QbPaymentMail::class => [
            App\Listeners\SendQbPaymentMail::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
