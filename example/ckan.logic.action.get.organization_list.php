<?php

require __DIR__ . '/../vendor/autoload.php';

use OpenDaje\RestClient\CkanApiClient;

$ckan_client = CkanApiClient::create([
    'base_uri' => 'https://dati.trentino.it',
    'X-CKAN-API-Key' => 'my_super_secret_api_key',
]);

$command = $ckan_client->getCommand('GetOrganizationList');

// OR


// TODO how to pass list of string?
//$command = $ckan_client->getCommand('GetOrganizationList', array('organizations' => 'comune di rabbi,comune di prezzo'));
//$command = $ckan_client->getCommand('GetOrganizationList', array('organizations' => ['comune di rabbi','comune di prezzo']));



// OR with include parms (all_fields,order_by,organizations,include_dataset_count... and more)

//$command = $ckan_client->getCommand('GetOrganizationList', array('all_fields' => true));

$responseModel = $ckan_client->execute($command);


var_dump($responseModel['result']);

//echo $responseModel['success'];
