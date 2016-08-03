# DBCDK\CommunityServices\ReviewApi

All URIs are relative to *https://localhost/api*

Method | HTTP request | Description
------------- | ------------- | -------------
[**reviewCount**](ReviewApi.md#reviewCount) | **GET** /reviews/count | Count instances of the model matched by where from the data source.
[**reviewCreate**](ReviewApi.md#reviewCreate) | **POST** /reviews | Create a new instance of the model and persist it into the data source.
[**reviewCreateChangeStreamGetReviewsChangeStream**](ReviewApi.md#reviewCreateChangeStreamGetReviewsChangeStream) | **GET** /reviews/change-stream | Create a change stream.
[**reviewCreateChangeStreamPostReviewsChangeStream**](ReviewApi.md#reviewCreateChangeStreamPostReviewsChangeStream) | **POST** /reviews/change-stream | Create a change stream.
[**reviewDeleteById**](ReviewApi.md#reviewDeleteById) | **DELETE** /reviews/{id} | Delete a model instance by id from the data source.
[**reviewExistsGetReviewsidExists**](ReviewApi.md#reviewExistsGetReviewsidExists) | **GET** /reviews/{id}/exists | Check whether a model instance exists in the data source.
[**reviewExistsHeadReviewsid**](ReviewApi.md#reviewExistsHeadReviewsid) | **HEAD** /reviews/{id} | Check whether a model instance exists in the data source.
[**reviewFind**](ReviewApi.md#reviewFind) | **GET** /reviews | Find all instances of the model matched by filter from the data source.
[**reviewFindById**](ReviewApi.md#reviewFindById) | **GET** /reviews/{id} | Find a model instance by id from the data source.
[**reviewFindOne**](ReviewApi.md#reviewFindOne) | **GET** /reviews/findOne | Find first instance of the model matched by filter from the data source.
[**reviewPrototypeCountFlags**](ReviewApi.md#reviewPrototypeCountFlags) | **GET** /reviews/{id}/flags/count | Counts flags of review.
[**reviewPrototypeCountLikes**](ReviewApi.md#reviewPrototypeCountLikes) | **GET** /reviews/{id}/likes/count | Counts likes of review.
[**reviewPrototypeCreateFlags**](ReviewApi.md#reviewPrototypeCreateFlags) | **POST** /reviews/{id}/flags | Creates a new instance in flags of this model.
[**reviewPrototypeCreateImage**](ReviewApi.md#reviewPrototypeCreateImage) | **POST** /reviews/{id}/image | Creates a new instance in image of this model.
[**reviewPrototypeCreateLikes**](ReviewApi.md#reviewPrototypeCreateLikes) | **POST** /reviews/{id}/likes | Creates a new instance in likes of this model.
[**reviewPrototypeCreateVideo**](ReviewApi.md#reviewPrototypeCreateVideo) | **POST** /reviews/{id}/video | Creates a new instance in video of this model.
[**reviewPrototypeDeleteFlags**](ReviewApi.md#reviewPrototypeDeleteFlags) | **DELETE** /reviews/{id}/flags | Deletes all flags of this model.
[**reviewPrototypeDeleteLikes**](ReviewApi.md#reviewPrototypeDeleteLikes) | **DELETE** /reviews/{id}/likes | Deletes all likes of this model.
[**reviewPrototypeDestroyByIdFlags**](ReviewApi.md#reviewPrototypeDestroyByIdFlags) | **DELETE** /reviews/{id}/flags/{fk} | Delete a related item by id for flags.
[**reviewPrototypeDestroyByIdLikes**](ReviewApi.md#reviewPrototypeDestroyByIdLikes) | **DELETE** /reviews/{id}/likes/{fk} | Delete a related item by id for likes.
[**reviewPrototypeDestroyImage**](ReviewApi.md#reviewPrototypeDestroyImage) | **DELETE** /reviews/{id}/image | Deletes image of this model.
[**reviewPrototypeDestroyVideo**](ReviewApi.md#reviewPrototypeDestroyVideo) | **DELETE** /reviews/{id}/video | Deletes video of this model.
[**reviewPrototypeFindByIdFlags**](ReviewApi.md#reviewPrototypeFindByIdFlags) | **GET** /reviews/{id}/flags/{fk} | Find a related item by id for flags.
[**reviewPrototypeFindByIdLikes**](ReviewApi.md#reviewPrototypeFindByIdLikes) | **GET** /reviews/{id}/likes/{fk} | Find a related item by id for likes.
[**reviewPrototypeGetFlags**](ReviewApi.md#reviewPrototypeGetFlags) | **GET** /reviews/{id}/flags | Queries flags of review.
[**reviewPrototypeGetImage**](ReviewApi.md#reviewPrototypeGetImage) | **GET** /reviews/{id}/image | Fetches hasOne relation image.
[**reviewPrototypeGetLikes**](ReviewApi.md#reviewPrototypeGetLikes) | **GET** /reviews/{id}/likes | Queries likes of review.
[**reviewPrototypeGetOwner**](ReviewApi.md#reviewPrototypeGetOwner) | **GET** /reviews/{id}/owner | Fetches belongsTo relation owner.
[**reviewPrototypeGetVideo**](ReviewApi.md#reviewPrototypeGetVideo) | **GET** /reviews/{id}/video | Fetches hasOne relation video.
[**reviewPrototypeUpdateAttributes**](ReviewApi.md#reviewPrototypeUpdateAttributes) | **PUT** /reviews/{id} | Update attributes for a model instance and persist it into the data source.
[**reviewPrototypeUpdateByIdFlags**](ReviewApi.md#reviewPrototypeUpdateByIdFlags) | **PUT** /reviews/{id}/flags/{fk} | Update a related item by id for flags.
[**reviewPrototypeUpdateByIdLikes**](ReviewApi.md#reviewPrototypeUpdateByIdLikes) | **PUT** /reviews/{id}/likes/{fk} | Update a related item by id for likes.
[**reviewPrototypeUpdateImage**](ReviewApi.md#reviewPrototypeUpdateImage) | **PUT** /reviews/{id}/image | Update image of this model.
[**reviewPrototypeUpdateVideo**](ReviewApi.md#reviewPrototypeUpdateVideo) | **PUT** /reviews/{id}/video | Update video of this model.
[**reviewSearch**](ReviewApi.md#reviewSearch) | **GET** /reviews/search | Searches via elastic search
[**reviewSuggest**](ReviewApi.md#reviewSuggest) | **GET** /reviews/suggest | Suggestions via elastic search
[**reviewUpdateAll**](ReviewApi.md#reviewUpdateAll) | **POST** /reviews/update | Update instances of the model matched by where from the data source.
[**reviewUpsert**](ReviewApi.md#reviewUpsert) | **PUT** /reviews | Update an existing model instance or insert a new one into the data source.


# **reviewCount**
> \DBCDK\CommunityServices\Model\InlineResponse200 reviewCount($where)

Count instances of the model matched by where from the data source.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\ReviewApi();
$where = "where_example"; // string | Criteria to match model instances

try {
    $result = $api_instance->reviewCount($where);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ReviewApi->reviewCount: ', $e->getMessage(), PHP_EOL;
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

# **reviewCreate**
> \DBCDK\CommunityServices\Model\Review reviewCreate($data)

Create a new instance of the model and persist it into the data source.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\ReviewApi();
$data = new \DBCDK\CommunityServices\Model\Review(); // \DBCDK\CommunityServices\Model\Review | Model instance data

try {
    $result = $api_instance->reviewCreate($data);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ReviewApi->reviewCreate: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **data** | [**\DBCDK\CommunityServices\Model\Review**](../Model/\DBCDK\CommunityServices\Model\Review.md)| Model instance data | [optional]

### Return type

[**\DBCDK\CommunityServices\Model\Review**](../Model/Review.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **reviewCreateChangeStreamGetReviewsChangeStream**
> \SplFileObject reviewCreateChangeStreamGetReviewsChangeStream($options)

Create a change stream.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\ReviewApi();
$options = "options_example"; // string | 

try {
    $result = $api_instance->reviewCreateChangeStreamGetReviewsChangeStream($options);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ReviewApi->reviewCreateChangeStreamGetReviewsChangeStream: ', $e->getMessage(), PHP_EOL;
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

# **reviewCreateChangeStreamPostReviewsChangeStream**
> \SplFileObject reviewCreateChangeStreamPostReviewsChangeStream($options)

Create a change stream.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\ReviewApi();
$options = "options_example"; // string | 

try {
    $result = $api_instance->reviewCreateChangeStreamPostReviewsChangeStream($options);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ReviewApi->reviewCreateChangeStreamPostReviewsChangeStream: ', $e->getMessage(), PHP_EOL;
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

# **reviewDeleteById**
> object reviewDeleteById($id)

Delete a model instance by id from the data source.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\ReviewApi();
$id = "id_example"; // string | Model id

try {
    $result = $api_instance->reviewDeleteById($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ReviewApi->reviewDeleteById: ', $e->getMessage(), PHP_EOL;
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

# **reviewExistsGetReviewsidExists**
> \DBCDK\CommunityServices\Model\InlineResponse2001 reviewExistsGetReviewsidExists($id)

Check whether a model instance exists in the data source.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\ReviewApi();
$id = "id_example"; // string | Model id

try {
    $result = $api_instance->reviewExistsGetReviewsidExists($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ReviewApi->reviewExistsGetReviewsidExists: ', $e->getMessage(), PHP_EOL;
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

# **reviewExistsHeadReviewsid**
> \DBCDK\CommunityServices\Model\InlineResponse2001 reviewExistsHeadReviewsid($id)

Check whether a model instance exists in the data source.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\ReviewApi();
$id = "id_example"; // string | Model id

try {
    $result = $api_instance->reviewExistsHeadReviewsid($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ReviewApi->reviewExistsHeadReviewsid: ', $e->getMessage(), PHP_EOL;
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

# **reviewFind**
> \DBCDK\CommunityServices\Model\Review[] reviewFind($filter)

Find all instances of the model matched by filter from the data source.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\ReviewApi();
$filter = "filter_example"; // string | Filter defining fields, where, include, order, offset, and limit

try {
    $result = $api_instance->reviewFind($filter);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ReviewApi->reviewFind: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **filter** | **string**| Filter defining fields, where, include, order, offset, and limit | [optional]

### Return type

[**\DBCDK\CommunityServices\Model\Review[]**](../Model/Review.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **reviewFindById**
> \DBCDK\CommunityServices\Model\Review reviewFindById($id, $filter)

Find a model instance by id from the data source.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\ReviewApi();
$id = "id_example"; // string | Model id
$filter = "filter_example"; // string | Filter defining fields and include

try {
    $result = $api_instance->reviewFindById($id, $filter);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ReviewApi->reviewFindById: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| Model id |
 **filter** | **string**| Filter defining fields and include | [optional]

### Return type

[**\DBCDK\CommunityServices\Model\Review**](../Model/Review.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **reviewFindOne**
> \DBCDK\CommunityServices\Model\Review reviewFindOne($filter)

Find first instance of the model matched by filter from the data source.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\ReviewApi();
$filter = "filter_example"; // string | Filter defining fields, where, include, order, offset, and limit

try {
    $result = $api_instance->reviewFindOne($filter);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ReviewApi->reviewFindOne: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **filter** | **string**| Filter defining fields, where, include, order, offset, and limit | [optional]

### Return type

[**\DBCDK\CommunityServices\Model\Review**](../Model/Review.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **reviewPrototypeCountFlags**
> \DBCDK\CommunityServices\Model\InlineResponse200 reviewPrototypeCountFlags($id, $where)

Counts flags of review.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\ReviewApi();
$id = "id_example"; // string | PersistedModel id
$where = "where_example"; // string | Criteria to match model instances

try {
    $result = $api_instance->reviewPrototypeCountFlags($id, $where);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ReviewApi->reviewPrototypeCountFlags: ', $e->getMessage(), PHP_EOL;
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

# **reviewPrototypeCountLikes**
> \DBCDK\CommunityServices\Model\InlineResponse200 reviewPrototypeCountLikes($id, $where)

Counts likes of review.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\ReviewApi();
$id = "id_example"; // string | PersistedModel id
$where = "where_example"; // string | Criteria to match model instances

try {
    $result = $api_instance->reviewPrototypeCountLikes($id, $where);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ReviewApi->reviewPrototypeCountLikes: ', $e->getMessage(), PHP_EOL;
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

# **reviewPrototypeCreateFlags**
> \DBCDK\CommunityServices\Model\Flag reviewPrototypeCreateFlags($id, $data)

Creates a new instance in flags of this model.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\ReviewApi();
$id = "id_example"; // string | PersistedModel id
$data = new \DBCDK\CommunityServices\Model\Flag(); // \DBCDK\CommunityServices\Model\Flag | 

try {
    $result = $api_instance->reviewPrototypeCreateFlags($id, $data);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ReviewApi->reviewPrototypeCreateFlags: ', $e->getMessage(), PHP_EOL;
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

# **reviewPrototypeCreateImage**
> \DBCDK\CommunityServices\Model\ImageCollection reviewPrototypeCreateImage($id, $data)

Creates a new instance in image of this model.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\ReviewApi();
$id = "id_example"; // string | PersistedModel id
$data = new \DBCDK\CommunityServices\Model\ImageCollection(); // \DBCDK\CommunityServices\Model\ImageCollection | 

try {
    $result = $api_instance->reviewPrototypeCreateImage($id, $data);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ReviewApi->reviewPrototypeCreateImage: ', $e->getMessage(), PHP_EOL;
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

# **reviewPrototypeCreateLikes**
> \DBCDK\CommunityServices\Model\Like reviewPrototypeCreateLikes($id, $data)

Creates a new instance in likes of this model.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\ReviewApi();
$id = "id_example"; // string | PersistedModel id
$data = new \DBCDK\CommunityServices\Model\Like(); // \DBCDK\CommunityServices\Model\Like | 

try {
    $result = $api_instance->reviewPrototypeCreateLikes($id, $data);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ReviewApi->reviewPrototypeCreateLikes: ', $e->getMessage(), PHP_EOL;
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

# **reviewPrototypeCreateVideo**
> \DBCDK\CommunityServices\Model\VideoCollection reviewPrototypeCreateVideo($id, $data)

Creates a new instance in video of this model.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\ReviewApi();
$id = "id_example"; // string | PersistedModel id
$data = new \DBCDK\CommunityServices\Model\VideoCollection(); // \DBCDK\CommunityServices\Model\VideoCollection | 

try {
    $result = $api_instance->reviewPrototypeCreateVideo($id, $data);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ReviewApi->reviewPrototypeCreateVideo: ', $e->getMessage(), PHP_EOL;
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

# **reviewPrototypeDeleteFlags**
> reviewPrototypeDeleteFlags($id)

Deletes all flags of this model.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\ReviewApi();
$id = "id_example"; // string | PersistedModel id

try {
    $api_instance->reviewPrototypeDeleteFlags($id);
} catch (Exception $e) {
    echo 'Exception when calling ReviewApi->reviewPrototypeDeleteFlags: ', $e->getMessage(), PHP_EOL;
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

# **reviewPrototypeDeleteLikes**
> reviewPrototypeDeleteLikes($id)

Deletes all likes of this model.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\ReviewApi();
$id = "id_example"; // string | PersistedModel id

try {
    $api_instance->reviewPrototypeDeleteLikes($id);
} catch (Exception $e) {
    echo 'Exception when calling ReviewApi->reviewPrototypeDeleteLikes: ', $e->getMessage(), PHP_EOL;
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

# **reviewPrototypeDestroyByIdFlags**
> reviewPrototypeDestroyByIdFlags($fk, $id)

Delete a related item by id for flags.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\ReviewApi();
$fk = "fk_example"; // string | Foreign key for flags
$id = "id_example"; // string | PersistedModel id

try {
    $api_instance->reviewPrototypeDestroyByIdFlags($fk, $id);
} catch (Exception $e) {
    echo 'Exception when calling ReviewApi->reviewPrototypeDestroyByIdFlags: ', $e->getMessage(), PHP_EOL;
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

# **reviewPrototypeDestroyByIdLikes**
> reviewPrototypeDestroyByIdLikes($fk, $id)

Delete a related item by id for likes.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\ReviewApi();
$fk = "fk_example"; // string | Foreign key for likes
$id = "id_example"; // string | PersistedModel id

try {
    $api_instance->reviewPrototypeDestroyByIdLikes($fk, $id);
} catch (Exception $e) {
    echo 'Exception when calling ReviewApi->reviewPrototypeDestroyByIdLikes: ', $e->getMessage(), PHP_EOL;
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

# **reviewPrototypeDestroyImage**
> reviewPrototypeDestroyImage($id)

Deletes image of this model.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\ReviewApi();
$id = "id_example"; // string | PersistedModel id

try {
    $api_instance->reviewPrototypeDestroyImage($id);
} catch (Exception $e) {
    echo 'Exception when calling ReviewApi->reviewPrototypeDestroyImage: ', $e->getMessage(), PHP_EOL;
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

# **reviewPrototypeDestroyVideo**
> reviewPrototypeDestroyVideo($id)

Deletes video of this model.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\ReviewApi();
$id = "id_example"; // string | PersistedModel id

try {
    $api_instance->reviewPrototypeDestroyVideo($id);
} catch (Exception $e) {
    echo 'Exception when calling ReviewApi->reviewPrototypeDestroyVideo: ', $e->getMessage(), PHP_EOL;
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

# **reviewPrototypeFindByIdFlags**
> \DBCDK\CommunityServices\Model\Flag reviewPrototypeFindByIdFlags($fk, $id)

Find a related item by id for flags.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\ReviewApi();
$fk = "fk_example"; // string | Foreign key for flags
$id = "id_example"; // string | PersistedModel id

try {
    $result = $api_instance->reviewPrototypeFindByIdFlags($fk, $id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ReviewApi->reviewPrototypeFindByIdFlags: ', $e->getMessage(), PHP_EOL;
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

# **reviewPrototypeFindByIdLikes**
> \DBCDK\CommunityServices\Model\Like reviewPrototypeFindByIdLikes($fk, $id)

Find a related item by id for likes.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\ReviewApi();
$fk = "fk_example"; // string | Foreign key for likes
$id = "id_example"; // string | PersistedModel id

try {
    $result = $api_instance->reviewPrototypeFindByIdLikes($fk, $id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ReviewApi->reviewPrototypeFindByIdLikes: ', $e->getMessage(), PHP_EOL;
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

# **reviewPrototypeGetFlags**
> \DBCDK\CommunityServices\Model\Flag[] reviewPrototypeGetFlags($id, $filter)

Queries flags of review.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\ReviewApi();
$id = "id_example"; // string | PersistedModel id
$filter = "filter_example"; // string | 

try {
    $result = $api_instance->reviewPrototypeGetFlags($id, $filter);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ReviewApi->reviewPrototypeGetFlags: ', $e->getMessage(), PHP_EOL;
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

# **reviewPrototypeGetImage**
> \DBCDK\CommunityServices\Model\ImageCollection reviewPrototypeGetImage($id, $refresh)

Fetches hasOne relation image.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\ReviewApi();
$id = "id_example"; // string | PersistedModel id
$refresh = true; // bool | 

try {
    $result = $api_instance->reviewPrototypeGetImage($id, $refresh);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ReviewApi->reviewPrototypeGetImage: ', $e->getMessage(), PHP_EOL;
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

# **reviewPrototypeGetLikes**
> \DBCDK\CommunityServices\Model\Like[] reviewPrototypeGetLikes($id, $filter)

Queries likes of review.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\ReviewApi();
$id = "id_example"; // string | PersistedModel id
$filter = "filter_example"; // string | 

try {
    $result = $api_instance->reviewPrototypeGetLikes($id, $filter);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ReviewApi->reviewPrototypeGetLikes: ', $e->getMessage(), PHP_EOL;
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

# **reviewPrototypeGetOwner**
> \DBCDK\CommunityServices\Model\Profile reviewPrototypeGetOwner($id, $refresh)

Fetches belongsTo relation owner.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\ReviewApi();
$id = "id_example"; // string | PersistedModel id
$refresh = true; // bool | 

try {
    $result = $api_instance->reviewPrototypeGetOwner($id, $refresh);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ReviewApi->reviewPrototypeGetOwner: ', $e->getMessage(), PHP_EOL;
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

# **reviewPrototypeGetVideo**
> \DBCDK\CommunityServices\Model\VideoCollection reviewPrototypeGetVideo($id, $refresh)

Fetches hasOne relation video.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\ReviewApi();
$id = "id_example"; // string | PersistedModel id
$refresh = true; // bool | 

try {
    $result = $api_instance->reviewPrototypeGetVideo($id, $refresh);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ReviewApi->reviewPrototypeGetVideo: ', $e->getMessage(), PHP_EOL;
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

# **reviewPrototypeUpdateAttributes**
> \DBCDK\CommunityServices\Model\Review reviewPrototypeUpdateAttributes($id, $data)

Update attributes for a model instance and persist it into the data source.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\ReviewApi();
$id = "id_example"; // string | PersistedModel id
$data = new \DBCDK\CommunityServices\Model\Review(); // \DBCDK\CommunityServices\Model\Review | An object of model property name/value pairs

try {
    $result = $api_instance->reviewPrototypeUpdateAttributes($id, $data);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ReviewApi->reviewPrototypeUpdateAttributes: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| PersistedModel id |
 **data** | [**\DBCDK\CommunityServices\Model\Review**](../Model/\DBCDK\CommunityServices\Model\Review.md)| An object of model property name/value pairs | [optional]

### Return type

[**\DBCDK\CommunityServices\Model\Review**](../Model/Review.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **reviewPrototypeUpdateByIdFlags**
> \DBCDK\CommunityServices\Model\Flag reviewPrototypeUpdateByIdFlags($fk, $id, $data)

Update a related item by id for flags.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\ReviewApi();
$fk = "fk_example"; // string | Foreign key for flags
$id = "id_example"; // string | PersistedModel id
$data = new \DBCDK\CommunityServices\Model\Flag(); // \DBCDK\CommunityServices\Model\Flag | 

try {
    $result = $api_instance->reviewPrototypeUpdateByIdFlags($fk, $id, $data);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ReviewApi->reviewPrototypeUpdateByIdFlags: ', $e->getMessage(), PHP_EOL;
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

# **reviewPrototypeUpdateByIdLikes**
> \DBCDK\CommunityServices\Model\Like reviewPrototypeUpdateByIdLikes($fk, $id, $data)

Update a related item by id for likes.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\ReviewApi();
$fk = "fk_example"; // string | Foreign key for likes
$id = "id_example"; // string | PersistedModel id
$data = new \DBCDK\CommunityServices\Model\Like(); // \DBCDK\CommunityServices\Model\Like | 

try {
    $result = $api_instance->reviewPrototypeUpdateByIdLikes($fk, $id, $data);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ReviewApi->reviewPrototypeUpdateByIdLikes: ', $e->getMessage(), PHP_EOL;
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

# **reviewPrototypeUpdateImage**
> \DBCDK\CommunityServices\Model\ImageCollection reviewPrototypeUpdateImage($id, $data)

Update image of this model.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\ReviewApi();
$id = "id_example"; // string | PersistedModel id
$data = new \DBCDK\CommunityServices\Model\ImageCollection(); // \DBCDK\CommunityServices\Model\ImageCollection | 

try {
    $result = $api_instance->reviewPrototypeUpdateImage($id, $data);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ReviewApi->reviewPrototypeUpdateImage: ', $e->getMessage(), PHP_EOL;
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

# **reviewPrototypeUpdateVideo**
> \DBCDK\CommunityServices\Model\VideoCollection reviewPrototypeUpdateVideo($id, $data)

Update video of this model.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\ReviewApi();
$id = "id_example"; // string | PersistedModel id
$data = new \DBCDK\CommunityServices\Model\VideoCollection(); // \DBCDK\CommunityServices\Model\VideoCollection | 

try {
    $result = $api_instance->reviewPrototypeUpdateVideo($id, $data);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ReviewApi->reviewPrototypeUpdateVideo: ', $e->getMessage(), PHP_EOL;
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

# **reviewSearch**
> object reviewSearch($q, $fields, $limit, $from)

Searches via elastic search

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\ReviewApi();
$q = "q_example"; // string | URI search string
$fields = "fields_example"; // string | Array of string containing fields to match on. Defaults to all fields.
$limit = 1.2; // double | How many items to retrieve. Default: 15
$from = 1.2; // double | The starting index of hits to return. Default: 0

try {
    $result = $api_instance->reviewSearch($q, $fields, $limit, $from);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ReviewApi->reviewSearch: ', $e->getMessage(), PHP_EOL;
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

# **reviewSuggest**
> object reviewSuggest($q)

Suggestions via elastic search

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\ReviewApi();
$q = "q_example"; // string | String to suggest upon

try {
    $result = $api_instance->reviewSuggest($q);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ReviewApi->reviewSuggest: ', $e->getMessage(), PHP_EOL;
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

# **reviewUpdateAll**
> object reviewUpdateAll($where, $data)

Update instances of the model matched by where from the data source.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\ReviewApi();
$where = "where_example"; // string | Criteria to match model instances
$data = new \DBCDK\CommunityServices\Model\Review(); // \DBCDK\CommunityServices\Model\Review | An object of model property name/value pairs

try {
    $result = $api_instance->reviewUpdateAll($where, $data);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ReviewApi->reviewUpdateAll: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **where** | **string**| Criteria to match model instances | [optional]
 **data** | [**\DBCDK\CommunityServices\Model\Review**](../Model/\DBCDK\CommunityServices\Model\Review.md)| An object of model property name/value pairs | [optional]

### Return type

**object**

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **reviewUpsert**
> \DBCDK\CommunityServices\Model\Review reviewUpsert($data)

Update an existing model instance or insert a new one into the data source.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\ReviewApi();
$data = new \DBCDK\CommunityServices\Model\Review(); // \DBCDK\CommunityServices\Model\Review | Model instance data

try {
    $result = $api_instance->reviewUpsert($data);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ReviewApi->reviewUpsert: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **data** | [**\DBCDK\CommunityServices\Model\Review**](../Model/\DBCDK\CommunityServices\Model\Review.md)| Model instance data | [optional]

### Return type

[**\DBCDK\CommunityServices\Model\Review**](../Model/Review.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

