<?php

namespace OpenDaje;
use GuzzleHttp\Command\Guzzle\Description;

final class CkanServices
{

    public static function description()
    {
        return [
            'baseUri' => 'http://demo.ckan.org',
            'apiVersion' => '2018-04-16',
            'operations' => [
                // ckan.logic.action.get.package_list -> http://docs.ckan.org/en/ckan-2.7.3/api/index.html#ckan.logic.action.get.package_list
                'GetPackageList' => [
                    'httpMethod' => 'GET',
                    'uri' => '/api/3/action/package_list{?limit,offset}',
                    //'uri' => '/api/3/action/package_list/{limit,offset}',
                    'summary' => 'Return a list of the names of the site’s datasets (packages).',
                    'responseModel' => 'getPackageList',
                    'responseNotes' => 'list of strings',
                    'parameters' => [
                        'limit' => [
                            'type' => 'integer',
                            'location' => 'uri',
                            'required' => false,
                            'description' => 'limit (int) – if given, the list of datasets will be broken into pages of at most limit datasets per page and only one page will be returned at a time (optional)',
                        ],
                        'offset' => [
                            'type' => 'string',
                            'location' => 'uri',
                            'required' => false,
                            'description' => 'offset (int) – when limit is given, the offset to start returning packages from'
                        ]
                    ]
                ]
            ],
            'models' => [
                'getPackageList' => [
                    'type' => 'object',
                    'additionalProperties' => [
                        'location' => 'json'
                    ]
                ]
            ]
        ];
    }
}