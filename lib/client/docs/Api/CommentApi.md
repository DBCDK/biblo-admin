# DBCDK\CommunityServices\CommentApi

All URIs are relative to *https://localhost/api*

Method | HTTP request | Description
------------- | ------------- | -------------
[**commentCount**](CommentApi.md#commentCount) | **GET** /Comments/count | Count instances of the model matched by where from the data source.
[**commentCreate**](CommentApi.md#commentCreate) | **POST** /Comments | Create a new instance of the model and persist it into the data source.
[**commentCreateChangeStreamGetCommentsChangeStream**](CommentApi.md#commentCreateChangeStreamGetCommentsChangeStream) | **GET** /Comments/change-stream | Create a change stream.
[**commentCreateChangeStreamPostCommentsChangeStream**](CommentApi.md#commentCreateChangeStreamPostCommentsChangeStream) | **POST** /Comments/change-stream | Create a change stream.
[**commentDeleteById**](CommentApi.md#commentDeleteById) | **DELETE** /Comments/{id} | Delete a model instance by id from the data source.
[**commentExistsGetCommentsidExists**](CommentApi.md#commentExistsGetCommentsidExists) | **GET** /Comments/{id}/exists | Check whether a model instance exists in the data source.
[**commentExistsHeadCommentsid**](CommentApi.md#commentExistsHeadCommentsid) | **HEAD** /Comments/{id} | Check whether a model instance exists in the data source.
[**commentFind**](CommentApi.md#commentFind) | **GET** /Comments | Find all instances of the model matched by filter from the data source.
[**commentFindById**](CommentApi.md#commentFindById) | **GET** /Comments/{id} | Find a model instance by id from the data source.
[**commentFindOne**](CommentApi.md#commentFindOne) | **GET** /Comments/findOne | Find first instance of the model matched by filter from the data source.
[**commentPrototypeCountFlags**](CommentApi.md#commentPrototypeCountFlags) | **GET** /Comments/{id}/flags/count | Counts flags of Comment.
[**commentPrototypeCreateFlags**](CommentApi.md#commentPrototypeCreateFlags) | **POST** /Comments/{id}/flags | Creates a new instance in flags of this model.
[**commentPrototypeCreateImage**](CommentApi.md#commentPrototypeCreateImage) | **POST** /Comments/{id}/image | Creates a new instance in image of this model.
[**commentPrototypeCreateVideo**](CommentApi.md#commentPrototypeCreateVideo) | **POST** /Comments/{id}/video | Creates a new instance in video of this model.
[**commentPrototypeDeleteFlags**](CommentApi.md#commentPrototypeDeleteFlags) | **DELETE** /Comments/{id}/flags | Deletes all flags of this model.
[**commentPrototypeDestroyByIdFlags**](CommentApi.md#commentPrototypeDestroyByIdFlags) | **DELETE** /Comments/{id}/flags/{fk} | Delete a related item by id for flags.
[**commentPrototypeDestroyImage**](CommentApi.md#commentPrototypeDestroyImage) | **DELETE** /Comments/{id}/image | Deletes image of this model.
[**commentPrototypeDestroyVideo**](CommentApi.md#commentPrototypeDestroyVideo) | **DELETE** /Comments/{id}/video | Deletes video of this model.
[**commentPrototypeFindByIdFlags**](CommentApi.md#commentPrototypeFindByIdFlags) | **GET** /Comments/{id}/flags/{fk} | Find a related item by id for flags.
[**commentPrototypeGetFlags**](CommentApi.md#commentPrototypeGetFlags) | **GET** /Comments/{id}/flags | Queries flags of Comment.
[**commentPrototypeGetImage**](CommentApi.md#commentPrototypeGetImage) | **GET** /Comments/{id}/image | Fetches hasOne relation image.
[**commentPrototypeGetOwner**](CommentApi.md#commentPrototypeGetOwner) | **GET** /Comments/{id}/owner | Fetches belongsTo relation owner.
[**commentPrototypeGetPost**](CommentApi.md#commentPrototypeGetPost) | **GET** /Comments/{id}/post | Fetches belongsTo relation post.
[**commentPrototypeGetVideo**](CommentApi.md#commentPrototypeGetVideo) | **GET** /Comments/{id}/video | Fetches hasOne relation video.
[**commentPrototypeUpdateAttributes**](CommentApi.md#commentPrototypeUpdateAttributes) | **PUT** /Comments/{id} | Update attributes for a model instance and persist it into the data source.
[**commentPrototypeUpdateByIdFlags**](CommentApi.md#commentPrototypeUpdateByIdFlags) | **PUT** /Comments/{id}/flags/{fk} | Update a related item by id for flags.
[**commentPrototypeUpdateImage**](CommentApi.md#commentPrototypeUpdateImage) | **PUT** /Comments/{id}/image | Update image of this model.
[**commentPrototypeUpdateVideo**](CommentApi.md#commentPrototypeUpdateVideo) | **PUT** /Comments/{id}/video | Update video of this model.
[**commentUpdateAll**](CommentApi.md#commentUpdateAll) | **POST** /Comments/update | Update instances of the model matched by where from the data source.
[**commentUpsert**](CommentApi.md#commentUpsert) | **PUT** /Comments | Update an existing model instance or insert a new one into the data source.


# **commentCount**
> \DBCDK\CommunityServices\Model\InlineResponse200 commentCount($where)

Count instances of the model matched by where from the data source.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\CommentApi();
$where = "where_example"; // string | Criteria to match model instances

try {
    $result = $api_instance->commentCount($where);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CommentApi->commentCount: ', $e->getMessage(), PHP_EOL;
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

# **commentCreate**
> \DBCDK\CommunityServices\Model\Comment commentCreate($data)

Create a new instance of the model and persist it into the data source.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\CommentApi();
$data = new \DBCDK\CommunityServices\Model\Comment(); // \DBCDK\CommunityServices\Model\Comment | Model instance data

try {
    $result = $api_instance->commentCreate($data);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CommentApi->commentCreate: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **data** | [**\DBCDK\CommunityServices\Model\Comment**](../Model/\DBCDK\CommunityServices\Model\Comment.md)| Model instance data | [optional]

### Return type

[**\DBCDK\CommunityServices\Model\Comment**](../Model/Comment.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **commentCreateChangeStreamGetCommentsChangeStream**
> \SplFileObject commentCreateChangeStreamGetCommentsChangeStream($options)

Create a change stream.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\CommentApi();
$options = "options_example"; // string | 

try {
    $result = $api_instance->commentCreateChangeStreamGetCommentsChangeStream($options);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CommentApi->commentCreateChangeStreamGetCommentsChangeStream: ', $e->getMessage(), PHP_EOL;
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

# **commentCreateChangeStreamPostCommentsChangeStream**
> \SplFileObject commentCreateChangeStreamPostCommentsChangeStream($options)

Create a change stream.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\CommentApi();
$options = "options_example"; // string | 

try {
    $result = $api_instance->commentCreateChangeStreamPostCommentsChangeStream($options);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CommentApi->commentCreateChangeStreamPostCommentsChangeStream: ', $e->getMessage(), PHP_EOL;
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

# **commentDeleteById**
> object commentDeleteById($id)

Delete a model instance by id from the data source.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\CommentApi();
$id = "id_example"; // string | Model id

try {
    $result = $api_instance->commentDeleteById($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CommentApi->commentDeleteById: ', $e->getMessage(), PHP_EOL;
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

# **commentExistsGetCommentsidExists**
> \DBCDK\CommunityServices\Model\InlineResponse2001 commentExistsGetCommentsidExists($id)

Check whether a model instance exists in the data source.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\CommentApi();
$id = "id_example"; // string | Model id

try {
    $result = $api_instance->commentExistsGetCommentsidExists($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CommentApi->commentExistsGetCommentsidExists: ', $e->getMessage(), PHP_EOL;
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

# **commentExistsHeadCommentsid**
> \DBCDK\CommunityServices\Model\InlineResponse2001 commentExistsHeadCommentsid($id)

Check whether a model instance exists in the data source.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\CommentApi();
$id = "id_example"; // string | Model id

try {
    $result = $api_instance->commentExistsHeadCommentsid($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CommentApi->commentExistsHeadCommentsid: ', $e->getMessage(), PHP_EOL;
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

# **commentFind**
> \DBCDK\CommunityServices\Model\Comment[] commentFind($filter)

Find all instances of the model matched by filter from the data source.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\CommentApi();
$filter = "filter_example"; // string | Filter defining fields, where, include, order, offset, and limit

try {
    $result = $api_instance->commentFind($filter);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CommentApi->commentFind: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **filter** | **string**| Filter defining fields, where, include, order, offset, and limit | [optional]

### Return type

[**\DBCDK\CommunityServices\Model\Comment[]**](../Model/Comment.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **commentFindById**
> \DBCDK\CommunityServices\Model\Comment commentFindById($id, $filter)

Find a model instance by id from the data source.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\CommentApi();
$id = "id_example"; // string | Model id
$filter = "filter_example"; // string | Filter defining fields and include

try {
    $result = $api_instance->commentFindById($id, $filter);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CommentApi->commentFindById: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| Model id |
 **filter** | **string**| Filter defining fields and include | [optional]

### Return type

[**\DBCDK\CommunityServices\Model\Comment**](../Model/Comment.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **commentFindOne**
> \DBCDK\CommunityServices\Model\Comment commentFindOne($filter)

Find first instance of the model matched by filter from the data source.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\CommentApi();
$filter = "filter_example"; // string | Filter defining fields, where, include, order, offset, and limit

try {
    $result = $api_instance->commentFindOne($filter);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CommentApi->commentFindOne: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **filter** | **string**| Filter defining fields, where, include, order, offset, and limit | [optional]

### Return type

[**\DBCDK\CommunityServices\Model\Comment**](../Model/Comment.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **commentPrototypeCountFlags**
> \DBCDK\CommunityServices\Model\InlineResponse200 commentPrototypeCountFlags($id, $where)

Counts flags of Comment.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\CommentApi();
$id = "id_example"; // string | PersistedModel id
$where = "where_example"; // string | Criteria to match model instances

try {
    $result = $api_instance->commentPrototypeCountFlags($id, $where);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CommentApi->commentPrototypeCountFlags: ', $e->getMessage(), PHP_EOL;
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

# **commentPrototypeCreateFlags**
> \DBCDK\CommunityServices\Model\Flag commentPrototypeCreateFlags($id, $data)

Creates a new instance in flags of this model.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\CommentApi();
$id = "id_example"; // string | PersistedModel id
$data = new \DBCDK\CommunityServices\Model\Flag(); // \DBCDK\CommunityServices\Model\Flag | 

try {
    $result = $api_instance->commentPrototypeCreateFlags($id, $data);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CommentApi->commentPrototypeCreateFlags: ', $e->getMessage(), PHP_EOL;
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

# **commentPrototypeCreateImage**
> \DBCDK\CommunityServices\Model\ImageCollection commentPrototypeCreateImage($id, $data)

Creates a new instance in image of this model.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\CommentApi();
$id = "id_example"; // string | PersistedModel id
$data = new \DBCDK\CommunityServices\Model\ImageCollection(); // \DBCDK\CommunityServices\Model\ImageCollection | 

try {
    $result = $api_instance->commentPrototypeCreateImage($id, $data);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CommentApi->commentPrototypeCreateImage: ', $e->getMessage(), PHP_EOL;
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

# **commentPrototypeCreateVideo**
> \DBCDK\CommunityServices\Model\VideoCollection commentPrototypeCreateVideo($id, $data)

Creates a new instance in video of this model.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\CommentApi();
$id = "id_example"; // string | PersistedModel id
$data = new \DBCDK\CommunityServices\Model\VideoCollection(); // \DBCDK\CommunityServices\Model\VideoCollection | 

try {
    $result = $api_instance->commentPrototypeCreateVideo($id, $data);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CommentApi->commentPrototypeCreateVideo: ', $e->getMessage(), PHP_EOL;
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

# **commentPrototypeDeleteFlags**
> commentPrototypeDeleteFlags($id)

Deletes all flags of this model.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\CommentApi();
$id = "id_example"; // string | PersistedModel id

try {
    $api_instance->commentPrototypeDeleteFlags($id);
} catch (Exception $e) {
    echo 'Exception when calling CommentApi->commentPrototypeDeleteFlags: ', $e->getMessage(), PHP_EOL;
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

# **commentPrototypeDestroyByIdFlags**
> commentPrototypeDestroyByIdFlags($fk, $id)

Delete a related item by id for flags.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\CommentApi();
$fk = "fk_example"; // string | Foreign key for flags
$id = "id_example"; // string | PersistedModel id

try {
    $api_instance->commentPrototypeDestroyByIdFlags($fk, $id);
} catch (Exception $e) {
    echo 'Exception when calling CommentApi->commentPrototypeDestroyByIdFlags: ', $e->getMessage(), PHP_EOL;
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

# **commentPrototypeDestroyImage**
> commentPrototypeDestroyImage($id)

Deletes image of this model.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\CommentApi();
$id = "id_example"; // string | PersistedModel id

try {
    $api_instance->commentPrototypeDestroyImage($id);
} catch (Exception $e) {
    echo 'Exception when calling CommentApi->commentPrototypeDestroyImage: ', $e->getMessage(), PHP_EOL;
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

# **commentPrototypeDestroyVideo**
> commentPrototypeDestroyVideo($id)

Deletes video of this model.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\CommentApi();
$id = "id_example"; // string | PersistedModel id

try {
    $api_instance->commentPrototypeDestroyVideo($id);
} catch (Exception $e) {
    echo 'Exception when calling CommentApi->commentPrototypeDestroyVideo: ', $e->getMessage(), PHP_EOL;
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

# **commentPrototypeFindByIdFlags**
> \DBCDK\CommunityServices\Model\Flag commentPrototypeFindByIdFlags($fk, $id)

Find a related item by id for flags.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\CommentApi();
$fk = "fk_example"; // string | Foreign key for flags
$id = "id_example"; // string | PersistedModel id

try {
    $result = $api_instance->commentPrototypeFindByIdFlags($fk, $id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CommentApi->commentPrototypeFindByIdFlags: ', $e->getMessage(), PHP_EOL;
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

# **commentPrototypeGetFlags**
> \DBCDK\CommunityServices\Model\Flag[] commentPrototypeGetFlags($id, $filter)

Queries flags of Comment.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\CommentApi();
$id = "id_example"; // string | PersistedModel id
$filter = "filter_example"; // string | 

try {
    $result = $api_instance->commentPrototypeGetFlags($id, $filter);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CommentApi->commentPrototypeGetFlags: ', $e->getMessage(), PHP_EOL;
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

# **commentPrototypeGetImage**
> \DBCDK\CommunityServices\Model\ImageCollection commentPrototypeGetImage($id, $refresh)

Fetches hasOne relation image.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\CommentApi();
$id = "id_example"; // string | PersistedModel id
$refresh = true; // bool | 

try {
    $result = $api_instance->commentPrototypeGetImage($id, $refresh);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CommentApi->commentPrototypeGetImage: ', $e->getMessage(), PHP_EOL;
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

# **commentPrototypeGetOwner**
> \DBCDK\CommunityServices\Model\Profile commentPrototypeGetOwner($id, $refresh)

Fetches belongsTo relation owner.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\CommentApi();
$id = "id_example"; // string | PersistedModel id
$refresh = true; // bool | 

try {
    $result = $api_instance->commentPrototypeGetOwner($id, $refresh);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CommentApi->commentPrototypeGetOwner: ', $e->getMessage(), PHP_EOL;
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

# **commentPrototypeGetPost**
> \DBCDK\CommunityServices\Model\Post commentPrototypeGetPost($id, $refresh)

Fetches belongsTo relation post.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\CommentApi();
$id = "id_example"; // string | PersistedModel id
$refresh = true; // bool | 

try {
    $result = $api_instance->commentPrototypeGetPost($id, $refresh);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CommentApi->commentPrototypeGetPost: ', $e->getMessage(), PHP_EOL;
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

# **commentPrototypeGetVideo**
> \DBCDK\CommunityServices\Model\VideoCollection commentPrototypeGetVideo($id, $refresh)

Fetches hasOne relation video.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\CommentApi();
$id = "id_example"; // string | PersistedModel id
$refresh = true; // bool | 

try {
    $result = $api_instance->commentPrototypeGetVideo($id, $refresh);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CommentApi->commentPrototypeGetVideo: ', $e->getMessage(), PHP_EOL;
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

# **commentPrototypeUpdateAttributes**
> \DBCDK\CommunityServices\Model\Comment commentPrototypeUpdateAttributes($id, $data)

Update attributes for a model instance and persist it into the data source.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\CommentApi();
$id = "id_example"; // string | PersistedModel id
$data = new \DBCDK\CommunityServices\Model\Comment(); // \DBCDK\CommunityServices\Model\Comment | An object of model property name/value pairs

try {
    $result = $api_instance->commentPrototypeUpdateAttributes($id, $data);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CommentApi->commentPrototypeUpdateAttributes: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| PersistedModel id |
 **data** | [**\DBCDK\CommunityServices\Model\Comment**](../Model/\DBCDK\CommunityServices\Model\Comment.md)| An object of model property name/value pairs | [optional]

### Return type

[**\DBCDK\CommunityServices\Model\Comment**](../Model/Comment.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **commentPrototypeUpdateByIdFlags**
> \DBCDK\CommunityServices\Model\Flag commentPrototypeUpdateByIdFlags($fk, $id, $data)

Update a related item by id for flags.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\CommentApi();
$fk = "fk_example"; // string | Foreign key for flags
$id = "id_example"; // string | PersistedModel id
$data = new \DBCDK\CommunityServices\Model\Flag(); // \DBCDK\CommunityServices\Model\Flag | 

try {
    $result = $api_instance->commentPrototypeUpdateByIdFlags($fk, $id, $data);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CommentApi->commentPrototypeUpdateByIdFlags: ', $e->getMessage(), PHP_EOL;
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

# **commentPrototypeUpdateImage**
> \DBCDK\CommunityServices\Model\ImageCollection commentPrototypeUpdateImage($id, $data)

Update image of this model.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\CommentApi();
$id = "id_example"; // string | PersistedModel id
$data = new \DBCDK\CommunityServices\Model\ImageCollection(); // \DBCDK\CommunityServices\Model\ImageCollection | 

try {
    $result = $api_instance->commentPrototypeUpdateImage($id, $data);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CommentApi->commentPrototypeUpdateImage: ', $e->getMessage(), PHP_EOL;
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

# **commentPrototypeUpdateVideo**
> \DBCDK\CommunityServices\Model\VideoCollection commentPrototypeUpdateVideo($id, $data)

Update video of this model.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\CommentApi();
$id = "id_example"; // string | PersistedModel id
$data = new \DBCDK\CommunityServices\Model\VideoCollection(); // \DBCDK\CommunityServices\Model\VideoCollection | 

try {
    $result = $api_instance->commentPrototypeUpdateVideo($id, $data);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CommentApi->commentPrototypeUpdateVideo: ', $e->getMessage(), PHP_EOL;
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

# **commentUpdateAll**
> object commentUpdateAll($where, $data)

Update instances of the model matched by where from the data source.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\CommentApi();
$where = "where_example"; // string | Criteria to match model instances
$data = new \DBCDK\CommunityServices\Model\Comment(); // \DBCDK\CommunityServices\Model\Comment | An object of model property name/value pairs

try {
    $result = $api_instance->commentUpdateAll($where, $data);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CommentApi->commentUpdateAll: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **where** | **string**| Criteria to match model instances | [optional]
 **data** | [**\DBCDK\CommunityServices\Model\Comment**](../Model/\DBCDK\CommunityServices\Model\Comment.md)| An object of model property name/value pairs | [optional]

### Return type

**object**

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **commentUpsert**
> \DBCDK\CommunityServices\Model\Comment commentUpsert($data)

Update an existing model instance or insert a new one into the data source.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\CommentApi();
$data = new \DBCDK\CommunityServices\Model\Comment(); // \DBCDK\CommunityServices\Model\Comment | Model instance data

try {
    $result = $api_instance->commentUpsert($data);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CommentApi->commentUpsert: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **data** | [**\DBCDK\CommunityServices\Model\Comment**](../Model/\DBCDK\CommunityServices\Model\Comment.md)| Model instance data | [optional]

### Return type

[**\DBCDK\CommunityServices\Model\Comment**](../Model/Comment.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

