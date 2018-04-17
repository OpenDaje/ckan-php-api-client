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
                // ckan.logic.action.get.site_read -> http://docs.ckan.org/en/ckan-2.7.3/api/#ckan.logic.action.get.site_read
                'GetSiteRead' => [
                    'httpMethod' => 'GET',
                    'uri' => '/api/3/action/site_read',
                    'summary' => 'not defined in the official guide - healtcheck of the service (i suppose)',
                    'responseModel' => 'getSiteRead',
                    'responseNotes' => 'Return type: boolean'
                ],
                // ckan.logic.action.get.package_list -> http://docs.ckan.org/en/ckan-2.7.3/api/index.html#ckan.logic.action.get.package_list
                'GetPackageList' => [
                    'httpMethod' => 'GET',
                    'uri' => '/api/3/action/package_list{?limit,offset}',
                    'summary' => 'Return a list of the names of the site’s datasets (packages).',
                    'responseModel' => 'getPackageList',
                    'responseNotes' => 'Return type: list of strings',
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
                ],
                // ckan.logic.action.get.current_package_list_with_resources -> http://docs.ckan.org/en/ckan-2.7.3/api/#ckan.logic.action.get.current_package_list_with_resources
                'GetCurrentPackageListWithResources' => [
                    'httpMethod' => 'GET',
                    'uri' => '/api/3/action/current_package_list_with_resources{?limit,offset,page}',
                    'summary' => 'Return a list of the site’s datasets (packages) and their resources. The list is sorted most-recently-modified first.',
                    'responseModel' => 'getCurrentPackageListWithResources',
                    'responseNotes' => 'Return type: list of dictionaries.',
                    'parameters' => [
                        'limit' => [
                            'type' => 'integer',
                            'location' => 'uri',
                            'required' => false,
                            'description' => 'limit (int) – if given, the list of datasets will be broken into pages of at most limit datasets per page and only one page will be returned at a time (optional).',
                        ],
                        'offset' => [
                            'type' => 'string',
                            'location' => 'uri',
                            'required' => false,
                            'description' => 'offset (int) – when limit is given, the offset to start returning packages from'
                        ],
                        'page' => [
                            'type' => 'string',
                            'location' => 'uri',
                            'required' => false,
                            'description' => 'page (int) – when limit is given, which page to return, Deprecated: use offset'
                        ]
                    ]
                ],
                // ckan.logic.action.get.get.revision_list -> http://docs.ckan.org/en/ckan-2.7.3/api/#ckan.logic.action.get.revision_list
                'GetRevisionList' => [
                    'httpMethod' => 'GET',
                    'uri' => '/api/3/action/revision_list{?since_id,since_time,sort}',
                    'summary' => 'Return a list of the IDs of the site’s revisions. They are sorted with the newest first. Since the results are limited to 50 IDs, you can page through them using parameter since_id.',
                    'responseModel' => 'getRevisionList',
                    'responseNotes' => 'Return type: list of revision IDs, limited to 50',
                    'parameters' => [
                        'since_id' => [
                            //TODO ?? string or strong type Uuid?? not defined in the official guide
                            'type' => 'string',
                            'location' => 'uri',
                            'required' => false,
                            'description' => 'the revision ID after which you want the revisions.',
                        ],
                        'since_time' => [
                            //TODO ?? how to define time value? check guzzle service definition guide
                            'type' => 'string',
                            'location' => 'uri',
                            'required' => false,
                            'description' => 'the timestamp after which you want the revisions.',
                        ],
                        'sort' => [
                            'type' => 'string',
                            'location' => 'uri',
                            'required' => false,
                            'description' => '(string) – the order to sort the related items in, possible values are ‘time_asc’, ‘time_desc’ (default). (optional).',
                        ],
                    ]
                ],


                // ckan.logic.action.get.package_revision_list -> http://docs.ckan.org/en/ckan-2.7.3/api/#ckan.logic.action.get.package_revision_list
                'GetPackageRevisionList' => [
                    'httpMethod' => 'GET',
                    'uri' => '/api/3/action/package_revision_list{?id}',
                    'summary' => 'Return a dataset (package)’s revisions as a list of dictionaries.',
                    'responseModel' => 'getGenericRespone',
                    'responseNotes' => 'not defined in the official guide',
                    'parameters' => [
                        'id' => [
                            'type' => 'string',
                            'location' => 'uri',
                            'required' => true,
                            'description' => 'id (string) – the id or name of the dataset',
                        ]
                    ],
                ],















            ],
            'models' => [
                'getGenericRespone' => [
                    'type' => 'object',
                    'additionalProperties' => [
                        'location' => 'json'
                    ]
                ],

                'getSiteRead' => [
                    'type' => 'object',
                    'additionalProperties' => [
                        'location' => 'json'
                    ]
                ],
                'getPackageList' => [
                    'type' => 'object',
                    'additionalProperties' => [
                        'location' => 'json'
                    ]
                ],
                'getCurrentPackageListWithResources' => [
                    'type' => 'object',
                    'additionalProperties' => [
                        'location' => 'json'
                    ]
                ],
                'getRevisionList' => [
                    'type' => 'object',
                    'additionalProperties' => [
                        'location' => 'json'
                    ]
                ],
            ]
        ];
    }
}
