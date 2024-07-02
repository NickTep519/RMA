<?php

namespace App\Listeners;

use App\Models\Contract;
use App\Events\ContractEvent;
use App\Service\WhatsAppService;
use Illuminate\Support\Facades\Auth;

class ContractListener
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
    public function handle(ContractEvent $event) 
    {

        if (isset($event->contract->idl) ) {

            $to = $event->contract->tenant_phone ; 
            $templateName = "nv_contrat_b" ; 

            $variables = [
                $event->contract->tenant_name,
                $event->contract->idl
            ];

        }else{

            $event->contract->idl = $this->generateUniqueIdl()  ; 
            $event->contract->user()->associate(Auth::user()) ; 
            $event->contract->save() ; 

            $to = $event->contract->tenant_phone ; 
            $templateName = "contract_edit" ; 

            $variables = [
                $event->contract->tenant_name,
                $event->contract->idl
            ];
        }

       
            $response = $this->whatsAppService->sendMessage($to, $templateName, $variables) ;

            return response()->json(['status' => 'Message sent', 'data' => $response], 200);

        
    }

    private function generateUniqueIdl() {

        $idl = mt_rand(100000, 999999) ; 

        while (Contract::where('idl', $idl)->exists()) {

            $idl = mt_rand(100000, 999999) ; 
        }

        return $idl ; 
    }
}
