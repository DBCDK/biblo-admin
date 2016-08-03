# DBCDK\CommunityServices\CampaignApi

All URIs are relative to *https://localhost/api*

Method | HTTP request | Description
------------- | ------------- | -------------
[**campaignCount**](CampaignApi.md#campaignCount) | **GET** /Campaigns/count | Count instances of the model matched by where from the data source.
[**campaignCreate**](CampaignApi.md#campaignCreate) | **POST** /Campaigns | Create a new instance of the model and persist it into the data source.
[**campaignCreateChangeStreamGetCampaignsChangeStream**](CampaignApi.md#campaignCreateChangeStreamGetCampaignsChangeStream) | **GET** /Campaigns/change-stream | Create a change stream.
[**campaignCreateChangeStreamPostCampaignsChangeStream**](CampaignApi.md#campaignCreateChangeStreamPostCampaignsChangeStream) | **POST** /Campaigns/change-stream | Create a change stream.
[**campaignDeleteById**](CampaignApi.md#campaignDeleteById) | **DELETE** /Campaigns/{id} | Delete a model instance by id from the data source.
[**campaignExistsGetCampaignsidExists**](CampaignApi.md#campaignExistsGetCampaignsidExists) | **GET** /Campaigns/{id}/exists | Check whether a model instance exists in the data source.
[**campaignExistsHeadCampaignsid**](CampaignApi.md#campaignExistsHeadCampaignsid) | **HEAD** /Campaigns/{id} | Check whether a model instance exists in the data source.
[**campaignFind**](CampaignApi.md#campaignFind) | **GET** /Campaigns | Find all instances of the model matched by filter from the data source.
[**campaignFindById**](CampaignApi.md#campaignFindById) | **GET** /Campaigns/{id} | Find a model instance by id from the data source.
[**campaignFindOne**](CampaignApi.md#campaignFindOne) | **GET** /Campaigns/findOne | Find first instance of the model matched by filter from the data source.
[**campaignPrototypeCountWorkTypes**](CampaignApi.md#campaignPrototypeCountWorkTypes) | **GET** /Campaigns/{id}/workTypes/count | Counts workTypes of Campaign.
[**campaignPrototypeCreateGroup**](CampaignApi.md#campaignPrototypeCreateGroup) | **POST** /Campaigns/{id}/group | Creates a new instance in group of this model.
[**campaignPrototypeCreateWorkTypes**](CampaignApi.md#campaignPrototypeCreateWorkTypes) | **POST** /Campaigns/{id}/workTypes | Creates a new instance in workTypes of this model.
[**campaignPrototypeDeleteWorkTypes**](CampaignApi.md#campaignPrototypeDeleteWorkTypes) | **DELETE** /Campaigns/{id}/workTypes | Deletes all workTypes of this model.
[**campaignPrototypeDestroyByIdWorkTypes**](CampaignApi.md#campaignPrototypeDestroyByIdWorkTypes) | **DELETE** /Campaigns/{id}/workTypes/{fk} | Delete a related item by id for workTypes.
[**campaignPrototypeDestroyGroup**](CampaignApi.md#campaignPrototypeDestroyGroup) | **DELETE** /Campaigns/{id}/group | Deletes group of this model.
[**campaignPrototypeExistsWorkTypes**](CampaignApi.md#campaignPrototypeExistsWorkTypes) | **HEAD** /Campaigns/{id}/workTypes/rel/{fk} | Check the existence of workTypes relation to an item by id.
[**campaignPrototypeFindByIdWorkTypes**](CampaignApi.md#campaignPrototypeFindByIdWorkTypes) | **GET** /Campaigns/{id}/workTypes/{fk} | Find a related item by id for workTypes.
[**campaignPrototypeGetGroup**](CampaignApi.md#campaignPrototypeGetGroup) | **GET** /Campaigns/{id}/group | Fetches hasOne relation group.
[**campaignPrototypeGetWorkTypes**](CampaignApi.md#campaignPrototypeGetWorkTypes) | **GET** /Campaigns/{id}/workTypes | Queries workTypes of Campaign.
[**campaignPrototypeLinkWorkTypes**](CampaignApi.md#campaignPrototypeLinkWorkTypes) | **PUT** /Campaigns/{id}/workTypes/rel/{fk} | Add a related item by id for workTypes.
[**campaignPrototypeUnlinkWorkTypes**](CampaignApi.md#campaignPrototypeUnlinkWorkTypes) | **DELETE** /Campaigns/{id}/workTypes/rel/{fk} | Remove the workTypes relation to an item by id.
[**campaignPrototypeUpdateAttributes**](CampaignApi.md#campaignPrototypeUpdateAttributes) | **PUT** /Campaigns/{id} | Update attributes for a model instance and persist it into the data source.
[**campaignPrototypeUpdateByIdWorkTypes**](CampaignApi.md#campaignPrototypeUpdateByIdWorkTypes) | **PUT** /Campaigns/{id}/workTypes/{fk} | Update a related item by id for workTypes.
[**campaignPrototypeUpdateGroup**](CampaignApi.md#campaignPrototypeUpdateGroup) | **PUT** /Campaigns/{id}/group | Update group of this model.
[**campaignUpdateAll**](CampaignApi.md#campaignUpdateAll) | **POST** /Campaigns/update | Update instances of the model matched by where from the data source.
[**campaignUpsert**](CampaignApi.md#campaignUpsert) | **PUT** /Campaigns | Update an existing model instance or insert a new one into the data source.


# **campaignCount**
> \DBCDK\CommunityServices\Model\InlineResponse200 campaignCount($where)

Count instances of the model matched by where from the data source.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\CampaignApi();
$where = "where_example"; // string | Criteria to match model instances

try {
    $result = $api_instance->campaignCount($where);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CampaignApi->campaignCount: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **where** | **string**| Criteria to match model instances | [optional]

### Return type

[**\DBCDK\CommunityServices\Model\InlineResponse200**](../Model/InlineResponse200.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **campaignCreate**
> \DBCDK\CommunityServices\Model\Campaign campaignCreate($data)

Create a new instance of the model and persist it into the data source.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\CampaignApi();
$data = new \DBCDK\CommunityServices\Model\Campaign(); // \DBCDK\CommunityServices\Model\Campaign | Model instance data

try {
    $result = $api_instance->campaignCreate($data);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CampaignApi->campaignCreate: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **data** | [**\DBCDK\CommunityServices\Model\Campaign**](../Model/\DBCDK\CommunityServices\Model\Campaign.md)| Model instance data | [optional]

### Return type

[**\DBCDK\CommunityServices\Model\Campaign**](../Model/Campaign.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **campaignCreateChangeStreamGetCampaignsChangeStream**
> \SplFileObject campaignCreateChangeStreamGetCampaignsChangeStream($options)

Create a change stream.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\CampaignApi();
$options = "options_example"; // string | 

try {
    $result = $api_instance->campaignCreateChangeStreamGetCampaignsChangeStream($options);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CampaignApi->campaignCreateChangeStreamGetCampaignsChangeStream: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **options** | **string**|  | [optional]

### Return type

[**\SplFileObject**](../Model/\SplFileObject.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **campaignCreateChangeStreamPostCampaignsChangeStream**
> \SplFileObject campaignCreateChangeStreamPostCampaignsChangeStream($options)

Create a change stream.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\CampaignApi();
$options = "options_example"; // string | 

try {
    $result = $api_instance->campaignCreateChangeStreamPostCampaignsChangeStream($options);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CampaignApi->campaignCreateChangeStreamPostCampaignsChangeStream: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **options** | **string**|  | [optional]

### Return type

[**\SplFileObject**](../Model/\SplFileObject.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **campaignDeleteById**
> object campaignDeleteById($id)

Delete a model instance by id from the data source.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\CampaignApi();
$id = "id_example"; // string | Model id

try {
    $result = $api_instance->campaignDeleteById($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CampaignApi->campaignDeleteById: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| Model id |

### Return type

**object**

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **campaignExistsGetCampaignsidExists**
> \DBCDK\CommunityServices\Model\InlineResponse2001 campaignExistsGetCampaignsidExists($id)

Check whether a model instance exists in the data source.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\CampaignApi();
$id = "id_example"; // string | Model id

try {
    $result = $api_instance->campaignExistsGetCampaignsidExists($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CampaignApi->campaignExistsGetCampaignsidExists: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| Model id |

### Return type

[**\DBCDK\CommunityServices\Model\InlineResponse2001**](../Model/InlineResponse2001.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **campaignExistsHeadCampaignsid**
> \DBCDK\CommunityServices\Model\InlineResponse2001 campaignExistsHeadCampaignsid($id)

Check whether a model instance exists in the data source.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\CampaignApi();
$id = "id_example"; // string | Model id

try {
    $result = $api_instance->campaignExistsHeadCampaignsid($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CampaignApi->campaignExistsHeadCampaignsid: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| Model id |

### Return type

[**\DBCDK\CommunityServices\Model\InlineResponse2001**](../Model/InlineResponse2001.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **campaignFind**
> \DBCDK\CommunityServices\Model\Campaign[] campaignFind($filter)

Find all instances of the model matched by filter from the data source.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\CampaignApi();
$filter = "filter_example"; // string | Filter defining fields, where, include, order, offset, and limit

try {
    $result = $api_instance->campaignFind($filter);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CampaignApi->campaignFind: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **filter** | **string**| Filter defining fields, where, include, order, offset, and limit | [optional]

### Return type

[**\DBCDK\CommunityServices\Model\Campaign[]**](../Model/Campaign.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **campaignFindById**
> \DBCDK\CommunityServices\Model\Campaign campaignFindById($id, $filter)

Find a model instance by id from the data source.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\CampaignApi();
$id = "id_example"; // string | Model id
$filter = "filter_example"; // string | Filter defining fields and include

try {
    $result = $api_instance->campaignFindById($id, $filter);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CampaignApi->campaignFindById: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| Model id |
 **filter** | **string**| Filter defining fields and include | [optional]

### Return type

[**\DBCDK\CommunityServices\Model\Campaign**](../Model/Campaign.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **campaignFindOne**
> \DBCDK\CommunityServices\Model\Campaign campaignFindOne($filter)

Find first instance of the model matched by filter from the data source.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\CampaignApi();
$filter = "filter_example"; // string | Filter defining fields, where, include, order, offset, and limit

try {
    $result = $api_instance->campaignFindOne($filter);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CampaignApi->campaignFindOne: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **filter** | **string**| Filter defining fields, where, include, order, offset, and limit | [optional]

### Return type

[**\DBCDK\CommunityServices\Model\Campaign**](../Model/Campaign.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **campaignPrototypeCountWorkTypes**
> \DBCDK\CommunityServices\Model\InlineResponse200 campaignPrototypeCountWorkTypes($id, $where)

Counts workTypes of Campaign.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\CampaignApi();
$id = "id_example"; // string | PersistedModel id
$where = "where_example"; // string | Criteria to match model instances

try {
    $result = $api_instance->campaignPrototypeCountWorkTypes($id, $where);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CampaignApi->campaignPrototypeCountWorkTypes: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| PersistedModel id |
 **where** | **string**| Criteria to match model instances | [optional]

### Return type

[**\DBCDK\CommunityServices\Model\InlineResponse200**](../Model/InlineResponse200.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **campaignPrototypeCreateGroup**
> \DBCDK\CommunityServices\Model\Group campaignPrototypeCreateGroup($id, $data)

Creates a new instance in group of this model.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\CampaignApi();
$id = "id_example"; // string | PersistedModel id
$data = new \DBCDK\CommunityServices\Model\Group(); // \DBCDK\CommunityServices\Model\Group | 

try {
    $result = $api_instance->campaignPrototypeCreateGroup($id, $data);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CampaignApi->campaignPrototypeCreateGroup: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| PersistedModel id |
 **data** | [**\DBCDK\CommunityServices\Model\Group**](../Model/\DBCDK\CommunityServices\Model\Group.md)|  | [optional]

### Return type

[**\DBCDK\CommunityServices\Model\Group**](../Model/Group.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **campaignPrototypeCreateWorkTypes**
> \DBCDK\CommunityServices\Model\CampaignWorktype campaignPrototypeCreateWorkTypes($id, $data)

Creates a new instance in workTypes of this model.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\CampaignApi();
$id = "id_example"; // string | PersistedModel id
$data = new \DBCDK\CommunityServices\Model\CampaignWorktype(); // \DBCDK\CommunityServices\Model\CampaignWorktype | 

try {
    $result = $api_instance->campaignPrototypeCreateWorkTypes($id, $data);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CampaignApi->campaignPrototypeCreateWorkTypes: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| PersistedModel id |
 **data** | [**\DBCDK\CommunityServices\Model\CampaignWorktype**](../Model/\DBCDK\CommunityServices\Model\CampaignWorktype.md)|  | [optional]

### Return type

[**\DBCDK\CommunityServices\Model\CampaignWorktype**](../Model/CampaignWorktype.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **campaignPrototypeDeleteWorkTypes**
> campaignPrototypeDeleteWorkTypes($id)

Deletes all workTypes of this model.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\CampaignApi();
$id = "id_example"; // string | PersistedModel id

try {
    $api_instance->campaignPrototypeDeleteWorkTypes($id);
} catch (Exception $e) {
    echo 'Exception when calling CampaignApi->campaignPrototypeDeleteWorkTypes: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| PersistedModel id |

### Return type

void (empty response body)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **campaignPrototypeDestroyByIdWorkTypes**
> campaignPrototypeDestroyByIdWorkTypes($fk, $id)

Delete a related item by id for workTypes.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\CampaignApi();
$fk = "fk_example"; // string | Foreign key for workTypes
$id = "id_example"; // string | PersistedModel id

try {
    $api_instance->campaignPrototypeDestroyByIdWorkTypes($fk, $id);
} catch (Exception $e) {
    echo 'Exception when calling CampaignApi->campaignPrototypeDestroyByIdWorkTypes: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **fk** | **string**| Foreign key for workTypes |
 **id** | **string**| PersistedModel id |

### Return type

void (empty response body)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **campaignPrototypeDestroyGroup**
> campaignPrototypeDestroyGroup($id)

Deletes group of this model.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\CampaignApi();
$id = "id_example"; // string | PersistedModel id

try {
    $api_instance->campaignPrototypeDestroyGroup($id);
} catch (Exception $e) {
    echo 'Exception when calling CampaignApi->campaignPrototypeDestroyGroup: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| PersistedModel id |

### Return type

void (empty response body)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **campaignPrototypeExistsWorkTypes**
> bool campaignPrototypeExistsWorkTypes($fk, $id)

Check the existence of workTypes relation to an item by id.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\CampaignApi();
$fk = "fk_example"; // string | Foreign key for workTypes
$id = "id_example"; // string | PersistedModel id

try {
    $result = $api_instance->campaignPrototypeExistsWorkTypes($fk, $id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CampaignApi->campaignPrototypeExistsWorkTypes: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **fk** | **string**| Foreign key for workTypes |
 **id** | **string**| PersistedModel id |

### Return type

**bool**

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **campaignPrototypeFindByIdWorkTypes**
> \DBCDK\CommunityServices\Model\CampaignWorktype campaignPrototypeFindByIdWorkTypes($fk, $id)

Find a related item by id for workTypes.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\CampaignApi();
$fk = "fk_example"; // string | Foreign key for workTypes
$id = "id_example"; // string | PersistedModel id

try {
    $result = $api_instance->campaignPrototypeFindByIdWorkTypes($fk, $id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CampaignApi->campaignPrototypeFindByIdWorkTypes: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **fk** | **string**| Foreign key for workTypes |
 **id** | **string**| PersistedModel id |

### Return type

[**\DBCDK\CommunityServices\Model\CampaignWorktype**](../Model/CampaignWorktype.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **campaignPrototypeGetGroup**
> \DBCDK\CommunityServices\Model\Group campaignPrototypeGetGroup($id, $refresh)

Fetches hasOne relation group.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\CampaignApi();
$id = "id_example"; // string | PersistedModel id
$refresh = true; // bool | 

try {
    $result = $api_instance->campaignPrototypeGetGroup($id, $refresh);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CampaignApi->campaignPrototypeGetGroup: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| PersistedModel id |
 **refresh** | **bool**|  | [optional]

### Return type

[**\DBCDK\CommunityServices\Model\Group**](../Model/Group.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **campaignPrototypeGetWorkTypes**
> \DBCDK\CommunityServices\Model\CampaignWorktype[] campaignPrototypeGetWorkTypes($id, $filter)

Queries workTypes of Campaign.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\CampaignApi();
$id = "id_example"; // string | PersistedModel id
$filter = "filter_example"; // string | 

try {
    $result = $api_instance->campaignPrototypeGetWorkTypes($id, $filter);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CampaignApi->campaignPrototypeGetWorkTypes: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| PersistedModel id |
 **filter** | **string**|  | [optional]

### Return type

[**\DBCDK\CommunityServices\Model\CampaignWorktype[]**](../Model/CampaignWorktype.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **campaignPrototypeLinkWorkTypes**
> \DBCDK\CommunityServices\Model\CampaignCampaignWorktype campaignPrototypeLinkWorkTypes($fk, $id, $data)

Add a related item by id for workTypes.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\CampaignApi();
$fk = "fk_example"; // string | Foreign key for workTypes
$id = "id_example"; // string | PersistedModel id
$data = new \DBCDK\CommunityServices\Model\CampaignCampaignWorktype(); // \DBCDK\CommunityServices\Model\CampaignCampaignWorktype | 

try {
    $result = $api_instance->campaignPrototypeLinkWorkTypes($fk, $id, $data);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CampaignApi->campaignPrototypeLinkWorkTypes: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **fk** | **string**| Foreign key for workTypes |
 **id** | **string**| PersistedModel id |
 **data** | [**\DBCDK\CommunityServices\Model\CampaignCampaignWorktype**](../Model/\DBCDK\CommunityServices\Model\CampaignCampaignWorktype.md)|  | [optional]

### Return type

[**\DBCDK\CommunityServices\Model\CampaignCampaignWorktype**](../Model/CampaignCampaignWorktype.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **campaignPrototypeUnlinkWorkTypes**
> campaignPrototypeUnlinkWorkTypes($fk, $id)

Remove the workTypes relation to an item by id.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\CampaignApi();
$fk = "fk_example"; // string | Foreign key for workTypes
$id = "id_example"; // string | PersistedModel id

try {
    $api_instance->campaignPrototypeUnlinkWorkTypes($fk, $id);
} catch (Exception $e) {
    echo 'Exception when calling CampaignApi->campaignPrototypeUnlinkWorkTypes: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **fk** | **string**| Foreign key for workTypes |
 **id** | **string**| PersistedModel id |

### Return type

void (empty response body)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **campaignPrototypeUpdateAttributes**
> \DBCDK\CommunityServices\Model\Campaign campaignPrototypeUpdateAttributes($id, $data)

Update attributes for a model instance and persist it into the data source.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\CampaignApi();
$id = "id_example"; // string | PersistedModel id
$data = new \DBCDK\CommunityServices\Model\Campaign(); // \DBCDK\CommunityServices\Model\Campaign | An object of model property name/value pairs

try {
    $result = $api_instance->campaignPrototypeUpdateAttributes($id, $data);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CampaignApi->campaignPrototypeUpdateAttributes: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| PersistedModel id |
 **data** | [**\DBCDK\CommunityServices\Model\Campaign**](../Model/\DBCDK\CommunityServices\Model\Campaign.md)| An object of model property name/value pairs | [optional]

### Return type

[**\DBCDK\CommunityServices\Model\Campaign**](../Model/Campaign.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **campaignPrototypeUpdateByIdWorkTypes**
> \DBCDK\CommunityServices\Model\CampaignWorktype campaignPrototypeUpdateByIdWorkTypes($fk, $id, $data)

Update a related item by id for workTypes.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\CampaignApi();
$fk = "fk_example"; // string | Foreign key for workTypes
$id = "id_example"; // string | PersistedModel id
$data = new \DBCDK\CommunityServices\Model\CampaignWorktype(); // \DBCDK\CommunityServices\Model\CampaignWorktype | 

try {
    $result = $api_instance->campaignPrototypeUpdateByIdWorkTypes($fk, $id, $data);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CampaignApi->campaignPrototypeUpdateByIdWorkTypes: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **fk** | **string**| Foreign key for workTypes |
 **id** | **string**| PersistedModel id |
 **data** | [**\DBCDK\CommunityServices\Model\CampaignWorktype**](../Model/\DBCDK\CommunityServices\Model\CampaignWorktype.md)|  | [optional]

### Return type

[**\DBCDK\CommunityServices\Model\CampaignWorktype**](../Model/CampaignWorktype.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **campaignPrototypeUpdateGroup**
> \DBCDK\CommunityServices\Model\Group campaignPrototypeUpdateGroup($id, $data)

Update group of this model.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\CampaignApi();
$id = "id_example"; // string | PersistedModel id
$data = new \DBCDK\CommunityServices\Model\Group(); // \DBCDK\CommunityServices\Model\Group | 

try {
    $result = $api_instance->campaignPrototypeUpdateGroup($id, $data);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CampaignApi->campaignPrototypeUpdateGroup: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| PersistedModel id |
 **data** | [**\DBCDK\CommunityServices\Model\Group**](../Model/\DBCDK\CommunityServices\Model\Group.md)|  | [optional]

### Return type

[**\DBCDK\CommunityServices\Model\Group**](../Model/Group.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **campaignUpdateAll**
> object campaignUpdateAll($where, $data)

Update instances of the model matched by where from the data source.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\CampaignApi();
$where = "where_example"; // string | Criteria to match model instances
$data = new \DBCDK\CommunityServices\Model\Campaign(); // \DBCDK\CommunityServices\Model\Campaign | An object of model property name/value pairs

try {
    $result = $api_instance->campaignUpdateAll($where, $data);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CampaignApi->campaignUpdateAll: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **where** | **string**| Criteria to match model instances | [optional]
 **data** | [**\DBCDK\CommunityServices\Model\Campaign**](../Model/\DBCDK\CommunityServices\Model\Campaign.md)| An object of model property name/value pairs | [optional]

### Return type

**object**

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **campaignUpsert**
> \DBCDK\CommunityServices\Model\Campaign campaignUpsert($data)

Update an existing model instance or insert a new one into the data source.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\CampaignApi();
$data = new \DBCDK\CommunityServices\Model\Campaign(); // \DBCDK\CommunityServices\Model\Campaign | Model instance data

try {
    $result = $api_instance->campaignUpsert($data);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CampaignApi->campaignUpsert: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **data** | [**\DBCDK\CommunityServices\Model\Campaign**](../Model/\DBCDK\CommunityServices\Model\Campaign.md)| Model instance data | [optional]

### Return type

[**\DBCDK\CommunityServices\Model\Campaign**](../Model/Campaign.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

