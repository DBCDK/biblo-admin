# DBCDK\CommunityServices\GroupProfileApi

All URIs are relative to *https://localhost/api*

Method | HTTP request | Description
------------- | ------------- | -------------
[**groupProfileCount**](GroupProfileApi.md#groupProfileCount) | **GET** /GroupProfiles/count | Count instances of the model matched by where from the data source.
[**groupProfileCreate**](GroupProfileApi.md#groupProfileCreate) | **POST** /GroupProfiles | Create a new instance of the model and persist it into the data source.
[**groupProfileCreateChangeStreamGetGroupProfilesChangeStream**](GroupProfileApi.md#groupProfileCreateChangeStreamGetGroupProfilesChangeStream) | **GET** /GroupProfiles/change-stream | Create a change stream.
[**groupProfileCreateChangeStreamPostGroupProfilesChangeStream**](GroupProfileApi.md#groupProfileCreateChangeStreamPostGroupProfilesChangeStream) | **POST** /GroupProfiles/change-stream | Create a change stream.
[**groupProfileDeleteById**](GroupProfileApi.md#groupProfileDeleteById) | **DELETE** /GroupProfiles/{id} | Delete a model instance by id from the data source.
[**groupProfileExistsGetGroupProfilesidExists**](GroupProfileApi.md#groupProfileExistsGetGroupProfilesidExists) | **GET** /GroupProfiles/{id}/exists | Check whether a model instance exists in the data source.
[**groupProfileExistsHeadGroupProfilesid**](GroupProfileApi.md#groupProfileExistsHeadGroupProfilesid) | **HEAD** /GroupProfiles/{id} | Check whether a model instance exists in the data source.
[**groupProfileFind**](GroupProfileApi.md#groupProfileFind) | **GET** /GroupProfiles | Find all instances of the model matched by filter from the data source.
[**groupProfileFindById**](GroupProfileApi.md#groupProfileFindById) | **GET** /GroupProfiles/{id} | Find a model instance by id from the data source.
[**groupProfileFindOne**](GroupProfileApi.md#groupProfileFindOne) | **GET** /GroupProfiles/findOne | Find first instance of the model matched by filter from the data source.
[**groupProfilePrototypeGetGroup**](GroupProfileApi.md#groupProfilePrototypeGetGroup) | **GET** /GroupProfiles/{id}/group | Fetches belongsTo relation group.
[**groupProfilePrototypeGetProfile**](GroupProfileApi.md#groupProfilePrototypeGetProfile) | **GET** /GroupProfiles/{id}/profile | Fetches belongsTo relation profile.
[**groupProfilePrototypeUpdateAttributes**](GroupProfileApi.md#groupProfilePrototypeUpdateAttributes) | **PUT** /GroupProfiles/{id} | Update attributes for a model instance and persist it into the data source.
[**groupProfileUpdateAll**](GroupProfileApi.md#groupProfileUpdateAll) | **POST** /GroupProfiles/update | Update instances of the model matched by where from the data source.
[**groupProfileUpsert**](GroupProfileApi.md#groupProfileUpsert) | **PUT** /GroupProfiles | Update an existing model instance or insert a new one into the data source.


# **groupProfileCount**
> \DBCDK\CommunityServices\Model\InlineResponse200 groupProfileCount($where)

Count instances of the model matched by where from the data source.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\GroupProfileApi();
$where = "where_example"; // string | Criteria to match model instances

try {
    $result = $api_instance->groupProfileCount($where);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling GroupProfileApi->groupProfileCount: ', $e->getMessage(), PHP_EOL;
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

# **groupProfileCreate**
> \DBCDK\CommunityServices\Model\GroupProfile groupProfileCreate($data)

Create a new instance of the model and persist it into the data source.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\GroupProfileApi();
$data = new \DBCDK\CommunityServices\Model\GroupProfile(); // \DBCDK\CommunityServices\Model\GroupProfile | Model instance data

try {
    $result = $api_instance->groupProfileCreate($data);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling GroupProfileApi->groupProfileCreate: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **data** | [**\DBCDK\CommunityServices\Model\GroupProfile**](../Model/\DBCDK\CommunityServices\Model\GroupProfile.md)| Model instance data | [optional]

### Return type

[**\DBCDK\CommunityServices\Model\GroupProfile**](../Model/GroupProfile.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **groupProfileCreateChangeStreamGetGroupProfilesChangeStream**
> \SplFileObject groupProfileCreateChangeStreamGetGroupProfilesChangeStream($options)

Create a change stream.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\GroupProfileApi();
$options = "options_example"; // string | 

try {
    $result = $api_instance->groupProfileCreateChangeStreamGetGroupProfilesChangeStream($options);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling GroupProfileApi->groupProfileCreateChangeStreamGetGroupProfilesChangeStream: ', $e->getMessage(), PHP_EOL;
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

# **groupProfileCreateChangeStreamPostGroupProfilesChangeStream**
> \SplFileObject groupProfileCreateChangeStreamPostGroupProfilesChangeStream($options)

Create a change stream.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\GroupProfileApi();
$options = "options_example"; // string | 

try {
    $result = $api_instance->groupProfileCreateChangeStreamPostGroupProfilesChangeStream($options);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling GroupProfileApi->groupProfileCreateChangeStreamPostGroupProfilesChangeStream: ', $e->getMessage(), PHP_EOL;
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

# **groupProfileDeleteById**
> object groupProfileDeleteById($id)

Delete a model instance by id from the data source.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\GroupProfileApi();
$id = "id_example"; // string | Model id

try {
    $result = $api_instance->groupProfileDeleteById($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling GroupProfileApi->groupProfileDeleteById: ', $e->getMessage(), PHP_EOL;
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

# **groupProfileExistsGetGroupProfilesidExists**
> \DBCDK\CommunityServices\Model\InlineResponse2001 groupProfileExistsGetGroupProfilesidExists($id)

Check whether a model instance exists in the data source.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\GroupProfileApi();
$id = "id_example"; // string | Model id

try {
    $result = $api_instance->groupProfileExistsGetGroupProfilesidExists($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling GroupProfileApi->groupProfileExistsGetGroupProfilesidExists: ', $e->getMessage(), PHP_EOL;
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

# **groupProfileExistsHeadGroupProfilesid**
> \DBCDK\CommunityServices\Model\InlineResponse2001 groupProfileExistsHeadGroupProfilesid($id)

Check whether a model instance exists in the data source.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\GroupProfileApi();
$id = "id_example"; // string | Model id

try {
    $result = $api_instance->groupProfileExistsHeadGroupProfilesid($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling GroupProfileApi->groupProfileExistsHeadGroupProfilesid: ', $e->getMessage(), PHP_EOL;
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

# **groupProfileFind**
> \DBCDK\CommunityServices\Model\GroupProfile[] groupProfileFind($filter)

Find all instances of the model matched by filter from the data source.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\GroupProfileApi();
$filter = "filter_example"; // string | Filter defining fields, where, include, order, offset, and limit

try {
    $result = $api_instance->groupProfileFind($filter);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling GroupProfileApi->groupProfileFind: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **filter** | **string**| Filter defining fields, where, include, order, offset, and limit | [optional]

### Return type

[**\DBCDK\CommunityServices\Model\GroupProfile[]**](../Model/GroupProfile.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **groupProfileFindById**
> \DBCDK\CommunityServices\Model\GroupProfile groupProfileFindById($id, $filter)

Find a model instance by id from the data source.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\GroupProfileApi();
$id = "id_example"; // string | Model id
$filter = "filter_example"; // string | Filter defining fields and include

try {
    $result = $api_instance->groupProfileFindById($id, $filter);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling GroupProfileApi->groupProfileFindById: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| Model id |
 **filter** | **string**| Filter defining fields and include | [optional]

### Return type

[**\DBCDK\CommunityServices\Model\GroupProfile**](../Model/GroupProfile.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **groupProfileFindOne**
> \DBCDK\CommunityServices\Model\GroupProfile groupProfileFindOne($filter)

Find first instance of the model matched by filter from the data source.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\GroupProfileApi();
$filter = "filter_example"; // string | Filter defining fields, where, include, order, offset, and limit

try {
    $result = $api_instance->groupProfileFindOne($filter);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling GroupProfileApi->groupProfileFindOne: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **filter** | **string**| Filter defining fields, where, include, order, offset, and limit | [optional]

### Return type

[**\DBCDK\CommunityServices\Model\GroupProfile**](../Model/GroupProfile.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **groupProfilePrototypeGetGroup**
> \DBCDK\CommunityServices\Model\Group groupProfilePrototypeGetGroup($id, $refresh)

Fetches belongsTo relation group.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\GroupProfileApi();
$id = "id_example"; // string | PersistedModel id
$refresh = true; // bool | 

try {
    $result = $api_instance->groupProfilePrototypeGetGroup($id, $refresh);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling GroupProfileApi->groupProfilePrototypeGetGroup: ', $e->getMessage(), PHP_EOL;
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

# **groupProfilePrototypeGetProfile**
> \DBCDK\CommunityServices\Model\Profile groupProfilePrototypeGetProfile($id, $refresh)

Fetches belongsTo relation profile.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\GroupProfileApi();
$id = "id_example"; // string | PersistedModel id
$refresh = true; // bool | 

try {
    $result = $api_instance->groupProfilePrototypeGetProfile($id, $refresh);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling GroupProfileApi->groupProfilePrototypeGetProfile: ', $e->getMessage(), PHP_EOL;
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

# **groupProfilePrototypeUpdateAttributes**
> \DBCDK\CommunityServices\Model\GroupProfile groupProfilePrototypeUpdateAttributes($id, $data)

Update attributes for a model instance and persist it into the data source.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\GroupProfileApi();
$id = "id_example"; // string | PersistedModel id
$data = new \DBCDK\CommunityServices\Model\GroupProfile(); // \DBCDK\CommunityServices\Model\GroupProfile | An object of model property name/value pairs

try {
    $result = $api_instance->groupProfilePrototypeUpdateAttributes($id, $data);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling GroupProfileApi->groupProfilePrototypeUpdateAttributes: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| PersistedModel id |
 **data** | [**\DBCDK\CommunityServices\Model\GroupProfile**](../Model/\DBCDK\CommunityServices\Model\GroupProfile.md)| An object of model property name/value pairs | [optional]

### Return type

[**\DBCDK\CommunityServices\Model\GroupProfile**](../Model/GroupProfile.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **groupProfileUpdateAll**
> object groupProfileUpdateAll($where, $data)

Update instances of the model matched by where from the data source.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\GroupProfileApi();
$where = "where_example"; // string | Criteria to match model instances
$data = new \DBCDK\CommunityServices\Model\GroupProfile(); // \DBCDK\CommunityServices\Model\GroupProfile | An object of model property name/value pairs

try {
    $result = $api_instance->groupProfileUpdateAll($where, $data);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling GroupProfileApi->groupProfileUpdateAll: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **where** | **string**| Criteria to match model instances | [optional]
 **data** | [**\DBCDK\CommunityServices\Model\GroupProfile**](../Model/\DBCDK\CommunityServices\Model\GroupProfile.md)| An object of model property name/value pairs | [optional]

### Return type

**object**

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **groupProfileUpsert**
> \DBCDK\CommunityServices\Model\GroupProfile groupProfileUpsert($data)

Update an existing model instance or insert a new one into the data source.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\GroupProfileApi();
$data = new \DBCDK\CommunityServices\Model\GroupProfile(); // \DBCDK\CommunityServices\Model\GroupProfile | Model instance data

try {
    $result = $api_instance->groupProfileUpsert($data);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling GroupProfileApi->groupProfileUpsert: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **data** | [**\DBCDK\CommunityServices\Model\GroupProfile**](../Model/\DBCDK\CommunityServices\Model\GroupProfile.md)| Model instance data | [optional]

### Return type

[**\DBCDK\CommunityServices\Model\GroupProfile**](../Model/GroupProfile.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

