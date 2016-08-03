# DBCDK\CommunityServices\CommunityRoleApi

All URIs are relative to *https://localhost/api*

Method | HTTP request | Description
------------- | ------------- | -------------
[**communityRoleCount**](CommunityRoleApi.md#communityRoleCount) | **GET** /CommunityRoles/count | Count instances of the model matched by where from the data source.
[**communityRoleCreate**](CommunityRoleApi.md#communityRoleCreate) | **POST** /CommunityRoles | Create a new instance of the model and persist it into the data source.
[**communityRoleCreateChangeStreamGetCommunityRolesChangeStream**](CommunityRoleApi.md#communityRoleCreateChangeStreamGetCommunityRolesChangeStream) | **GET** /CommunityRoles/change-stream | Create a change stream.
[**communityRoleCreateChangeStreamPostCommunityRolesChangeStream**](CommunityRoleApi.md#communityRoleCreateChangeStreamPostCommunityRolesChangeStream) | **POST** /CommunityRoles/change-stream | Create a change stream.
[**communityRoleDeleteById**](CommunityRoleApi.md#communityRoleDeleteById) | **DELETE** /CommunityRoles/{id} | Delete a model instance by id from the data source.
[**communityRoleExistsGetCommunityRolesidExists**](CommunityRoleApi.md#communityRoleExistsGetCommunityRolesidExists) | **GET** /CommunityRoles/{id}/exists | Check whether a model instance exists in the data source.
[**communityRoleExistsHeadCommunityRolesid**](CommunityRoleApi.md#communityRoleExistsHeadCommunityRolesid) | **HEAD** /CommunityRoles/{id} | Check whether a model instance exists in the data source.
[**communityRoleFind**](CommunityRoleApi.md#communityRoleFind) | **GET** /CommunityRoles | Find all instances of the model matched by filter from the data source.
[**communityRoleFindById**](CommunityRoleApi.md#communityRoleFindById) | **GET** /CommunityRoles/{id} | Find a model instance by id from the data source.
[**communityRoleFindOne**](CommunityRoleApi.md#communityRoleFindOne) | **GET** /CommunityRoles/findOne | Find first instance of the model matched by filter from the data source.
[**communityRolePrototypeUpdateAttributes**](CommunityRoleApi.md#communityRolePrototypeUpdateAttributes) | **PUT** /CommunityRoles/{id} | Update attributes for a model instance and persist it into the data source.
[**communityRoleUpdateAll**](CommunityRoleApi.md#communityRoleUpdateAll) | **POST** /CommunityRoles/update | Update instances of the model matched by where from the data source.
[**communityRoleUpsert**](CommunityRoleApi.md#communityRoleUpsert) | **PUT** /CommunityRoles | Update an existing model instance or insert a new one into the data source.


# **communityRoleCount**
> \DBCDK\CommunityServices\Model\InlineResponse200 communityRoleCount($where)

Count instances of the model matched by where from the data source.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\CommunityRoleApi();
$where = "where_example"; // string | Criteria to match model instances

try {
    $result = $api_instance->communityRoleCount($where);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CommunityRoleApi->communityRoleCount: ', $e->getMessage(), PHP_EOL;
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

# **communityRoleCreate**
> \DBCDK\CommunityServices\Model\CommunityRole communityRoleCreate($data)

Create a new instance of the model and persist it into the data source.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\CommunityRoleApi();
$data = new \DBCDK\CommunityServices\Model\CommunityRole(); // \DBCDK\CommunityServices\Model\CommunityRole | Model instance data

try {
    $result = $api_instance->communityRoleCreate($data);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CommunityRoleApi->communityRoleCreate: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **data** | [**\DBCDK\CommunityServices\Model\CommunityRole**](../Model/\DBCDK\CommunityServices\Model\CommunityRole.md)| Model instance data | [optional]

### Return type

[**\DBCDK\CommunityServices\Model\CommunityRole**](../Model/CommunityRole.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **communityRoleCreateChangeStreamGetCommunityRolesChangeStream**
> \SplFileObject communityRoleCreateChangeStreamGetCommunityRolesChangeStream($options)

Create a change stream.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\CommunityRoleApi();
$options = "options_example"; // string | 

try {
    $result = $api_instance->communityRoleCreateChangeStreamGetCommunityRolesChangeStream($options);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CommunityRoleApi->communityRoleCreateChangeStreamGetCommunityRolesChangeStream: ', $e->getMessage(), PHP_EOL;
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

# **communityRoleCreateChangeStreamPostCommunityRolesChangeStream**
> \SplFileObject communityRoleCreateChangeStreamPostCommunityRolesChangeStream($options)

Create a change stream.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\CommunityRoleApi();
$options = "options_example"; // string | 

try {
    $result = $api_instance->communityRoleCreateChangeStreamPostCommunityRolesChangeStream($options);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CommunityRoleApi->communityRoleCreateChangeStreamPostCommunityRolesChangeStream: ', $e->getMessage(), PHP_EOL;
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

# **communityRoleDeleteById**
> object communityRoleDeleteById($id)

Delete a model instance by id from the data source.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\CommunityRoleApi();
$id = "id_example"; // string | Model id

try {
    $result = $api_instance->communityRoleDeleteById($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CommunityRoleApi->communityRoleDeleteById: ', $e->getMessage(), PHP_EOL;
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

# **communityRoleExistsGetCommunityRolesidExists**
> \DBCDK\CommunityServices\Model\InlineResponse2001 communityRoleExistsGetCommunityRolesidExists($id)

Check whether a model instance exists in the data source.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\CommunityRoleApi();
$id = "id_example"; // string | Model id

try {
    $result = $api_instance->communityRoleExistsGetCommunityRolesidExists($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CommunityRoleApi->communityRoleExistsGetCommunityRolesidExists: ', $e->getMessage(), PHP_EOL;
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

# **communityRoleExistsHeadCommunityRolesid**
> \DBCDK\CommunityServices\Model\InlineResponse2001 communityRoleExistsHeadCommunityRolesid($id)

Check whether a model instance exists in the data source.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\CommunityRoleApi();
$id = "id_example"; // string | Model id

try {
    $result = $api_instance->communityRoleExistsHeadCommunityRolesid($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CommunityRoleApi->communityRoleExistsHeadCommunityRolesid: ', $e->getMessage(), PHP_EOL;
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

# **communityRoleFind**
> \DBCDK\CommunityServices\Model\CommunityRole[] communityRoleFind($filter)

Find all instances of the model matched by filter from the data source.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\CommunityRoleApi();
$filter = "filter_example"; // string | Filter defining fields, where, include, order, offset, and limit

try {
    $result = $api_instance->communityRoleFind($filter);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CommunityRoleApi->communityRoleFind: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **filter** | **string**| Filter defining fields, where, include, order, offset, and limit | [optional]

### Return type

[**\DBCDK\CommunityServices\Model\CommunityRole[]**](../Model/CommunityRole.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **communityRoleFindById**
> \DBCDK\CommunityServices\Model\CommunityRole communityRoleFindById($id, $filter)

Find a model instance by id from the data source.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\CommunityRoleApi();
$id = "id_example"; // string | Model id
$filter = "filter_example"; // string | Filter defining fields and include

try {
    $result = $api_instance->communityRoleFindById($id, $filter);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CommunityRoleApi->communityRoleFindById: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| Model id |
 **filter** | **string**| Filter defining fields and include | [optional]

### Return type

[**\DBCDK\CommunityServices\Model\CommunityRole**](../Model/CommunityRole.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **communityRoleFindOne**
> \DBCDK\CommunityServices\Model\CommunityRole communityRoleFindOne($filter)

Find first instance of the model matched by filter from the data source.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\CommunityRoleApi();
$filter = "filter_example"; // string | Filter defining fields, where, include, order, offset, and limit

try {
    $result = $api_instance->communityRoleFindOne($filter);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CommunityRoleApi->communityRoleFindOne: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **filter** | **string**| Filter defining fields, where, include, order, offset, and limit | [optional]

### Return type

[**\DBCDK\CommunityServices\Model\CommunityRole**](../Model/CommunityRole.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **communityRolePrototypeUpdateAttributes**
> \DBCDK\CommunityServices\Model\CommunityRole communityRolePrototypeUpdateAttributes($id, $data)

Update attributes for a model instance and persist it into the data source.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\CommunityRoleApi();
$id = "id_example"; // string | PersistedModel id
$data = new \DBCDK\CommunityServices\Model\CommunityRole(); // \DBCDK\CommunityServices\Model\CommunityRole | An object of model property name/value pairs

try {
    $result = $api_instance->communityRolePrototypeUpdateAttributes($id, $data);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CommunityRoleApi->communityRolePrototypeUpdateAttributes: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| PersistedModel id |
 **data** | [**\DBCDK\CommunityServices\Model\CommunityRole**](../Model/\DBCDK\CommunityServices\Model\CommunityRole.md)| An object of model property name/value pairs | [optional]

### Return type

[**\DBCDK\CommunityServices\Model\CommunityRole**](../Model/CommunityRole.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **communityRoleUpdateAll**
> object communityRoleUpdateAll($where, $data)

Update instances of the model matched by where from the data source.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\CommunityRoleApi();
$where = "where_example"; // string | Criteria to match model instances
$data = new \DBCDK\CommunityServices\Model\CommunityRole(); // \DBCDK\CommunityServices\Model\CommunityRole | An object of model property name/value pairs

try {
    $result = $api_instance->communityRoleUpdateAll($where, $data);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CommunityRoleApi->communityRoleUpdateAll: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **where** | **string**| Criteria to match model instances | [optional]
 **data** | [**\DBCDK\CommunityServices\Model\CommunityRole**](../Model/\DBCDK\CommunityServices\Model\CommunityRole.md)| An object of model property name/value pairs | [optional]

### Return type

**object**

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **communityRoleUpsert**
> \DBCDK\CommunityServices\Model\CommunityRole communityRoleUpsert($data)

Update an existing model instance or insert a new one into the data source.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\CommunityRoleApi();
$data = new \DBCDK\CommunityServices\Model\CommunityRole(); // \DBCDK\CommunityServices\Model\CommunityRole | Model instance data

try {
    $result = $api_instance->communityRoleUpsert($data);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CommunityRoleApi->communityRoleUpsert: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **data** | [**\DBCDK\CommunityServices\Model\CommunityRole**](../Model/\DBCDK\CommunityServices\Model\CommunityRole.md)| Model instance data | [optional]

### Return type

[**\DBCDK\CommunityServices\Model\CommunityRole**](../Model/CommunityRole.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

