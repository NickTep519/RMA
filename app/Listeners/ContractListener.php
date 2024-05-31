<?php

namespace App\Listeners;

use App\Models\Contract;
use App\Events\ContractEvent;
use App\Service\WhatsAppService;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

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
            $message = 'Bonjour '.$event->contract->tenant_name. '. Votre contrat de location en cours a été modifié. Avec votre IDL ('.$event->contract->idl. '), vérifiez les nouveaux termes de votre contrat.' ; 

        }else{

            $event->contract->idl = $this->generateUnniqueIdl()  ; 
            $event->contract->user()->associate(Auth::user()) ; 
            $event->contract->save() ; 

            $to = $event->contract->tenant_phone ; 
            $message = 'Bonjour '.$event->contract->tenant_name. '. Un contract de location a été emis en votre nom. Voici votre IDL : '.$event->contract->idl. '. Servez en pour Payer vos loyer en ligne sur RMA' ;    
        }

       
        try {
            $response = $this->whatsAppService->sendMessage($to, $message);
            Log::info('Message envoyé', ['response' => $response]);
            return response()->json($response);
        } catch (\Exception $e) {
            Log::error('Erreur lors de l\'envoi du message', ['error' => $e->getMessage()]);
            return response()->json(['error' => $e->getMessage()], 500);
        }

    }

    private function generateUnniqueIdl() {

        $idl = mt_rand(100000, 999999) ; 

        while (Contract::where('idl', $idl)->exists()) {

            $idl = mt_rand(100000, 999999) ; 
        }

        return $idl ; 
    }
}
