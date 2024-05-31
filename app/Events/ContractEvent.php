<?php

namespace App\Events;

use App\Models\Contract;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ContractEvent
{
    use Dispatchable, SerializesModels;

    
    public function __construct(public Contract $contract)
    {
        
    }

    
    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('channel-name'),
        ];
    }
}
