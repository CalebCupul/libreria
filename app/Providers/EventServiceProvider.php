<?php

namespace App\Providers;

use App\Models\BookRecord;
use App\Observers\BookRecordObserver;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        \App\Events\UserSaved::class => [
            \App\Listeners\OptimizedUserImage::class
        ],
        \App\Events\BookSaved::class => [
            \App\Listeners\OptimizedBookImage::class
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        BookRecord::observe(BookRecordObserver::class);
    }
}
