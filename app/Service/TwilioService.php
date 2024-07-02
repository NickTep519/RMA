<?php

namespace App\Service ; 

class TwilioService {

    public function __construct(protected $twilio) {

    }

    public function sendMessage ($to, $message) {

        return $this->twilio->messages->create(
            "whatsapp:{$to}",
            [
                'from' => env('TWILIO_WHATSAPP_FROM'),
                'body' => $message,
            ]
        );

    }
}