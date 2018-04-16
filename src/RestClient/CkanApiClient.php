<?php

namespace OpenDaje\RestClient;

use GuzzleHttp\Client;
use GuzzleHttp\Command\Guzzle\Description;
use GuzzleHttp\Command\Guzzle\GuzzleClient;
use OpenDaje\CkanServices ;

class CkanApiClient extends GuzzleClient
{
    public static function create($config = [])
    {
        // Load the service description file.
        $service_description = new Description(
            //['baseUrl' => $config['base_uri']] + (array) json_decode(file_get_contents(__DIR__ . '/../service.json'), true)
            //TODO testare definizione servizio con configurazione php. meno verboso e uso commenti per link alla guida
            ['baseUrl' => $config['base_uri']] + (array) CkanServices::description()
        );

        // Creates the client and sets the default request headers.
        $client = new Client([
            'headers' => [
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
            ],
            'auth' =>  [$config['X-CKAN-API-Key']],
        ]);

        return new static($client, $service_description, null, null, null, $config);
    }
}
