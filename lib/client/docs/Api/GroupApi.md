# DBCDK\CommunityServices\GroupApi

All URIs are relative to *https://localhost/api*

Method | HTTP request | Description
------------- | ------------- | -------------
[**groupCount**](GroupApi.md#groupCount) | **GET** /Groups/count | Count instances of the model matched by where from the data source.
[**groupCreate**](GroupApi.md#groupCreate) | **POST** /Groups | Create a new instance of the model and persist it into the data source.
[**groupCreateChangeStreamGetGroupsChangeStream**](GroupApi.md#groupCreateChangeStreamGetGroupsChangeStream) | **GET** /Groups/change-stream | Create a change stream.
[**groupCreateChangeStreamPostGroupsChangeStream**](GroupApi.md#groupCreateChangeStreamPostGroupsChangeStream) | **POST** /Groups/change-stream | Create a change stream.
[**groupDeleteById**](GroupApi.md#groupDeleteById) | **DELETE** /Groups/{id} | Delete a model instance by id from the data source.
[**groupExistsGetGroupsidExists**](GroupApi.md#groupExistsGetGroupsidExists) | **GET** /Groups/{id}/exists | Check whether a model instance exists in the data source.
[**groupExistsHeadGroupsid**](GroupApi.md#groupExistsHeadGroupsid) | **HEAD** /Groups/{id} | Check whether a model instance exists in the data source.
[**groupFind**](GroupApi.md#groupFind) | **GET** /Groups | Find all instances of the model matched by filter from the data source.
[**groupFindById**](GroupApi.md#groupFindById) | **GET** /Groups/{id} | Find a model instance by id from the data source.
[**groupFindOne**](GroupApi.md#groupFindOne) | **GET** /Groups/findOne | Find first instance of the model matched by filter from the data source.
[**groupPrototypeCountFlags**](GroupApi.md#groupPrototypeCountFlags) | **GET** /Groups/{id}/flags/count | Counts flags of Group.
[**groupPrototypeCountMembers**](GroupApi.md#groupPrototypeCountMembers) | **GET** /Groups/{id}/members/count | Counts members of Group.
[**groupPrototypeCountPosts**](GroupApi.md#groupPrototypeCountPosts) | **GET** /Groups/{id}/posts/count | Counts posts of Group.
[**groupPrototypeCreateCoverImage**](GroupApi.md#groupPrototypeCreateCoverImage) | **POST** /Groups/{id}/coverImage | Creates a new instance in coverImage of this model.
[**groupPrototypeCreateFlags**](GroupApi.md#groupPrototypeCreateFlags) | **POST** /Groups/{id}/flags | Creates a new instance in flags of this model.
[**groupPrototypeCreateMembers**](GroupApi.md#groupPrototypeCreateMembers) | **POST** /Groups/{id}/members | Creates a new instance in members of this model.
[**groupPrototypeCreatePosts**](GroupApi.md#groupPrototypeCreatePosts) | **POST** /Groups/{id}/posts | Creates a new instance in posts of this model.
[**groupPrototypeDeleteFlags**](GroupApi.md#groupPrototypeDeleteFlags) | **DELETE** /Groups/{id}/flags | Deletes all flags of this model.
[**groupPrototypeDeleteMembers**](GroupApi.md#groupPrototypeDeleteMembers) | **DELETE** /Groups/{id}/members | Deletes all members of this model.
[**groupPrototypeDeletePosts**](GroupApi.md#groupPrototypeDeletePosts) | **DELETE** /Groups/{id}/posts | Deletes all posts of this model.
[**groupPrototypeDestroyByIdFlags**](GroupApi.md#groupPrototypeDestroyByIdFlags) | **DELETE** /Groups/{id}/flags/{fk} | Delete a related item by id for flags.
[**groupPrototypeDestroyByIdMembers**](GroupApi.md#groupPrototypeDestroyByIdMembers) | **DELETE** /Groups/{id}/members/{fk} | Delete a related item by id for members.
[**groupPrototypeDestroyByIdPosts**](GroupApi.md#groupPrototypeDestroyByIdPosts) | **DELETE** /Groups/{id}/posts/{fk} | Delete a related item by id for posts.
[**groupPrototypeDestroyCoverImage**](GroupApi.md#groupPrototypeDestroyCoverImage) | **DELETE** /Groups/{id}/coverImage | Deletes coverImage of this model.
[**groupPrototypeExistsMembers**](GroupApi.md#groupPrototypeExistsMembers) | **HEAD** /Groups/{id}/members/rel/{fk} | Check the existence of members relation to an item by id.
[**groupPrototypeFindByIdFlags**](GroupApi.md#groupPrototypeFindByIdFlags) | **GET** /Groups/{id}/flags/{fk} | Find a related item by id for flags.
[**groupPrototypeFindByIdMembers**](GroupApi.md#groupPrototypeFindByIdMembers) | **GET** /Groups/{id}/members/{fk} | Find a related item by id for members.
[**groupPrototypeFindByIdPosts**](GroupApi.md#groupPrototypeFindByIdPosts) | **GET** /Groups/{id}/posts/{fk} | Find a related item by id for posts.
[**groupPrototypeGetCoverImage**](GroupApi.md#groupPrototypeGetCoverImage) | **GET** /Groups/{id}/coverImage | Fetches hasOne relation coverImage.
[**groupPrototypeGetFlags**](GroupApi.md#groupPrototypeGetFlags) | **GET** /Groups/{id}/flags | Queries flags of Group.
[**groupPrototypeGetMembers**](GroupApi.md#groupPrototypeGetMembers) | **GET** /Groups/{id}/members | Queries members of Group.
[**groupPrototypeGetOwner**](GroupApi.md#groupPrototypeGetOwner) | **GET** /Groups/{id}/owner | Fetches belongsTo relation owner.
[**groupPrototypeGetPosts**](GroupApi.md#groupPrototypeGetPosts) | **GET** /Groups/{id}/posts | Queries posts of Group.
[**groupPrototypeLinkMembers**](GroupApi.md#groupPrototypeLinkMembers) | **PUT** /Groups/{id}/members/rel/{fk} | Add a related item by id for members.
[**groupPrototypeUnlinkMembers**](GroupApi.md#groupPrototypeUnlinkMembers) | **DELETE** /Groups/{id}/members/rel/{fk} | Remove the members relation to an item by id.
[**groupPrototypeUpdateAttributes**](GroupApi.md#groupPrototypeUpdateAttributes) | **PUT** /Groups/{id} | Update attributes for a model instance and persist it into the data source.
[**groupPrototypeUpdateByIdFlags**](GroupApi.md#groupPrototypeUpdateByIdFlags) | **PUT** /Groups/{id}/flags/{fk} | Update a related item by id for flags.
[**groupPrototypeUpdateByIdMembers**](GroupApi.md#groupPrototypeUpdateByIdMembers) | **PUT** /Groups/{id}/members/{fk} | Update a related item by id for members.
[**groupPrototypeUpdateByIdPosts**](GroupApi.md#groupPrototypeUpdateByIdPosts) | **PUT** /Groups/{id}/posts/{fk} | Update a related item by id for posts.
[**groupPrototypeUpdateCoverImage**](GroupApi.md#groupPrototypeUpdateCoverImage) | **PUT** /Groups/{id}/coverImage | Update coverImage of this model.
[**groupUpdateAll**](GroupApi.md#groupUpdateAll) | **POST** /Groups/update | Update instances of the model matched by where from the data source.
[**groupUpsert**](GroupApi.md#groupUpsert) | **PUT** /Groups | Update an existing model instance or insert a new one into the data source.


# **groupCount**
> \DBCDK\CommunityServices\Model\InlineResponse200 groupCount($where)

Count instances of the model matched by where from the data source.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\GroupApi();
$where = "where_example"; // string | Criteria to match model instances

try {
    $result = $api_instance->groupCount($where);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling GroupApi->groupCount: ', $e->getMessage(), PHP_EOL;
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

# **groupCreate**
> \DBCDK\CommunityServices\Model\Group groupCreate($data)

Create a new instance of the model and persist it into the data source.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\GroupApi();
$data = new \DBCDK\CommunityServices\Model\Group(); // \DBCDK\CommunityServices\Model\Group | Model instance data

try {
    $result = $api_instance->groupCreate($data);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling GroupApi->groupCreate: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **data** | [**\DBCDK\CommunityServices\Model\Group**](../Model/\DBCDK\CommunityServices\Model\Group.md)| Model instance data | [optional]

### Return type

[**\DBCDK\CommunityServices\Model\Group**](../Model/Group.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **groupCreateChangeStreamGetGroupsChangeStream**
> \SplFileObject groupCreateChangeStreamGetGroupsChangeStream($options)

Create a change stream.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\GroupApi();
$options = "options_example"; // string | 

try {
    $result = $api_instance->groupCreateChangeStreamGetGroupsChangeStream($options);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling GroupApi->groupCreateChangeStreamGetGroupsChangeStream: ', $e->getMessage(), PHP_EOL;
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

# **groupCreateChangeStreamPostGroupsChangeStream**
> \SplFileObject groupCreateChangeStreamPostGroupsChangeStream($options)

Create a change stream.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\GroupApi();
$options = "options_example"; // string | 

try {
    $result = $api_instance->groupCreateChangeStreamPostGroupsChangeStream($options);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling GroupApi->groupCreateChangeStreamPostGroupsChangeStream: ', $e->getMessage(), PHP_EOL;
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

# **groupDeleteById**
> object groupDeleteById($id)

Delete a model instance by id from the data source.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\GroupApi();
$id = "id_example"; // string | Model id

try {
    $result = $api_instance->groupDeleteById($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling GroupApi->groupDeleteById: ', $e->getMessage(), PHP_EOL;
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

# **groupExistsGetGroupsidExists**
> \DBCDK\CommunityServices\Model\InlineResponse2001 groupExistsGetGroupsidExists($id)

Check whether a model instance exists in the data source.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\GroupApi();
$id = "id_example"; // string | Model id

try {
    $result = $api_instance->groupExistsGetGroupsidExists($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling GroupApi->groupExistsGetGroupsidExists: ', $e->getMessage(), PHP_EOL;
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

# **groupExistsHeadGroupsid**
> \DBCDK\CommunityServices\Model\InlineResponse2001 groupExistsHeadGroupsid($id)

Check whether a model instance exists in the data source.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\GroupApi();
$id = "id_example"; // string | Model id

try {
    $result = $api_instance->groupExistsHeadGroupsid($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling GroupApi->groupExistsHeadGroupsid: ', $e->getMessage(), PHP_EOL;
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

# **groupFind**
> \DBCDK\CommunityServices\Model\Group[] groupFind($filter)

Find all instances of the model matched by filter from the data source.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\GroupApi();
$filter = "filter_example"; // string | Filter defining fields, where, include, order, offset, and limit

try {
    $result = $api_instance->groupFind($filter);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling GroupApi->groupFind: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **filter** | **string**| Filter defining fields, where, include, order, offset, and limit | [optional]

### Return type

[**\DBCDK\CommunityServices\Model\Group[]**](../Model/Group.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **groupFindById**
> \DBCDK\CommunityServices\Model\Group groupFindById($id, $filter)

Find a model instance by id from the data source.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\GroupApi();
$id = "id_example"; // string | Model id
$filter = "filter_example"; // string | Filter defining fields and include

try {
    $result = $api_instance->groupFindById($id, $filter);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling GroupApi->groupFindById: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| Model id |
 **filter** | **string**| Filter defining fields and include | [optional]

### Return type

[**\DBCDK\CommunityServices\Model\Group**](../Model/Group.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **groupFindOne**
> \DBCDK\CommunityServices\Model\Group groupFindOne($filter)

Find first instance of the model matched by filter from the data source.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\GroupApi();
$filter = "filter_example"; // string | Filter defining fields, where, include, order, offset, and limit

try {
    $result = $api_instance->groupFindOne($filter);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling GroupApi->groupFindOne: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **filter** | **string**| Filter defining fields, where, include, order, offset, and limit | [optional]

### Return type

[**\DBCDK\CommunityServices\Model\Group**](../Model/Group.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **groupPrototypeCountFlags**
> \DBCDK\CommunityServices\Model\InlineResponse200 groupPrototypeCountFlags($id, $where)

Counts flags of Group.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\GroupApi();
$id = "id_example"; // string | PersistedModel id
$where = "where_example"; // string | Criteria to match model instances

try {
    $result = $api_instance->groupPrototypeCountFlags($id, $where);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling GroupApi->groupPrototypeCountFlags: ', $e->getMessage(), PHP_EOL;
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

# **groupPrototypeCountMembers**
> \DBCDK\CommunityServices\Model\InlineResponse200 groupPrototypeCountMembers($id, $where)

Counts members of Group.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\GroupApi();
$id = "id_example"; // string | PersistedModel id
$where = "where_example"; // string | Criteria to match model instances

try {
    $result = $api_instance->groupPrototypeCountMembers($id, $where);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling GroupApi->groupPrototypeCountMembers: ', $e->getMessage(), PHP_EOL;
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

# **groupPrototypeCountPosts**
> \DBCDK\CommunityServices\Model\InlineResponse200 groupPrototypeCountPosts($id, $where)

Counts posts of Group.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\GroupApi();
$id = "id_example"; // string | PersistedModel id
$where = "where_example"; // string | Criteria to match model instances

try {
    $result = $api_instance->groupPrototypeCountPosts($id, $where);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling GroupApi->groupPrototypeCountPosts: ', $e->getMessage(), PHP_EOL;
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

# **groupPrototypeCreateCoverImage**
> \DBCDK\CommunityServices\Model\ImageCollection groupPrototypeCreateCoverImage($id, $data)

Creates a new instance in coverImage of this model.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\GroupApi();
$id = "id_example"; // string | PersistedModel id
$data = new \DBCDK\CommunityServices\Model\ImageCollection(); // \DBCDK\CommunityServices\Model\ImageCollection | 

try {
    $result = $api_instance->groupPrototypeCreateCoverImage($id, $data);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling GroupApi->groupPrototypeCreateCoverImage: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| PersistedModel id |
 **data** | [**\DBCDK\CommunityServices\Model\ImageCollection**](../Model/\DBCDK\CommunityServices\Model\ImageCollection.md)|  | [optional]

### Return type

[**\DBCDK\CommunityServices\Model\ImageCollection**](../Model/ImageCollection.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **groupPrototypeCreateFlags**
> \DBCDK\CommunityServices\Model\Flag groupPrototypeCreateFlags($id, $data)

Creates a new instance in flags of this model.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\GroupApi();
$id = "id_example"; // string | PersistedModel id
$data = new \DBCDK\CommunityServices\Model\Flag(); // \DBCDK\CommunityServices\Model\Flag | 

try {
    $result = $api_instance->groupPrototypeCreateFlags($id, $data);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling GroupApi->groupPrototypeCreateFlags: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| PersistedModel id |
 **data** | [**\DBCDK\CommunityServices\Model\Flag**](../Model/\DBCDK\CommunityServices\Model\Flag.md)|  | [optional]

### Return type

[**\DBCDK\CommunityServices\Model\Flag**](../Model/Flag.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **groupPrototypeCreateMembers**
> \DBCDK\CommunityServices\Model\Profile groupPrototypeCreateMembers($id, $data)

Creates a new instance in members of this model.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\GroupApi();
$id = "id_example"; // string | PersistedModel id
$data = new \DBCDK\CommunityServices\Model\Profile(); // \DBCDK\CommunityServices\Model\Profile | 

try {
    $result = $api_instance->groupPrototypeCreateMembers($id, $data);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling GroupApi->groupPrototypeCreateMembers: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| PersistedModel id |
 **data** | [**\DBCDK\CommunityServices\Model\Profile**](../Model/\DBCDK\CommunityServices\Model\Profile.md)|  | [optional]

### Return type

[**\DBCDK\CommunityServices\Model\Profile**](../Model/Profile.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **groupPrototypeCreatePosts**
> \DBCDK\CommunityServices\Model\Post groupPrototypeCreatePosts($id, $data)

Creates a new instance in posts of this model.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\GroupApi();
$id = "id_example"; // string | PersistedModel id
$data = new \DBCDK\CommunityServices\Model\Post(); // \DBCDK\CommunityServices\Model\Post | 

try {
    $result = $api_instance->groupPrototypeCreatePosts($id, $data);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling GroupApi->groupPrototypeCreatePosts: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| PersistedModel id |
 **data** | [**\DBCDK\CommunityServices\Model\Post**](../Model/\DBCDK\CommunityServices\Model\Post.md)|  | [optional]

### Return type

[**\DBCDK\CommunityServices\Model\Post**](../Model/Post.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **groupPrototypeDeleteFlags**
> groupPrototypeDeleteFlags($id)

Deletes all flags of this model.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\GroupApi();
$id = "id_example"; // string | PersistedModel id

try {
    $api_instance->groupPrototypeDeleteFlags($id);
} catch (Exception $e) {
    echo 'Exception when calling GroupApi->groupPrototypeDeleteFlags: ', $e->getMessage(), PHP_EOL;
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

# **groupPrototypeDeleteMembers**
> groupPrototypeDeleteMembers($id)

Deletes all members of this model.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\GroupApi();
$id = "id_example"; // string | PersistedModel id

try {
    $api_instance->groupPrototypeDeleteMembers($id);
} catch (Exception $e) {
    echo 'Exception when calling GroupApi->groupPrototypeDeleteMembers: ', $e->getMessage(), PHP_EOL;
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

# **groupPrototypeDeletePosts**
> groupPrototypeDeletePosts($id)

Deletes all posts of this model.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\GroupApi();
$id = "id_example"; // string | PersistedModel id

try {
    $api_instance->groupPrototypeDeletePosts($id);
} catch (Exception $e) {
    echo 'Exception when calling GroupApi->groupPrototypeDeletePosts: ', $e->getMessage(), PHP_EOL;
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

# **groupPrototypeDestroyByIdFlags**
> groupPrototypeDestroyByIdFlags($fk, $id)

Delete a related item by id for flags.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\GroupApi();
$fk = "fk_example"; // string | Foreign key for flags
$id = "id_example"; // string | PersistedModel id

try {
    $api_instance->groupPrototypeDestroyByIdFlags($fk, $id);
} catch (Exception $e) {
    echo 'Exception when calling GroupApi->groupPrototypeDestroyByIdFlags: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **fk** | **string**| Foreign key for flags |
 **id** | **string**| PersistedModel id |

### Return type

void (empty response body)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **groupPrototypeDestroyByIdMembers**
> groupPrototypeDestroyByIdMembers($fk, $id)

Delete a related item by id for members.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\GroupApi();
$fk = "fk_example"; // string | Foreign key for members
$id = "id_example"; // string | PersistedModel id

try {
    $api_instance->groupPrototypeDestroyByIdMembers($fk, $id);
} catch (Exception $e) {
    echo 'Exception when calling GroupApi->groupPrototypeDestroyByIdMembers: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **fk** | **string**| Foreign key for members |
 **id** | **string**| PersistedModel id |

### Return type

void (empty response body)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **groupPrototypeDestroyByIdPosts**
> groupPrototypeDestroyByIdPosts($fk, $id)

Delete a related item by id for posts.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\GroupApi();
$fk = "fk_example"; // string | Foreign key for posts
$id = "id_example"; // string | PersistedModel id

try {
    $api_instance->groupPrototypeDestroyByIdPosts($fk, $id);
} catch (Exception $e) {
    echo 'Exception when calling GroupApi->groupPrototypeDestroyByIdPosts: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **fk** | **string**| Foreign key for posts |
 **id** | **string**| PersistedModel id |

### Return type

void (empty response body)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **groupPrototypeDestroyCoverImage**
> groupPrototypeDestroyCoverImage($id)

Deletes coverImage of this model.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\GroupApi();
$id = "id_example"; // string | PersistedModel id

try {
    $api_instance->groupPrototypeDestroyCoverImage($id);
} catch (Exception $e) {
    echo 'Exception when calling GroupApi->groupPrototypeDestroyCoverImage: ', $e->getMessage(), PHP_EOL;
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

# **groupPrototypeExistsMembers**
> bool groupPrototypeExistsMembers($fk, $id)

Check the existence of members relation to an item by id.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\GroupApi();
$fk = "fk_example"; // string | Foreign key for members
$id = "id_example"; // string | PersistedModel id

try {
    $result = $api_instance->groupPrototypeExistsMembers($fk, $id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling GroupApi->groupPrototypeExistsMembers: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **fk** | **string**| Foreign key for members |
 **id** | **string**| PersistedModel id |

### Return type

**bool**

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **groupPrototypeFindByIdFlags**
> \DBCDK\CommunityServices\Model\Flag groupPrototypeFindByIdFlags($fk, $id)

Find a related item by id for flags.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\GroupApi();
$fk = "fk_example"; // string | Foreign key for flags
$id = "id_example"; // string | PersistedModel id

try {
    $result = $api_instance->groupPrototypeFindByIdFlags($fk, $id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling GroupApi->groupPrototypeFindByIdFlags: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **fk** | **string**| Foreign key for flags |
 **id** | **string**| PersistedModel id |

### Return type

[**\DBCDK\CommunityServices\Model\Flag**](../Model/Flag.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **groupPrototypeFindByIdMembers**
> \DBCDK\CommunityServices\Model\Profile groupPrototypeFindByIdMembers($fk, $id)

Find a related item by id for members.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\GroupApi();
$fk = "fk_example"; // string | Foreign key for members
$id = "id_example"; // string | PersistedModel id

try {
    $result = $api_instance->groupPrototypeFindByIdMembers($fk, $id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling GroupApi->groupPrototypeFindByIdMembers: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **fk** | **string**| Foreign key for members |
 **id** | **string**| PersistedModel id |

### Return type

[**\DBCDK\CommunityServices\Model\Profile**](../Model/Profile.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **groupPrototypeFindByIdPosts**
> \DBCDK\CommunityServices\Model\Post groupPrototypeFindByIdPosts($fk, $id)

Find a related item by id for posts.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\GroupApi();
$fk = "fk_example"; // string | Foreign key for posts
$id = "id_example"; // string | PersistedModel id

try {
    $result = $api_instance->groupPrototypeFindByIdPosts($fk, $id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling GroupApi->groupPrototypeFindByIdPosts: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **fk** | **string**| Foreign key for posts |
 **id** | **string**| PersistedModel id |

### Return type

[**\DBCDK\CommunityServices\Model\Post**](../Model/Post.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **groupPrototypeGetCoverImage**
> \DBCDK\CommunityServices\Model\ImageCollection groupPrototypeGetCoverImage($id, $refresh)

Fetches hasOne relation coverImage.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\GroupApi();
$id = "id_example"; // string | PersistedModel id
$refresh = true; // bool | 

try {
    $result = $api_instance->groupPrototypeGetCoverImage($id, $refresh);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling GroupApi->groupPrototypeGetCoverImage: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| PersistedModel id |
 **refresh** | **bool**|  | [optional]

### Return type

[**\DBCDK\CommunityServices\Model\ImageCollection**](../Model/ImageCollection.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **groupPrototypeGetFlags**
> \DBCDK\CommunityServices\Model\Flag[] groupPrototypeGetFlags($id, $filter)

Queries flags of Group.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\GroupApi();
$id = "id_example"; // string | PersistedModel id
$filter = "filter_example"; // string | 

try {
    $result = $api_instance->groupPrototypeGetFlags($id, $filter);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling GroupApi->groupPrototypeGetFlags: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| PersistedModel id |
 **filter** | **string**|  | [optional]

### Return type

[**\DBCDK\CommunityServices\Model\Flag[]**](../Model/Flag.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **groupPrototypeGetMembers**
> \DBCDK\CommunityServices\Model\Profile[] groupPrototypeGetMembers($id, $filter)

Queries members of Group.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\GroupApi();
$id = "id_example"; // string | PersistedModel id
$filter = "filter_example"; // string | 

try {
    $result = $api_instance->groupPrototypeGetMembers($id, $filter);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling GroupApi->groupPrototypeGetMembers: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| PersistedModel id |
 **filter** | **string**|  | [optional]

### Return type

[**\DBCDK\CommunityServices\Model\Profile[]**](../Model/Profile.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **groupPrototypeGetOwner**
> \DBCDK\CommunityServices\Model\Profile groupPrototypeGetOwner($id, $refresh)

Fetches belongsTo relation owner.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\GroupApi();
$id = "id_example"; // string | PersistedModel id
$refresh = true; // bool | 

try {
    $result = $api_instance->groupPrototypeGetOwner($id, $refresh);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling GroupApi->groupPrototypeGetOwner: ', $e->getMessage(), PHP_EOL;
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

# **groupPrototypeGetPosts**
> \DBCDK\CommunityServices\Model\Post[] groupPrototypeGetPosts($id, $filter)

Queries posts of Group.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\GroupApi();
$id = "id_example"; // string | PersistedModel id
$filter = "filter_example"; // string | 

try {
    $result = $api_instance->groupPrototypeGetPosts($id, $filter);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling GroupApi->groupPrototypeGetPosts: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| PersistedModel id |
 **filter** | **string**|  | [optional]

### Return type

[**\DBCDK\CommunityServices\Model\Post[]**](../Model/Post.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **groupPrototypeLinkMembers**
> \DBCDK\CommunityServices\Model\GroupProfile groupPrototypeLinkMembers($fk, $id, $data)

Add a related item by id for members.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\GroupApi();
$fk = "fk_example"; // string | Foreign key for members
$id = "id_example"; // string | PersistedModel id
$data = new \DBCDK\CommunityServices\Model\GroupProfile(); // \DBCDK\CommunityServices\Model\GroupProfile | 

try {
    $result = $api_instance->groupPrototypeLinkMembers($fk, $id, $data);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling GroupApi->groupPrototypeLinkMembers: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **fk** | **string**| Foreign key for members |
 **id** | **string**| PersistedModel id |
 **data** | [**\DBCDK\CommunityServices\Model\GroupProfile**](../Model/\DBCDK\CommunityServices\Model\GroupProfile.md)|  | [optional]

### Return type

[**\DBCDK\CommunityServices\Model\GroupProfile**](../Model/GroupProfile.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **groupPrototypeUnlinkMembers**
> groupPrototypeUnlinkMembers($fk, $id)

Remove the members relation to an item by id.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\GroupApi();
$fk = "fk_example"; // string | Foreign key for members
$id = "id_example"; // string | PersistedModel id

try {
    $api_instance->groupPrototypeUnlinkMembers($fk, $id);
} catch (Exception $e) {
    echo 'Exception when calling GroupApi->groupPrototypeUnlinkMembers: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **fk** | **string**| Foreign key for members |
 **id** | **string**| PersistedModel id |

### Return type

void (empty response body)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **groupPrototypeUpdateAttributes**
> \DBCDK\CommunityServices\Model\Group groupPrototypeUpdateAttributes($id, $data)

Update attributes for a model instance and persist it into the data source.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\GroupApi();
$id = "id_example"; // string | PersistedModel id
$data = new \DBCDK\CommunityServices\Model\Group(); // \DBCDK\CommunityServices\Model\Group | An object of model property name/value pairs

try {
    $result = $api_instance->groupPrototypeUpdateAttributes($id, $data);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling GroupApi->groupPrototypeUpdateAttributes: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| PersistedModel id |
 **data** | [**\DBCDK\CommunityServices\Model\Group**](../Model/\DBCDK\CommunityServices\Model\Group.md)| An object of model property name/value pairs | [optional]

### Return type

[**\DBCDK\CommunityServices\Model\Group**](../Model/Group.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **groupPrototypeUpdateByIdFlags**
> \DBCDK\CommunityServices\Model\Flag groupPrototypeUpdateByIdFlags($fk, $id, $data)

Update a related item by id for flags.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\GroupApi();
$fk = "fk_example"; // string | Foreign key for flags
$id = "id_example"; // string | PersistedModel id
$data = new \DBCDK\CommunityServices\Model\Flag(); // \DBCDK\CommunityServices\Model\Flag | 

try {
    $result = $api_instance->groupPrototypeUpdateByIdFlags($fk, $id, $data);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling GroupApi->groupPrototypeUpdateByIdFlags: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **fk** | **string**| Foreign key for flags |
 **id** | **string**| PersistedModel id |
 **data** | [**\DBCDK\CommunityServices\Model\Flag**](../Model/\DBCDK\CommunityServices\Model\Flag.md)|  | [optional]

### Return type

[**\DBCDK\CommunityServices\Model\Flag**](../Model/Flag.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **groupPrototypeUpdateByIdMembers**
> \DBCDK\CommunityServices\Model\Profile groupPrototypeUpdateByIdMembers($fk, $id, $data)

Update a related item by id for members.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\GroupApi();
$fk = "fk_example"; // string | Foreign key for members
$id = "id_example"; // string | PersistedModel id
$data = new \DBCDK\CommunityServices\Model\Profile(); // \DBCDK\CommunityServices\Model\Profile | 

try {
    $result = $api_instance->groupPrototypeUpdateByIdMembers($fk, $id, $data);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling GroupApi->groupPrototypeUpdateByIdMembers: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **fk** | **string**| Foreign key for members |
 **id** | **string**| PersistedModel id |
 **data** | [**\DBCDK\CommunityServices\Model\Profile**](../Model/\DBCDK\CommunityServices\Model\Profile.md)|  | [optional]

### Return type

[**\DBCDK\CommunityServices\Model\Profile**](../Model/Profile.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **groupPrototypeUpdateByIdPosts**
> \DBCDK\CommunityServices\Model\Post groupPrototypeUpdateByIdPosts($fk, $id, $data)

Update a related item by id for posts.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\GroupApi();
$fk = "fk_example"; // string | Foreign key for posts
$id = "id_example"; // string | PersistedModel id
$data = new \DBCDK\CommunityServices\Model\Post(); // \DBCDK\CommunityServices\Model\Post | 

try {
    $result = $api_instance->groupPrototypeUpdateByIdPosts($fk, $id, $data);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling GroupApi->groupPrototypeUpdateByIdPosts: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **fk** | **string**| Foreign key for posts |
 **id** | **string**| PersistedModel id |
 **data** | [**\DBCDK\CommunityServices\Model\Post**](../Model/\DBCDK\CommunityServices\Model\Post.md)|  | [optional]

### Return type

[**\DBCDK\CommunityServices\Model\Post**](../Model/Post.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **groupPrototypeUpdateCoverImage**
> \DBCDK\CommunityServices\Model\ImageCollection groupPrototypeUpdateCoverImage($id, $data)

Update coverImage of this model.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\GroupApi();
$id = "id_example"; // string | PersistedModel id
$data = new \DBCDK\CommunityServices\Model\ImageCollection(); // \DBCDK\CommunityServices\Model\ImageCollection | 

try {
    $result = $api_instance->groupPrototypeUpdateCoverImage($id, $data);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling GroupApi->groupPrototypeUpdateCoverImage: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| PersistedModel id |
 **data** | [**\DBCDK\CommunityServices\Model\ImageCollection**](../Model/\DBCDK\CommunityServices\Model\ImageCollection.md)|  | [optional]

### Return type

[**\DBCDK\CommunityServices\Model\ImageCollection**](../Model/ImageCollection.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **groupUpdateAll**
> object groupUpdateAll($where, $data)

Update instances of the model matched by where from the data source.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\GroupApi();
$where = "where_example"; // string | Criteria to match model instances
$data = new \DBCDK\CommunityServices\Model\Group(); // \DBCDK\CommunityServices\Model\Group | An object of model property name/value pairs

try {
    $result = $api_instance->groupUpdateAll($where, $data);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling GroupApi->groupUpdateAll: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **where** | **string**| Criteria to match model instances | [optional]
 **data** | [**\DBCDK\CommunityServices\Model\Group**](../Model/\DBCDK\CommunityServices\Model\Group.md)| An object of model property name/value pairs | [optional]

### Return type

**object**

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **groupUpsert**
> \DBCDK\CommunityServices\Model\Group groupUpsert($data)

Update an existing model instance or insert a new one into the data source.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\GroupApi();
$data = new \DBCDK\CommunityServices\Model\Group(); // \DBCDK\CommunityServices\Model\Group | Model instance data

try {
    $result = $api_instance->groupUpsert($data);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling GroupApi->groupUpsert: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **data** | [**\DBCDK\CommunityServices\Model\Group**](../Model/\DBCDK\CommunityServices\Model\Group.md)| Model instance data | [optional]

### Return type

[**\DBCDK\CommunityServices\Model\Group**](../Model/Group.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

