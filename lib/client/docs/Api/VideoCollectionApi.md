# DBCDK\CommunityServices\VideoCollectionApi

All URIs are relative to *https://localhost/api*

Method | HTTP request | Description
------------- | ------------- | -------------
[**videoCollectionCount**](VideoCollectionApi.md#videoCollectionCount) | **GET** /videoCollections/count | Count instances of the model matched by where from the data source.
[**videoCollectionCreate**](VideoCollectionApi.md#videoCollectionCreate) | **POST** /videoCollections | Create a new instance of the model and persist it into the data source.
[**videoCollectionCreateChangeStreamGetVideoCollectionsChangeStream**](VideoCollectionApi.md#videoCollectionCreateChangeStreamGetVideoCollectionsChangeStream) | **GET** /videoCollections/change-stream | Create a change stream.
[**videoCollectionCreateChangeStreamPostVideoCollectionsChangeStream**](VideoCollectionApi.md#videoCollectionCreateChangeStreamPostVideoCollectionsChangeStream) | **POST** /videoCollections/change-stream | Create a change stream.
[**videoCollectionDeleteById**](VideoCollectionApi.md#videoCollectionDeleteById) | **DELETE** /videoCollections/{id} | Delete a model instance by id from the data source.
[**videoCollectionExistsGetVideoCollectionsidExists**](VideoCollectionApi.md#videoCollectionExistsGetVideoCollectionsidExists) | **GET** /videoCollections/{id}/exists | Check whether a model instance exists in the data source.
[**videoCollectionExistsHeadVideoCollectionsid**](VideoCollectionApi.md#videoCollectionExistsHeadVideoCollectionsid) | **HEAD** /videoCollections/{id} | Check whether a model instance exists in the data source.
[**videoCollectionFind**](VideoCollectionApi.md#videoCollectionFind) | **GET** /videoCollections | Find all instances of the model matched by filter from the data source.
[**videoCollectionFindById**](VideoCollectionApi.md#videoCollectionFindById) | **GET** /videoCollections/{id} | Find a model instance by id from the data source.
[**videoCollectionFindOne**](VideoCollectionApi.md#videoCollectionFindOne) | **GET** /videoCollections/findOne | Find first instance of the model matched by filter from the data source.
[**videoCollectionPrototypeCountResolutions**](VideoCollectionApi.md#videoCollectionPrototypeCountResolutions) | **GET** /videoCollections/{id}/resolutions/count | Counts resolutions of videoCollection.
[**videoCollectionPrototypeCreateResolutions**](VideoCollectionApi.md#videoCollectionPrototypeCreateResolutions) | **POST** /videoCollections/{id}/resolutions | Creates a new instance in resolutions of this model.
[**videoCollectionPrototypeDeleteResolutions**](VideoCollectionApi.md#videoCollectionPrototypeDeleteResolutions) | **DELETE** /videoCollections/{id}/resolutions | Deletes all resolutions of this model.
[**videoCollectionPrototypeDestroyByIdResolutions**](VideoCollectionApi.md#videoCollectionPrototypeDestroyByIdResolutions) | **DELETE** /videoCollections/{id}/resolutions/{fk} | Delete a related item by id for resolutions.
[**videoCollectionPrototypeFindByIdResolutions**](VideoCollectionApi.md#videoCollectionPrototypeFindByIdResolutions) | **GET** /videoCollections/{id}/resolutions/{fk} | Find a related item by id for resolutions.
[**videoCollectionPrototypeGetResolutions**](VideoCollectionApi.md#videoCollectionPrototypeGetResolutions) | **GET** /videoCollections/{id}/resolutions | Queries resolutions of videoCollection.
[**videoCollectionPrototypeUpdateAttributes**](VideoCollectionApi.md#videoCollectionPrototypeUpdateAttributes) | **PUT** /videoCollections/{id} | Update attributes for a model instance and persist it into the data source.
[**videoCollectionPrototypeUpdateByIdResolutions**](VideoCollectionApi.md#videoCollectionPrototypeUpdateByIdResolutions) | **PUT** /videoCollections/{id}/resolutions/{fk} | Update a related item by id for resolutions.
[**videoCollectionUpdateAll**](VideoCollectionApi.md#videoCollectionUpdateAll) | **POST** /videoCollections/update | Update instances of the model matched by where from the data source.
[**videoCollectionUpsert**](VideoCollectionApi.md#videoCollectionUpsert) | **PUT** /videoCollections | Update an existing model instance or insert a new one into the data source.


# **videoCollectionCount**
> \DBCDK\CommunityServices\Model\InlineResponse200 videoCollectionCount($where)

Count instances of the model matched by where from the data source.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\VideoCollectionApi();
$where = "where_example"; // string | Criteria to match model instances

try {
    $result = $api_instance->videoCollectionCount($where);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling VideoCollectionApi->videoCollectionCount: ', $e->getMessage(), PHP_EOL;
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

# **videoCollectionCreate**
> \DBCDK\CommunityServices\Model\VideoCollection videoCollectionCreate($data)

Create a new instance of the model and persist it into the data source.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\VideoCollectionApi();
$data = new \DBCDK\CommunityServices\Model\VideoCollection(); // \DBCDK\CommunityServices\Model\VideoCollection | Model instance data

try {
    $result = $api_instance->videoCollectionCreate($data);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling VideoCollectionApi->videoCollectionCreate: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **data** | [**\DBCDK\CommunityServices\Model\VideoCollection**](../Model/\DBCDK\CommunityServices\Model\VideoCollection.md)| Model instance data | [optional]

### Return type

[**\DBCDK\CommunityServices\Model\VideoCollection**](../Model/VideoCollection.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **videoCollectionCreateChangeStreamGetVideoCollectionsChangeStream**
> \SplFileObject videoCollectionCreateChangeStreamGetVideoCollectionsChangeStream($options)

Create a change stream.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\VideoCollectionApi();
$options = "options_example"; // string | 

try {
    $result = $api_instance->videoCollectionCreateChangeStreamGetVideoCollectionsChangeStream($options);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling VideoCollectionApi->videoCollectionCreateChangeStreamGetVideoCollectionsChangeStream: ', $e->getMessage(), PHP_EOL;
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

# **videoCollectionCreateChangeStreamPostVideoCollectionsChangeStream**
> \SplFileObject videoCollectionCreateChangeStreamPostVideoCollectionsChangeStream($options)

Create a change stream.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\VideoCollectionApi();
$options = "options_example"; // string | 

try {
    $result = $api_instance->videoCollectionCreateChangeStreamPostVideoCollectionsChangeStream($options);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling VideoCollectionApi->videoCollectionCreateChangeStreamPostVideoCollectionsChangeStream: ', $e->getMessage(), PHP_EOL;
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

# **videoCollectionDeleteById**
> object videoCollectionDeleteById($id)

Delete a model instance by id from the data source.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\VideoCollectionApi();
$id = "id_example"; // string | Model id

try {
    $result = $api_instance->videoCollectionDeleteById($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling VideoCollectionApi->videoCollectionDeleteById: ', $e->getMessage(), PHP_EOL;
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

# **videoCollectionExistsGetVideoCollectionsidExists**
> \DBCDK\CommunityServices\Model\InlineResponse2001 videoCollectionExistsGetVideoCollectionsidExists($id)

Check whether a model instance exists in the data source.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\VideoCollectionApi();
$id = "id_example"; // string | Model id

try {
    $result = $api_instance->videoCollectionExistsGetVideoCollectionsidExists($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling VideoCollectionApi->videoCollectionExistsGetVideoCollectionsidExists: ', $e->getMessage(), PHP_EOL;
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

# **videoCollectionExistsHeadVideoCollectionsid**
> \DBCDK\CommunityServices\Model\InlineResponse2001 videoCollectionExistsHeadVideoCollectionsid($id)

Check whether a model instance exists in the data source.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\VideoCollectionApi();
$id = "id_example"; // string | Model id

try {
    $result = $api_instance->videoCollectionExistsHeadVideoCollectionsid($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling VideoCollectionApi->videoCollectionExistsHeadVideoCollectionsid: ', $e->getMessage(), PHP_EOL;
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

# **videoCollectionFind**
> \DBCDK\CommunityServices\Model\VideoCollection[] videoCollectionFind($filter)

Find all instances of the model matched by filter from the data source.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\VideoCollectionApi();
$filter = "filter_example"; // string | Filter defining fields, where, include, order, offset, and limit

try {
    $result = $api_instance->videoCollectionFind($filter);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling VideoCollectionApi->videoCollectionFind: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **filter** | **string**| Filter defining fields, where, include, order, offset, and limit | [optional]

### Return type

[**\DBCDK\CommunityServices\Model\VideoCollection[]**](../Model/VideoCollection.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **videoCollectionFindById**
> \DBCDK\CommunityServices\Model\VideoCollection videoCollectionFindById($id, $filter)

Find a model instance by id from the data source.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\VideoCollectionApi();
$id = "id_example"; // string | Model id
$filter = "filter_example"; // string | Filter defining fields and include

try {
    $result = $api_instance->videoCollectionFindById($id, $filter);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling VideoCollectionApi->videoCollectionFindById: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| Model id |
 **filter** | **string**| Filter defining fields and include | [optional]

### Return type

[**\DBCDK\CommunityServices\Model\VideoCollection**](../Model/VideoCollection.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **videoCollectionFindOne**
> \DBCDK\CommunityServices\Model\VideoCollection videoCollectionFindOne($filter)

Find first instance of the model matched by filter from the data source.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\VideoCollectionApi();
$filter = "filter_example"; // string | Filter defining fields, where, include, order, offset, and limit

try {
    $result = $api_instance->videoCollectionFindOne($filter);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling VideoCollectionApi->videoCollectionFindOne: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **filter** | **string**| Filter defining fields, where, include, order, offset, and limit | [optional]

### Return type

[**\DBCDK\CommunityServices\Model\VideoCollection**](../Model/VideoCollection.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **videoCollectionPrototypeCountResolutions**
> \DBCDK\CommunityServices\Model\InlineResponse200 videoCollectionPrototypeCountResolutions($id, $where)

Counts resolutions of videoCollection.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\VideoCollectionApi();
$id = "id_example"; // string | PersistedModel id
$where = "where_example"; // string | Criteria to match model instances

try {
    $result = $api_instance->videoCollectionPrototypeCountResolutions($id, $where);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling VideoCollectionApi->videoCollectionPrototypeCountResolutions: ', $e->getMessage(), PHP_EOL;
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

# **videoCollectionPrototypeCreateResolutions**
> \DBCDK\CommunityServices\Model\Resolution videoCollectionPrototypeCreateResolutions($id, $data)

Creates a new instance in resolutions of this model.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\VideoCollectionApi();
$id = "id_example"; // string | PersistedModel id
$data = new \DBCDK\CommunityServices\Model\Resolution(); // \DBCDK\CommunityServices\Model\Resolution | 

try {
    $result = $api_instance->videoCollectionPrototypeCreateResolutions($id, $data);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling VideoCollectionApi->videoCollectionPrototypeCreateResolutions: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| PersistedModel id |
 **data** | [**\DBCDK\CommunityServices\Model\Resolution**](../Model/\DBCDK\CommunityServices\Model\Resolution.md)|  | [optional]

### Return type

[**\DBCDK\CommunityServices\Model\Resolution**](../Model/Resolution.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **videoCollectionPrototypeDeleteResolutions**
> videoCollectionPrototypeDeleteResolutions($id)

Deletes all resolutions of this model.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\VideoCollectionApi();
$id = "id_example"; // string | PersistedModel id

try {
    $api_instance->videoCollectionPrototypeDeleteResolutions($id);
} catch (Exception $e) {
    echo 'Exception when calling VideoCollectionApi->videoCollectionPrototypeDeleteResolutions: ', $e->getMessage(), PHP_EOL;
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

# **videoCollectionPrototypeDestroyByIdResolutions**
> videoCollectionPrototypeDestroyByIdResolutions($fk, $id)

Delete a related item by id for resolutions.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\VideoCollectionApi();
$fk = "fk_example"; // string | Foreign key for resolutions
$id = "id_example"; // string | PersistedModel id

try {
    $api_instance->videoCollectionPrototypeDestroyByIdResolutions($fk, $id);
} catch (Exception $e) {
    echo 'Exception when calling VideoCollectionApi->videoCollectionPrototypeDestroyByIdResolutions: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **fk** | **string**| Foreign key for resolutions |
 **id** | **string**| PersistedModel id |

### Return type

void (empty response body)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **videoCollectionPrototypeFindByIdResolutions**
> \DBCDK\CommunityServices\Model\Resolution videoCollectionPrototypeFindByIdResolutions($fk, $id)

Find a related item by id for resolutions.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\VideoCollectionApi();
$fk = "fk_example"; // string | Foreign key for resolutions
$id = "id_example"; // string | PersistedModel id

try {
    $result = $api_instance->videoCollectionPrototypeFindByIdResolutions($fk, $id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling VideoCollectionApi->videoCollectionPrototypeFindByIdResolutions: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **fk** | **string**| Foreign key for resolutions |
 **id** | **string**| PersistedModel id |

### Return type

[**\DBCDK\CommunityServices\Model\Resolution**](../Model/Resolution.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **videoCollectionPrototypeGetResolutions**
> \DBCDK\CommunityServices\Model\Resolution[] videoCollectionPrototypeGetResolutions($id, $filter)

Queries resolutions of videoCollection.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\VideoCollectionApi();
$id = "id_example"; // string | PersistedModel id
$filter = "filter_example"; // string | 

try {
    $result = $api_instance->videoCollectionPrototypeGetResolutions($id, $filter);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling VideoCollectionApi->videoCollectionPrototypeGetResolutions: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| PersistedModel id |
 **filter** | **string**|  | [optional]

### Return type

[**\DBCDK\CommunityServices\Model\Resolution[]**](../Model/Resolution.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **videoCollectionPrototypeUpdateAttributes**
> \DBCDK\CommunityServices\Model\VideoCollection videoCollectionPrototypeUpdateAttributes($id, $data)

Update attributes for a model instance and persist it into the data source.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\VideoCollectionApi();
$id = "id_example"; // string | PersistedModel id
$data = new \DBCDK\CommunityServices\Model\VideoCollection(); // \DBCDK\CommunityServices\Model\VideoCollection | An object of model property name/value pairs

try {
    $result = $api_instance->videoCollectionPrototypeUpdateAttributes($id, $data);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling VideoCollectionApi->videoCollectionPrototypeUpdateAttributes: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| PersistedModel id |
 **data** | [**\DBCDK\CommunityServices\Model\VideoCollection**](../Model/\DBCDK\CommunityServices\Model\VideoCollection.md)| An object of model property name/value pairs | [optional]

### Return type

[**\DBCDK\CommunityServices\Model\VideoCollection**](../Model/VideoCollection.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **videoCollectionPrototypeUpdateByIdResolutions**
> \DBCDK\CommunityServices\Model\Resolution videoCollectionPrototypeUpdateByIdResolutions($fk, $id, $data)

Update a related item by id for resolutions.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\VideoCollectionApi();
$fk = "fk_example"; // string | Foreign key for resolutions
$id = "id_example"; // string | PersistedModel id
$data = new \DBCDK\CommunityServices\Model\Resolution(); // \DBCDK\CommunityServices\Model\Resolution | 

try {
    $result = $api_instance->videoCollectionPrototypeUpdateByIdResolutions($fk, $id, $data);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling VideoCollectionApi->videoCollectionPrototypeUpdateByIdResolutions: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **fk** | **string**| Foreign key for resolutions |
 **id** | **string**| PersistedModel id |
 **data** | [**\DBCDK\CommunityServices\Model\Resolution**](../Model/\DBCDK\CommunityServices\Model\Resolution.md)|  | [optional]

### Return type

[**\DBCDK\CommunityServices\Model\Resolution**](../Model/Resolution.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **videoCollectionUpdateAll**
> object videoCollectionUpdateAll($where, $data)

Update instances of the model matched by where from the data source.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\VideoCollectionApi();
$where = "where_example"; // string | Criteria to match model instances
$data = new \DBCDK\CommunityServices\Model\VideoCollection(); // \DBCDK\CommunityServices\Model\VideoCollection | An object of model property name/value pairs

try {
    $result = $api_instance->videoCollectionUpdateAll($where, $data);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling VideoCollectionApi->videoCollectionUpdateAll: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **where** | **string**| Criteria to match model instances | [optional]
 **data** | [**\DBCDK\CommunityServices\Model\VideoCollection**](../Model/\DBCDK\CommunityServices\Model\VideoCollection.md)| An object of model property name/value pairs | [optional]

### Return type

**object**

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **videoCollectionUpsert**
> \DBCDK\CommunityServices\Model\VideoCollection videoCollectionUpsert($data)

Update an existing model instance or insert a new one into the data source.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\VideoCollectionApi();
$data = new \DBCDK\CommunityServices\Model\VideoCollection(); // \DBCDK\CommunityServices\Model\VideoCollection | Model instance data

try {
    $result = $api_instance->videoCollectionUpsert($data);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling VideoCollectionApi->videoCollectionUpsert: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **data** | [**\DBCDK\CommunityServices\Model\VideoCollection**](../Model/\DBCDK\CommunityServices\Model\VideoCollection.md)| Model instance data | [optional]

### Return type

[**\DBCDK\CommunityServices\Model\VideoCollection**](../Model/VideoCollection.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

