# CKAN php api client
[![License: GPL v3](https://img.shields.io/badge/License-GPL%20v3-blue.svg)](https://www.gnu.org/licenses/gpl-3.0)


Php api client for ckan server.

Requirements
------------

- PHP >= 7.0


# Endpoints covered by this library

| ENDPOINT | STATUS |
| ------------- | ------------- |
| [ckan.logic.action.get.site_read](http://docs.ckan.org/en/ckan-2.7.3/api/#ckan.logic.action.get.site_read) | Y |
| [ckan.logic.action.get.package_list](http://docs.ckan.org/en/ckan-2.7.3/api/index.html#ckan.logic.action.get.package_list) | Y |
| [ckan.logic.action.get.current_package_list_with_resources](http://docs.ckan.org/en/ckan-2.7.3/api/#ckan.logic.action.get.current_package_list_with_resources) | Y |
| [ckan.logic.action.get.revision_list](http://docs.ckan.org/en/ckan-2.7.3/api/#ckan.logic.action.get.revision_list)| Y |
| [ckan.logic.action.get.package_revision_list](http://docs.ckan.org/en/ckan-2.7.3/api/#ckan.logic.action.get.package_revision_list) | Y |
| [ckan.logic.action.get.member_list ***](http://docs.ckan.org/en/ckan-2.7.3/api/#ckan.logic.action.get.member_list) | Y |
| [ckan.logic.action.get.group_list](http://docs.ckan.org/en/ckan-2.7.3/api/#ckan.logic.action.get.group_list) | PLANNED - LOW PRIORITY |
| [ckan.logic.action.get.organization_list](http://docs.ckan.org/en/ckan-2.7.3/api/#ckan.logic.action.get.organization_list) | PLANNED - LOW PRIORITY |
| [ckan.logic.action.get.group_list_authz](http://docs.ckan.org/en/ckan-2.7.3/api/#ckan.logic.action.get.group_list_authz) | PLANNED - LOW PRIORITY |
| [ckan.logic.action.get.organization_list_for_user](http://docs.ckan.org/en/ckan-2.7.3/api/#ckan.logic.action.get.organization_list_for_user) | PLANNED - LOW PRIORITY |
| [ckan.logic.action.get.group_revision_list](http://docs.ckan.org/en/ckan-2.7.3/api/#ckan.logic.action.get.group_revision_list) | PLANNED - LOW PRIORITY |
| [ckan.logic.action.get.organization_revision_list](http://docs.ckan.org/en/ckan-2.7.3/api/#ckan.logic.action.get.organization_revision_list) | PLANNED - LOW PRIORITY |
| [ckan.logic.action.get.license_list](http://docs.ckan.org/en/ckan-2.7.3/api/#ckan.logic.action.get.license_list) | PLANNED |
| [ckan.logic.action.get.tag_list](http://docs.ckan.org/en/ckan-2.7.3/api/#ckan.logic.action.get.tag_list) | PLANNED |
| [ckan.logic.action.get.user_list](http://docs.ckan.org/en/ckan-2.7.3/api/#ckan.logic.action.get.user_list) | PLANNED - LOW PRIORITY |
| [ckan.logic.action.get.package_relationships_list](http://docs.ckan.org/en/ckan-2.7.3/api/#ckan.logic.action.get.package_relationships_list) | PLANNED |
| [ckan.logic.action.get.package_show](http://docs.ckan.org/en/ckan-2.7.3/api/#ckan.logic.action.get.package_show) | PLANNED |
| [ckan.logic.action.get.resource_show](http://docs.ckan.org/en/ckan-2.7.3/api/#ckan.logic.action.get.resource_show) | PLANNED |
| [ckan.logic.action.get.resource_view_show](http://docs.ckan.org/en/ckan-2.7.3/api/#ckan.logic.action.get.resource_view_show) | PLANNED |
| [ckan.logic.action.get.resource_view_list](http://docs.ckan.org/en/ckan-2.7.3/api/#ckan.logic.action.get.resource_view_list) | PLANNED |
| [ckan.logic.action.get.resource_status_show](http://docs.ckan.org/en/ckan-2.7.3/api/#ckan.logic.action.get.resource_status_show) | PLANNED |
| [ckan.logic.action.get.revision_show](http://docs.ckan.org/en/ckan-2.7.3/api/#ckan.logic.action.get.revision_show) | PLANNED |
| [ckan.logic.action.get.group_show](http://docs.ckan.org/en/ckan-2.7.3/api/#ckan.logic.action.get.group_show) | PLANNED - LOW PRIORITY |



## Contribute

Please feel free to fork and extend, send a pull request with your changes!
To establish a consistent code quality, please provide unit tests for all your changes and may adapt the documentation.

## License

Released under the [GPL v3 License](LICENSE).