# DBCDK\CommunityServices\QuarantineApi

All URIs are relative to *https://localhost/api*

Method | HTTP request | Description
------------- | ------------- | -------------
[**quarantineCheckIfProfileIsQuarantined**](QuarantineApi.md#quarantineCheckIfProfileIsQuarantined) | **GET** /Quarantines/{id}/check-if-profile-is-quarantined | Check if a profile is quarantined
[**quarantineCount**](QuarantineApi.md#quarantineCount) | **GET** /Quarantines/count | Count instances of the model matched by where from the data source.
[**quarantineCreate**](QuarantineApi.md#quarantineCreate) | **POST** /Quarantines | Create a new instance of the model and persist it into the data source.
[**quarantineCreateChangeStreamGetQuarantinesChangeStream**](QuarantineApi.md#quarantineCreateChangeStreamGetQuarantinesChangeStream) | **GET** /Quarantines/change-stream | Create a change stream.
[**quarantineCreateChangeStreamPostQuarantinesChangeStream**](QuarantineApi.md#quarantineCreateChangeStreamPostQuarantinesChangeStream) | **POST** /Quarantines/change-stream | Create a change stream.
[**quarantineDeleteById**](QuarantineApi.md#quarantineDeleteById) | **DELETE** /Quarantines/{id} | Delete a model instance by id from the data source.
[**quarantineExistsGetQuarantinesidExists**](QuarantineApi.md#quarantineExistsGetQuarantinesidExists) | **GET** /Quarantines/{id}/exists | Check whether a model instance exists in the data source.
[**quarantineExistsHeadQuarantinesid**](QuarantineApi.md#quarantineExistsHeadQuarantinesid) | **HEAD** /Quarantines/{id} | Check whether a model instance exists in the data source.
[**quarantineFind**](QuarantineApi.md#quarantineFind) | **GET** /Quarantines | Find all instances of the model matched by filter from the data source.
[**quarantineFindById**](QuarantineApi.md#quarantineFindById) | **GET** /Quarantines/{id} | Find a model instance by id from the data source.
[**quarantineFindOne**](QuarantineApi.md#quarantineFindOne) | **GET** /Quarantines/findOne | Find first instance of the model matched by filter from the data source.
[**quarantinePrototypeGetCreator**](QuarantineApi.md#quarantinePrototypeGetCreator) | **GET** /Quarantines/{id}/creator | Fetches belongsTo relation creator.
[**quarantinePrototypeGetQuarantined**](QuarantineApi.md#quarantinePrototypeGetQuarantined) | **GET** /Quarantines/{id}/quarantined | Fetches belongsTo relation quarantined.
[**quarantinePrototypeUpdateAttributes**](QuarantineApi.md#quarantinePrototypeUpdateAttributes) | **PUT** /Quarantines/{id} | Update attributes for a model instance and persist it into the data source.
[**quarantineUpdateAll**](QuarantineApi.md#quarantineUpdateAll) | **POST** /Quarantines/update | Update instances of the model matched by where from the data source.
[**quarantineUpsert**](QuarantineApi.md#quarantineUpsert) | **PUT** /Quarantines | Update an existing model instance or insert a new one into the data source.


# **quarantineCheckIfProfileIsQuarantined**
> object quarantineCheckIfProfileIsQuarantined($id)

Check if a profile is quarantined

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\QuarantineApi();
$id = 1.2; // double | 

try {
    $result = $api_instance->quarantineCheckIfProfileIsQuarantined($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling QuarantineApi->quarantineCheckIfProfileIsQuarantined: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **double**|  |

### Return type

**object**

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **quarantineCount**
> \DBCDK\CommunityServices\Model\InlineResponse200 quarantineCount($where)

Count instances of the model matched by where from the data source.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\QuarantineApi();
$where = "where_example"; // string | Criteria to match model instances

try {
    $result = $api_instance->quarantineCount($where);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling QuarantineApi->quarantineCount: ', $e->getMessage(), PHP_EOL;
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

# **quarantineCreate**
> \DBCDK\CommunityServices\Model\Quarantine quarantineCreate($data)

Create a new instance of the model and persist it into the data source.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\QuarantineApi();
$data = new \DBCDK\CommunityServices\Model\Quarantine(); // \DBCDK\CommunityServices\Model\Quarantine | Model instance data

try {
    $result = $api_instance->quarantineCreate($data);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling QuarantineApi->quarantineCreate: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **data** | [**\DBCDK\CommunityServices\Model\Quarantine**](../Model/\DBCDK\CommunityServices\Model\Quarantine.md)| Model instance data | [optional]

### Return type

[**\DBCDK\CommunityServices\Model\Quarantine**](../Model/Quarantine.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **quarantineCreateChangeStreamGetQuarantinesChangeStream**
> \SplFileObject quarantineCreateChangeStreamGetQuarantinesChangeStream($options)

Create a change stream.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\QuarantineApi();
$options = "options_example"; // string | 

try {
    $result = $api_instance->quarantineCreateChangeStreamGetQuarantinesChangeStream($options);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling QuarantineApi->quarantineCreateChangeStreamGetQuarantinesChangeStream: ', $e->getMessage(), PHP_EOL;
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

# **quarantineCreateChangeStreamPostQuarantinesChangeStream**
> \SplFileObject quarantineCreateChangeStreamPostQuarantinesChangeStream($options)

Create a change stream.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\QuarantineApi();
$options = "options_example"; // string | 

try {
    $result = $api_instance->quarantineCreateChangeStreamPostQuarantinesChangeStream($options);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling QuarantineApi->quarantineCreateChangeStreamPostQuarantinesChangeStream: ', $e->getMessage(), PHP_EOL;
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

# **quarantineDeleteById**
> object quarantineDeleteById($id)

Delete a model instance by id from the data source.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\QuarantineApi();
$id = "id_example"; // string | Model id

try {
    $result = $api_instance->quarantineDeleteById($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling QuarantineApi->quarantineDeleteById: ', $e->getMessage(), PHP_EOL;
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

# **quarantineExistsGetQuarantinesidExists**
> \DBCDK\CommunityServices\Model\InlineResponse2001 quarantineExistsGetQuarantinesidExists($id)

Check whether a model instance exists in the data source.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\QuarantineApi();
$id = "id_example"; // string | Model id

try {
    $result = $api_instance->quarantineExistsGetQuarantinesidExists($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling QuarantineApi->quarantineExistsGetQuarantinesidExists: ', $e->getMessage(), PHP_EOL;
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

# **quarantineExistsHeadQuarantinesid**
> \DBCDK\CommunityServices\Model\InlineResponse2001 quarantineExistsHeadQuarantinesid($id)

Check whether a model instance exists in the data source.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\QuarantineApi();
$id = "id_example"; // string | Model id

try {
    $result = $api_instance->quarantineExistsHeadQuarantinesid($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling QuarantineApi->quarantineExistsHeadQuarantinesid: ', $e->getMessage(), PHP_EOL;
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

# **quarantineFind**
> \DBCDK\CommunityServices\Model\Quarantine[] quarantineFind($filter)

Find all instances of the model matched by filter from the data source.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\QuarantineApi();
$filter = "filter_example"; // string | Filter defining fields, where, include, order, offset, and limit

try {
    $result = $api_instance->quarantineFind($filter);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling QuarantineApi->quarantineFind: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **filter** | **string**| Filter defining fields, where, include, order, offset, and limit | [optional]

### Return type

[**\DBCDK\CommunityServices\Model\Quarantine[]**](../Model/Quarantine.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **quarantineFindById**
> \DBCDK\CommunityServices\Model\Quarantine quarantineFindById($id, $filter)

Find a model instance by id from the data source.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\QuarantineApi();
$id = "id_example"; // string | Model id
$filter = "filter_example"; // string | Filter defining fields and include

try {
    $result = $api_instance->quarantineFindById($id, $filter);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling QuarantineApi->quarantineFindById: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| Model id |
 **filter** | **string**| Filter defining fields and include | [optional]

### Return type

[**\DBCDK\CommunityServices\Model\Quarantine**](../Model/Quarantine.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **quarantineFindOne**
> \DBCDK\CommunityServices\Model\Quarantine quarantineFindOne($filter)

Find first instance of the model matched by filter from the data source.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\QuarantineApi();
$filter = "filter_example"; // string | Filter defining fields, where, include, order, offset, and limit

try {
    $result = $api_instance->quarantineFindOne($filter);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling QuarantineApi->quarantineFindOne: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **filter** | **string**| Filter defining fields, where, include, order, offset, and limit | [optional]

### Return type

[**\DBCDK\CommunityServices\Model\Quarantine**](../Model/Quarantine.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **quarantinePrototypeGetCreator**
> \DBCDK\CommunityServices\Model\Profile quarantinePrototypeGetCreator($id, $refresh)

Fetches belongsTo relation creator.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\QuarantineApi();
$id = "id_example"; // string | PersistedModel id
$refresh = true; // bool | 

try {
    $result = $api_instance->quarantinePrototypeGetCreator($id, $refresh);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling QuarantineApi->quarantinePrototypeGetCreator: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| PersistedModel id |
 **refresh** | **bool**|  | [optional]

### Return type

[**\DBCDK\CommunityServices\Model\Profile**](../Model/Profile.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **quarantinePrototypeGetQuarantined**
> \DBCDK\CommunityServices\Model\Profile quarantinePrototypeGetQuarantined($id, $refresh)

Fetches belongsTo relation quarantined.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\QuarantineApi();
$id = "id_example"; // string | PersistedModel id
$refresh = true; // bool | 

try {
    $result = $api_instance->quarantinePrototypeGetQuarantined($id, $refresh);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling QuarantineApi->quarantinePrototypeGetQuarantined: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| PersistedModel id |
 **refresh** | **bool**|  | [optional]

### Return type

[**\DBCDK\CommunityServices\Model\Profile**](../Model/Profile.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **quarantinePrototypeUpdateAttributes**
> \DBCDK\CommunityServices\Model\Quarantine quarantinePrototypeUpdateAttributes($id, $data)

Update attributes for a model instance and persist it into the data source.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\QuarantineApi();
$id = "id_example"; // string | PersistedModel id
$data = new \DBCDK\CommunityServices\Model\Quarantine(); // \DBCDK\CommunityServices\Model\Quarantine | An object of model property name/value pairs

try {
    $result = $api_instance->quarantinePrototypeUpdateAttributes($id, $data);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling QuarantineApi->quarantinePrototypeUpdateAttributes: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| PersistedModel id |
 **data** | [**\DBCDK\CommunityServices\Model\Quarantine**](../Model/\DBCDK\CommunityServices\Model\Quarantine.md)| An object of model property name/value pairs | [optional]

### Return type

[**\DBCDK\CommunityServices\Model\Quarantine**](../Model/Quarantine.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **quarantineUpdateAll**
> object quarantineUpdateAll($where, $data)

Update instances of the model matched by where from the data source.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\QuarantineApi();
$where = "where_example"; // string | Criteria to match model instances
$data = new \DBCDK\CommunityServices\Model\Quarantine(); // \DBCDK\CommunityServices\Model\Quarantine | An object of model property name/value pairs

try {
    $result = $api_instance->quarantineUpdateAll($where, $data);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling QuarantineApi->quarantineUpdateAll: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **where** | **string**| Criteria to match model instances | [optional]
 **data** | [**\DBCDK\CommunityServices\Model\Quarantine**](../Model/\DBCDK\CommunityServices\Model\Quarantine.md)| An object of model property name/value pairs | [optional]

### Return type

**object**

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **quarantineUpsert**
> \DBCDK\CommunityServices\Model\Quarantine quarantineUpsert($data)

Update an existing model instance or insert a new one into the data source.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\QuarantineApi();
$data = new \DBCDK\CommunityServices\Model\Quarantine(); // \DBCDK\CommunityServices\Model\Quarantine | Model instance data

try {
    $result = $api_instance->quarantineUpsert($data);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling QuarantineApi->quarantineUpsert: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **data** | [**\DBCDK\CommunityServices\Model\Quarantine**](../Model/\DBCDK\CommunityServices\Model\Quarantine.md)| Model instance data | [optional]

### Return type

[**\DBCDK\CommunityServices\Model\Quarantine**](../Model/Quarantine.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

