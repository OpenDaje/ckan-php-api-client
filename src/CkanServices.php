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
                    'responseModel' => 'getGenericResponse',
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
                // ckan.logic.action.get.member_list -> http://docs.ckan.org/en/ckan-2.7.3/api/#ckan.logic.action.get.member_list
                'GetMemberList' => [
                    'httpMethod' => 'GET',
                    'uri' => '/api/3/action/member_list{?id,object_type,capacity}',
                    'summary' => 'Return the members of a group. The user must have permission to ‘get’ the group.',
                    'responseModel' => 'getGenericResponse',
                    'responseNotes' => 'Return type: list of (id, type, capacity) tuples',
                    'parameters' => [
                        'id' => [
                            'type' => 'string',
                            'location' => 'uri',
                            'required' => false,
                            'description' => 'id (string) – the id or name of the group',
                        ],
                        'object_type' => [
                            'type' => 'string',
                            'location' => 'uri',
                            'required' => false,
                            'description' => 'object_type (string) – restrict the members returned to those of a given type, e.g.  \'user\' or \'package\'',
                        ],
                        'capacity' => [
                            'type' => 'string',
                            'location' => 'uri',
                            'required' => false,
                            'description' => 'capacity (string) – restrict the members returned to those with a given capacity, e.g. \'member\', \'editor\', \'admin\', \'public\', \'private\'',
                        ],
                    // TODO ?? Check guzzle service definition guide for exception definition
                    //Raises:
                    //
                    //ckan.logic.NotFound: if the group doesn’t exist

                    ],
                ],
                // ckan.logic.action.get.group_list -> http://docs.ckan.org/en/ckan-2.7.3/api/#ckan.logic.action.get.group_list
                'GetGroupList' => [
                    'httpMethod' => 'GET',
                    'uri' => '/api/3/action/group_list{?order_by,sort,limit,offset,groups,all_fields,include_dataset_count,include_extras,include_tags,include_groups,include_users}',
                    'summary' => 'Return a list of the names of the site’s groups.',
                    'responseModel' => 'getGenericResponse',
                    'responseNotes' => 'Return type: list of strings',
                    'parameters' => [
                        'order_by' => [
                            'type' => 'string',
                            'location' => 'uri',
                            'required' => false,
                            'description' => 'order_by (string) – the field to sort the list by, must be \'name\' or \'packages\' (optional, default: \'name\') Deprecated use sort.',
                        ],
                        'sort' => [
                            'type' => 'string',
                            'location' => 'uri',
                            'required' => false,
                            'description' => 'sort (string) – sorting of the search results. Optional. Default: “name asc” string of field name and sort-order. The allowed fields are ‘name’, ‘package_count’ and ‘title’',
                        ],
                        'limit' => [
                            'type' => 'integer',
                            'location' => 'uri',
                            'required' => false,
                            'description' => 'limit (int) – if given, the list of groups will be broken into pages of at most limit groups per page and only one page will be returned at a time (optional)',
                        ],
                        'offset' => [
                            'type' => 'integer',
                            'location' => 'uri',
                            'required' => false,
                            'description' => 'offset (int) – when limit is given, the offset to start returning groups from',
                        ],
                        'groups' => [
                            // TODO check guzzle service definition maybe type array or object
                            'type' => 'array',
                            'location' => 'uri',
                            'required' => false,
                            'description' => 'groups (list of strings) – a list of names of the groups to return, if given only groups whose names are in this list will be returned (optional)',
                        ],
                        'all_fields' => [
                            'type' => 'boolean',
                            'location' => 'uri',
                            'required' => false,
                            'description' => 'all_fields (boolean) – return group dictionaries instead of just names. Only core fields are returned - get some more using the include_* options. Returning a list of packages is too expensive, so the packages property for each group is deprecated, but there is a count of the packages in the package_count property. (optional, default: False)',
                        ],
                        'include_dataset_count' => [
                            'type' => 'boolean',
                            'location' => 'uri',
                            'required' => false,
                            'description' => 'include_dataset_count (boolean) – if all_fields, include the full package_count (optional, default: True)',
                        ],
                        'include_extras' => [
                            'type' => 'boolean',
                            'location' => 'uri',
                            'required' => false,
                            'description' => 'include_extras – if all_fields, include the group extra fields (optional, default: False)',
                        ],
                        'include_tags' => [
                            'type' => 'boolean',
                            'location' => 'uri',
                            'required' => false,
                            'description' => 'include_tags (boolean) – if all_fields, include the group tags (optional, default: False)',
                        ],
                        'include_groups' => [
                            'type' => 'boolean',
                            'location' => 'uri',
                            'required' => false,
                            'description' => 'include_groups (boolean) – if all_fields, include the groups the groups are in (optional, default: False).',
                        ],
                        'include_users' => [
                            'type' => 'boolean',
                            'location' => 'uri',
                            'required' => false,
                            'description' => 'include_users (boolean) – if all_fields, include the group users (optional, default: False).',
                        ],
                    ],

                ],

//              PLACEORDER
//
//                ckan.logic.action.get.organization_list	PLANNED - LOW PRIORITY
//                ckan.logic.action.get.group_list_authz	PLANNED - LOW PRIORITY
//                ckan.logic.action.get.organization_list_for_user	PLANNED - LOW PRIORITY
//                ckan.logic.action.get.group_revision_list	PLANNED - LOW PRIORITY
//                ckan.logic.action.get.organization_revision_list	PLANNED - LOW PRIORITY
//
                // ckan.logic.action.get.license_list -> http://docs.ckan.org/en/ckan-2.7.3/api/#ckan.logic.action.get.license_list
                'GetLicenseList' => [
                    'httpMethod' => 'GET',
                    'uri' => '/api/3/action/license_list',
                    'summary' => 'Return the list of licenses available for datasets on the site.',
                    'responseModel' => 'getGenericResponse',
                    'responseNotes' => 'Return type: list of dictionaries',
                ],
                // ckan.logic.action.get.tag_list -> http://docs.ckan.org/en/ckan-2.7.3/api/#ckan.logic.action.get.tag_list
                'GetTagList' => [
                    'httpMethod' => 'GET',
                    'uri' => '/api/3/action/tag_list{?query,vocabulary_id,all_fields}',
                    'summary' => 'Return a list of the site’s tags.',
                    'responseModel' => 'getGenericResponse',
                    'responseNotes' => 'Return type: list of dictionaries',
                    'parameters' => [
                        'query' => [
                            'type' => 'string',
                            'location' => 'uri',
                            'required' => false,
                            'description' => 'query (string) – a tag name query to search for, if given only tags whose names contain this string will be returned (optional)',
                        ],
                        'vocabulary_id' => [
                            'type' => 'string',
                            'location' => 'uri',
                            'required' => false,
                            'description' => 'vocabulary_id (string) – the id or name of a vocabulary, if give only tags that belong to this vocabulary will be returned (optional)'
                        ],
                        'all_fields' => [
                            'type' => 'boolean',
                            'location' => 'uri',
                            'required' => false,
                            'description' => 'all_fields (boolean) – return full tag dictionaries instead of just names'

                        ]
                    ],
                ],
//              PLACEORDER
//
//                ckan.logic.action.get.user_list	PLANNED - LOW PRIORITY
//
                // ckan.logic.action.get.package_relationships_list -> http://docs.ckan.org/en/ckan-2.7.3/api/#ckan.logic.action.get.package_relationships_list
                'GetPackageRelationshipsList' => [
                    'httpMethod' => 'GET',
                    'uri' => '/api/3/action/package_relationships_list{?id,id2,rel}',
                    'summary' => 'Return a dataset (package)’s relationships.',
                    'responseModel' => 'getGenericResponse',
                    'responseNotes' => 'Return type: list of dictionaries',
                    'parameters' => [
                        'id' => [
                            'type' => 'string',
                            'location' => 'uri',
                            'required' => true,
                            'description' => 'id (string) – the id or name of the first package',
                        ],
                        'id2' => [
                            'type' => 'string',
                            'location' => 'uri',
                            'required' => true,
                            'description' => 'id2 – the id or name of the second package'
                        ],
                        'rel' => [
                            //TODO check... is realy string
                            'type' => 'string',
                            'location' => 'uri',
                            'required' => false,
                            'description' => 'rel – relationship as string see package_relationship_create() for the relationship types (optional)'

                        ]
                    ],
                ],
                // ckan.logic.action.get.package_show -> http://docs.ckan.org/en/ckan-2.7.3/api/#ckan.logic.action.get.package_show
                'GetPackageShow' => [
                    'httpMethod' => 'GET',
                    'uri' => '/api/3/action/package_show{?id,use_default_schema,include_tracking}',
                    'summary' => 'Return the metadata of a dataset (package) and its resources.',
                    'responseModel' => 'getGenericResponse',
                    'responseNotes' => 'Return type: dictionary',
                    'parameters' => [
                        'id' => [
                            'type' => 'string',
                            'location' => 'uri',
                            'required' => true,
                            'description' => 'id (string) – the id of the resource',
                        ],
                        'use_default_schema' => [
                            'type' => 'boolean',
                            'location' => 'uri',
                            'required' => false,
                            'description' => 'use_default_schema (bool) – use default package schema instead of a custom schema defined with an IDatasetForm plugin (default: False)',
                        ],
                        'include_tracking' => [
                            'type' => 'boolean',
                            'location' => 'uri',
                            'required' => false,
                            'description' => 'include_tracking (bool) – add tracking information to dataset and resources (default: False)'
                        ]
                    ],
                ],
                // ckan.logic.action.get.resource_show -> http://docs.ckan.org/en/ckan-2.7.3/api/#ckan.logic.action.get.resource_show
                'GetResourceShow' => [
                    'httpMethod' => 'GET',
                    'uri' => '/api/3/action/resource_show{?id,include_tracking}',
                    'summary' => 'Return the metadata of a resource.',
                    'responseModel' => 'getGenericResponse',
                    'responseNotes' => 'Return type: dictionary',
                    'parameters' => [
                        'id' => [
                            'type' => 'string',
                            'location' => 'uri',
                            'required' => true,
                            'description' => 'id (string) – the id of the resource',
                        ],
                        'include_tracking' => [
                            'type' => 'boolean',
                            'location' => 'uri',
                            'required' => false,
                            'description' => 'include_tracking (bool) – add tracking information to dataset and resources (default: False)'
                        ]
                    ],
                ],
                // ckan.logic.action.get.resource_view_show -> http://docs.ckan.org/en/ckan-2.7.3/api/#ckan.logic.action.get.resource_view_show
                'GetResourceViewShow' => [
                    'httpMethod' => 'GET',
                    'uri' => '/api/3/action/resource_view_show{?id}',
                    'summary' => 'Return the metadata of a resource_view.',
                    'responseModel' => 'getGenericResponse',
                    'responseNotes' => 'Return type: dictionary',
                    'parameters' => [
                        'id' => [
                            'type' => 'string',
                            'location' => 'uri',
                            'required' => true,
                            'description' => 'id (string) – the id of the resource_view',
                        ],
                    ],
                ],
                // ckan.logic.action.get.resource_view_list -> http://docs.ckan.org/en/ckan-2.7.3/api/#ckan.logic.action.get.resource_view_list
                'GetResourceViewList' => [
                    'httpMethod' => 'GET',
                    'uri' => '/api/3/action/resource_view_list{?id}',
                    'summary' => 'Return the list of resource views for a particular resource.',
                    'responseModel' => 'getGenericResponse',
                    'responseNotes' => 'list of dictionaries.',
                    'parameters' => [
                        'id' => [
                            'type' => 'string',
                            'location' => 'uri',
                            'required' => true,
                            'description' => 'id (string) – the id of the resource',
                        ],
                    ],
                ],
                // ckan.logic.action.get.resource_status_show -> http://docs.ckan.org/en/ckan-2.7.3/api/#ckan.logic.action.get.resource_status_show
                'GetResourceStatusShow' => [
                    'httpMethod' => 'GET',
                    'uri' => '/api/3/action/resource_status_show{?id}',
                    'summary' => 'Return the statuses of a resource’s tasks. This function is DEPRECATED.',
                    'responseModel' => 'getGenericResponse',
                    'responseNotes' => 'Return type: list of (status, date_done, traceback, task_status) dictionaries',
                    'parameters' => [
                        'id' => [
                            'type' => 'string',
                            'location' => 'uri',
                            'required' => true,
                            'description' => 'id (string) – the id of the resource',
                        ],
                    ],
                ],
                // ckan.logic.action.get.revision_show -> http://docs.ckan.org/en/ckan-2.7.3/api/#ckan.logic.action.get.revision_show
                'GetRevisionShow' => [
                    'httpMethod' => 'GET',
                    'uri' => '/api/3/action/revision_show{?id}',
                    'summary' => 'Return the details of a revision.',
                    'responseModel' => 'getGenericResponse',
                    'responseNotes' => 'Return type: dictionary',
                    'parameters' => [
                        'id' => [
                            'type' => 'string',
                            'location' => 'uri',
                            'required' => true,
                            'description' => 'id (string) – the id of the resource',
                        ],
                    ],
                ],
                // ckan.logic.action.get.group_show -> http://docs.ckan.org/en/ckan-2.7.3/api/#ckan.logic.action.get.group_show
                'GetGroupShow' => [
                    'httpMethod' => 'GET',
                    'uri' => '/api/3/action/group_show{?id,include_datasets,include_dataset_count,include_extras,include_users,include_groups,include_tags,include_followers}',
                    'summary' => 'Return the details of a group.',
                    'responseModel' => 'getGenericResponse',
                    'responseNotes' => 'Return type: dictionary',
                    'parameters' => [
                        'id' => [
                            //TODO errore nella guida ufficiale, è indicato come parametro boolean
                            'type' => 'string',
                            'location' => 'uri',
                            'required' => true,
                            'description' => 'id (string) – the id or name of the group',
                        ],
                        'include_datasets' => [
                            'type' => 'boolean',
                            'location' => 'uri',
                            'required' => false,
                            'description' => 'include_datasets (boolean) – include a truncated list of the group’s datasets (optional, default: False)',
                        ],
                        'include_dataset_count' => [
                            'type' => 'boolean',
                            'location' => 'uri',
                            'required' => false,
                            'description' => 'include_dataset_count (boolean) – include the full package_count (optional, default: True)',
                        ],
                        'include_extras' => [
                            'type' => 'boolean',
                            'location' => 'uri',
                            'required' => false,
                            'description' => 'include_extras – include the group’s extra fields (optional, default: True)',
                        ],
                        'include_users' => [
                            'type' => 'boolean',
                            'location' => 'uri',
                            'required' => false,
                            'description' => 'include_users – include the group’s users (optional, default: True)',
                        ],
                        'include_groups' => [
                            'type' => 'boolean',
                            'location' => 'uri',
                            'required' => false,
                            'description' => 'include_groups – include the group’s sub groups (optional, default: True)',
                        ],
                        'include_tags' => [
                            'type' => 'boolean',
                            'location' => 'uri',
                            'required' => false,
                            'description' => 'include the group’s tags (optional, default: True)',
                        ],
                        'include_followers' => [
                            'type' => 'boolean',
                            'location' => 'uri',
                            'required' => false,
                            'description' => 'include_followers – include the group’s number of followers (optional, default: True)',
                        ],
                    ],
                ],


























            ],
            'models' => [
                'getGenericResponse' => [
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
