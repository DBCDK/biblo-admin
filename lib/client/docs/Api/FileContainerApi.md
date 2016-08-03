# DBCDK\CommunityServices\FileContainerApi

All URIs are relative to *https://localhost/api*

Method | HTTP request | Description
------------- | ------------- | -------------
[**fileContainerCount**](FileContainerApi.md#fileContainerCount) | **GET** /fileContainers/count | Count instances of the model matched by where from the data source.
[**fileContainerCreate**](FileContainerApi.md#fileContainerCreate) | **POST** /fileContainers | Create a new instance of the model and persist it into the data source.
[**fileContainerCreateChangeStreamGetFileContainersChangeStream**](FileContainerApi.md#fileContainerCreateChangeStreamGetFileContainersChangeStream) | **GET** /fileContainers/change-stream | Create a change stream.
[**fileContainerCreateChangeStreamPostFileContainersChangeStream**](FileContainerApi.md#fileContainerCreateChangeStreamPostFileContainersChangeStream) | **POST** /fileContainers/change-stream | Create a change stream.
[**fileContainerDeleteById**](FileContainerApi.md#fileContainerDeleteById) | **DELETE** /fileContainers/{id} | Delete a model instance by id from the data source.
[**fileContainerDestroyContainer**](FileContainerApi.md#fileContainerDestroyContainer) | **DELETE** /fileContainers/{container} | 
[**fileContainerDownload**](FileContainerApi.md#fileContainerDownload) | **GET** /fileContainers/{container}/download/{file} | 
[**fileContainerExistsGetFileContainersidExists**](FileContainerApi.md#fileContainerExistsGetFileContainersidExists) | **GET** /fileContainers/{id}/exists | Check whether a model instance exists in the data source.
[**fileContainerExistsHeadFileContainersid**](FileContainerApi.md#fileContainerExistsHeadFileContainersid) | **HEAD** /fileContainers/{id} | Check whether a model instance exists in the data source.
[**fileContainerFind**](FileContainerApi.md#fileContainerFind) | **GET** /fileContainers | Find all instances of the model matched by filter from the data source.
[**fileContainerFindById**](FileContainerApi.md#fileContainerFindById) | **GET** /fileContainers/{id} | Find a model instance by id from the data source.
[**fileContainerFindOne**](FileContainerApi.md#fileContainerFindOne) | **GET** /fileContainers/findOne | Find first instance of the model matched by filter from the data source.
[**fileContainerGetContainer**](FileContainerApi.md#fileContainerGetContainer) | **GET** /fileContainers/{container} | 
[**fileContainerGetFile**](FileContainerApi.md#fileContainerGetFile) | **GET** /fileContainers/{container}/files/{file} | 
[**fileContainerGetFiles**](FileContainerApi.md#fileContainerGetFiles) | **GET** /fileContainers/{container}/files | 
[**fileContainerPrototypeUpdateAttributes**](FileContainerApi.md#fileContainerPrototypeUpdateAttributes) | **PUT** /fileContainers/{id} | Update attributes for a model instance and persist it into the data source.
[**fileContainerRemoveFile**](FileContainerApi.md#fileContainerRemoveFile) | **DELETE** /fileContainers/{container}/files/{file} | 
[**fileContainerUpdateAll**](FileContainerApi.md#fileContainerUpdateAll) | **POST** /fileContainers/update | Update instances of the model matched by where from the data source.
[**fileContainerUpload**](FileContainerApi.md#fileContainerUpload) | **POST** /fileContainers/{container}/upload | 
[**fileContainerUpsert**](FileContainerApi.md#fileContainerUpsert) | **PUT** /fileContainers | Update an existing model instance or insert a new one into the data source.


# **fileContainerCount**
> \DBCDK\CommunityServices\Model\InlineResponse200 fileContainerCount($where)

Count instances of the model matched by where from the data source.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\FileContainerApi();
$where = "where_example"; // string | Criteria to match model instances

try {
    $result = $api_instance->fileContainerCount($where);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FileContainerApi->fileContainerCount: ', $e->getMessage(), PHP_EOL;
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

# **fileContainerCreate**
> \DBCDK\CommunityServices\Model\FileContainer fileContainerCreate($data)

Create a new instance of the model and persist it into the data source.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\FileContainerApi();
$data = new \DBCDK\CommunityServices\Model\FileContainer(); // \DBCDK\CommunityServices\Model\FileContainer | Model instance data

try {
    $result = $api_instance->fileContainerCreate($data);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FileContainerApi->fileContainerCreate: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **data** | [**\DBCDK\CommunityServices\Model\FileContainer**](../Model/\DBCDK\CommunityServices\Model\FileContainer.md)| Model instance data | [optional]

### Return type

[**\DBCDK\CommunityServices\Model\FileContainer**](../Model/FileContainer.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **fileContainerCreateChangeStreamGetFileContainersChangeStream**
> \SplFileObject fileContainerCreateChangeStreamGetFileContainersChangeStream($options)

Create a change stream.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\FileContainerApi();
$options = "options_example"; // string | 

try {
    $result = $api_instance->fileContainerCreateChangeStreamGetFileContainersChangeStream($options);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FileContainerApi->fileContainerCreateChangeStreamGetFileContainersChangeStream: ', $e->getMessage(), PHP_EOL;
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

# **fileContainerCreateChangeStreamPostFileContainersChangeStream**
> \SplFileObject fileContainerCreateChangeStreamPostFileContainersChangeStream($options)

Create a change stream.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\FileContainerApi();
$options = "options_example"; // string | 

try {
    $result = $api_instance->fileContainerCreateChangeStreamPostFileContainersChangeStream($options);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FileContainerApi->fileContainerCreateChangeStreamPostFileContainersChangeStream: ', $e->getMessage(), PHP_EOL;
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

# **fileContainerDeleteById**
> object fileContainerDeleteById($id)

Delete a model instance by id from the data source.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\FileContainerApi();
$id = "id_example"; // string | Model id

try {
    $result = $api_instance->fileContainerDeleteById($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FileContainerApi->fileContainerDeleteById: ', $e->getMessage(), PHP_EOL;
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

# **fileContainerDestroyContainer**
> \DBCDK\CommunityServices\Model\InlineResponse2002 fileContainerDestroyContainer($container)



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\FileContainerApi();
$container = "container_example"; // string | 

try {
    $result = $api_instance->fileContainerDestroyContainer($container);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FileContainerApi->fileContainerDestroyContainer: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **container** | **string**|  |

### Return type

[**\DBCDK\CommunityServices\Model\InlineResponse2002**](../Model/InlineResponse2002.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **fileContainerDownload**
> fileContainerDownload($container, $file)



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\FileContainerApi();
$container = "container_example"; // string | 
$file = "file_example"; // string | 

try {
    $api_instance->fileContainerDownload($container, $file);
} catch (Exception $e) {
    echo 'Exception when calling FileContainerApi->fileContainerDownload: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **container** | **string**|  |
 **file** | **string**|  |

### Return type

void (empty response body)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **fileContainerExistsGetFileContainersidExists**
> \DBCDK\CommunityServices\Model\InlineResponse2001 fileContainerExistsGetFileContainersidExists($id)

Check whether a model instance exists in the data source.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\FileContainerApi();
$id = "id_example"; // string | Model id

try {
    $result = $api_instance->fileContainerExistsGetFileContainersidExists($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FileContainerApi->fileContainerExistsGetFileContainersidExists: ', $e->getMessage(), PHP_EOL;
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

# **fileContainerExistsHeadFileContainersid**
> \DBCDK\CommunityServices\Model\InlineResponse2001 fileContainerExistsHeadFileContainersid($id)

Check whether a model instance exists in the data source.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\FileContainerApi();
$id = "id_example"; // string | Model id

try {
    $result = $api_instance->fileContainerExistsHeadFileContainersid($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FileContainerApi->fileContainerExistsHeadFileContainersid: ', $e->getMessage(), PHP_EOL;
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

# **fileContainerFind**
> \DBCDK\CommunityServices\Model\FileContainer[] fileContainerFind($filter)

Find all instances of the model matched by filter from the data source.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\FileContainerApi();
$filter = "filter_example"; // string | Filter defining fields, where, include, order, offset, and limit

try {
    $result = $api_instance->fileContainerFind($filter);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FileContainerApi->fileContainerFind: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **filter** | **string**| Filter defining fields, where, include, order, offset, and limit | [optional]

### Return type

[**\DBCDK\CommunityServices\Model\FileContainer[]**](../Model/FileContainer.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **fileContainerFindById**
> \DBCDK\CommunityServices\Model\FileContainer fileContainerFindById($id, $filter)

Find a model instance by id from the data source.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\FileContainerApi();
$id = "id_example"; // string | Model id
$filter = "filter_example"; // string | Filter defining fields and include

try {
    $result = $api_instance->fileContainerFindById($id, $filter);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FileContainerApi->fileContainerFindById: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| Model id |
 **filter** | **string**| Filter defining fields and include | [optional]

### Return type

[**\DBCDK\CommunityServices\Model\FileContainer**](../Model/FileContainer.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **fileContainerFindOne**
> \DBCDK\CommunityServices\Model\FileContainer fileContainerFindOne($filter)

Find first instance of the model matched by filter from the data source.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\FileContainerApi();
$filter = "filter_example"; // string | Filter defining fields, where, include, order, offset, and limit

try {
    $result = $api_instance->fileContainerFindOne($filter);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FileContainerApi->fileContainerFindOne: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **filter** | **string**| Filter defining fields, where, include, order, offset, and limit | [optional]

### Return type

[**\DBCDK\CommunityServices\Model\FileContainer**](../Model/FileContainer.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **fileContainerGetContainer**
> object fileContainerGetContainer($container)



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\FileContainerApi();
$container = "container_example"; // string | 

try {
    $result = $api_instance->fileContainerGetContainer($container);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FileContainerApi->fileContainerGetContainer: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **container** | **string**|  |

### Return type

**object**

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **fileContainerGetFile**
> object fileContainerGetFile($container, $file)



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\FileContainerApi();
$container = "container_example"; // string | 
$file = "file_example"; // string | 

try {
    $result = $api_instance->fileContainerGetFile($container, $file);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FileContainerApi->fileContainerGetFile: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **container** | **string**|  |
 **file** | **string**|  |

### Return type

**object**

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **fileContainerGetFiles**
> \DBCDK\CommunityServices\Model\XAny[] fileContainerGetFiles($container)



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\FileContainerApi();
$container = "container_example"; // string | 

try {
    $result = $api_instance->fileContainerGetFiles($container);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FileContainerApi->fileContainerGetFiles: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **container** | **string**|  |

### Return type

[**\DBCDK\CommunityServices\Model\XAny[]**](../Model/XAny.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **fileContainerPrototypeUpdateAttributes**
> \DBCDK\CommunityServices\Model\FileContainer fileContainerPrototypeUpdateAttributes($id, $data)

Update attributes for a model instance and persist it into the data source.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\FileContainerApi();
$id = "id_example"; // string | PersistedModel id
$data = new \DBCDK\CommunityServices\Model\FileContainer(); // \DBCDK\CommunityServices\Model\FileContainer | An object of model property name/value pairs

try {
    $result = $api_instance->fileContainerPrototypeUpdateAttributes($id, $data);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FileContainerApi->fileContainerPrototypeUpdateAttributes: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| PersistedModel id |
 **data** | [**\DBCDK\CommunityServices\Model\FileContainer**](../Model/\DBCDK\CommunityServices\Model\FileContainer.md)| An object of model property name/value pairs | [optional]

### Return type

[**\DBCDK\CommunityServices\Model\FileContainer**](../Model/FileContainer.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **fileContainerRemoveFile**
> \DBCDK\CommunityServices\Model\InlineResponse2002 fileContainerRemoveFile($container, $file)



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\FileContainerApi();
$container = "container_example"; // string | 
$file = "file_example"; // string | 

try {
    $result = $api_instance->fileContainerRemoveFile($container, $file);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FileContainerApi->fileContainerRemoveFile: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **container** | **string**|  |
 **file** | **string**|  |

### Return type

[**\DBCDK\CommunityServices\Model\InlineResponse2002**](../Model/InlineResponse2002.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **fileContainerUpdateAll**
> object fileContainerUpdateAll($where, $data)

Update instances of the model matched by where from the data source.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\FileContainerApi();
$where = "where_example"; // string | Criteria to match model instances
$data = new \DBCDK\CommunityServices\Model\FileContainer(); // \DBCDK\CommunityServices\Model\FileContainer | An object of model property name/value pairs

try {
    $result = $api_instance->fileContainerUpdateAll($where, $data);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FileContainerApi->fileContainerUpdateAll: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **where** | **string**| Criteria to match model instances | [optional]
 **data** | [**\DBCDK\CommunityServices\Model\FileContainer**](../Model/\DBCDK\CommunityServices\Model\FileContainer.md)| An object of model property name/value pairs | [optional]

### Return type

**object**

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **fileContainerUpload**
> \DBCDK\CommunityServices\Model\InlineResponse2003 fileContainerUpload()



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\FileContainerApi();

try {
    $result = $api_instance->fileContainerUpload();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FileContainerApi->fileContainerUpload: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters
This endpoint does not need any parameter.

### Return type

[**\DBCDK\CommunityServices\Model\InlineResponse2003**](../Model/InlineResponse2003.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **fileContainerUpsert**
> \DBCDK\CommunityServices\Model\FileContainer fileContainerUpsert($data)

Update an existing model instance or insert a new one into the data source.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\FileContainerApi();
$data = new \DBCDK\CommunityServices\Model\FileContainer(); // \DBCDK\CommunityServices\Model\FileContainer | Model instance data

try {
    $result = $api_instance->fileContainerUpsert($data);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FileContainerApi->fileContainerUpsert: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **data** | [**\DBCDK\CommunityServices\Model\FileContainer**](../Model/\DBCDK\CommunityServices\Model\FileContainer.md)| Model instance data | [optional]

### Return type

[**\DBCDK\CommunityServices\Model\FileContainer**](../Model/FileContainer.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

