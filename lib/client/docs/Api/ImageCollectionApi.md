# DBCDK\CommunityServices\ImageCollectionApi

All URIs are relative to *https://localhost/api*

Method | HTTP request | Description
------------- | ------------- | -------------
[**imageCollectionCount**](ImageCollectionApi.md#imageCollectionCount) | **GET** /imageCollections/count | Count instances of the model matched by where from the data source.
[**imageCollectionCreate**](ImageCollectionApi.md#imageCollectionCreate) | **POST** /imageCollections | Create a new instance of the model and persist it into the data source.
[**imageCollectionCreateChangeStreamGetImageCollectionsChangeStream**](ImageCollectionApi.md#imageCollectionCreateChangeStreamGetImageCollectionsChangeStream) | **GET** /imageCollections/change-stream | Create a change stream.
[**imageCollectionCreateChangeStreamPostImageCollectionsChangeStream**](ImageCollectionApi.md#imageCollectionCreateChangeStreamPostImageCollectionsChangeStream) | **POST** /imageCollections/change-stream | Create a change stream.
[**imageCollectionDeleteById**](ImageCollectionApi.md#imageCollectionDeleteById) | **DELETE** /imageCollections/{id} | Delete a model instance by id from the data source.
[**imageCollectionDownload**](ImageCollectionApi.md#imageCollectionDownload) | **GET** /imageCollections/{id}/download/{size} | Downloads an image of the specified size, if that&#39;s not available, it downloads an image.
[**imageCollectionExistsGetImageCollectionsidExists**](ImageCollectionApi.md#imageCollectionExistsGetImageCollectionsidExists) | **GET** /imageCollections/{id}/exists | Check whether a model instance exists in the data source.
[**imageCollectionExistsHeadImageCollectionsid**](ImageCollectionApi.md#imageCollectionExistsHeadImageCollectionsid) | **HEAD** /imageCollections/{id} | Check whether a model instance exists in the data source.
[**imageCollectionFind**](ImageCollectionApi.md#imageCollectionFind) | **GET** /imageCollections | Find all instances of the model matched by filter from the data source.
[**imageCollectionFindById**](ImageCollectionApi.md#imageCollectionFindById) | **GET** /imageCollections/{id} | Find a model instance by id from the data source.
[**imageCollectionFindOne**](ImageCollectionApi.md#imageCollectionFindOne) | **GET** /imageCollections/findOne | Find first instance of the model matched by filter from the data source.
[**imageCollectionPrototypeCountResolutions**](ImageCollectionApi.md#imageCollectionPrototypeCountResolutions) | **GET** /imageCollections/{id}/resolutions/count | Counts resolutions of imageCollection.
[**imageCollectionPrototypeCreateResolutions**](ImageCollectionApi.md#imageCollectionPrototypeCreateResolutions) | **POST** /imageCollections/{id}/resolutions | Creates a new instance in resolutions of this model.
[**imageCollectionPrototypeDeleteResolutions**](ImageCollectionApi.md#imageCollectionPrototypeDeleteResolutions) | **DELETE** /imageCollections/{id}/resolutions | Deletes all resolutions of this model.
[**imageCollectionPrototypeDestroyByIdResolutions**](ImageCollectionApi.md#imageCollectionPrototypeDestroyByIdResolutions) | **DELETE** /imageCollections/{id}/resolutions/{fk} | Delete a related item by id for resolutions.
[**imageCollectionPrototypeFindByIdResolutions**](ImageCollectionApi.md#imageCollectionPrototypeFindByIdResolutions) | **GET** /imageCollections/{id}/resolutions/{fk} | Find a related item by id for resolutions.
[**imageCollectionPrototypeGetResolutions**](ImageCollectionApi.md#imageCollectionPrototypeGetResolutions) | **GET** /imageCollections/{id}/resolutions | Queries resolutions of imageCollection.
[**imageCollectionPrototypeUpdateAttributes**](ImageCollectionApi.md#imageCollectionPrototypeUpdateAttributes) | **PUT** /imageCollections/{id} | Update attributes for a model instance and persist it into the data source.
[**imageCollectionPrototypeUpdateByIdResolutions**](ImageCollectionApi.md#imageCollectionPrototypeUpdateByIdResolutions) | **PUT** /imageCollections/{id}/resolutions/{fk} | Update a related item by id for resolutions.
[**imageCollectionUpdateAll**](ImageCollectionApi.md#imageCollectionUpdateAll) | **POST** /imageCollections/update | Update instances of the model matched by where from the data source.
[**imageCollectionUpload**](ImageCollectionApi.md#imageCollectionUpload) | **POST** /imageCollections/upload | Uploads an image.
[**imageCollectionUpsert**](ImageCollectionApi.md#imageCollectionUpsert) | **PUT** /imageCollections | Update an existing model instance or insert a new one into the data source.


# **imageCollectionCount**
> \DBCDK\CommunityServices\Model\InlineResponse200 imageCollectionCount($where)

Count instances of the model matched by where from the data source.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\ImageCollectionApi();
$where = "where_example"; // string | Criteria to match model instances

try {
    $result = $api_instance->imageCollectionCount($where);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ImageCollectionApi->imageCollectionCount: ', $e->getMessage(), PHP_EOL;
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

# **imageCollectionCreate**
> \DBCDK\CommunityServices\Model\ImageCollection imageCollectionCreate($data)

Create a new instance of the model and persist it into the data source.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\ImageCollectionApi();
$data = new \DBCDK\CommunityServices\Model\ImageCollection(); // \DBCDK\CommunityServices\Model\ImageCollection | Model instance data

try {
    $result = $api_instance->imageCollectionCreate($data);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ImageCollectionApi->imageCollectionCreate: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **data** | [**\DBCDK\CommunityServices\Model\ImageCollection**](../Model/\DBCDK\CommunityServices\Model\ImageCollection.md)| Model instance data | [optional]

### Return type

[**\DBCDK\CommunityServices\Model\ImageCollection**](../Model/ImageCollection.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **imageCollectionCreateChangeStreamGetImageCollectionsChangeStream**
> \SplFileObject imageCollectionCreateChangeStreamGetImageCollectionsChangeStream($options)

Create a change stream.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\ImageCollectionApi();
$options = "options_example"; // string | 

try {
    $result = $api_instance->imageCollectionCreateChangeStreamGetImageCollectionsChangeStream($options);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ImageCollectionApi->imageCollectionCreateChangeStreamGetImageCollectionsChangeStream: ', $e->getMessage(), PHP_EOL;
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

# **imageCollectionCreateChangeStreamPostImageCollectionsChangeStream**
> \SplFileObject imageCollectionCreateChangeStreamPostImageCollectionsChangeStream($options)

Create a change stream.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\ImageCollectionApi();
$options = "options_example"; // string | 

try {
    $result = $api_instance->imageCollectionCreateChangeStreamPostImageCollectionsChangeStream($options);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ImageCollectionApi->imageCollectionCreateChangeStreamPostImageCollectionsChangeStream: ', $e->getMessage(), PHP_EOL;
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

# **imageCollectionDeleteById**
> object imageCollectionDeleteById($id)

Delete a model instance by id from the data source.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\ImageCollectionApi();
$id = "id_example"; // string | Model id

try {
    $result = $api_instance->imageCollectionDeleteById($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ImageCollectionApi->imageCollectionDeleteById: ', $e->getMessage(), PHP_EOL;
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

# **imageCollectionDownload**
> object imageCollectionDownload($id, $size)

Downloads an image of the specified size, if that's not available, it downloads an image.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\ImageCollectionApi();
$id = 1.2; // double | Id of the Image Collection.
$size = "size_example"; // string | Size of the image, either: original, small, medium or large.

try {
    $result = $api_instance->imageCollectionDownload($id, $size);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ImageCollectionApi->imageCollectionDownload: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **double**| Id of the Image Collection. |
 **size** | **string**| Size of the image, either: original, small, medium or large. |

### Return type

**object**

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **imageCollectionExistsGetImageCollectionsidExists**
> \DBCDK\CommunityServices\Model\InlineResponse2001 imageCollectionExistsGetImageCollectionsidExists($id)

Check whether a model instance exists in the data source.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\ImageCollectionApi();
$id = "id_example"; // string | Model id

try {
    $result = $api_instance->imageCollectionExistsGetImageCollectionsidExists($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ImageCollectionApi->imageCollectionExistsGetImageCollectionsidExists: ', $e->getMessage(), PHP_EOL;
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

# **imageCollectionExistsHeadImageCollectionsid**
> \DBCDK\CommunityServices\Model\InlineResponse2001 imageCollectionExistsHeadImageCollectionsid($id)

Check whether a model instance exists in the data source.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\ImageCollectionApi();
$id = "id_example"; // string | Model id

try {
    $result = $api_instance->imageCollectionExistsHeadImageCollectionsid($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ImageCollectionApi->imageCollectionExistsHeadImageCollectionsid: ', $e->getMessage(), PHP_EOL;
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

# **imageCollectionFind**
> \DBCDK\CommunityServices\Model\ImageCollection[] imageCollectionFind($filter)

Find all instances of the model matched by filter from the data source.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\ImageCollectionApi();
$filter = "filter_example"; // string | Filter defining fields, where, include, order, offset, and limit

try {
    $result = $api_instance->imageCollectionFind($filter);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ImageCollectionApi->imageCollectionFind: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **filter** | **string**| Filter defining fields, where, include, order, offset, and limit | [optional]

### Return type

[**\DBCDK\CommunityServices\Model\ImageCollection[]**](../Model/ImageCollection.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **imageCollectionFindById**
> \DBCDK\CommunityServices\Model\ImageCollection imageCollectionFindById($id, $filter)

Find a model instance by id from the data source.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\ImageCollectionApi();
$id = "id_example"; // string | Model id
$filter = "filter_example"; // string | Filter defining fields and include

try {
    $result = $api_instance->imageCollectionFindById($id, $filter);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ImageCollectionApi->imageCollectionFindById: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| Model id |
 **filter** | **string**| Filter defining fields and include | [optional]

### Return type

[**\DBCDK\CommunityServices\Model\ImageCollection**](../Model/ImageCollection.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **imageCollectionFindOne**
> \DBCDK\CommunityServices\Model\ImageCollection imageCollectionFindOne($filter)

Find first instance of the model matched by filter from the data source.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\ImageCollectionApi();
$filter = "filter_example"; // string | Filter defining fields, where, include, order, offset, and limit

try {
    $result = $api_instance->imageCollectionFindOne($filter);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ImageCollectionApi->imageCollectionFindOne: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **filter** | **string**| Filter defining fields, where, include, order, offset, and limit | [optional]

### Return type

[**\DBCDK\CommunityServices\Model\ImageCollection**](../Model/ImageCollection.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **imageCollectionPrototypeCountResolutions**
> \DBCDK\CommunityServices\Model\InlineResponse200 imageCollectionPrototypeCountResolutions($id, $where)

Counts resolutions of imageCollection.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\ImageCollectionApi();
$id = "id_example"; // string | PersistedModel id
$where = "where_example"; // string | Criteria to match model instances

try {
    $result = $api_instance->imageCollectionPrototypeCountResolutions($id, $where);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ImageCollectionApi->imageCollectionPrototypeCountResolutions: ', $e->getMessage(), PHP_EOL;
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

# **imageCollectionPrototypeCreateResolutions**
> \DBCDK\CommunityServices\Model\Resolution imageCollectionPrototypeCreateResolutions($id, $data)

Creates a new instance in resolutions of this model.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\ImageCollectionApi();
$id = "id_example"; // string | PersistedModel id
$data = new \DBCDK\CommunityServices\Model\Resolution(); // \DBCDK\CommunityServices\Model\Resolution | 

try {
    $result = $api_instance->imageCollectionPrototypeCreateResolutions($id, $data);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ImageCollectionApi->imageCollectionPrototypeCreateResolutions: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| PersistedModel id |
 **data** | [**\DBCDK\CommunityServices\Model\Resolution**](../Model/\DBCDK\CommunityServices\Model\Resolution.md)|  | [optional]

### Return type

[**\DBCDK\CommunityServices\Model\Resolution**](../Model/Resolution.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **imageCollectionPrototypeDeleteResolutions**
> imageCollectionPrototypeDeleteResolutions($id)

Deletes all resolutions of this model.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\ImageCollectionApi();
$id = "id_example"; // string | PersistedModel id

try {
    $api_instance->imageCollectionPrototypeDeleteResolutions($id);
} catch (Exception $e) {
    echo 'Exception when calling ImageCollectionApi->imageCollectionPrototypeDeleteResolutions: ', $e->getMessage(), PHP_EOL;
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

# **imageCollectionPrototypeDestroyByIdResolutions**
> imageCollectionPrototypeDestroyByIdResolutions($fk, $id)

Delete a related item by id for resolutions.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\ImageCollectionApi();
$fk = "fk_example"; // string | Foreign key for resolutions
$id = "id_example"; // string | PersistedModel id

try {
    $api_instance->imageCollectionPrototypeDestroyByIdResolutions($fk, $id);
} catch (Exception $e) {
    echo 'Exception when calling ImageCollectionApi->imageCollectionPrototypeDestroyByIdResolutions: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **fk** | **string**| Foreign key for resolutions |
 **id** | **string**| PersistedModel id |

### Return type

void (empty response body)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **imageCollectionPrototypeFindByIdResolutions**
> \DBCDK\CommunityServices\Model\Resolution imageCollectionPrototypeFindByIdResolutions($fk, $id)

Find a related item by id for resolutions.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\ImageCollectionApi();
$fk = "fk_example"; // string | Foreign key for resolutions
$id = "id_example"; // string | PersistedModel id

try {
    $result = $api_instance->imageCollectionPrototypeFindByIdResolutions($fk, $id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ImageCollectionApi->imageCollectionPrototypeFindByIdResolutions: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **fk** | **string**| Foreign key for resolutions |
 **id** | **string**| PersistedModel id |

### Return type

[**\DBCDK\CommunityServices\Model\Resolution**](../Model/Resolution.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **imageCollectionPrototypeGetResolutions**
> \DBCDK\CommunityServices\Model\Resolution[] imageCollectionPrototypeGetResolutions($id, $filter)

Queries resolutions of imageCollection.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\ImageCollectionApi();
$id = "id_example"; // string | PersistedModel id
$filter = "filter_example"; // string | 

try {
    $result = $api_instance->imageCollectionPrototypeGetResolutions($id, $filter);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ImageCollectionApi->imageCollectionPrototypeGetResolutions: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| PersistedModel id |
 **filter** | **string**|  | [optional]

### Return type

[**\DBCDK\CommunityServices\Model\Resolution[]**](../Model/Resolution.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **imageCollectionPrototypeUpdateAttributes**
> \DBCDK\CommunityServices\Model\ImageCollection imageCollectionPrototypeUpdateAttributes($id, $data)

Update attributes for a model instance and persist it into the data source.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\ImageCollectionApi();
$id = "id_example"; // string | PersistedModel id
$data = new \DBCDK\CommunityServices\Model\ImageCollection(); // \DBCDK\CommunityServices\Model\ImageCollection | An object of model property name/value pairs

try {
    $result = $api_instance->imageCollectionPrototypeUpdateAttributes($id, $data);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ImageCollectionApi->imageCollectionPrototypeUpdateAttributes: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| PersistedModel id |
 **data** | [**\DBCDK\CommunityServices\Model\ImageCollection**](../Model/\DBCDK\CommunityServices\Model\ImageCollection.md)| An object of model property name/value pairs | [optional]

### Return type

[**\DBCDK\CommunityServices\Model\ImageCollection**](../Model/ImageCollection.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **imageCollectionPrototypeUpdateByIdResolutions**
> \DBCDK\CommunityServices\Model\Resolution imageCollectionPrototypeUpdateByIdResolutions($fk, $id, $data)

Update a related item by id for resolutions.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\ImageCollectionApi();
$fk = "fk_example"; // string | Foreign key for resolutions
$id = "id_example"; // string | PersistedModel id
$data = new \DBCDK\CommunityServices\Model\Resolution(); // \DBCDK\CommunityServices\Model\Resolution | 

try {
    $result = $api_instance->imageCollectionPrototypeUpdateByIdResolutions($fk, $id, $data);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ImageCollectionApi->imageCollectionPrototypeUpdateByIdResolutions: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **fk** | **string**| Foreign key for resolutions |
 **id** | **string**| PersistedModel id |
 **data** | [**\DBCDK\CommunityServices\Model\Resolution**](../Model/\DBCDK\CommunityServices\Model\Resolution.md)|  | [optional]

### Return type

[**\DBCDK\CommunityServices\Model\Resolution**](../Model/Resolution.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **imageCollectionUpdateAll**
> object imageCollectionUpdateAll($where, $data)

Update instances of the model matched by where from the data source.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\ImageCollectionApi();
$where = "where_example"; // string | Criteria to match model instances
$data = new \DBCDK\CommunityServices\Model\ImageCollection(); // \DBCDK\CommunityServices\Model\ImageCollection | An object of model property name/value pairs

try {
    $result = $api_instance->imageCollectionUpdateAll($where, $data);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ImageCollectionApi->imageCollectionUpdateAll: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **where** | **string**| Criteria to match model instances | [optional]
 **data** | [**\DBCDK\CommunityServices\Model\ImageCollection**](../Model/\DBCDK\CommunityServices\Model\ImageCollection.md)| An object of model property name/value pairs | [optional]

### Return type

**object**

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **imageCollectionUpload**
> object imageCollectionUpload($options, $container)

Uploads an image.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\ImageCollectionApi();
$options = "options_example"; // string | 
$container = "container_example"; // string | 

try {
    $result = $api_instance->imageCollectionUpload($options, $container);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ImageCollectionApi->imageCollectionUpload: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **options** | **string**|  | [optional]
 **container** | **string**|  | [optional]

### Return type

**object**

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **imageCollectionUpsert**
> \DBCDK\CommunityServices\Model\ImageCollection imageCollectionUpsert($data)

Update an existing model instance or insert a new one into the data source.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\ImageCollectionApi();
$data = new \DBCDK\CommunityServices\Model\ImageCollection(); // \DBCDK\CommunityServices\Model\ImageCollection | Model instance data

try {
    $result = $api_instance->imageCollectionUpsert($data);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ImageCollectionApi->imageCollectionUpsert: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **data** | [**\DBCDK\CommunityServices\Model\ImageCollection**](../Model/\DBCDK\CommunityServices\Model\ImageCollection.md)| Model instance data | [optional]

### Return type

[**\DBCDK\CommunityServices\Model\ImageCollection**](../Model/ImageCollection.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

