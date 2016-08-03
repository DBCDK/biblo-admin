# DBCDK\CommunityServices\ResolutionApi

All URIs are relative to *https://localhost/api*

Method | HTTP request | Description
------------- | ------------- | -------------
[**resolutionCount**](ResolutionApi.md#resolutionCount) | **GET** /resolutions/count | Count instances of the model matched by where from the data source.
[**resolutionCreate**](ResolutionApi.md#resolutionCreate) | **POST** /resolutions | Create a new instance of the model and persist it into the data source.
[**resolutionCreateChangeStreamGetResolutionsChangeStream**](ResolutionApi.md#resolutionCreateChangeStreamGetResolutionsChangeStream) | **GET** /resolutions/change-stream | Create a change stream.
[**resolutionCreateChangeStreamPostResolutionsChangeStream**](ResolutionApi.md#resolutionCreateChangeStreamPostResolutionsChangeStream) | **POST** /resolutions/change-stream | Create a change stream.
[**resolutionDeleteById**](ResolutionApi.md#resolutionDeleteById) | **DELETE** /resolutions/{id} | Delete a model instance by id from the data source.
[**resolutionExistsGetResolutionsidExists**](ResolutionApi.md#resolutionExistsGetResolutionsidExists) | **GET** /resolutions/{id}/exists | Check whether a model instance exists in the data source.
[**resolutionExistsHeadResolutionsid**](ResolutionApi.md#resolutionExistsHeadResolutionsid) | **HEAD** /resolutions/{id} | Check whether a model instance exists in the data source.
[**resolutionFind**](ResolutionApi.md#resolutionFind) | **GET** /resolutions | Find all instances of the model matched by filter from the data source.
[**resolutionFindById**](ResolutionApi.md#resolutionFindById) | **GET** /resolutions/{id} | Find a model instance by id from the data source.
[**resolutionFindOne**](ResolutionApi.md#resolutionFindOne) | **GET** /resolutions/findOne | Find first instance of the model matched by filter from the data source.
[**resolutionPrototypeCreateImage**](ResolutionApi.md#resolutionPrototypeCreateImage) | **POST** /resolutions/{id}/image | Creates a new instance in image of this model.
[**resolutionPrototypeCreateVideo**](ResolutionApi.md#resolutionPrototypeCreateVideo) | **POST** /resolutions/{id}/video | Creates a new instance in video of this model.
[**resolutionPrototypeDestroyImage**](ResolutionApi.md#resolutionPrototypeDestroyImage) | **DELETE** /resolutions/{id}/image | Deletes image of this model.
[**resolutionPrototypeDestroyVideo**](ResolutionApi.md#resolutionPrototypeDestroyVideo) | **DELETE** /resolutions/{id}/video | Deletes video of this model.
[**resolutionPrototypeGetImage**](ResolutionApi.md#resolutionPrototypeGetImage) | **GET** /resolutions/{id}/image | Fetches hasOne relation image.
[**resolutionPrototypeGetVideo**](ResolutionApi.md#resolutionPrototypeGetVideo) | **GET** /resolutions/{id}/video | Fetches hasOne relation video.
[**resolutionPrototypeUpdateAttributes**](ResolutionApi.md#resolutionPrototypeUpdateAttributes) | **PUT** /resolutions/{id} | Update attributes for a model instance and persist it into the data source.
[**resolutionPrototypeUpdateImage**](ResolutionApi.md#resolutionPrototypeUpdateImage) | **PUT** /resolutions/{id}/image | Update image of this model.
[**resolutionPrototypeUpdateVideo**](ResolutionApi.md#resolutionPrototypeUpdateVideo) | **PUT** /resolutions/{id}/video | Update video of this model.
[**resolutionUpdateAll**](ResolutionApi.md#resolutionUpdateAll) | **POST** /resolutions/update | Update instances of the model matched by where from the data source.
[**resolutionUpsert**](ResolutionApi.md#resolutionUpsert) | **PUT** /resolutions | Update an existing model instance or insert a new one into the data source.


# **resolutionCount**
> \DBCDK\CommunityServices\Model\InlineResponse200 resolutionCount($where)

Count instances of the model matched by where from the data source.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\ResolutionApi();
$where = "where_example"; // string | Criteria to match model instances

try {
    $result = $api_instance->resolutionCount($where);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ResolutionApi->resolutionCount: ', $e->getMessage(), PHP_EOL;
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

# **resolutionCreate**
> \DBCDK\CommunityServices\Model\Resolution resolutionCreate($data)

Create a new instance of the model and persist it into the data source.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\ResolutionApi();
$data = new \DBCDK\CommunityServices\Model\Resolution(); // \DBCDK\CommunityServices\Model\Resolution | Model instance data

try {
    $result = $api_instance->resolutionCreate($data);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ResolutionApi->resolutionCreate: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **data** | [**\DBCDK\CommunityServices\Model\Resolution**](../Model/\DBCDK\CommunityServices\Model\Resolution.md)| Model instance data | [optional]

### Return type

[**\DBCDK\CommunityServices\Model\Resolution**](../Model/Resolution.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **resolutionCreateChangeStreamGetResolutionsChangeStream**
> \SplFileObject resolutionCreateChangeStreamGetResolutionsChangeStream($options)

Create a change stream.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\ResolutionApi();
$options = "options_example"; // string | 

try {
    $result = $api_instance->resolutionCreateChangeStreamGetResolutionsChangeStream($options);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ResolutionApi->resolutionCreateChangeStreamGetResolutionsChangeStream: ', $e->getMessage(), PHP_EOL;
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

# **resolutionCreateChangeStreamPostResolutionsChangeStream**
> \SplFileObject resolutionCreateChangeStreamPostResolutionsChangeStream($options)

Create a change stream.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\ResolutionApi();
$options = "options_example"; // string | 

try {
    $result = $api_instance->resolutionCreateChangeStreamPostResolutionsChangeStream($options);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ResolutionApi->resolutionCreateChangeStreamPostResolutionsChangeStream: ', $e->getMessage(), PHP_EOL;
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

# **resolutionDeleteById**
> object resolutionDeleteById($id)

Delete a model instance by id from the data source.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\ResolutionApi();
$id = "id_example"; // string | Model id

try {
    $result = $api_instance->resolutionDeleteById($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ResolutionApi->resolutionDeleteById: ', $e->getMessage(), PHP_EOL;
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

# **resolutionExistsGetResolutionsidExists**
> \DBCDK\CommunityServices\Model\InlineResponse2001 resolutionExistsGetResolutionsidExists($id)

Check whether a model instance exists in the data source.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\ResolutionApi();
$id = "id_example"; // string | Model id

try {
    $result = $api_instance->resolutionExistsGetResolutionsidExists($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ResolutionApi->resolutionExistsGetResolutionsidExists: ', $e->getMessage(), PHP_EOL;
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

# **resolutionExistsHeadResolutionsid**
> \DBCDK\CommunityServices\Model\InlineResponse2001 resolutionExistsHeadResolutionsid($id)

Check whether a model instance exists in the data source.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\ResolutionApi();
$id = "id_example"; // string | Model id

try {
    $result = $api_instance->resolutionExistsHeadResolutionsid($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ResolutionApi->resolutionExistsHeadResolutionsid: ', $e->getMessage(), PHP_EOL;
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

# **resolutionFind**
> \DBCDK\CommunityServices\Model\Resolution[] resolutionFind($filter)

Find all instances of the model matched by filter from the data source.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\ResolutionApi();
$filter = "filter_example"; // string | Filter defining fields, where, include, order, offset, and limit

try {
    $result = $api_instance->resolutionFind($filter);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ResolutionApi->resolutionFind: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **filter** | **string**| Filter defining fields, where, include, order, offset, and limit | [optional]

### Return type

[**\DBCDK\CommunityServices\Model\Resolution[]**](../Model/Resolution.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **resolutionFindById**
> \DBCDK\CommunityServices\Model\Resolution resolutionFindById($id, $filter)

Find a model instance by id from the data source.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\ResolutionApi();
$id = "id_example"; // string | Model id
$filter = "filter_example"; // string | Filter defining fields and include

try {
    $result = $api_instance->resolutionFindById($id, $filter);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ResolutionApi->resolutionFindById: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| Model id |
 **filter** | **string**| Filter defining fields and include | [optional]

### Return type

[**\DBCDK\CommunityServices\Model\Resolution**](../Model/Resolution.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **resolutionFindOne**
> \DBCDK\CommunityServices\Model\Resolution resolutionFindOne($filter)

Find first instance of the model matched by filter from the data source.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\ResolutionApi();
$filter = "filter_example"; // string | Filter defining fields, where, include, order, offset, and limit

try {
    $result = $api_instance->resolutionFindOne($filter);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ResolutionApi->resolutionFindOne: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **filter** | **string**| Filter defining fields, where, include, order, offset, and limit | [optional]

### Return type

[**\DBCDK\CommunityServices\Model\Resolution**](../Model/Resolution.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **resolutionPrototypeCreateImage**
> \DBCDK\CommunityServices\Model\\SplFileObject resolutionPrototypeCreateImage($id, $data)

Creates a new instance in image of this model.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\ResolutionApi();
$id = "id_example"; // string | PersistedModel id
$data = "/path/to/file"; // \SplFileObject | 

try {
    $result = $api_instance->resolutionPrototypeCreateImage($id, $data);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ResolutionApi->resolutionPrototypeCreateImage: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| PersistedModel id |
 **data** | [**\SplFileObject**](../Model/\SplFileObject.md)|  | [optional]

### Return type

[**\DBCDK\CommunityServices\Model\\SplFileObject**](../Model/\SplFileObject.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **resolutionPrototypeCreateVideo**
> \DBCDK\CommunityServices\Model\\SplFileObject resolutionPrototypeCreateVideo($id, $data)

Creates a new instance in video of this model.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\ResolutionApi();
$id = "id_example"; // string | PersistedModel id
$data = "/path/to/file"; // \SplFileObject | 

try {
    $result = $api_instance->resolutionPrototypeCreateVideo($id, $data);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ResolutionApi->resolutionPrototypeCreateVideo: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| PersistedModel id |
 **data** | [**\SplFileObject**](../Model/\SplFileObject.md)|  | [optional]

### Return type

[**\DBCDK\CommunityServices\Model\\SplFileObject**](../Model/\SplFileObject.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **resolutionPrototypeDestroyImage**
> resolutionPrototypeDestroyImage($id)

Deletes image of this model.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\ResolutionApi();
$id = "id_example"; // string | PersistedModel id

try {
    $api_instance->resolutionPrototypeDestroyImage($id);
} catch (Exception $e) {
    echo 'Exception when calling ResolutionApi->resolutionPrototypeDestroyImage: ', $e->getMessage(), PHP_EOL;
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

# **resolutionPrototypeDestroyVideo**
> resolutionPrototypeDestroyVideo($id)

Deletes video of this model.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\ResolutionApi();
$id = "id_example"; // string | PersistedModel id

try {
    $api_instance->resolutionPrototypeDestroyVideo($id);
} catch (Exception $e) {
    echo 'Exception when calling ResolutionApi->resolutionPrototypeDestroyVideo: ', $e->getMessage(), PHP_EOL;
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

# **resolutionPrototypeGetImage**
> \DBCDK\CommunityServices\Model\\SplFileObject resolutionPrototypeGetImage($id, $refresh)

Fetches hasOne relation image.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\ResolutionApi();
$id = "id_example"; // string | PersistedModel id
$refresh = true; // bool | 

try {
    $result = $api_instance->resolutionPrototypeGetImage($id, $refresh);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ResolutionApi->resolutionPrototypeGetImage: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| PersistedModel id |
 **refresh** | **bool**|  | [optional]

### Return type

[**\DBCDK\CommunityServices\Model\\SplFileObject**](../Model/\SplFileObject.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **resolutionPrototypeGetVideo**
> \DBCDK\CommunityServices\Model\\SplFileObject resolutionPrototypeGetVideo($id, $refresh)

Fetches hasOne relation video.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\ResolutionApi();
$id = "id_example"; // string | PersistedModel id
$refresh = true; // bool | 

try {
    $result = $api_instance->resolutionPrototypeGetVideo($id, $refresh);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ResolutionApi->resolutionPrototypeGetVideo: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| PersistedModel id |
 **refresh** | **bool**|  | [optional]

### Return type

[**\DBCDK\CommunityServices\Model\\SplFileObject**](../Model/\SplFileObject.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **resolutionPrototypeUpdateAttributes**
> \DBCDK\CommunityServices\Model\Resolution resolutionPrototypeUpdateAttributes($id, $data)

Update attributes for a model instance and persist it into the data source.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\ResolutionApi();
$id = "id_example"; // string | PersistedModel id
$data = new \DBCDK\CommunityServices\Model\Resolution(); // \DBCDK\CommunityServices\Model\Resolution | An object of model property name/value pairs

try {
    $result = $api_instance->resolutionPrototypeUpdateAttributes($id, $data);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ResolutionApi->resolutionPrototypeUpdateAttributes: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| PersistedModel id |
 **data** | [**\DBCDK\CommunityServices\Model\Resolution**](../Model/\DBCDK\CommunityServices\Model\Resolution.md)| An object of model property name/value pairs | [optional]

### Return type

[**\DBCDK\CommunityServices\Model\Resolution**](../Model/Resolution.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **resolutionPrototypeUpdateImage**
> \DBCDK\CommunityServices\Model\\SplFileObject resolutionPrototypeUpdateImage($id, $data)

Update image of this model.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\ResolutionApi();
$id = "id_example"; // string | PersistedModel id
$data = "/path/to/file"; // \SplFileObject | 

try {
    $result = $api_instance->resolutionPrototypeUpdateImage($id, $data);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ResolutionApi->resolutionPrototypeUpdateImage: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| PersistedModel id |
 **data** | [**\SplFileObject**](../Model/\SplFileObject.md)|  | [optional]

### Return type

[**\DBCDK\CommunityServices\Model\\SplFileObject**](../Model/\SplFileObject.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **resolutionPrototypeUpdateVideo**
> \DBCDK\CommunityServices\Model\\SplFileObject resolutionPrototypeUpdateVideo($id, $data)

Update video of this model.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\ResolutionApi();
$id = "id_example"; // string | PersistedModel id
$data = "/path/to/file"; // \SplFileObject | 

try {
    $result = $api_instance->resolutionPrototypeUpdateVideo($id, $data);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ResolutionApi->resolutionPrototypeUpdateVideo: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| PersistedModel id |
 **data** | [**\SplFileObject**](../Model/\SplFileObject.md)|  | [optional]

### Return type

[**\DBCDK\CommunityServices\Model\\SplFileObject**](../Model/\SplFileObject.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **resolutionUpdateAll**
> object resolutionUpdateAll($where, $data)

Update instances of the model matched by where from the data source.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\ResolutionApi();
$where = "where_example"; // string | Criteria to match model instances
$data = new \DBCDK\CommunityServices\Model\Resolution(); // \DBCDK\CommunityServices\Model\Resolution | An object of model property name/value pairs

try {
    $result = $api_instance->resolutionUpdateAll($where, $data);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ResolutionApi->resolutionUpdateAll: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **where** | **string**| Criteria to match model instances | [optional]
 **data** | [**\DBCDK\CommunityServices\Model\Resolution**](../Model/\DBCDK\CommunityServices\Model\Resolution.md)| An object of model property name/value pairs | [optional]

### Return type

**object**

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **resolutionUpsert**
> \DBCDK\CommunityServices\Model\Resolution resolutionUpsert($data)

Update an existing model instance or insert a new one into the data source.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\ResolutionApi();
$data = new \DBCDK\CommunityServices\Model\Resolution(); // \DBCDK\CommunityServices\Model\Resolution | Model instance data

try {
    $result = $api_instance->resolutionUpsert($data);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ResolutionApi->resolutionUpsert: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **data** | [**\DBCDK\CommunityServices\Model\Resolution**](../Model/\DBCDK\CommunityServices\Model\Resolution.md)| Model instance data | [optional]

### Return type

[**\DBCDK\CommunityServices\Model\Resolution**](../Model/Resolution.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

