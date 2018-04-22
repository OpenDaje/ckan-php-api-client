<?php

require __DIR__ . '/../vendor/autoload.php';

use OpenDaje\RestClient\CkanApiClient;

$ckan_client = CkanApiClient::create([
    'base_uri' => 'https://dati.trentino.it',
    'X-CKAN-API-Key' => 'my_super_secret_api_key',
]);


$command = $ckan_client->getCommand('GetPackageShow', array('id' => 'abitazioni-di-proprieta-di-enti-pubblici', 'include_tracking' => true));

// OR

//$command = $ckan_client->getCommand('GetPackageShow', array('id' => 'abitazioni-di-proprieta-di-enti-pubblici', 'use_default_schema' => true, 'include_tracking' => true));

$responseModel = $ckan_client->execute($command);


var_dump($responseModel['result']);

//echo $responseModel['success'];
