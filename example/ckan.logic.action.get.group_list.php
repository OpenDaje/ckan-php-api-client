<?php

require __DIR__ . '/../vendor/autoload.php';

use OpenDaje\RestClient\CkanApiClient;

$ckan_client = CkanApiClient::create([
    'base_uri' => 'https://dati.trentino.it',
    'X-CKAN-API-Key' => 'my_super_secret_api_key',
]);

$command = $ckan_client->getCommand('GetGroupList');

// OR

//$command = $ckan_client->getCommand('GetGroupList', array('id' => 'ambiente', 'all_fields' => true));

// OR with include parms (tags,users,groups,extra)

//$command = $ckan_client->getCommand('GetGroupList', array('id' => 'ambiente', 'all_fields' => true, 'include_tags' => true));

$responseModel = $ckan_client->execute($command);


var_dump($responseModel['result']);

//echo $responseModel['success'];
