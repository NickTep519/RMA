<?php

namespace App\Service;

use GuzzleHttp\Exception\RequestException;

class WhatsAppService
{
    public function __construct(protected $client, protected $apiUrl, protected $accessToken)
    {
        if (empty($this->accessToken)) {
            throw new \Exception('Le jeton d\'accès WhatsApp est manquant dans le fichier .env.');
        }
    }

    public function sendMessage($to, $templateName, $variables)
    {
        $components = [
            [
                'type' => 'body',
                'parameters' => []
            ]
        ] ;

        foreach ($variables as $variable) {
            $components[0]['parameters'][] = [
                'type' => 'text',
                'text' => $variable
            ] ;
        }

        try {
            
            $response = $this->client->post($this->apiUrl, [
                'headers' => [
                    'Authorization' => 'Bearer ' . $this->accessToken,
                    'Content-Type'  => 'application/json',
                ],
                'json' => [
                    'messaging_product' => 'whatsapp',
                    'to'                => $to,
                    'type'              => 'template',
                    'template'          => [
                        'name' => $templateName,
                        'language' => [
                            'code' => 'fr_FR'
                        ],
                        'components' => $components,
                    ],
                ],
            ]);

            $responseBody = json_decode($response->getBody(), true);
            return $responseBody;

        } catch (RequestException $e) {
            if ($e->hasResponse()) {
                $errorResponse = json_decode($e->getResponse()->getBody()->getContents(), true);
                return $errorResponse;
            } else {
                return ['error' => 'Request failed without a response'];
            }
        }
    }
}
