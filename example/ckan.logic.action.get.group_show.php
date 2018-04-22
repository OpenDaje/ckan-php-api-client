<?php

require __DIR__ . '/../vendor/autoload.php';

use OpenDaje\RestClient\CkanApiClient;

$ckan_client = CkanApiClient::create([
    'base_uri' => 'https://dati.trentino.it',
    'X-CKAN-API-Key' => 'my_super_secret_api_key',
]);


$command = $ckan_client->getCommand('GetGroupShow', array('id' => 'ambiente'));

// OR

$command = $ckan_client->getCommand('GetGroupShow', array('id' => 'ambiente', 'include_extras' => true));

// OR with include parms (tags,users,groups,extra,include_datasets,include_dataset_count,include_followers)

$command = $ckan_client->getCommand('GetGroupShow', array('id' => 'ambiente', 'include_datasets' => true, 'include_tags' => true));

$responseModel = $ckan_client->execute($command);


var_dump($responseModel['result']);

//echo $responseModel['success'];
