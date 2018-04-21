<?php

require __DIR__ . '/../vendor/autoload.php';

use OpenDaje\RestClient\CkanApiClient;

$ckan_client = CkanApiClient::create([
    'base_uri' => 'https://dati.trentino.it',
    'X-CKAN-API-Key' => 'my_super_secret_api_key',
]);


$command = $ckan_client->getCommand('GetResourceStatusShow', array('id' => 'dc8ca978-7ca0-4651-9da5-a3d654a085d3'));

$responseModel = $ckan_client->execute($command);


var_dump($responseModel['result']);

//echo $responseModel['success'];
