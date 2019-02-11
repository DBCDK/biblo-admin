# DBCDK\CommunityServices\AdminMessageApi

All URIs are relative to *https://localhost/api*

Method | HTTP request | Description
------------- | ------------- | -------------
[**adminMessageCount**](AdminMessageApi.md#adminMessageCount) | **GET** /AdminMessages/count | Count instances of the model matched by where from the data source.
[**adminMessageCreate**](AdminMessageApi.md#adminMessageCreate) | **POST** /AdminMessages | Create a new instance of the model and persist it into the data source.
[**adminMessageCreateChangeStreamGetAdminMessagesChangeStream**](AdminMessageApi.md#adminMessageCreateChangeStreamGetAdminMessagesChangeStream) | **GET** /AdminMessages/change-stream | Create a change stream.
[**adminMessageCreateChangeStreamPostAdminMessagesChangeStream**](AdminMessageApi.md#adminMessageCreateChangeStreamPostAdminMessagesChangeStream) | **POST** /AdminMessages/change-stream | Create a change stream.
[**adminMessageDeleteById**](AdminMessageApi.md#adminMessageDeleteById) | **DELETE** /AdminMessages/{id} | Delete a model instance by {{id}} from the data source.
[**adminMessageExistsGetAdminMessagesidExists**](AdminMessageApi.md#adminMessageExistsGetAdminMessagesidExists) | **GET** /AdminMessages/{id}/exists | Check whether a model instance exists in the data source.
[**adminMessageExistsHeadAdminMessagesid**](AdminMessageApi.md#adminMessageExistsHeadAdminMessagesid) | **HEAD** /AdminMessages/{id} | Check whether a model instance exists in the data source.
[**adminMessageFind**](AdminMessageApi.md#adminMessageFind) | **GET** /AdminMessages | Find all instances of the model matched by filter from the data source.
[**adminMessageFindById**](AdminMessageApi.md#adminMessageFindById) | **GET** /AdminMessages/{id} | Find a model instance by {{id}} from the data source.
[**adminMessageFindOne**](AdminMessageApi.md#adminMessageFindOne) | **GET** /AdminMessages/findOne | Find first instance of the model matched by filter from the data source.
[**adminMessagePrototypeGetReceiver**](AdminMessageApi.md#adminMessagePrototypeGetReceiver) | **GET** /AdminMessages/{id}/receiver | Fetches belongsTo relation receiver.
[**adminMessagePrototypeGetSender**](AdminMessageApi.md#adminMessagePrototypeGetSender) | **GET** /AdminMessages/{id}/sender | Fetches belongsTo relation sender.
[**adminMessagePrototypeUpdateAttributesPatchAdminMessagesid**](AdminMessageApi.md#adminMessagePrototypeUpdateAttributesPatchAdminMessagesid) | **PATCH** /AdminMessages/{id} | Patch attributes for a model instance and persist it into the data source.
[**adminMessagePrototypeUpdateAttributesPutAdminMessagesid**](AdminMessageApi.md#adminMessagePrototypeUpdateAttributesPutAdminMessagesid) | **PUT** /AdminMessages/{id} | Patch attributes for a model instance and persist it into the data source.
[**adminMessageReplaceById**](AdminMessageApi.md#adminMessageReplaceById) | **POST** /AdminMessages/{id}/replace | Replace attributes for a model instance and persist it into the data source.
[**adminMessageReplaceOrCreate**](AdminMessageApi.md#adminMessageReplaceOrCreate) | **POST** /AdminMessages/replaceOrCreate | Replace an existing model instance or insert a new one into the data source.
[**adminMessageUpdateAll**](AdminMessageApi.md#adminMessageUpdateAll) | **POST** /AdminMessages/update | Update instances of the model matched by {{where}} from the data source.
[**adminMessageUpsertPatchAdminMessages**](AdminMessageApi.md#adminMessageUpsertPatchAdminMessages) | **PATCH** /AdminMessages | Patch an existing model instance or insert a new one into the data source.
[**adminMessageUpsertPutAdminMessages**](AdminMessageApi.md#adminMessageUpsertPutAdminMessages) | **PUT** /AdminMessages | Patch an existing model instance or insert a new one into the data source.
[**adminMessageUpsertWithWhere**](AdminMessageApi.md#adminMessageUpsertWithWhere) | **POST** /AdminMessages/upsertWithWhere | Update an existing model instance or insert a new one into the data source based on the where criteria.


# **adminMessageCount**
> \DBCDK\CommunityServices\Model\InlineResponse200 adminMessageCount($where)

Count instances of the model matched by where from the data source.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\AdminMessageApi();
$where = "where_example"; // string | Criteria to match model instances

try {
    $result = $api_instance->adminMessageCount($where);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AdminMessageApi->adminMessageCount: ', $e->getMessage(), PHP_EOL;
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

# **adminMessageCreate**
> \DBCDK\CommunityServices\Model\AdminMessage adminMessageCreate($data)

Create a new instance of the model and persist it into the data source.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\AdminMessageApi();
$data = new \DBCDK\CommunityServices\Model\AdminMessage(); // \DBCDK\CommunityServices\Model\AdminMessage | Model instance data

try {
    $result = $api_instance->adminMessageCreate($data);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AdminMessageApi->adminMessageCreate: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **data** | [**\DBCDK\CommunityServices\Model\AdminMessage**](../Model/\DBCDK\CommunityServices\Model\AdminMessage.md)| Model instance data | [optional]

### Return type

[**\DBCDK\CommunityServices\Model\AdminMessage**](../Model/AdminMessage.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **adminMessageCreateChangeStreamGetAdminMessagesChangeStream**
> \SplFileObject adminMessageCreateChangeStreamGetAdminMessagesChangeStream($options)

Create a change stream.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\AdminMessageApi();
$options = "options_example"; // string | 

try {
    $result = $api_instance->adminMessageCreateChangeStreamGetAdminMessagesChangeStream($options);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AdminMessageApi->adminMessageCreateChangeStreamGetAdminMessagesChangeStream: ', $e->getMessage(), PHP_EOL;
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

# **adminMessageCreateChangeStreamPostAdminMessagesChangeStream**
> \SplFileObject adminMessageCreateChangeStreamPostAdminMessagesChangeStream($options)

Create a change stream.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\AdminMessageApi();
$options = "options_example"; // string | 

try {
    $result = $api_instance->adminMessageCreateChangeStreamPostAdminMessagesChangeStream($options);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AdminMessageApi->adminMessageCreateChangeStreamPostAdminMessagesChangeStream: ', $e->getMessage(), PHP_EOL;
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

# **adminMessageDeleteById**
> object adminMessageDeleteById($id)

Delete a model instance by {{id}} from the data source.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\AdminMessageApi();
$id = "id_example"; // string | Model id

try {
    $result = $api_instance->adminMessageDeleteById($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AdminMessageApi->adminMessageDeleteById: ', $e->getMessage(), PHP_EOL;
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

# **adminMessageExistsGetAdminMessagesidExists**
> \DBCDK\CommunityServices\Model\InlineResponse2002 adminMessageExistsGetAdminMessagesidExists($id)

Check whether a model instance exists in the data source.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\AdminMessageApi();
$id = "id_example"; // string | Model id

try {
    $result = $api_instance->adminMessageExistsGetAdminMessagesidExists($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AdminMessageApi->adminMessageExistsGetAdminMessagesidExists: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| Model id |

### Return type

[**\DBCDK\CommunityServices\Model\InlineResponse2002**](../Model/InlineResponse2002.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **adminMessageExistsHeadAdminMessagesid**
> \DBCDK\CommunityServices\Model\InlineResponse2002 adminMessageExistsHeadAdminMessagesid($id)

Check whether a model instance exists in the data source.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\AdminMessageApi();
$id = "id_example"; // string | Model id

try {
    $result = $api_instance->adminMessageExistsHeadAdminMessagesid($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AdminMessageApi->adminMessageExistsHeadAdminMessagesid: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| Model id |

### Return type

[**\DBCDK\CommunityServices\Model\InlineResponse2002**](../Model/InlineResponse2002.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **adminMessageFind**
> \DBCDK\CommunityServices\Model\AdminMessage[] adminMessageFind($filter)

Find all instances of the model matched by filter from the data source.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\AdminMessageApi();
$filter = "filter_example"; // string | Filter defining fields, where, include, order, offset, and limit - must be a JSON-encoded string ({\"something\":\"value\"})

try {
    $result = $api_instance->adminMessageFind($filter);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AdminMessageApi->adminMessageFind: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **filter** | **string**| Filter defining fields, where, include, order, offset, and limit - must be a JSON-encoded string ({\&quot;something\&quot;:\&quot;value\&quot;}) | [optional]

### Return type

[**\DBCDK\CommunityServices\Model\AdminMessage[]**](../Model/AdminMessage.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **adminMessageFindById**
> \DBCDK\CommunityServices\Model\AdminMessage adminMessageFindById($id, $filter)

Find a model instance by {{id}} from the data source.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\AdminMessageApi();
$id = "id_example"; // string | Model id
$filter = "filter_example"; // string | Filter defining fields and include - must be a JSON-encoded string ({\"something\":\"value\"})

try {
    $result = $api_instance->adminMessageFindById($id, $filter);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AdminMessageApi->adminMessageFindById: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| Model id |
 **filter** | **string**| Filter defining fields and include - must be a JSON-encoded string ({\&quot;something\&quot;:\&quot;value\&quot;}) | [optional]

### Return type

[**\DBCDK\CommunityServices\Model\AdminMessage**](../Model/AdminMessage.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **adminMessageFindOne**
> \DBCDK\CommunityServices\Model\AdminMessage adminMessageFindOne($filter)

Find first instance of the model matched by filter from the data source.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\AdminMessageApi();
$filter = "filter_example"; // string | Filter defining fields, where, include, order, offset, and limit - must be a JSON-encoded string ({\"something\":\"value\"})

try {
    $result = $api_instance->adminMessageFindOne($filter);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AdminMessageApi->adminMessageFindOne: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **filter** | **string**| Filter defining fields, where, include, order, offset, and limit - must be a JSON-encoded string ({\&quot;something\&quot;:\&quot;value\&quot;}) | [optional]

### Return type

[**\DBCDK\CommunityServices\Model\AdminMessage**](../Model/AdminMessage.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **adminMessagePrototypeGetReceiver**
> \DBCDK\CommunityServices\Model\Profile adminMessagePrototypeGetReceiver($id, $refresh)

Fetches belongsTo relation receiver.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\AdminMessageApi();
$id = "id_example"; // string | AdminMessage id
$refresh = true; // bool | 

try {
    $result = $api_instance->adminMessagePrototypeGetReceiver($id, $refresh);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AdminMessageApi->adminMessagePrototypeGetReceiver: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| AdminMessage id |
 **refresh** | **bool**|  | [optional]

### Return type

[**\DBCDK\CommunityServices\Model\Profile**](../Model/Profile.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **adminMessagePrototypeGetSender**
> \DBCDK\CommunityServices\Model\Profile adminMessagePrototypeGetSender($id, $refresh)

Fetches belongsTo relation sender.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\AdminMessageApi();
$id = "id_example"; // string | AdminMessage id
$refresh = true; // bool | 

try {
    $result = $api_instance->adminMessagePrototypeGetSender($id, $refresh);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AdminMessageApi->adminMessagePrototypeGetSender: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| AdminMessage id |
 **refresh** | **bool**|  | [optional]

### Return type

[**\DBCDK\CommunityServices\Model\Profile**](../Model/Profile.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **adminMessagePrototypeUpdateAttributesPatchAdminMessagesid**
> \DBCDK\CommunityServices\Model\AdminMessage adminMessagePrototypeUpdateAttributesPatchAdminMessagesid($id, $data)

Patch attributes for a model instance and persist it into the data source.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\AdminMessageApi();
$id = "id_example"; // string | AdminMessage id
$data = new \DBCDK\CommunityServices\Model\AdminMessage(); // \DBCDK\CommunityServices\Model\AdminMessage | An object of model property name/value pairs

try {
    $result = $api_instance->adminMessagePrototypeUpdateAttributesPatchAdminMessagesid($id, $data);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AdminMessageApi->adminMessagePrototypeUpdateAttributesPatchAdminMessagesid: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| AdminMessage id |
 **data** | [**\DBCDK\CommunityServices\Model\AdminMessage**](../Model/\DBCDK\CommunityServices\Model\AdminMessage.md)| An object of model property name/value pairs | [optional]

### Return type

[**\DBCDK\CommunityServices\Model\AdminMessage**](../Model/AdminMessage.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **adminMessagePrototypeUpdateAttributesPutAdminMessagesid**
> \DBCDK\CommunityServices\Model\AdminMessage adminMessagePrototypeUpdateAttributesPutAdminMessagesid($id, $data)

Patch attributes for a model instance and persist it into the data source.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\AdminMessageApi();
$id = "id_example"; // string | AdminMessage id
$data = new \DBCDK\CommunityServices\Model\AdminMessage(); // \DBCDK\CommunityServices\Model\AdminMessage | An object of model property name/value pairs

try {
    $result = $api_instance->adminMessagePrototypeUpdateAttributesPutAdminMessagesid($id, $data);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AdminMessageApi->adminMessagePrototypeUpdateAttributesPutAdminMessagesid: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| AdminMessage id |
 **data** | [**\DBCDK\CommunityServices\Model\AdminMessage**](../Model/\DBCDK\CommunityServices\Model\AdminMessage.md)| An object of model property name/value pairs | [optional]

### Return type

[**\DBCDK\CommunityServices\Model\AdminMessage**](../Model/AdminMessage.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **adminMessageReplaceById**
> \DBCDK\CommunityServices\Model\AdminMessage adminMessageReplaceById($id, $data)

Replace attributes for a model instance and persist it into the data source.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\AdminMessageApi();
$id = "id_example"; // string | Model id
$data = new \DBCDK\CommunityServices\Model\AdminMessage(); // \DBCDK\CommunityServices\Model\AdminMessage | Model instance data

try {
    $result = $api_instance->adminMessageReplaceById($id, $data);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AdminMessageApi->adminMessageReplaceById: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| Model id |
 **data** | [**\DBCDK\CommunityServices\Model\AdminMessage**](../Model/\DBCDK\CommunityServices\Model\AdminMessage.md)| Model instance data | [optional]

### Return type

[**\DBCDK\CommunityServices\Model\AdminMessage**](../Model/AdminMessage.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **adminMessageReplaceOrCreate**
> \DBCDK\CommunityServices\Model\AdminMessage adminMessageReplaceOrCreate($data)

Replace an existing model instance or insert a new one into the data source.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\AdminMessageApi();
$data = new \DBCDK\CommunityServices\Model\AdminMessage(); // \DBCDK\CommunityServices\Model\AdminMessage | Model instance data

try {
    $result = $api_instance->adminMessageReplaceOrCreate($data);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AdminMessageApi->adminMessageReplaceOrCreate: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **data** | [**\DBCDK\CommunityServices\Model\AdminMessage**](../Model/\DBCDK\CommunityServices\Model\AdminMessage.md)| Model instance data | [optional]

### Return type

[**\DBCDK\CommunityServices\Model\AdminMessage**](../Model/AdminMessage.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **adminMessageUpdateAll**
> \DBCDK\CommunityServices\Model\InlineResponse2001 adminMessageUpdateAll($where, $data)

Update instances of the model matched by {{where}} from the data source.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\AdminMessageApi();
$where = "where_example"; // string | Criteria to match model instances
$data = new \DBCDK\CommunityServices\Model\AdminMessage(); // \DBCDK\CommunityServices\Model\AdminMessage | An object of model property name/value pairs

try {
    $result = $api_instance->adminMessageUpdateAll($where, $data);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AdminMessageApi->adminMessageUpdateAll: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **where** | **string**| Criteria to match model instances | [optional]
 **data** | [**\DBCDK\CommunityServices\Model\AdminMessage**](../Model/\DBCDK\CommunityServices\Model\AdminMessage.md)| An object of model property name/value pairs | [optional]

### Return type

[**\DBCDK\CommunityServices\Model\InlineResponse2001**](../Model/InlineResponse2001.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **adminMessageUpsertPatchAdminMessages**
> \DBCDK\CommunityServices\Model\AdminMessage adminMessageUpsertPatchAdminMessages($data)

Patch an existing model instance or insert a new one into the data source.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\AdminMessageApi();
$data = new \DBCDK\CommunityServices\Model\AdminMessage(); // \DBCDK\CommunityServices\Model\AdminMessage | Model instance data

try {
    $result = $api_instance->adminMessageUpsertPatchAdminMessages($data);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AdminMessageApi->adminMessageUpsertPatchAdminMessages: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **data** | [**\DBCDK\CommunityServices\Model\AdminMessage**](../Model/\DBCDK\CommunityServices\Model\AdminMessage.md)| Model instance data | [optional]

### Return type

[**\DBCDK\CommunityServices\Model\AdminMessage**](../Model/AdminMessage.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **adminMessageUpsertPutAdminMessages**
> \DBCDK\CommunityServices\Model\AdminMessage adminMessageUpsertPutAdminMessages($data)

Patch an existing model instance or insert a new one into the data source.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\AdminMessageApi();
$data = new \DBCDK\CommunityServices\Model\AdminMessage(); // \DBCDK\CommunityServices\Model\AdminMessage | Model instance data

try {
    $result = $api_instance->adminMessageUpsertPutAdminMessages($data);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AdminMessageApi->adminMessageUpsertPutAdminMessages: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **data** | [**\DBCDK\CommunityServices\Model\AdminMessage**](../Model/\DBCDK\CommunityServices\Model\AdminMessage.md)| Model instance data | [optional]

### Return type

[**\DBCDK\CommunityServices\Model\AdminMessage**](../Model/AdminMessage.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **adminMessageUpsertWithWhere**
> \DBCDK\CommunityServices\Model\AdminMessage adminMessageUpsertWithWhere($where, $data)

Update an existing model instance or insert a new one into the data source based on the where criteria.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\AdminMessageApi();
$where = "where_example"; // string | Criteria to match model instances
$data = new \DBCDK\CommunityServices\Model\AdminMessage(); // \DBCDK\CommunityServices\Model\AdminMessage | An object of model property name/value pairs

try {
    $result = $api_instance->adminMessageUpsertWithWhere($where, $data);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AdminMessageApi->adminMessageUpsertWithWhere: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **where** | **string**| Criteria to match model instances | [optional]
 **data** | [**\DBCDK\CommunityServices\Model\AdminMessage**](../Model/\DBCDK\CommunityServices\Model\AdminMessage.md)| An object of model property name/value pairs | [optional]

### Return type

[**\DBCDK\CommunityServices\Model\AdminMessage**](../Model/AdminMessage.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

