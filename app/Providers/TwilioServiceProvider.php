<?php

namespace App\Providers;

use App\Service\TwilioService;
use Illuminate\Support\ServiceProvider;
use Twilio\Rest\Client;

class TwilioServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(TwilioService::class, fn() => new TwilioService( new Client(env('TWILIO_ACCOUNT_SID'), env('TWILIO_AUTH_TOKEN')) )) ; 
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
