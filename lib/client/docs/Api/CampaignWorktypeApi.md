# DBCDK\CommunityServices\CampaignWorktypeApi

All URIs are relative to *https://localhost/api*

Method | HTTP request | Description
------------- | ------------- | -------------
[**campaignWorktypeCount**](CampaignWorktypeApi.md#campaignWorktypeCount) | **GET** /CampaignWorktypes/count | Count instances of the model matched by where from the data source.
[**campaignWorktypeCreate**](CampaignWorktypeApi.md#campaignWorktypeCreate) | **POST** /CampaignWorktypes | Create a new instance of the model and persist it into the data source.
[**campaignWorktypeCreateChangeStreamGetCampaignWorktypesChangeStream**](CampaignWorktypeApi.md#campaignWorktypeCreateChangeStreamGetCampaignWorktypesChangeStream) | **GET** /CampaignWorktypes/change-stream | Create a change stream.
[**campaignWorktypeCreateChangeStreamPostCampaignWorktypesChangeStream**](CampaignWorktypeApi.md#campaignWorktypeCreateChangeStreamPostCampaignWorktypesChangeStream) | **POST** /CampaignWorktypes/change-stream | Create a change stream.
[**campaignWorktypeDeleteById**](CampaignWorktypeApi.md#campaignWorktypeDeleteById) | **DELETE** /CampaignWorktypes/{id} | Delete a model instance by id from the data source.
[**campaignWorktypeExistsGetCampaignWorktypesidExists**](CampaignWorktypeApi.md#campaignWorktypeExistsGetCampaignWorktypesidExists) | **GET** /CampaignWorktypes/{id}/exists | Check whether a model instance exists in the data source.
[**campaignWorktypeExistsHeadCampaignWorktypesid**](CampaignWorktypeApi.md#campaignWorktypeExistsHeadCampaignWorktypesid) | **HEAD** /CampaignWorktypes/{id} | Check whether a model instance exists in the data source.
[**campaignWorktypeFind**](CampaignWorktypeApi.md#campaignWorktypeFind) | **GET** /CampaignWorktypes | Find all instances of the model matched by filter from the data source.
[**campaignWorktypeFindById**](CampaignWorktypeApi.md#campaignWorktypeFindById) | **GET** /CampaignWorktypes/{id} | Find a model instance by id from the data source.
[**campaignWorktypeFindOne**](CampaignWorktypeApi.md#campaignWorktypeFindOne) | **GET** /CampaignWorktypes/findOne | Find first instance of the model matched by filter from the data source.
[**campaignWorktypePrototypeUpdateAttributes**](CampaignWorktypeApi.md#campaignWorktypePrototypeUpdateAttributes) | **PUT** /CampaignWorktypes/{id} | Update attributes for a model instance and persist it into the data source.
[**campaignWorktypeUpdateAll**](CampaignWorktypeApi.md#campaignWorktypeUpdateAll) | **POST** /CampaignWorktypes/update | Update instances of the model matched by where from the data source.
[**campaignWorktypeUpsert**](CampaignWorktypeApi.md#campaignWorktypeUpsert) | **PUT** /CampaignWorktypes | Update an existing model instance or insert a new one into the data source.


# **campaignWorktypeCount**
> \DBCDK\CommunityServices\Model\InlineResponse200 campaignWorktypeCount($where)

Count instances of the model matched by where from the data source.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\CampaignWorktypeApi();
$where = "where_example"; // string | Criteria to match model instances

try {
    $result = $api_instance->campaignWorktypeCount($where);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CampaignWorktypeApi->campaignWorktypeCount: ', $e->getMessage(), PHP_EOL;
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

# **campaignWorktypeCreate**
> \DBCDK\CommunityServices\Model\CampaignWorktype campaignWorktypeCreate($data)

Create a new instance of the model and persist it into the data source.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\CampaignWorktypeApi();
$data = new \DBCDK\CommunityServices\Model\CampaignWorktype(); // \DBCDK\CommunityServices\Model\CampaignWorktype | Model instance data

try {
    $result = $api_instance->campaignWorktypeCreate($data);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CampaignWorktypeApi->campaignWorktypeCreate: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **data** | [**\DBCDK\CommunityServices\Model\CampaignWorktype**](../Model/\DBCDK\CommunityServices\Model\CampaignWorktype.md)| Model instance data | [optional]

### Return type

[**\DBCDK\CommunityServices\Model\CampaignWorktype**](../Model/CampaignWorktype.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **campaignWorktypeCreateChangeStreamGetCampaignWorktypesChangeStream**
> \SplFileObject campaignWorktypeCreateChangeStreamGetCampaignWorktypesChangeStream($options)

Create a change stream.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\CampaignWorktypeApi();
$options = "options_example"; // string | 

try {
    $result = $api_instance->campaignWorktypeCreateChangeStreamGetCampaignWorktypesChangeStream($options);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CampaignWorktypeApi->campaignWorktypeCreateChangeStreamGetCampaignWorktypesChangeStream: ', $e->getMessage(), PHP_EOL;
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

# **campaignWorktypeCreateChangeStreamPostCampaignWorktypesChangeStream**
> \SplFileObject campaignWorktypeCreateChangeStreamPostCampaignWorktypesChangeStream($options)

Create a change stream.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\CampaignWorktypeApi();
$options = "options_example"; // string | 

try {
    $result = $api_instance->campaignWorktypeCreateChangeStreamPostCampaignWorktypesChangeStream($options);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CampaignWorktypeApi->campaignWorktypeCreateChangeStreamPostCampaignWorktypesChangeStream: ', $e->getMessage(), PHP_EOL;
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

# **campaignWorktypeDeleteById**
> object campaignWorktypeDeleteById($id)

Delete a model instance by id from the data source.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\CampaignWorktypeApi();
$id = "id_example"; // string | Model id

try {
    $result = $api_instance->campaignWorktypeDeleteById($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CampaignWorktypeApi->campaignWorktypeDeleteById: ', $e->getMessage(), PHP_EOL;
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

# **campaignWorktypeExistsGetCampaignWorktypesidExists**
> \DBCDK\CommunityServices\Model\InlineResponse2001 campaignWorktypeExistsGetCampaignWorktypesidExists($id)

Check whether a model instance exists in the data source.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\CampaignWorktypeApi();
$id = "id_example"; // string | Model id

try {
    $result = $api_instance->campaignWorktypeExistsGetCampaignWorktypesidExists($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CampaignWorktypeApi->campaignWorktypeExistsGetCampaignWorktypesidExists: ', $e->getMessage(), PHP_EOL;
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

# **campaignWorktypeExistsHeadCampaignWorktypesid**
> \DBCDK\CommunityServices\Model\InlineResponse2001 campaignWorktypeExistsHeadCampaignWorktypesid($id)

Check whether a model instance exists in the data source.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\CampaignWorktypeApi();
$id = "id_example"; // string | Model id

try {
    $result = $api_instance->campaignWorktypeExistsHeadCampaignWorktypesid($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CampaignWorktypeApi->campaignWorktypeExistsHeadCampaignWorktypesid: ', $e->getMessage(), PHP_EOL;
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

# **campaignWorktypeFind**
> \DBCDK\CommunityServices\Model\CampaignWorktype[] campaignWorktypeFind($filter)

Find all instances of the model matched by filter from the data source.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\CampaignWorktypeApi();
$filter = "filter_example"; // string | Filter defining fields, where, include, order, offset, and limit

try {
    $result = $api_instance->campaignWorktypeFind($filter);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CampaignWorktypeApi->campaignWorktypeFind: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **filter** | **string**| Filter defining fields, where, include, order, offset, and limit | [optional]

### Return type

[**\DBCDK\CommunityServices\Model\CampaignWorktype[]**](../Model/CampaignWorktype.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **campaignWorktypeFindById**
> \DBCDK\CommunityServices\Model\CampaignWorktype campaignWorktypeFindById($id, $filter)

Find a model instance by id from the data source.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\CampaignWorktypeApi();
$id = "id_example"; // string | Model id
$filter = "filter_example"; // string | Filter defining fields and include

try {
    $result = $api_instance->campaignWorktypeFindById($id, $filter);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CampaignWorktypeApi->campaignWorktypeFindById: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| Model id |
 **filter** | **string**| Filter defining fields and include | [optional]

### Return type

[**\DBCDK\CommunityServices\Model\CampaignWorktype**](../Model/CampaignWorktype.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **campaignWorktypeFindOne**
> \DBCDK\CommunityServices\Model\CampaignWorktype campaignWorktypeFindOne($filter)

Find first instance of the model matched by filter from the data source.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\CampaignWorktypeApi();
$filter = "filter_example"; // string | Filter defining fields, where, include, order, offset, and limit

try {
    $result = $api_instance->campaignWorktypeFindOne($filter);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CampaignWorktypeApi->campaignWorktypeFindOne: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **filter** | **string**| Filter defining fields, where, include, order, offset, and limit | [optional]

### Return type

[**\DBCDK\CommunityServices\Model\CampaignWorktype**](../Model/CampaignWorktype.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **campaignWorktypePrototypeUpdateAttributes**
> \DBCDK\CommunityServices\Model\CampaignWorktype campaignWorktypePrototypeUpdateAttributes($id, $data)

Update attributes for a model instance and persist it into the data source.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\CampaignWorktypeApi();
$id = "id_example"; // string | PersistedModel id
$data = new \DBCDK\CommunityServices\Model\CampaignWorktype(); // \DBCDK\CommunityServices\Model\CampaignWorktype | An object of model property name/value pairs

try {
    $result = $api_instance->campaignWorktypePrototypeUpdateAttributes($id, $data);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CampaignWorktypeApi->campaignWorktypePrototypeUpdateAttributes: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| PersistedModel id |
 **data** | [**\DBCDK\CommunityServices\Model\CampaignWorktype**](../Model/\DBCDK\CommunityServices\Model\CampaignWorktype.md)| An object of model property name/value pairs | [optional]

### Return type

[**\DBCDK\CommunityServices\Model\CampaignWorktype**](../Model/CampaignWorktype.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **campaignWorktypeUpdateAll**
> object campaignWorktypeUpdateAll($where, $data)

Update instances of the model matched by where from the data source.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\CampaignWorktypeApi();
$where = "where_example"; // string | Criteria to match model instances
$data = new \DBCDK\CommunityServices\Model\CampaignWorktype(); // \DBCDK\CommunityServices\Model\CampaignWorktype | An object of model property name/value pairs

try {
    $result = $api_instance->campaignWorktypeUpdateAll($where, $data);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CampaignWorktypeApi->campaignWorktypeUpdateAll: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **where** | **string**| Criteria to match model instances | [optional]
 **data** | [**\DBCDK\CommunityServices\Model\CampaignWorktype**](../Model/\DBCDK\CommunityServices\Model\CampaignWorktype.md)| An object of model property name/value pairs | [optional]

### Return type

**object**

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **campaignWorktypeUpsert**
> \DBCDK\CommunityServices\Model\CampaignWorktype campaignWorktypeUpsert($data)

Update an existing model instance or insert a new one into the data source.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\CampaignWorktypeApi();
$data = new \DBCDK\CommunityServices\Model\CampaignWorktype(); // \DBCDK\CommunityServices\Model\CampaignWorktype | Model instance data

try {
    $result = $api_instance->campaignWorktypeUpsert($data);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CampaignWorktypeApi->campaignWorktypeUpsert: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **data** | [**\DBCDK\CommunityServices\Model\CampaignWorktype**](../Model/\DBCDK\CommunityServices\Model\CampaignWorktype.md)| Model instance data | [optional]

### Return type

[**\DBCDK\CommunityServices\Model\CampaignWorktype**](../Model/CampaignWorktype.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

