# DBCDK\CommunityServices\PostApi

All URIs are relative to *https://localhost/api*

Method | HTTP request | Description
------------- | ------------- | -------------
[**postCount**](PostApi.md#postCount) | **GET** /Posts/count | Count instances of the model matched by where from the data source.
[**postCreate**](PostApi.md#postCreate) | **POST** /Posts | Create a new instance of the model and persist it into the data source.
[**postCreateChangeStreamGetPostsChangeStream**](PostApi.md#postCreateChangeStreamGetPostsChangeStream) | **GET** /Posts/change-stream | Create a change stream.
[**postCreateChangeStreamPostPostsChangeStream**](PostApi.md#postCreateChangeStreamPostPostsChangeStream) | **POST** /Posts/change-stream | Create a change stream.
[**postDeleteById**](PostApi.md#postDeleteById) | **DELETE** /Posts/{id} | Delete a model instance by id from the data source.
[**postExistsGetPostsidExists**](PostApi.md#postExistsGetPostsidExists) | **GET** /Posts/{id}/exists | Check whether a model instance exists in the data source.
[**postExistsHeadPostsid**](PostApi.md#postExistsHeadPostsid) | **HEAD** /Posts/{id} | Check whether a model instance exists in the data source.
[**postFind**](PostApi.md#postFind) | **GET** /Posts | Find all instances of the model matched by filter from the data source.
[**postFindById**](PostApi.md#postFindById) | **GET** /Posts/{id} | Find a model instance by id from the data source.
[**postFindOne**](PostApi.md#postFindOne) | **GET** /Posts/findOne | Find first instance of the model matched by filter from the data source.
[**postPrototypeCountComments**](PostApi.md#postPrototypeCountComments) | **GET** /Posts/{id}/comments/count | Counts comments of Post.
[**postPrototypeCountFlags**](PostApi.md#postPrototypeCountFlags) | **GET** /Posts/{id}/flags/count | Counts flags of Post.
[**postPrototypeCountLikes**](PostApi.md#postPrototypeCountLikes) | **GET** /Posts/{id}/likes/count | Counts likes of Post.
[**postPrototypeCreateComments**](PostApi.md#postPrototypeCreateComments) | **POST** /Posts/{id}/comments | Creates a new instance in comments of this model.
[**postPrototypeCreateFlags**](PostApi.md#postPrototypeCreateFlags) | **POST** /Posts/{id}/flags | Creates a new instance in flags of this model.
[**postPrototypeCreateImage**](PostApi.md#postPrototypeCreateImage) | **POST** /Posts/{id}/image | Creates a new instance in image of this model.
[**postPrototypeCreateLikes**](PostApi.md#postPrototypeCreateLikes) | **POST** /Posts/{id}/likes | Creates a new instance in likes of this model.
[**postPrototypeCreateVideo**](PostApi.md#postPrototypeCreateVideo) | **POST** /Posts/{id}/video | Creates a new instance in video of this model.
[**postPrototypeDeleteComments**](PostApi.md#postPrototypeDeleteComments) | **DELETE** /Posts/{id}/comments | Deletes all comments of this model.
[**postPrototypeDeleteFlags**](PostApi.md#postPrototypeDeleteFlags) | **DELETE** /Posts/{id}/flags | Deletes all flags of this model.
[**postPrototypeDeleteLikes**](PostApi.md#postPrototypeDeleteLikes) | **DELETE** /Posts/{id}/likes | Deletes all likes of this model.
[**postPrototypeDestroyByIdComments**](PostApi.md#postPrototypeDestroyByIdComments) | **DELETE** /Posts/{id}/comments/{fk} | Delete a related item by id for comments.
[**postPrototypeDestroyByIdFlags**](PostApi.md#postPrototypeDestroyByIdFlags) | **DELETE** /Posts/{id}/flags/{fk} | Delete a related item by id for flags.
[**postPrototypeDestroyByIdLikes**](PostApi.md#postPrototypeDestroyByIdLikes) | **DELETE** /Posts/{id}/likes/{fk} | Delete a related item by id for likes.
[**postPrototypeDestroyImage**](PostApi.md#postPrototypeDestroyImage) | **DELETE** /Posts/{id}/image | Deletes image of this model.
[**postPrototypeDestroyVideo**](PostApi.md#postPrototypeDestroyVideo) | **DELETE** /Posts/{id}/video | Deletes video of this model.
[**postPrototypeExistsLikes**](PostApi.md#postPrototypeExistsLikes) | **HEAD** /Posts/{id}/likes/rel/{fk} | Check the existence of likes relation to an item by id.
[**postPrototypeFindByIdComments**](PostApi.md#postPrototypeFindByIdComments) | **GET** /Posts/{id}/comments/{fk} | Find a related item by id for comments.
[**postPrototypeFindByIdFlags**](PostApi.md#postPrototypeFindByIdFlags) | **GET** /Posts/{id}/flags/{fk} | Find a related item by id for flags.
[**postPrototypeFindByIdLikes**](PostApi.md#postPrototypeFindByIdLikes) | **GET** /Posts/{id}/likes/{fk} | Find a related item by id for likes.
[**postPrototypeGetComments**](PostApi.md#postPrototypeGetComments) | **GET** /Posts/{id}/comments | Queries comments of Post.
[**postPrototypeGetFlags**](PostApi.md#postPrototypeGetFlags) | **GET** /Posts/{id}/flags | Queries flags of Post.
[**postPrototypeGetGroup**](PostApi.md#postPrototypeGetGroup) | **GET** /Posts/{id}/group | Fetches belongsTo relation group.
[**postPrototypeGetImage**](PostApi.md#postPrototypeGetImage) | **GET** /Posts/{id}/image | Fetches hasOne relation image.
[**postPrototypeGetLikes**](PostApi.md#postPrototypeGetLikes) | **GET** /Posts/{id}/likes | Queries likes of Post.
[**postPrototypeGetOwner**](PostApi.md#postPrototypeGetOwner) | **GET** /Posts/{id}/owner | Fetches belongsTo relation owner.
[**postPrototypeGetReview**](PostApi.md#postPrototypeGetReview) | **GET** /Posts/{id}/review | Fetches belongsTo relation review.
[**postPrototypeGetVideo**](PostApi.md#postPrototypeGetVideo) | **GET** /Posts/{id}/video | Fetches hasOne relation video.
[**postPrototypeLinkLikes**](PostApi.md#postPrototypeLinkLikes) | **PUT** /Posts/{id}/likes/rel/{fk} | Add a related item by id for likes.
[**postPrototypeUnlinkLikes**](PostApi.md#postPrototypeUnlinkLikes) | **DELETE** /Posts/{id}/likes/rel/{fk} | Remove the likes relation to an item by id.
[**postPrototypeUpdateAttributes**](PostApi.md#postPrototypeUpdateAttributes) | **PUT** /Posts/{id} | Update attributes for a model instance and persist it into the data source.
[**postPrototypeUpdateByIdComments**](PostApi.md#postPrototypeUpdateByIdComments) | **PUT** /Posts/{id}/comments/{fk} | Update a related item by id for comments.
[**postPrototypeUpdateByIdFlags**](PostApi.md#postPrototypeUpdateByIdFlags) | **PUT** /Posts/{id}/flags/{fk} | Update a related item by id for flags.
[**postPrototypeUpdateByIdLikes**](PostApi.md#postPrototypeUpdateByIdLikes) | **PUT** /Posts/{id}/likes/{fk} | Update a related item by id for likes.
[**postPrototypeUpdateImage**](PostApi.md#postPrototypeUpdateImage) | **PUT** /Posts/{id}/image | Update image of this model.
[**postPrototypeUpdateVideo**](PostApi.md#postPrototypeUpdateVideo) | **PUT** /Posts/{id}/video | Update video of this model.
[**postSearch**](PostApi.md#postSearch) | **GET** /Posts/search | Searches via elastic search
[**postSuggest**](PostApi.md#postSuggest) | **GET** /Posts/suggest | Suggestions via elastic search
[**postUpdateAll**](PostApi.md#postUpdateAll) | **POST** /Posts/update | Update instances of the model matched by where from the data source.
[**postUpsert**](PostApi.md#postUpsert) | **PUT** /Posts | Update an existing model instance or insert a new one into the data source.


# **postCount**
> \DBCDK\CommunityServices\Model\InlineResponse200 postCount($where)

Count instances of the model matched by where from the data source.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\PostApi();
$where = "where_example"; // string | Criteria to match model instances

try {
    $result = $api_instance->postCount($where);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PostApi->postCount: ', $e->getMessage(), PHP_EOL;
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

# **postCreate**
> \DBCDK\CommunityServices\Model\Post postCreate($data)

Create a new instance of the model and persist it into the data source.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\PostApi();
$data = new \DBCDK\CommunityServices\Model\Post(); // \DBCDK\CommunityServices\Model\Post | Model instance data

try {
    $result = $api_instance->postCreate($data);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PostApi->postCreate: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **data** | [**\DBCDK\CommunityServices\Model\Post**](../Model/\DBCDK\CommunityServices\Model\Post.md)| Model instance data | [optional]

### Return type

[**\DBCDK\CommunityServices\Model\Post**](../Model/Post.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **postCreateChangeStreamGetPostsChangeStream**
> \SplFileObject postCreateChangeStreamGetPostsChangeStream($options)

Create a change stream.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\PostApi();
$options = "options_example"; // string | 

try {
    $result = $api_instance->postCreateChangeStreamGetPostsChangeStream($options);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PostApi->postCreateChangeStreamGetPostsChangeStream: ', $e->getMessage(), PHP_EOL;
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

# **postCreateChangeStreamPostPostsChangeStream**
> \SplFileObject postCreateChangeStreamPostPostsChangeStream($options)

Create a change stream.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\PostApi();
$options = "options_example"; // string | 

try {
    $result = $api_instance->postCreateChangeStreamPostPostsChangeStream($options);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PostApi->postCreateChangeStreamPostPostsChangeStream: ', $e->getMessage(), PHP_EOL;
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

# **postDeleteById**
> object postDeleteById($id)

Delete a model instance by id from the data source.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\PostApi();
$id = "id_example"; // string | Model id

try {
    $result = $api_instance->postDeleteById($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PostApi->postDeleteById: ', $e->getMessage(), PHP_EOL;
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

# **postExistsGetPostsidExists**
> \DBCDK\CommunityServices\Model\InlineResponse2001 postExistsGetPostsidExists($id)

Check whether a model instance exists in the data source.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\PostApi();
$id = "id_example"; // string | Model id

try {
    $result = $api_instance->postExistsGetPostsidExists($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PostApi->postExistsGetPostsidExists: ', $e->getMessage(), PHP_EOL;
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

# **postExistsHeadPostsid**
> \DBCDK\CommunityServices\Model\InlineResponse2001 postExistsHeadPostsid($id)

Check whether a model instance exists in the data source.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\PostApi();
$id = "id_example"; // string | Model id

try {
    $result = $api_instance->postExistsHeadPostsid($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PostApi->postExistsHeadPostsid: ', $e->getMessage(), PHP_EOL;
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

# **postFind**
> \DBCDK\CommunityServices\Model\Post[] postFind($filter)

Find all instances of the model matched by filter from the data source.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\PostApi();
$filter = "filter_example"; // string | Filter defining fields, where, include, order, offset, and limit

try {
    $result = $api_instance->postFind($filter);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PostApi->postFind: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **filter** | **string**| Filter defining fields, where, include, order, offset, and limit | [optional]

### Return type

[**\DBCDK\CommunityServices\Model\Post[]**](../Model/Post.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **postFindById**
> \DBCDK\CommunityServices\Model\Post postFindById($id, $filter)

Find a model instance by id from the data source.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\PostApi();
$id = "id_example"; // string | Model id
$filter = "filter_example"; // string | Filter defining fields and include

try {
    $result = $api_instance->postFindById($id, $filter);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PostApi->postFindById: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| Model id |
 **filter** | **string**| Filter defining fields and include | [optional]

### Return type

[**\DBCDK\CommunityServices\Model\Post**](../Model/Post.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **postFindOne**
> \DBCDK\CommunityServices\Model\Post postFindOne($filter)

Find first instance of the model matched by filter from the data source.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\PostApi();
$filter = "filter_example"; // string | Filter defining fields, where, include, order, offset, and limit

try {
    $result = $api_instance->postFindOne($filter);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PostApi->postFindOne: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **filter** | **string**| Filter defining fields, where, include, order, offset, and limit | [optional]

### Return type

[**\DBCDK\CommunityServices\Model\Post**](../Model/Post.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **postPrototypeCountComments**
> \DBCDK\CommunityServices\Model\InlineResponse200 postPrototypeCountComments($id, $where)

Counts comments of Post.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\PostApi();
$id = "id_example"; // string | PersistedModel id
$where = "where_example"; // string | Criteria to match model instances

try {
    $result = $api_instance->postPrototypeCountComments($id, $where);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PostApi->postPrototypeCountComments: ', $e->getMessage(), PHP_EOL;
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

# **postPrototypeCountFlags**
> \DBCDK\CommunityServices\Model\InlineResponse200 postPrototypeCountFlags($id, $where)

Counts flags of Post.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\PostApi();
$id = "id_example"; // string | PersistedModel id
$where = "where_example"; // string | Criteria to match model instances

try {
    $result = $api_instance->postPrototypeCountFlags($id, $where);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PostApi->postPrototypeCountFlags: ', $e->getMessage(), PHP_EOL;
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

# **postPrototypeCountLikes**
> \DBCDK\CommunityServices\Model\InlineResponse200 postPrototypeCountLikes($id, $where)

Counts likes of Post.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\PostApi();
$id = "id_example"; // string | PersistedModel id
$where = "where_example"; // string | Criteria to match model instances

try {
    $result = $api_instance->postPrototypeCountLikes($id, $where);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PostApi->postPrototypeCountLikes: ', $e->getMessage(), PHP_EOL;
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

# **postPrototypeCreateComments**
> \DBCDK\CommunityServices\Model\Comment postPrototypeCreateComments($id, $data)

Creates a new instance in comments of this model.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\PostApi();
$id = "id_example"; // string | PersistedModel id
$data = new \DBCDK\CommunityServices\Model\Comment(); // \DBCDK\CommunityServices\Model\Comment | 

try {
    $result = $api_instance->postPrototypeCreateComments($id, $data);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PostApi->postPrototypeCreateComments: ', $e->getMessage(), PHP_EOL;
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

# **postPrototypeCreateFlags**
> \DBCDK\CommunityServices\Model\Flag postPrototypeCreateFlags($id, $data)

Creates a new instance in flags of this model.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\PostApi();
$id = "id_example"; // string | PersistedModel id
$data = new \DBCDK\CommunityServices\Model\Flag(); // \DBCDK\CommunityServices\Model\Flag | 

try {
    $result = $api_instance->postPrototypeCreateFlags($id, $data);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PostApi->postPrototypeCreateFlags: ', $e->getMessage(), PHP_EOL;
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

# **postPrototypeCreateImage**
> \DBCDK\CommunityServices\Model\ImageCollection postPrototypeCreateImage($id, $data)

Creates a new instance in image of this model.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\PostApi();
$id = "id_example"; // string | PersistedModel id
$data = new \DBCDK\CommunityServices\Model\ImageCollection(); // \DBCDK\CommunityServices\Model\ImageCollection | 

try {
    $result = $api_instance->postPrototypeCreateImage($id, $data);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PostApi->postPrototypeCreateImage: ', $e->getMessage(), PHP_EOL;
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

# **postPrototypeCreateLikes**
> \DBCDK\CommunityServices\Model\Like postPrototypeCreateLikes($id, $data)

Creates a new instance in likes of this model.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\PostApi();
$id = "id_example"; // string | PersistedModel id
$data = new \DBCDK\CommunityServices\Model\Like(); // \DBCDK\CommunityServices\Model\Like | 

try {
    $result = $api_instance->postPrototypeCreateLikes($id, $data);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PostApi->postPrototypeCreateLikes: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| PersistedModel id |
 **data** | [**\DBCDK\CommunityServices\Model\Like**](../Model/\DBCDK\CommunityServices\Model\Like.md)|  | [optional]

### Return type

[**\DBCDK\CommunityServices\Model\Like**](../Model/Like.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **postPrototypeCreateVideo**
> \DBCDK\CommunityServices\Model\VideoCollection postPrototypeCreateVideo($id, $data)

Creates a new instance in video of this model.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\PostApi();
$id = "id_example"; // string | PersistedModel id
$data = new \DBCDK\CommunityServices\Model\VideoCollection(); // \DBCDK\CommunityServices\Model\VideoCollection | 

try {
    $result = $api_instance->postPrototypeCreateVideo($id, $data);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PostApi->postPrototypeCreateVideo: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| PersistedModel id |
 **data** | [**\DBCDK\CommunityServices\Model\VideoCollection**](../Model/\DBCDK\CommunityServices\Model\VideoCollection.md)|  | [optional]

### Return type

[**\DBCDK\CommunityServices\Model\VideoCollection**](../Model/VideoCollection.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **postPrototypeDeleteComments**
> postPrototypeDeleteComments($id)

Deletes all comments of this model.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\PostApi();
$id = "id_example"; // string | PersistedModel id

try {
    $api_instance->postPrototypeDeleteComments($id);
} catch (Exception $e) {
    echo 'Exception when calling PostApi->postPrototypeDeleteComments: ', $e->getMessage(), PHP_EOL;
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

# **postPrototypeDeleteFlags**
> postPrototypeDeleteFlags($id)

Deletes all flags of this model.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\PostApi();
$id = "id_example"; // string | PersistedModel id

try {
    $api_instance->postPrototypeDeleteFlags($id);
} catch (Exception $e) {
    echo 'Exception when calling PostApi->postPrototypeDeleteFlags: ', $e->getMessage(), PHP_EOL;
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

# **postPrototypeDeleteLikes**
> postPrototypeDeleteLikes($id)

Deletes all likes of this model.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\PostApi();
$id = "id_example"; // string | PersistedModel id

try {
    $api_instance->postPrototypeDeleteLikes($id);
} catch (Exception $e) {
    echo 'Exception when calling PostApi->postPrototypeDeleteLikes: ', $e->getMessage(), PHP_EOL;
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

# **postPrototypeDestroyByIdComments**
> postPrototypeDestroyByIdComments($fk, $id)

Delete a related item by id for comments.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\PostApi();
$fk = "fk_example"; // string | Foreign key for comments
$id = "id_example"; // string | PersistedModel id

try {
    $api_instance->postPrototypeDestroyByIdComments($fk, $id);
} catch (Exception $e) {
    echo 'Exception when calling PostApi->postPrototypeDestroyByIdComments: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **fk** | **string**| Foreign key for comments |
 **id** | **string**| PersistedModel id |

### Return type

void (empty response body)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **postPrototypeDestroyByIdFlags**
> postPrototypeDestroyByIdFlags($fk, $id)

Delete a related item by id for flags.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\PostApi();
$fk = "fk_example"; // string | Foreign key for flags
$id = "id_example"; // string | PersistedModel id

try {
    $api_instance->postPrototypeDestroyByIdFlags($fk, $id);
} catch (Exception $e) {
    echo 'Exception when calling PostApi->postPrototypeDestroyByIdFlags: ', $e->getMessage(), PHP_EOL;
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

# **postPrototypeDestroyByIdLikes**
> postPrototypeDestroyByIdLikes($fk, $id)

Delete a related item by id for likes.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\PostApi();
$fk = "fk_example"; // string | Foreign key for likes
$id = "id_example"; // string | PersistedModel id

try {
    $api_instance->postPrototypeDestroyByIdLikes($fk, $id);
} catch (Exception $e) {
    echo 'Exception when calling PostApi->postPrototypeDestroyByIdLikes: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **fk** | **string**| Foreign key for likes |
 **id** | **string**| PersistedModel id |

### Return type

void (empty response body)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **postPrototypeDestroyImage**
> postPrototypeDestroyImage($id)

Deletes image of this model.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\PostApi();
$id = "id_example"; // string | PersistedModel id

try {
    $api_instance->postPrototypeDestroyImage($id);
} catch (Exception $e) {
    echo 'Exception when calling PostApi->postPrototypeDestroyImage: ', $e->getMessage(), PHP_EOL;
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

# **postPrototypeDestroyVideo**
> postPrototypeDestroyVideo($id)

Deletes video of this model.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\PostApi();
$id = "id_example"; // string | PersistedModel id

try {
    $api_instance->postPrototypeDestroyVideo($id);
} catch (Exception $e) {
    echo 'Exception when calling PostApi->postPrototypeDestroyVideo: ', $e->getMessage(), PHP_EOL;
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

# **postPrototypeExistsLikes**
> bool postPrototypeExistsLikes($fk, $id)

Check the existence of likes relation to an item by id.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\PostApi();
$fk = "fk_example"; // string | Foreign key for likes
$id = "id_example"; // string | PersistedModel id

try {
    $result = $api_instance->postPrototypeExistsLikes($fk, $id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PostApi->postPrototypeExistsLikes: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **fk** | **string**| Foreign key for likes |
 **id** | **string**| PersistedModel id |

### Return type

**bool**

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **postPrototypeFindByIdComments**
> \DBCDK\CommunityServices\Model\Comment postPrototypeFindByIdComments($fk, $id)

Find a related item by id for comments.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\PostApi();
$fk = "fk_example"; // string | Foreign key for comments
$id = "id_example"; // string | PersistedModel id

try {
    $result = $api_instance->postPrototypeFindByIdComments($fk, $id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PostApi->postPrototypeFindByIdComments: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **fk** | **string**| Foreign key for comments |
 **id** | **string**| PersistedModel id |

### Return type

[**\DBCDK\CommunityServices\Model\Comment**](../Model/Comment.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **postPrototypeFindByIdFlags**
> \DBCDK\CommunityServices\Model\Flag postPrototypeFindByIdFlags($fk, $id)

Find a related item by id for flags.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\PostApi();
$fk = "fk_example"; // string | Foreign key for flags
$id = "id_example"; // string | PersistedModel id

try {
    $result = $api_instance->postPrototypeFindByIdFlags($fk, $id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PostApi->postPrototypeFindByIdFlags: ', $e->getMessage(), PHP_EOL;
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

# **postPrototypeFindByIdLikes**
> \DBCDK\CommunityServices\Model\Like postPrototypeFindByIdLikes($fk, $id)

Find a related item by id for likes.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\PostApi();
$fk = "fk_example"; // string | Foreign key for likes
$id = "id_example"; // string | PersistedModel id

try {
    $result = $api_instance->postPrototypeFindByIdLikes($fk, $id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PostApi->postPrototypeFindByIdLikes: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **fk** | **string**| Foreign key for likes |
 **id** | **string**| PersistedModel id |

### Return type

[**\DBCDK\CommunityServices\Model\Like**](../Model/Like.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **postPrototypeGetComments**
> \DBCDK\CommunityServices\Model\Comment[] postPrototypeGetComments($id, $filter)

Queries comments of Post.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\PostApi();
$id = "id_example"; // string | PersistedModel id
$filter = "filter_example"; // string | 

try {
    $result = $api_instance->postPrototypeGetComments($id, $filter);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PostApi->postPrototypeGetComments: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| PersistedModel id |
 **filter** | **string**|  | [optional]

### Return type

[**\DBCDK\CommunityServices\Model\Comment[]**](../Model/Comment.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **postPrototypeGetFlags**
> \DBCDK\CommunityServices\Model\Flag[] postPrototypeGetFlags($id, $filter)

Queries flags of Post.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\PostApi();
$id = "id_example"; // string | PersistedModel id
$filter = "filter_example"; // string | 

try {
    $result = $api_instance->postPrototypeGetFlags($id, $filter);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PostApi->postPrototypeGetFlags: ', $e->getMessage(), PHP_EOL;
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

# **postPrototypeGetGroup**
> \DBCDK\CommunityServices\Model\Group postPrototypeGetGroup($id, $refresh)

Fetches belongsTo relation group.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\PostApi();
$id = "id_example"; // string | PersistedModel id
$refresh = true; // bool | 

try {
    $result = $api_instance->postPrototypeGetGroup($id, $refresh);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PostApi->postPrototypeGetGroup: ', $e->getMessage(), PHP_EOL;
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

# **postPrototypeGetImage**
> \DBCDK\CommunityServices\Model\ImageCollection postPrototypeGetImage($id, $refresh)

Fetches hasOne relation image.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\PostApi();
$id = "id_example"; // string | PersistedModel id
$refresh = true; // bool | 

try {
    $result = $api_instance->postPrototypeGetImage($id, $refresh);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PostApi->postPrototypeGetImage: ', $e->getMessage(), PHP_EOL;
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

# **postPrototypeGetLikes**
> \DBCDK\CommunityServices\Model\Like[] postPrototypeGetLikes($id, $filter)

Queries likes of Post.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\PostApi();
$id = "id_example"; // string | PersistedModel id
$filter = "filter_example"; // string | 

try {
    $result = $api_instance->postPrototypeGetLikes($id, $filter);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PostApi->postPrototypeGetLikes: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| PersistedModel id |
 **filter** | **string**|  | [optional]

### Return type

[**\DBCDK\CommunityServices\Model\Like[]**](../Model/Like.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **postPrototypeGetOwner**
> \DBCDK\CommunityServices\Model\Profile postPrototypeGetOwner($id, $refresh)

Fetches belongsTo relation owner.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\PostApi();
$id = "id_example"; // string | PersistedModel id
$refresh = true; // bool | 

try {
    $result = $api_instance->postPrototypeGetOwner($id, $refresh);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PostApi->postPrototypeGetOwner: ', $e->getMessage(), PHP_EOL;
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

# **postPrototypeGetReview**
> \DBCDK\CommunityServices\Model\Review postPrototypeGetReview($id, $refresh)

Fetches belongsTo relation review.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\PostApi();
$id = "id_example"; // string | PersistedModel id
$refresh = true; // bool | 

try {
    $result = $api_instance->postPrototypeGetReview($id, $refresh);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PostApi->postPrototypeGetReview: ', $e->getMessage(), PHP_EOL;
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

# **postPrototypeGetVideo**
> \DBCDK\CommunityServices\Model\VideoCollection postPrototypeGetVideo($id, $refresh)

Fetches hasOne relation video.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\PostApi();
$id = "id_example"; // string | PersistedModel id
$refresh = true; // bool | 

try {
    $result = $api_instance->postPrototypeGetVideo($id, $refresh);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PostApi->postPrototypeGetVideo: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| PersistedModel id |
 **refresh** | **bool**|  | [optional]

### Return type

[**\DBCDK\CommunityServices\Model\VideoCollection**](../Model/VideoCollection.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **postPrototypeLinkLikes**
> \DBCDK\CommunityServices\Model\PostLike postPrototypeLinkLikes($fk, $id, $data)

Add a related item by id for likes.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\PostApi();
$fk = "fk_example"; // string | Foreign key for likes
$id = "id_example"; // string | PersistedModel id
$data = new \DBCDK\CommunityServices\Model\PostLike(); // \DBCDK\CommunityServices\Model\PostLike | 

try {
    $result = $api_instance->postPrototypeLinkLikes($fk, $id, $data);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PostApi->postPrototypeLinkLikes: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **fk** | **string**| Foreign key for likes |
 **id** | **string**| PersistedModel id |
 **data** | [**\DBCDK\CommunityServices\Model\PostLike**](../Model/\DBCDK\CommunityServices\Model\PostLike.md)|  | [optional]

### Return type

[**\DBCDK\CommunityServices\Model\PostLike**](../Model/PostLike.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **postPrototypeUnlinkLikes**
> postPrototypeUnlinkLikes($fk, $id)

Remove the likes relation to an item by id.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\PostApi();
$fk = "fk_example"; // string | Foreign key for likes
$id = "id_example"; // string | PersistedModel id

try {
    $api_instance->postPrototypeUnlinkLikes($fk, $id);
} catch (Exception $e) {
    echo 'Exception when calling PostApi->postPrototypeUnlinkLikes: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **fk** | **string**| Foreign key for likes |
 **id** | **string**| PersistedModel id |

### Return type

void (empty response body)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **postPrototypeUpdateAttributes**
> \DBCDK\CommunityServices\Model\Post postPrototypeUpdateAttributes($id, $data)

Update attributes for a model instance and persist it into the data source.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\PostApi();
$id = "id_example"; // string | PersistedModel id
$data = new \DBCDK\CommunityServices\Model\Post(); // \DBCDK\CommunityServices\Model\Post | An object of model property name/value pairs

try {
    $result = $api_instance->postPrototypeUpdateAttributes($id, $data);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PostApi->postPrototypeUpdateAttributes: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| PersistedModel id |
 **data** | [**\DBCDK\CommunityServices\Model\Post**](../Model/\DBCDK\CommunityServices\Model\Post.md)| An object of model property name/value pairs | [optional]

### Return type

[**\DBCDK\CommunityServices\Model\Post**](../Model/Post.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **postPrototypeUpdateByIdComments**
> \DBCDK\CommunityServices\Model\Comment postPrototypeUpdateByIdComments($fk, $id, $data)

Update a related item by id for comments.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\PostApi();
$fk = "fk_example"; // string | Foreign key for comments
$id = "id_example"; // string | PersistedModel id
$data = new \DBCDK\CommunityServices\Model\Comment(); // \DBCDK\CommunityServices\Model\Comment | 

try {
    $result = $api_instance->postPrototypeUpdateByIdComments($fk, $id, $data);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PostApi->postPrototypeUpdateByIdComments: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **fk** | **string**| Foreign key for comments |
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

# **postPrototypeUpdateByIdFlags**
> \DBCDK\CommunityServices\Model\Flag postPrototypeUpdateByIdFlags($fk, $id, $data)

Update a related item by id for flags.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\PostApi();
$fk = "fk_example"; // string | Foreign key for flags
$id = "id_example"; // string | PersistedModel id
$data = new \DBCDK\CommunityServices\Model\Flag(); // \DBCDK\CommunityServices\Model\Flag | 

try {
    $result = $api_instance->postPrototypeUpdateByIdFlags($fk, $id, $data);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PostApi->postPrototypeUpdateByIdFlags: ', $e->getMessage(), PHP_EOL;
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

# **postPrototypeUpdateByIdLikes**
> \DBCDK\CommunityServices\Model\Like postPrototypeUpdateByIdLikes($fk, $id, $data)

Update a related item by id for likes.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\PostApi();
$fk = "fk_example"; // string | Foreign key for likes
$id = "id_example"; // string | PersistedModel id
$data = new \DBCDK\CommunityServices\Model\Like(); // \DBCDK\CommunityServices\Model\Like | 

try {
    $result = $api_instance->postPrototypeUpdateByIdLikes($fk, $id, $data);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PostApi->postPrototypeUpdateByIdLikes: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **fk** | **string**| Foreign key for likes |
 **id** | **string**| PersistedModel id |
 **data** | [**\DBCDK\CommunityServices\Model\Like**](../Model/\DBCDK\CommunityServices\Model\Like.md)|  | [optional]

### Return type

[**\DBCDK\CommunityServices\Model\Like**](../Model/Like.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **postPrototypeUpdateImage**
> \DBCDK\CommunityServices\Model\ImageCollection postPrototypeUpdateImage($id, $data)

Update image of this model.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\PostApi();
$id = "id_example"; // string | PersistedModel id
$data = new \DBCDK\CommunityServices\Model\ImageCollection(); // \DBCDK\CommunityServices\Model\ImageCollection | 

try {
    $result = $api_instance->postPrototypeUpdateImage($id, $data);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PostApi->postPrototypeUpdateImage: ', $e->getMessage(), PHP_EOL;
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

# **postPrototypeUpdateVideo**
> \DBCDK\CommunityServices\Model\VideoCollection postPrototypeUpdateVideo($id, $data)

Update video of this model.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\PostApi();
$id = "id_example"; // string | PersistedModel id
$data = new \DBCDK\CommunityServices\Model\VideoCollection(); // \DBCDK\CommunityServices\Model\VideoCollection | 

try {
    $result = $api_instance->postPrototypeUpdateVideo($id, $data);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PostApi->postPrototypeUpdateVideo: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| PersistedModel id |
 **data** | [**\DBCDK\CommunityServices\Model\VideoCollection**](../Model/\DBCDK\CommunityServices\Model\VideoCollection.md)|  | [optional]

### Return type

[**\DBCDK\CommunityServices\Model\VideoCollection**](../Model/VideoCollection.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **postSearch**
> object postSearch($q, $fields, $limit, $from)

Searches via elastic search

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\PostApi();
$q = "q_example"; // string | URI search string
$fields = "fields_example"; // string | Array of string containing fields to match on. Defaults to all fields.
$limit = 1.2; // double | How many items to retrieve. Default: 15
$from = 1.2; // double | The starting index of hits to return. Default: 0

try {
    $result = $api_instance->postSearch($q, $fields, $limit, $from);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PostApi->postSearch: ', $e->getMessage(), PHP_EOL;
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

# **postSuggest**
> object postSuggest($q)

Suggestions via elastic search

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\PostApi();
$q = "q_example"; // string | String to suggest upon

try {
    $result = $api_instance->postSuggest($q);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PostApi->postSuggest: ', $e->getMessage(), PHP_EOL;
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

# **postUpdateAll**
> object postUpdateAll($where, $data)

Update instances of the model matched by where from the data source.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\PostApi();
$where = "where_example"; // string | Criteria to match model instances
$data = new \DBCDK\CommunityServices\Model\Post(); // \DBCDK\CommunityServices\Model\Post | An object of model property name/value pairs

try {
    $result = $api_instance->postUpdateAll($where, $data);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PostApi->postUpdateAll: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **where** | **string**| Criteria to match model instances | [optional]
 **data** | [**\DBCDK\CommunityServices\Model\Post**](../Model/\DBCDK\CommunityServices\Model\Post.md)| An object of model property name/value pairs | [optional]

### Return type

**object**

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **postUpsert**
> \DBCDK\CommunityServices\Model\Post postUpsert($data)

Update an existing model instance or insert a new one into the data source.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\PostApi();
$data = new \DBCDK\CommunityServices\Model\Post(); // \DBCDK\CommunityServices\Model\Post | Model instance data

try {
    $result = $api_instance->postUpsert($data);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PostApi->postUpsert: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **data** | [**\DBCDK\CommunityServices\Model\Post**](../Model/\DBCDK\CommunityServices\Model\Post.md)| Model instance data | [optional]

### Return type

[**\DBCDK\CommunityServices\Model\Post**](../Model/Post.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

