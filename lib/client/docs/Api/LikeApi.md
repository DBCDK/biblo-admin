# DBCDK\CommunityServices\LikeApi

All URIs are relative to *https://localhost/api*

Method | HTTP request | Description
------------- | ------------- | -------------
[**likeCount**](LikeApi.md#likeCount) | **GET** /Likes/count | Count instances of the model matched by where from the data source.
[**likeCreate**](LikeApi.md#likeCreate) | **POST** /Likes | Create a new instance of the model and persist it into the data source.
[**likeCreateChangeStreamGetLikesChangeStream**](LikeApi.md#likeCreateChangeStreamGetLikesChangeStream) | **GET** /Likes/change-stream | Create a change stream.
[**likeCreateChangeStreamPostLikesChangeStream**](LikeApi.md#likeCreateChangeStreamPostLikesChangeStream) | **POST** /Likes/change-stream | Create a change stream.
[**likeDeleteById**](LikeApi.md#likeDeleteById) | **DELETE** /Likes/{id} | Delete a model instance by id from the data source.
[**likeExistsGetLikesidExists**](LikeApi.md#likeExistsGetLikesidExists) | **GET** /Likes/{id}/exists | Check whether a model instance exists in the data source.
[**likeExistsHeadLikesid**](LikeApi.md#likeExistsHeadLikesid) | **HEAD** /Likes/{id} | Check whether a model instance exists in the data source.
[**likeFind**](LikeApi.md#likeFind) | **GET** /Likes | Find all instances of the model matched by filter from the data source.
[**likeFindById**](LikeApi.md#likeFindById) | **GET** /Likes/{id} | Find a model instance by id from the data source.
[**likeFindOne**](LikeApi.md#likeFindOne) | **GET** /Likes/findOne | Find first instance of the model matched by filter from the data source.
[**likePrototypeGetPost**](LikeApi.md#likePrototypeGetPost) | **GET** /Likes/{id}/post | Fetches belongsTo relation post.
[**likePrototypeGetReview**](LikeApi.md#likePrototypeGetReview) | **GET** /Likes/{id}/review | Fetches belongsTo relation review.
[**likePrototypeUpdateAttributes**](LikeApi.md#likePrototypeUpdateAttributes) | **PUT** /Likes/{id} | Update attributes for a model instance and persist it into the data source.
[**likeSearch**](LikeApi.md#likeSearch) | **GET** /Likes/search | Searches via elastic search
[**likeSuggest**](LikeApi.md#likeSuggest) | **GET** /Likes/suggest | Suggestions via elastic search
[**likeUpdateAll**](LikeApi.md#likeUpdateAll) | **POST** /Likes/update | Update instances of the model matched by where from the data source.
[**likeUpsert**](LikeApi.md#likeUpsert) | **PUT** /Likes | Update an existing model instance or insert a new one into the data source.


# **likeCount**
> \DBCDK\CommunityServices\Model\InlineResponse200 likeCount($where)

Count instances of the model matched by where from the data source.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\LikeApi();
$where = "where_example"; // string | Criteria to match model instances

try {
    $result = $api_instance->likeCount($where);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling LikeApi->likeCount: ', $e->getMessage(), PHP_EOL;
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

# **likeCreate**
> \DBCDK\CommunityServices\Model\Like likeCreate($data)

Create a new instance of the model and persist it into the data source.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\LikeApi();
$data = new \DBCDK\CommunityServices\Model\Like(); // \DBCDK\CommunityServices\Model\Like | Model instance data

try {
    $result = $api_instance->likeCreate($data);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling LikeApi->likeCreate: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **data** | [**\DBCDK\CommunityServices\Model\Like**](../Model/\DBCDK\CommunityServices\Model\Like.md)| Model instance data | [optional]

### Return type

[**\DBCDK\CommunityServices\Model\Like**](../Model/Like.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **likeCreateChangeStreamGetLikesChangeStream**
> \SplFileObject likeCreateChangeStreamGetLikesChangeStream($options)

Create a change stream.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\LikeApi();
$options = "options_example"; // string | 

try {
    $result = $api_instance->likeCreateChangeStreamGetLikesChangeStream($options);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling LikeApi->likeCreateChangeStreamGetLikesChangeStream: ', $e->getMessage(), PHP_EOL;
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

# **likeCreateChangeStreamPostLikesChangeStream**
> \SplFileObject likeCreateChangeStreamPostLikesChangeStream($options)

Create a change stream.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\LikeApi();
$options = "options_example"; // string | 

try {
    $result = $api_instance->likeCreateChangeStreamPostLikesChangeStream($options);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling LikeApi->likeCreateChangeStreamPostLikesChangeStream: ', $e->getMessage(), PHP_EOL;
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

# **likeDeleteById**
> object likeDeleteById($id)

Delete a model instance by id from the data source.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\LikeApi();
$id = "id_example"; // string | Model id

try {
    $result = $api_instance->likeDeleteById($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling LikeApi->likeDeleteById: ', $e->getMessage(), PHP_EOL;
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

# **likeExistsGetLikesidExists**
> \DBCDK\CommunityServices\Model\InlineResponse2001 likeExistsGetLikesidExists($id)

Check whether a model instance exists in the data source.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\LikeApi();
$id = "id_example"; // string | Model id

try {
    $result = $api_instance->likeExistsGetLikesidExists($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling LikeApi->likeExistsGetLikesidExists: ', $e->getMessage(), PHP_EOL;
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

# **likeExistsHeadLikesid**
> \DBCDK\CommunityServices\Model\InlineResponse2001 likeExistsHeadLikesid($id)

Check whether a model instance exists in the data source.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\LikeApi();
$id = "id_example"; // string | Model id

try {
    $result = $api_instance->likeExistsHeadLikesid($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling LikeApi->likeExistsHeadLikesid: ', $e->getMessage(), PHP_EOL;
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

# **likeFind**
> \DBCDK\CommunityServices\Model\Like[] likeFind($filter)

Find all instances of the model matched by filter from the data source.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\LikeApi();
$filter = "filter_example"; // string | Filter defining fields, where, include, order, offset, and limit

try {
    $result = $api_instance->likeFind($filter);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling LikeApi->likeFind: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **filter** | **string**| Filter defining fields, where, include, order, offset, and limit | [optional]

### Return type

[**\DBCDK\CommunityServices\Model\Like[]**](../Model/Like.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **likeFindById**
> \DBCDK\CommunityServices\Model\Like likeFindById($id, $filter)

Find a model instance by id from the data source.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\LikeApi();
$id = "id_example"; // string | Model id
$filter = "filter_example"; // string | Filter defining fields and include

try {
    $result = $api_instance->likeFindById($id, $filter);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling LikeApi->likeFindById: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| Model id |
 **filter** | **string**| Filter defining fields and include | [optional]

### Return type

[**\DBCDK\CommunityServices\Model\Like**](../Model/Like.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **likeFindOne**
> \DBCDK\CommunityServices\Model\Like likeFindOne($filter)

Find first instance of the model matched by filter from the data source.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\LikeApi();
$filter = "filter_example"; // string | Filter defining fields, where, include, order, offset, and limit

try {
    $result = $api_instance->likeFindOne($filter);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling LikeApi->likeFindOne: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **filter** | **string**| Filter defining fields, where, include, order, offset, and limit | [optional]

### Return type

[**\DBCDK\CommunityServices\Model\Like**](../Model/Like.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **likePrototypeGetPost**
> \DBCDK\CommunityServices\Model\Post likePrototypeGetPost($id, $refresh)

Fetches belongsTo relation post.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\LikeApi();
$id = "id_example"; // string | PersistedModel id
$refresh = true; // bool | 

try {
    $result = $api_instance->likePrototypeGetPost($id, $refresh);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling LikeApi->likePrototypeGetPost: ', $e->getMessage(), PHP_EOL;
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

# **likePrototypeGetReview**
> \DBCDK\CommunityServices\Model\Review likePrototypeGetReview($id, $refresh)

Fetches belongsTo relation review.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\LikeApi();
$id = "id_example"; // string | PersistedModel id
$refresh = true; // bool | 

try {
    $result = $api_instance->likePrototypeGetReview($id, $refresh);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling LikeApi->likePrototypeGetReview: ', $e->getMessage(), PHP_EOL;
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

# **likePrototypeUpdateAttributes**
> \DBCDK\CommunityServices\Model\Like likePrototypeUpdateAttributes($id, $data)

Update attributes for a model instance and persist it into the data source.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\LikeApi();
$id = "id_example"; // string | PersistedModel id
$data = new \DBCDK\CommunityServices\Model\Like(); // \DBCDK\CommunityServices\Model\Like | An object of model property name/value pairs

try {
    $result = $api_instance->likePrototypeUpdateAttributes($id, $data);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling LikeApi->likePrototypeUpdateAttributes: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| PersistedModel id |
 **data** | [**\DBCDK\CommunityServices\Model\Like**](../Model/\DBCDK\CommunityServices\Model\Like.md)| An object of model property name/value pairs | [optional]

### Return type

[**\DBCDK\CommunityServices\Model\Like**](../Model/Like.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **likeSearch**
> object likeSearch($q, $fields, $limit, $from)

Searches via elastic search

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\LikeApi();
$q = "q_example"; // string | URI search string
$fields = "fields_example"; // string | Array of string containing fields to match on. Defaults to all fields.
$limit = 1.2; // double | How many items to retrieve. Default: 15
$from = 1.2; // double | The starting index of hits to return. Default: 0

try {
    $result = $api_instance->likeSearch($q, $fields, $limit, $from);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling LikeApi->likeSearch: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **q** | **string**| URI search string |
 **fields** | **string**| Array of string containing fields to match on. Defaults to all fields. | [optional]
 **limit** | **double**| How many items to retrieve. Default: 15 | [optional]
 **from** | **double**| The starting index of hits to return. Default: 0 | [optional]

### Return type

**object**

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **likeSuggest**
> object likeSuggest($q)

Suggestions via elastic search

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\LikeApi();
$q = "q_example"; // string | String to suggest upon

try {
    $result = $api_instance->likeSuggest($q);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling LikeApi->likeSuggest: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **q** | **string**| String to suggest upon |

### Return type

**object**

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **likeUpdateAll**
> object likeUpdateAll($where, $data)

Update instances of the model matched by where from the data source.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\LikeApi();
$where = "where_example"; // string | Criteria to match model instances
$data = new \DBCDK\CommunityServices\Model\Like(); // \DBCDK\CommunityServices\Model\Like | An object of model property name/value pairs

try {
    $result = $api_instance->likeUpdateAll($where, $data);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling LikeApi->likeUpdateAll: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **where** | **string**| Criteria to match model instances | [optional]
 **data** | [**\DBCDK\CommunityServices\Model\Like**](../Model/\DBCDK\CommunityServices\Model\Like.md)| An object of model property name/value pairs | [optional]

### Return type

**object**

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **likeUpsert**
> \DBCDK\CommunityServices\Model\Like likeUpsert($data)

Update an existing model instance or insert a new one into the data source.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\LikeApi();
$data = new \DBCDK\CommunityServices\Model\Like(); // \DBCDK\CommunityServices\Model\Like | Model instance data

try {
    $result = $api_instance->likeUpsert($data);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling LikeApi->likeUpsert: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **data** | [**\DBCDK\CommunityServices\Model\Like**](../Model/\DBCDK\CommunityServices\Model\Like.md)| Model instance data | [optional]

### Return type

[**\DBCDK\CommunityServices\Model\Like**](../Model/Like.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

