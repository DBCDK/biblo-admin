# DBCDK\CommunityServices\FlagApi

All URIs are relative to *https://localhost/api*

Method | HTTP request | Description
------------- | ------------- | -------------
[**flagCount**](FlagApi.md#flagCount) | **GET** /Flags/count | Count instances of the model matched by where from the data source.
[**flagCreate**](FlagApi.md#flagCreate) | **POST** /Flags | Create a new instance of the model and persist it into the data source.
[**flagCreateChangeStreamGetFlagsChangeStream**](FlagApi.md#flagCreateChangeStreamGetFlagsChangeStream) | **GET** /Flags/change-stream | Create a change stream.
[**flagCreateChangeStreamPostFlagsChangeStream**](FlagApi.md#flagCreateChangeStreamPostFlagsChangeStream) | **POST** /Flags/change-stream | Create a change stream.
[**flagDeleteById**](FlagApi.md#flagDeleteById) | **DELETE** /Flags/{id} | Delete a model instance by id from the data source.
[**flagExistsGetFlagsidExists**](FlagApi.md#flagExistsGetFlagsidExists) | **GET** /Flags/{id}/exists | Check whether a model instance exists in the data source.
[**flagExistsHeadFlagsid**](FlagApi.md#flagExistsHeadFlagsid) | **HEAD** /Flags/{id} | Check whether a model instance exists in the data source.
[**flagFind**](FlagApi.md#flagFind) | **GET** /Flags | Find all instances of the model matched by filter from the data source.
[**flagFindById**](FlagApi.md#flagFindById) | **GET** /Flags/{id} | Find a model instance by id from the data source.
[**flagFindOne**](FlagApi.md#flagFindOne) | **GET** /Flags/findOne | Find first instance of the model matched by filter from the data source.
[**flagPrototypeCreateComments**](FlagApi.md#flagPrototypeCreateComments) | **POST** /Flags/{id}/comments | Creates a new instance in comments of this model.
[**flagPrototypeCreateGroups**](FlagApi.md#flagPrototypeCreateGroups) | **POST** /Flags/{id}/groups | Creates a new instance in groups of this model.
[**flagPrototypeCreatePosts**](FlagApi.md#flagPrototypeCreatePosts) | **POST** /Flags/{id}/posts | Creates a new instance in posts of this model.
[**flagPrototypeCreateReviews**](FlagApi.md#flagPrototypeCreateReviews) | **POST** /Flags/{id}/reviews | Creates a new instance in reviews of this model.
[**flagPrototypeDestroyComments**](FlagApi.md#flagPrototypeDestroyComments) | **DELETE** /Flags/{id}/comments | Deletes comments of this model.
[**flagPrototypeDestroyGroups**](FlagApi.md#flagPrototypeDestroyGroups) | **DELETE** /Flags/{id}/groups | Deletes groups of this model.
[**flagPrototypeDestroyPosts**](FlagApi.md#flagPrototypeDestroyPosts) | **DELETE** /Flags/{id}/posts | Deletes posts of this model.
[**flagPrototypeDestroyReviews**](FlagApi.md#flagPrototypeDestroyReviews) | **DELETE** /Flags/{id}/reviews | Deletes reviews of this model.
[**flagPrototypeGetComments**](FlagApi.md#flagPrototypeGetComments) | **GET** /Flags/{id}/comments | Fetches hasOne relation comments.
[**flagPrototypeGetGroups**](FlagApi.md#flagPrototypeGetGroups) | **GET** /Flags/{id}/groups | Fetches hasOne relation groups.
[**flagPrototypeGetOwner**](FlagApi.md#flagPrototypeGetOwner) | **GET** /Flags/{id}/owner | Fetches belongsTo relation owner.
[**flagPrototypeGetPosts**](FlagApi.md#flagPrototypeGetPosts) | **GET** /Flags/{id}/posts | Fetches hasOne relation posts.
[**flagPrototypeGetReviews**](FlagApi.md#flagPrototypeGetReviews) | **GET** /Flags/{id}/reviews | Fetches hasOne relation reviews.
[**flagPrototypeUpdateAttributes**](FlagApi.md#flagPrototypeUpdateAttributes) | **PUT** /Flags/{id} | Update attributes for a model instance and persist it into the data source.
[**flagPrototypeUpdateComments**](FlagApi.md#flagPrototypeUpdateComments) | **PUT** /Flags/{id}/comments | Update comments of this model.
[**flagPrototypeUpdateGroups**](FlagApi.md#flagPrototypeUpdateGroups) | **PUT** /Flags/{id}/groups | Update groups of this model.
[**flagPrototypeUpdatePosts**](FlagApi.md#flagPrototypeUpdatePosts) | **PUT** /Flags/{id}/posts | Update posts of this model.
[**flagPrototypeUpdateReviews**](FlagApi.md#flagPrototypeUpdateReviews) | **PUT** /Flags/{id}/reviews | Update reviews of this model.
[**flagUpdateAll**](FlagApi.md#flagUpdateAll) | **POST** /Flags/update | Update instances of the model matched by where from the data source.
[**flagUpsert**](FlagApi.md#flagUpsert) | **PUT** /Flags | Update an existing model instance or insert a new one into the data source.


# **flagCount**
> \DBCDK\CommunityServices\Model\InlineResponse200 flagCount($where)

Count instances of the model matched by where from the data source.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\FlagApi();
$where = "where_example"; // string | Criteria to match model instances

try {
    $result = $api_instance->flagCount($where);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FlagApi->flagCount: ', $e->getMessage(), PHP_EOL;
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

# **flagCreate**
> \DBCDK\CommunityServices\Model\Flag flagCreate($data)

Create a new instance of the model and persist it into the data source.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\FlagApi();
$data = new \DBCDK\CommunityServices\Model\Flag(); // \DBCDK\CommunityServices\Model\Flag | Model instance data

try {
    $result = $api_instance->flagCreate($data);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FlagApi->flagCreate: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **data** | [**\DBCDK\CommunityServices\Model\Flag**](../Model/\DBCDK\CommunityServices\Model\Flag.md)| Model instance data | [optional]

### Return type

[**\DBCDK\CommunityServices\Model\Flag**](../Model/Flag.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **flagCreateChangeStreamGetFlagsChangeStream**
> \SplFileObject flagCreateChangeStreamGetFlagsChangeStream($options)

Create a change stream.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\FlagApi();
$options = "options_example"; // string | 

try {
    $result = $api_instance->flagCreateChangeStreamGetFlagsChangeStream($options);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FlagApi->flagCreateChangeStreamGetFlagsChangeStream: ', $e->getMessage(), PHP_EOL;
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

# **flagCreateChangeStreamPostFlagsChangeStream**
> \SplFileObject flagCreateChangeStreamPostFlagsChangeStream($options)

Create a change stream.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\FlagApi();
$options = "options_example"; // string | 

try {
    $result = $api_instance->flagCreateChangeStreamPostFlagsChangeStream($options);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FlagApi->flagCreateChangeStreamPostFlagsChangeStream: ', $e->getMessage(), PHP_EOL;
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

# **flagDeleteById**
> object flagDeleteById($id)

Delete a model instance by id from the data source.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\FlagApi();
$id = "id_example"; // string | Model id

try {
    $result = $api_instance->flagDeleteById($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FlagApi->flagDeleteById: ', $e->getMessage(), PHP_EOL;
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

# **flagExistsGetFlagsidExists**
> \DBCDK\CommunityServices\Model\InlineResponse2001 flagExistsGetFlagsidExists($id)

Check whether a model instance exists in the data source.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\FlagApi();
$id = "id_example"; // string | Model id

try {
    $result = $api_instance->flagExistsGetFlagsidExists($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FlagApi->flagExistsGetFlagsidExists: ', $e->getMessage(), PHP_EOL;
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

# **flagExistsHeadFlagsid**
> \DBCDK\CommunityServices\Model\InlineResponse2001 flagExistsHeadFlagsid($id)

Check whether a model instance exists in the data source.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\FlagApi();
$id = "id_example"; // string | Model id

try {
    $result = $api_instance->flagExistsHeadFlagsid($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FlagApi->flagExistsHeadFlagsid: ', $e->getMessage(), PHP_EOL;
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

# **flagFind**
> \DBCDK\CommunityServices\Model\Flag[] flagFind($filter)

Find all instances of the model matched by filter from the data source.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\FlagApi();
$filter = "filter_example"; // string | Filter defining fields, where, include, order, offset, and limit

try {
    $result = $api_instance->flagFind($filter);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FlagApi->flagFind: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **filter** | **string**| Filter defining fields, where, include, order, offset, and limit | [optional]

### Return type

[**\DBCDK\CommunityServices\Model\Flag[]**](../Model/Flag.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **flagFindById**
> \DBCDK\CommunityServices\Model\Flag flagFindById($id, $filter)

Find a model instance by id from the data source.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\FlagApi();
$id = "id_example"; // string | Model id
$filter = "filter_example"; // string | Filter defining fields and include

try {
    $result = $api_instance->flagFindById($id, $filter);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FlagApi->flagFindById: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| Model id |
 **filter** | **string**| Filter defining fields and include | [optional]

### Return type

[**\DBCDK\CommunityServices\Model\Flag**](../Model/Flag.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **flagFindOne**
> \DBCDK\CommunityServices\Model\Flag flagFindOne($filter)

Find first instance of the model matched by filter from the data source.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\FlagApi();
$filter = "filter_example"; // string | Filter defining fields, where, include, order, offset, and limit

try {
    $result = $api_instance->flagFindOne($filter);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FlagApi->flagFindOne: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **filter** | **string**| Filter defining fields, where, include, order, offset, and limit | [optional]

### Return type

[**\DBCDK\CommunityServices\Model\Flag**](../Model/Flag.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **flagPrototypeCreateComments**
> \DBCDK\CommunityServices\Model\Comment flagPrototypeCreateComments($id, $data)

Creates a new instance in comments of this model.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\FlagApi();
$id = "id_example"; // string | PersistedModel id
$data = new \DBCDK\CommunityServices\Model\Comment(); // \DBCDK\CommunityServices\Model\Comment | 

try {
    $result = $api_instance->flagPrototypeCreateComments($id, $data);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FlagApi->flagPrototypeCreateComments: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| PersistedModel id |
 **data** | [**\DBCDK\CommunityServices\Model\Comment**](../Model/\DBCDK\CommunityServices\Model\Comment.md)|  | [optional]

### Return type

[**\DBCDK\CommunityServices\Model\Comment**](../Model/Comment.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **flagPrototypeCreateGroups**
> \DBCDK\CommunityServices\Model\Group flagPrototypeCreateGroups($id, $data)

Creates a new instance in groups of this model.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\FlagApi();
$id = "id_example"; // string | PersistedModel id
$data = new \DBCDK\CommunityServices\Model\Group(); // \DBCDK\CommunityServices\Model\Group | 

try {
    $result = $api_instance->flagPrototypeCreateGroups($id, $data);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FlagApi->flagPrototypeCreateGroups: ', $e->getMessage(), PHP_EOL;
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

# **flagPrototypeCreatePosts**
> \DBCDK\CommunityServices\Model\Post flagPrototypeCreatePosts($id, $data)

Creates a new instance in posts of this model.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\FlagApi();
$id = "id_example"; // string | PersistedModel id
$data = new \DBCDK\CommunityServices\Model\Post(); // \DBCDK\CommunityServices\Model\Post | 

try {
    $result = $api_instance->flagPrototypeCreatePosts($id, $data);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FlagApi->flagPrototypeCreatePosts: ', $e->getMessage(), PHP_EOL;
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

# **flagPrototypeCreateReviews**
> \DBCDK\CommunityServices\Model\Review flagPrototypeCreateReviews($id, $data)

Creates a new instance in reviews of this model.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\FlagApi();
$id = "id_example"; // string | PersistedModel id
$data = new \DBCDK\CommunityServices\Model\Review(); // \DBCDK\CommunityServices\Model\Review | 

try {
    $result = $api_instance->flagPrototypeCreateReviews($id, $data);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FlagApi->flagPrototypeCreateReviews: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| PersistedModel id |
 **data** | [**\DBCDK\CommunityServices\Model\Review**](../Model/\DBCDK\CommunityServices\Model\Review.md)|  | [optional]

### Return type

[**\DBCDK\CommunityServices\Model\Review**](../Model/Review.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **flagPrototypeDestroyComments**
> flagPrototypeDestroyComments($id)

Deletes comments of this model.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\FlagApi();
$id = "id_example"; // string | PersistedModel id

try {
    $api_instance->flagPrototypeDestroyComments($id);
} catch (Exception $e) {
    echo 'Exception when calling FlagApi->flagPrototypeDestroyComments: ', $e->getMessage(), PHP_EOL;
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

# **flagPrototypeDestroyGroups**
> flagPrototypeDestroyGroups($id)

Deletes groups of this model.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\FlagApi();
$id = "id_example"; // string | PersistedModel id

try {
    $api_instance->flagPrototypeDestroyGroups($id);
} catch (Exception $e) {
    echo 'Exception when calling FlagApi->flagPrototypeDestroyGroups: ', $e->getMessage(), PHP_EOL;
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

# **flagPrototypeDestroyPosts**
> flagPrototypeDestroyPosts($id)

Deletes posts of this model.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\FlagApi();
$id = "id_example"; // string | PersistedModel id

try {
    $api_instance->flagPrototypeDestroyPosts($id);
} catch (Exception $e) {
    echo 'Exception when calling FlagApi->flagPrototypeDestroyPosts: ', $e->getMessage(), PHP_EOL;
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

# **flagPrototypeDestroyReviews**
> flagPrototypeDestroyReviews($id)

Deletes reviews of this model.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\FlagApi();
$id = "id_example"; // string | PersistedModel id

try {
    $api_instance->flagPrototypeDestroyReviews($id);
} catch (Exception $e) {
    echo 'Exception when calling FlagApi->flagPrototypeDestroyReviews: ', $e->getMessage(), PHP_EOL;
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

# **flagPrototypeGetComments**
> \DBCDK\CommunityServices\Model\Comment flagPrototypeGetComments($id, $refresh)

Fetches hasOne relation comments.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\FlagApi();
$id = "id_example"; // string | PersistedModel id
$refresh = true; // bool | 

try {
    $result = $api_instance->flagPrototypeGetComments($id, $refresh);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FlagApi->flagPrototypeGetComments: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| PersistedModel id |
 **refresh** | **bool**|  | [optional]

### Return type

[**\DBCDK\CommunityServices\Model\Comment**](../Model/Comment.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **flagPrototypeGetGroups**
> \DBCDK\CommunityServices\Model\Group flagPrototypeGetGroups($id, $refresh)

Fetches hasOne relation groups.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\FlagApi();
$id = "id_example"; // string | PersistedModel id
$refresh = true; // bool | 

try {
    $result = $api_instance->flagPrototypeGetGroups($id, $refresh);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FlagApi->flagPrototypeGetGroups: ', $e->getMessage(), PHP_EOL;
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

# **flagPrototypeGetOwner**
> \DBCDK\CommunityServices\Model\Profile flagPrototypeGetOwner($id, $refresh)

Fetches belongsTo relation owner.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\FlagApi();
$id = "id_example"; // string | PersistedModel id
$refresh = true; // bool | 

try {
    $result = $api_instance->flagPrototypeGetOwner($id, $refresh);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FlagApi->flagPrototypeGetOwner: ', $e->getMessage(), PHP_EOL;
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

# **flagPrototypeGetPosts**
> \DBCDK\CommunityServices\Model\Post flagPrototypeGetPosts($id, $refresh)

Fetches hasOne relation posts.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\FlagApi();
$id = "id_example"; // string | PersistedModel id
$refresh = true; // bool | 

try {
    $result = $api_instance->flagPrototypeGetPosts($id, $refresh);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FlagApi->flagPrototypeGetPosts: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| PersistedModel id |
 **refresh** | **bool**|  | [optional]

### Return type

[**\DBCDK\CommunityServices\Model\Post**](../Model/Post.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **flagPrototypeGetReviews**
> \DBCDK\CommunityServices\Model\Review flagPrototypeGetReviews($id, $refresh)

Fetches hasOne relation reviews.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\FlagApi();
$id = "id_example"; // string | PersistedModel id
$refresh = true; // bool | 

try {
    $result = $api_instance->flagPrototypeGetReviews($id, $refresh);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FlagApi->flagPrototypeGetReviews: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| PersistedModel id |
 **refresh** | **bool**|  | [optional]

### Return type

[**\DBCDK\CommunityServices\Model\Review**](../Model/Review.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **flagPrototypeUpdateAttributes**
> \DBCDK\CommunityServices\Model\Flag flagPrototypeUpdateAttributes($id, $data)

Update attributes for a model instance and persist it into the data source.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\FlagApi();
$id = "id_example"; // string | PersistedModel id
$data = new \DBCDK\CommunityServices\Model\Flag(); // \DBCDK\CommunityServices\Model\Flag | An object of model property name/value pairs

try {
    $result = $api_instance->flagPrototypeUpdateAttributes($id, $data);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FlagApi->flagPrototypeUpdateAttributes: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| PersistedModel id |
 **data** | [**\DBCDK\CommunityServices\Model\Flag**](../Model/\DBCDK\CommunityServices\Model\Flag.md)| An object of model property name/value pairs | [optional]

### Return type

[**\DBCDK\CommunityServices\Model\Flag**](../Model/Flag.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **flagPrototypeUpdateComments**
> \DBCDK\CommunityServices\Model\Comment flagPrototypeUpdateComments($id, $data)

Update comments of this model.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\FlagApi();
$id = "id_example"; // string | PersistedModel id
$data = new \DBCDK\CommunityServices\Model\Comment(); // \DBCDK\CommunityServices\Model\Comment | 

try {
    $result = $api_instance->flagPrototypeUpdateComments($id, $data);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FlagApi->flagPrototypeUpdateComments: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| PersistedModel id |
 **data** | [**\DBCDK\CommunityServices\Model\Comment**](../Model/\DBCDK\CommunityServices\Model\Comment.md)|  | [optional]

### Return type

[**\DBCDK\CommunityServices\Model\Comment**](../Model/Comment.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **flagPrototypeUpdateGroups**
> \DBCDK\CommunityServices\Model\Group flagPrototypeUpdateGroups($id, $data)

Update groups of this model.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\FlagApi();
$id = "id_example"; // string | PersistedModel id
$data = new \DBCDK\CommunityServices\Model\Group(); // \DBCDK\CommunityServices\Model\Group | 

try {
    $result = $api_instance->flagPrototypeUpdateGroups($id, $data);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FlagApi->flagPrototypeUpdateGroups: ', $e->getMessage(), PHP_EOL;
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

# **flagPrototypeUpdatePosts**
> \DBCDK\CommunityServices\Model\Post flagPrototypeUpdatePosts($id, $data)

Update posts of this model.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\FlagApi();
$id = "id_example"; // string | PersistedModel id
$data = new \DBCDK\CommunityServices\Model\Post(); // \DBCDK\CommunityServices\Model\Post | 

try {
    $result = $api_instance->flagPrototypeUpdatePosts($id, $data);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FlagApi->flagPrototypeUpdatePosts: ', $e->getMessage(), PHP_EOL;
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

# **flagPrototypeUpdateReviews**
> \DBCDK\CommunityServices\Model\Review flagPrototypeUpdateReviews($id, $data)

Update reviews of this model.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\FlagApi();
$id = "id_example"; // string | PersistedModel id
$data = new \DBCDK\CommunityServices\Model\Review(); // \DBCDK\CommunityServices\Model\Review | 

try {
    $result = $api_instance->flagPrototypeUpdateReviews($id, $data);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FlagApi->flagPrototypeUpdateReviews: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| PersistedModel id |
 **data** | [**\DBCDK\CommunityServices\Model\Review**](../Model/\DBCDK\CommunityServices\Model\Review.md)|  | [optional]

### Return type

[**\DBCDK\CommunityServices\Model\Review**](../Model/Review.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **flagUpdateAll**
> object flagUpdateAll($where, $data)

Update instances of the model matched by where from the data source.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\FlagApi();
$where = "where_example"; // string | Criteria to match model instances
$data = new \DBCDK\CommunityServices\Model\Flag(); // \DBCDK\CommunityServices\Model\Flag | An object of model property name/value pairs

try {
    $result = $api_instance->flagUpdateAll($where, $data);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FlagApi->flagUpdateAll: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **where** | **string**| Criteria to match model instances | [optional]
 **data** | [**\DBCDK\CommunityServices\Model\Flag**](../Model/\DBCDK\CommunityServices\Model\Flag.md)| An object of model property name/value pairs | [optional]

### Return type

**object**

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **flagUpsert**
> \DBCDK\CommunityServices\Model\Flag flagUpsert($data)

Update an existing model instance or insert a new one into the data source.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\FlagApi();
$data = new \DBCDK\CommunityServices\Model\Flag(); // \DBCDK\CommunityServices\Model\Flag | Model instance data

try {
    $result = $api_instance->flagUpsert($data);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FlagApi->flagUpsert: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **data** | [**\DBCDK\CommunityServices\Model\Flag**](../Model/\DBCDK\CommunityServices\Model\Flag.md)| Model instance data | [optional]

### Return type

[**\DBCDK\CommunityServices\Model\Flag**](../Model/Flag.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

