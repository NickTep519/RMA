<?php

namespace App\Listeners;

use App\Events\ContactEvent;
use App\Service\WhatsAppService;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class ContactListener
{
    /**
     * Create the event listener.
     */
    public function __construct(protected WhatsAppService $whatsAppService)
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(ContactEvent $event): void
    {
        
    }
}
