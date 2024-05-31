<?php

namespace App\Providers;

use App\Service\WhatsAppService;
use GuzzleHttp\Client;
use Illuminate\Support\ServiceProvider;

class WhatsAppServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(WhatsAppService::class, fn () => new WhatsAppService(new Client(['verify'=> false]), env('WHATSAPP_API_URL'),  env('WHATSAPP_ACCESS_TOKEN') )) ; 

    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
