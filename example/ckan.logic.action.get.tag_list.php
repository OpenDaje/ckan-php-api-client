<?php

require __DIR__ . '/../vendor/autoload.php';

use OpenDaje\RestClient\CkanApiClient;

$ckan_client = CkanApiClient::create([
    'base_uri' => 'https://dati.trentino.it',
    'X-CKAN-API-Key' => 'my_super_secret_api_key',
]);

// Simple call
//$command = $ckan_client->getCommand('GetTagList');

// Call with parms
$command = $ckan_client->getCommand('GetTagList', array('query' => 'aria'));

// Call with parms
//$command = $ckan_client->getCommand('GetTagList', array('query' => 'aria', 'all_fields' => true));


$responseModel = $ckan_client->execute($command);


var_dump($responseModel['result']);

//echo $responseModel['success'];
