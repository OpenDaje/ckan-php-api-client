<?php

require __DIR__ . '/../vendor/autoload.php';

use OpenDaje\RestClient\CkanApiClient;

$ckan_client = CkanApiClient::create([
    'base_uri' => 'https://dati.trentino.it',
    'X-CKAN-API-Key' => 'my_super_secret_api_key',
]);

$command = $ckan_client->getCommand('GetRevisionList');


//$command = $ckan_client->getCommand('GetRevisionList', array('since_id' => '14459e39-21cf-4b3e-9ade-058df2771981', 'since_time' => '1523955129', 'sort' => 'time_desc'));

$responseModel = $ckan_client->execute($command);


var_dump($responseModel['result']);

//echo $responseModel['success'];
