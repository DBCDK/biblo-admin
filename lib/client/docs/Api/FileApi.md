# DBCDK\CommunityServices\FileApi

All URIs are relative to *https://localhost/api*

Method | HTTP request | Description
------------- | ------------- | -------------
[**fileCount**](FileApi.md#fileCount) | **GET** /files/count | Count instances of the model matched by where from the data source.
[**fileCreate**](FileApi.md#fileCreate) | **POST** /files | Create a new instance of the model and persist it into the data source.
[**fileCreateChangeStreamGetFilesChangeStream**](FileApi.md#fileCreateChangeStreamGetFilesChangeStream) | **GET** /files/change-stream | Create a change stream.
[**fileCreateChangeStreamPostFilesChangeStream**](FileApi.md#fileCreateChangeStreamPostFilesChangeStream) | **POST** /files/change-stream | Create a change stream.
[**fileDeleteById**](FileApi.md#fileDeleteById) | **DELETE** /files/{id} | Delete a model instance by id from the data source.
[**fileExistsGetFilesidExists**](FileApi.md#fileExistsGetFilesidExists) | **GET** /files/{id}/exists | Check whether a model instance exists in the data source.
[**fileExistsHeadFilesid**](FileApi.md#fileExistsHeadFilesid) | **HEAD** /files/{id} | Check whether a model instance exists in the data source.
[**fileFind**](FileApi.md#fileFind) | **GET** /files | Find all instances of the model matched by filter from the data source.
[**fileFindById**](FileApi.md#fileFindById) | **GET** /files/{id} | Find a model instance by id from the data source.
[**fileFindOne**](FileApi.md#fileFindOne) | **GET** /files/findOne | Find first instance of the model matched by filter from the data source.
[**filePrototypeCountResolutions**](FileApi.md#filePrototypeCountResolutions) | **GET** /files/{id}/resolutions/count | Counts resolutions of file.
[**filePrototypeCreateResolutions**](FileApi.md#filePrototypeCreateResolutions) | **POST** /files/{id}/resolutions | Creates a new instance in resolutions of this model.
[**filePrototypeDeleteResolutions**](FileApi.md#filePrototypeDeleteResolutions) | **DELETE** /files/{id}/resolutions | Deletes all resolutions of this model.
[**filePrototypeDestroyByIdResolutions**](FileApi.md#filePrototypeDestroyByIdResolutions) | **DELETE** /files/{id}/resolutions/{fk} | Delete a related item by id for resolutions.
[**filePrototypeExistsResolutions**](FileApi.md#filePrototypeExistsResolutions) | **HEAD** /files/{id}/resolutions/rel/{fk} | Check the existence of resolutions relation to an item by id.
[**filePrototypeFindByIdResolutions**](FileApi.md#filePrototypeFindByIdResolutions) | **GET** /files/{id}/resolutions/{fk} | Find a related item by id for resolutions.
[**filePrototypeGetResolutions**](FileApi.md#filePrototypeGetResolutions) | **GET** /files/{id}/resolutions | Queries resolutions of file.
[**filePrototypeLinkResolutions**](FileApi.md#filePrototypeLinkResolutions) | **PUT** /files/{id}/resolutions/rel/{fk} | Add a related item by id for resolutions.
[**filePrototypeUnlinkResolutions**](FileApi.md#filePrototypeUnlinkResolutions) | **DELETE** /files/{id}/resolutions/rel/{fk} | Remove the resolutions relation to an item by id.
[**filePrototypeUpdateAttributes**](FileApi.md#filePrototypeUpdateAttributes) | **PUT** /files/{id} | Update attributes for a model instance and persist it into the data source.
[**filePrototypeUpdateByIdResolutions**](FileApi.md#filePrototypeUpdateByIdResolutions) | **PUT** /files/{id}/resolutions/{fk} | Update a related item by id for resolutions.
[**fileUpdateAll**](FileApi.md#fileUpdateAll) | **POST** /files/update | Update instances of the model matched by where from the data source.
[**fileUpload**](FileApi.md#fileUpload) | **POST** /files/upload | Uploads a file
[**fileUpsert**](FileApi.md#fileUpsert) | **PUT** /files | Update an existing model instance or insert a new one into the data source.


# **fileCount**
> \DBCDK\CommunityServices\Model\InlineResponse200 fileCount($where)

Count instances of the model matched by where from the data source.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\FileApi();
$where = "where_example"; // string | Criteria to match model instances

try {
    $result = $api_instance->fileCount($where);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FileApi->fileCount: ', $e->getMessage(), PHP_EOL;
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

# **fileCreate**
> \DBCDK\CommunityServices\Model\\SplFileObject fileCreate($data)

Create a new instance of the model and persist it into the data source.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\FileApi();
$data = "/path/to/file"; // \SplFileObject | Model instance data

try {
    $result = $api_instance->fileCreate($data);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FileApi->fileCreate: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **data** | [**\SplFileObject**](../Model/\SplFileObject.md)| Model instance data | [optional]

### Return type

[**\DBCDK\CommunityServices\Model\\SplFileObject**](../Model/\SplFileObject.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **fileCreateChangeStreamGetFilesChangeStream**
> \SplFileObject fileCreateChangeStreamGetFilesChangeStream($options)

Create a change stream.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\FileApi();
$options = "options_example"; // string | 

try {
    $result = $api_instance->fileCreateChangeStreamGetFilesChangeStream($options);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FileApi->fileCreateChangeStreamGetFilesChangeStream: ', $e->getMessage(), PHP_EOL;
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

# **fileCreateChangeStreamPostFilesChangeStream**
> \SplFileObject fileCreateChangeStreamPostFilesChangeStream($options)

Create a change stream.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\FileApi();
$options = "options_example"; // string | 

try {
    $result = $api_instance->fileCreateChangeStreamPostFilesChangeStream($options);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FileApi->fileCreateChangeStreamPostFilesChangeStream: ', $e->getMessage(), PHP_EOL;
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

# **fileDeleteById**
> object fileDeleteById($id)

Delete a model instance by id from the data source.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\FileApi();
$id = "id_example"; // string | Model id

try {
    $result = $api_instance->fileDeleteById($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FileApi->fileDeleteById: ', $e->getMessage(), PHP_EOL;
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

# **fileExistsGetFilesidExists**
> \DBCDK\CommunityServices\Model\InlineResponse2001 fileExistsGetFilesidExists($id)

Check whether a model instance exists in the data source.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\FileApi();
$id = "id_example"; // string | Model id

try {
    $result = $api_instance->fileExistsGetFilesidExists($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FileApi->fileExistsGetFilesidExists: ', $e->getMessage(), PHP_EOL;
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

# **fileExistsHeadFilesid**
> \DBCDK\CommunityServices\Model\InlineResponse2001 fileExistsHeadFilesid($id)

Check whether a model instance exists in the data source.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\FileApi();
$id = "id_example"; // string | Model id

try {
    $result = $api_instance->fileExistsHeadFilesid($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FileApi->fileExistsHeadFilesid: ', $e->getMessage(), PHP_EOL;
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

# **fileFind**
> \DBCDK\CommunityServices\Model\\SplFileObject[] fileFind($filter)

Find all instances of the model matched by filter from the data source.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\FileApi();
$filter = "filter_example"; // string | Filter defining fields, where, include, order, offset, and limit

try {
    $result = $api_instance->fileFind($filter);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FileApi->fileFind: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **filter** | **string**| Filter defining fields, where, include, order, offset, and limit | [optional]

### Return type

[**\DBCDK\CommunityServices\Model\\SplFileObject[]**](../Model/\SplFileObject.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **fileFindById**
> \DBCDK\CommunityServices\Model\\SplFileObject fileFindById($id, $filter)

Find a model instance by id from the data source.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\FileApi();
$id = "id_example"; // string | Model id
$filter = "filter_example"; // string | Filter defining fields and include

try {
    $result = $api_instance->fileFindById($id, $filter);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FileApi->fileFindById: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| Model id |
 **filter** | **string**| Filter defining fields and include | [optional]

### Return type

[**\DBCDK\CommunityServices\Model\\SplFileObject**](../Model/\SplFileObject.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **fileFindOne**
> \DBCDK\CommunityServices\Model\\SplFileObject fileFindOne($filter)

Find first instance of the model matched by filter from the data source.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\FileApi();
$filter = "filter_example"; // string | Filter defining fields, where, include, order, offset, and limit

try {
    $result = $api_instance->fileFindOne($filter);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FileApi->fileFindOne: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **filter** | **string**| Filter defining fields, where, include, order, offset, and limit | [optional]

### Return type

[**\DBCDK\CommunityServices\Model\\SplFileObject**](../Model/\SplFileObject.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **filePrototypeCountResolutions**
> \DBCDK\CommunityServices\Model\InlineResponse200 filePrototypeCountResolutions($id, $where)

Counts resolutions of file.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\FileApi();
$id = "id_example"; // string | PersistedModel id
$where = "where_example"; // string | Criteria to match model instances

try {
    $result = $api_instance->filePrototypeCountResolutions($id, $where);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FileApi->filePrototypeCountResolutions: ', $e->getMessage(), PHP_EOL;
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

# **filePrototypeCreateResolutions**
> \DBCDK\CommunityServices\Model\ImageCollection filePrototypeCreateResolutions($id, $data)

Creates a new instance in resolutions of this model.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\FileApi();
$id = "id_example"; // string | PersistedModel id
$data = new \DBCDK\CommunityServices\Model\ImageCollection(); // \DBCDK\CommunityServices\Model\ImageCollection | 

try {
    $result = $api_instance->filePrototypeCreateResolutions($id, $data);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FileApi->filePrototypeCreateResolutions: ', $e->getMessage(), PHP_EOL;
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

# **filePrototypeDeleteResolutions**
> filePrototypeDeleteResolutions($id)

Deletes all resolutions of this model.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\FileApi();
$id = "id_example"; // string | PersistedModel id

try {
    $api_instance->filePrototypeDeleteResolutions($id);
} catch (Exception $e) {
    echo 'Exception when calling FileApi->filePrototypeDeleteResolutions: ', $e->getMessage(), PHP_EOL;
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

# **filePrototypeDestroyByIdResolutions**
> filePrototypeDestroyByIdResolutions($fk, $id)

Delete a related item by id for resolutions.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\FileApi();
$fk = "fk_example"; // string | Foreign key for resolutions
$id = "id_example"; // string | PersistedModel id

try {
    $api_instance->filePrototypeDestroyByIdResolutions($fk, $id);
} catch (Exception $e) {
    echo 'Exception when calling FileApi->filePrototypeDestroyByIdResolutions: ', $e->getMessage(), PHP_EOL;
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

# **filePrototypeExistsResolutions**
> bool filePrototypeExistsResolutions($fk, $id)

Check the existence of resolutions relation to an item by id.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\FileApi();
$fk = "fk_example"; // string | Foreign key for resolutions
$id = "id_example"; // string | PersistedModel id

try {
    $result = $api_instance->filePrototypeExistsResolutions($fk, $id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FileApi->filePrototypeExistsResolutions: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **fk** | **string**| Foreign key for resolutions |
 **id** | **string**| PersistedModel id |

### Return type

**bool**

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **filePrototypeFindByIdResolutions**
> \DBCDK\CommunityServices\Model\ImageCollection filePrototypeFindByIdResolutions($fk, $id)

Find a related item by id for resolutions.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\FileApi();
$fk = "fk_example"; // string | Foreign key for resolutions
$id = "id_example"; // string | PersistedModel id

try {
    $result = $api_instance->filePrototypeFindByIdResolutions($fk, $id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FileApi->filePrototypeFindByIdResolutions: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **fk** | **string**| Foreign key for resolutions |
 **id** | **string**| PersistedModel id |

### Return type

[**\DBCDK\CommunityServices\Model\ImageCollection**](../Model/ImageCollection.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **filePrototypeGetResolutions**
> \DBCDK\CommunityServices\Model\ImageCollection[] filePrototypeGetResolutions($id, $filter)

Queries resolutions of file.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\FileApi();
$id = "id_example"; // string | PersistedModel id
$filter = "filter_example"; // string | 

try {
    $result = $api_instance->filePrototypeGetResolutions($id, $filter);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FileApi->filePrototypeGetResolutions: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| PersistedModel id |
 **filter** | **string**|  | [optional]

### Return type

[**\DBCDK\CommunityServices\Model\ImageCollection[]**](../Model/ImageCollection.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **filePrototypeLinkResolutions**
> \DBCDK\CommunityServices\Model\Resolution filePrototypeLinkResolutions($fk, $id, $data)

Add a related item by id for resolutions.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\FileApi();
$fk = "fk_example"; // string | Foreign key for resolutions
$id = "id_example"; // string | PersistedModel id
$data = new \DBCDK\CommunityServices\Model\Resolution(); // \DBCDK\CommunityServices\Model\Resolution | 

try {
    $result = $api_instance->filePrototypeLinkResolutions($fk, $id, $data);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FileApi->filePrototypeLinkResolutions: ', $e->getMessage(), PHP_EOL;
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

# **filePrototypeUnlinkResolutions**
> filePrototypeUnlinkResolutions($fk, $id)

Remove the resolutions relation to an item by id.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\FileApi();
$fk = "fk_example"; // string | Foreign key for resolutions
$id = "id_example"; // string | PersistedModel id

try {
    $api_instance->filePrototypeUnlinkResolutions($fk, $id);
} catch (Exception $e) {
    echo 'Exception when calling FileApi->filePrototypeUnlinkResolutions: ', $e->getMessage(), PHP_EOL;
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

# **filePrototypeUpdateAttributes**
> \DBCDK\CommunityServices\Model\\SplFileObject filePrototypeUpdateAttributes($id, $data)

Update attributes for a model instance and persist it into the data source.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\FileApi();
$id = "id_example"; // string | PersistedModel id
$data = "/path/to/file"; // \SplFileObject | An object of model property name/value pairs

try {
    $result = $api_instance->filePrototypeUpdateAttributes($id, $data);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FileApi->filePrototypeUpdateAttributes: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| PersistedModel id |
 **data** | [**\SplFileObject**](../Model/\SplFileObject.md)| An object of model property name/value pairs | [optional]

### Return type

[**\DBCDK\CommunityServices\Model\\SplFileObject**](../Model/\SplFileObject.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **filePrototypeUpdateByIdResolutions**
> \DBCDK\CommunityServices\Model\ImageCollection filePrototypeUpdateByIdResolutions($fk, $id, $data)

Update a related item by id for resolutions.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\FileApi();
$fk = "fk_example"; // string | Foreign key for resolutions
$id = "id_example"; // string | PersistedModel id
$data = new \DBCDK\CommunityServices\Model\ImageCollection(); // \DBCDK\CommunityServices\Model\ImageCollection | 

try {
    $result = $api_instance->filePrototypeUpdateByIdResolutions($fk, $id, $data);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FileApi->filePrototypeUpdateByIdResolutions: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **fk** | **string**| Foreign key for resolutions |
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

# **fileUpdateAll**
> object fileUpdateAll($where, $data)

Update instances of the model matched by where from the data source.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\FileApi();
$where = "where_example"; // string | Criteria to match model instances
$data = "/path/to/file"; // \SplFileObject | An object of model property name/value pairs

try {
    $result = $api_instance->fileUpdateAll($where, $data);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FileApi->fileUpdateAll: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **where** | **string**| Criteria to match model instances | [optional]
 **data** | [**\SplFileObject**](../Model/\SplFileObject.md)| An object of model property name/value pairs | [optional]

### Return type

**object**

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **fileUpload**
> object fileUpload($options, $container)

Uploads a file

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\FileApi();
$options = "options_example"; // string | 
$container = "container_example"; // string | 

try {
    $result = $api_instance->fileUpload($options, $container);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FileApi->fileUpload: ', $e->getMessage(), PHP_EOL;
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

# **fileUpsert**
> \DBCDK\CommunityServices\Model\\SplFileObject fileUpsert($data)

Update an existing model instance or insert a new one into the data source.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\FileApi();
$data = "/path/to/file"; // \SplFileObject | Model instance data

try {
    $result = $api_instance->fileUpsert($data);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FileApi->fileUpsert: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **data** | [**\SplFileObject**](../Model/\SplFileObject.md)| Model instance data | [optional]

### Return type

[**\DBCDK\CommunityServices\Model\\SplFileObject**](../Model/\SplFileObject.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

