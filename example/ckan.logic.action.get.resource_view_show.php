<?php

require __DIR__ . '/../vendor/autoload.php';

use OpenDaje\RestClient\CkanApiClient;

$ckan_client = CkanApiClient::create([
    'base_uri' => 'https://dati.trentino.it',
    'X-CKAN-API-Key' => 'my_super_secret_api_key',
]);


$command = $ckan_client->getCommand('GetResourceViewShow', array('id' => '1e77cc59-af31-4f1c-9197-3d4edbb69b87'));

$responseModel = $ckan_client->execute($command);


var_dump($responseModel['result']);

//echo $responseModel['success'];
