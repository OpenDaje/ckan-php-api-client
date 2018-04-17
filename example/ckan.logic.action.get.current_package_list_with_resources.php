<?php

require __DIR__ . '/../vendor/autoload.php';

use OpenDaje\RestClient\CkanApiClient;

$ckan_client = CkanApiClient::create([
    'base_uri' => 'https://dati.trentino.it',
    'X-CKAN-API-Key' => 'my_super_secret_api_key',
]);

//$command = $ckan_client->getCommand('GetCurrentPackageListWithResources');

$command = $ckan_client->getCommand('GetCurrentPackageListWithResources', array('limit' => 1, 'offset' => 2, 'page' => 9));

$responseModel = $ckan_client->execute($command);


var_dump($responseModel['result']);

//echo $responseModel['success'];
