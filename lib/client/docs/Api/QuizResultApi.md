# DBCDK\CommunityServices\QuizResultApi

All URIs are relative to *https://localhost/api*

Method | HTTP request | Description
------------- | ------------- | -------------
[**quizResultCount**](QuizResultApi.md#quizResultCount) | **GET** /QuizResults/count | Count instances of the model matched by where from the data source.
[**quizResultCreate**](QuizResultApi.md#quizResultCreate) | **POST** /QuizResults | Create a new instance of the model and persist it into the data source.
[**quizResultCreateChangeStreamGetQuizResultsChangeStream**](QuizResultApi.md#quizResultCreateChangeStreamGetQuizResultsChangeStream) | **GET** /QuizResults/change-stream | Create a change stream.
[**quizResultCreateChangeStreamPostQuizResultsChangeStream**](QuizResultApi.md#quizResultCreateChangeStreamPostQuizResultsChangeStream) | **POST** /QuizResults/change-stream | Create a change stream.
[**quizResultDeleteById**](QuizResultApi.md#quizResultDeleteById) | **DELETE** /QuizResults/{id} | Delete a model instance by {{id}} from the data source.
[**quizResultExistsGetQuizResultsidExists**](QuizResultApi.md#quizResultExistsGetQuizResultsidExists) | **GET** /QuizResults/{id}/exists | Check whether a model instance exists in the data source.
[**quizResultExistsHeadQuizResultsid**](QuizResultApi.md#quizResultExistsHeadQuizResultsid) | **HEAD** /QuizResults/{id} | Check whether a model instance exists in the data source.
[**quizResultFind**](QuizResultApi.md#quizResultFind) | **GET** /QuizResults | Find all instances of the model matched by filter from the data source.
[**quizResultFindById**](QuizResultApi.md#quizResultFindById) | **GET** /QuizResults/{id} | Find a model instance by {{id}} from the data source.
[**quizResultFindOne**](QuizResultApi.md#quizResultFindOne) | **GET** /QuizResults/findOne | Find first instance of the model matched by filter from the data source.
[**quizResultPrototypeGetProfiles**](QuizResultApi.md#quizResultPrototypeGetProfiles) | **GET** /QuizResults/{id}/profiles | Fetches belongsTo relation profiles.
[**quizResultPrototypeUpdateAttributesPatchQuizResultsid**](QuizResultApi.md#quizResultPrototypeUpdateAttributesPatchQuizResultsid) | **PATCH** /QuizResults/{id} | Patch attributes for a model instance and persist it into the data source.
[**quizResultPrototypeUpdateAttributesPutQuizResultsid**](QuizResultApi.md#quizResultPrototypeUpdateAttributesPutQuizResultsid) | **PUT** /QuizResults/{id} | Patch attributes for a model instance and persist it into the data source.
[**quizResultReplaceById**](QuizResultApi.md#quizResultReplaceById) | **POST** /QuizResults/{id}/replace | Replace attributes for a model instance and persist it into the data source.
[**quizResultReplaceOrCreate**](QuizResultApi.md#quizResultReplaceOrCreate) | **POST** /QuizResults/replaceOrCreate | Replace an existing model instance or insert a new one into the data source.
[**quizResultUpdateAll**](QuizResultApi.md#quizResultUpdateAll) | **POST** /QuizResults/update | Update instances of the model matched by {{where}} from the data source.
[**quizResultUpsertPatchQuizResults**](QuizResultApi.md#quizResultUpsertPatchQuizResults) | **PATCH** /QuizResults | Patch an existing model instance or insert a new one into the data source.
[**quizResultUpsertPutQuizResults**](QuizResultApi.md#quizResultUpsertPutQuizResults) | **PUT** /QuizResults | Patch an existing model instance or insert a new one into the data source.
[**quizResultUpsertWithWhere**](QuizResultApi.md#quizResultUpsertWithWhere) | **POST** /QuizResults/upsertWithWhere | Update an existing model instance or insert a new one into the data source based on the where criteria.


# **quizResultCount**
> \DBCDK\CommunityServices\Model\InlineResponse200 quizResultCount($where)

Count instances of the model matched by where from the data source.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\QuizResultApi();
$where = "where_example"; // string | Criteria to match model instances

try {
    $result = $api_instance->quizResultCount($where);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling QuizResultApi->quizResultCount: ', $e->getMessage(), PHP_EOL;
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

# **quizResultCreate**
> \DBCDK\CommunityServices\Model\QuizResult quizResultCreate($data)

Create a new instance of the model and persist it into the data source.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\QuizResultApi();
$data = new \DBCDK\CommunityServices\Model\QuizResult(); // \DBCDK\CommunityServices\Model\QuizResult | Model instance data

try {
    $result = $api_instance->quizResultCreate($data);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling QuizResultApi->quizResultCreate: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **data** | [**\DBCDK\CommunityServices\Model\QuizResult**](../Model/\DBCDK\CommunityServices\Model\QuizResult.md)| Model instance data | [optional]

### Return type

[**\DBCDK\CommunityServices\Model\QuizResult**](../Model/QuizResult.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **quizResultCreateChangeStreamGetQuizResultsChangeStream**
> \SplFileObject quizResultCreateChangeStreamGetQuizResultsChangeStream($options)

Create a change stream.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\QuizResultApi();
$options = "options_example"; // string | 

try {
    $result = $api_instance->quizResultCreateChangeStreamGetQuizResultsChangeStream($options);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling QuizResultApi->quizResultCreateChangeStreamGetQuizResultsChangeStream: ', $e->getMessage(), PHP_EOL;
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

# **quizResultCreateChangeStreamPostQuizResultsChangeStream**
> \SplFileObject quizResultCreateChangeStreamPostQuizResultsChangeStream($options)

Create a change stream.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\QuizResultApi();
$options = "options_example"; // string | 

try {
    $result = $api_instance->quizResultCreateChangeStreamPostQuizResultsChangeStream($options);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling QuizResultApi->quizResultCreateChangeStreamPostQuizResultsChangeStream: ', $e->getMessage(), PHP_EOL;
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

# **quizResultDeleteById**
> object quizResultDeleteById($id)

Delete a model instance by {{id}} from the data source.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\QuizResultApi();
$id = "id_example"; // string | Model id

try {
    $result = $api_instance->quizResultDeleteById($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling QuizResultApi->quizResultDeleteById: ', $e->getMessage(), PHP_EOL;
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

# **quizResultExistsGetQuizResultsidExists**
> \DBCDK\CommunityServices\Model\InlineResponse2002 quizResultExistsGetQuizResultsidExists($id)

Check whether a model instance exists in the data source.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\QuizResultApi();
$id = "id_example"; // string | Model id

try {
    $result = $api_instance->quizResultExistsGetQuizResultsidExists($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling QuizResultApi->quizResultExistsGetQuizResultsidExists: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| Model id |

### Return type

[**\DBCDK\CommunityServices\Model\InlineResponse2002**](../Model/InlineResponse2002.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **quizResultExistsHeadQuizResultsid**
> \DBCDK\CommunityServices\Model\InlineResponse2002 quizResultExistsHeadQuizResultsid($id)

Check whether a model instance exists in the data source.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\QuizResultApi();
$id = "id_example"; // string | Model id

try {
    $result = $api_instance->quizResultExistsHeadQuizResultsid($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling QuizResultApi->quizResultExistsHeadQuizResultsid: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| Model id |

### Return type

[**\DBCDK\CommunityServices\Model\InlineResponse2002**](../Model/InlineResponse2002.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **quizResultFind**
> \DBCDK\CommunityServices\Model\QuizResult[] quizResultFind($filter)

Find all instances of the model matched by filter from the data source.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\QuizResultApi();
$filter = "filter_example"; // string | Filter defining fields, where, include, order, offset, and limit - must be a JSON-encoded string ({\"something\":\"value\"})

try {
    $result = $api_instance->quizResultFind($filter);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling QuizResultApi->quizResultFind: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **filter** | **string**| Filter defining fields, where, include, order, offset, and limit - must be a JSON-encoded string ({\&quot;something\&quot;:\&quot;value\&quot;}) | [optional]

### Return type

[**\DBCDK\CommunityServices\Model\QuizResult[]**](../Model/QuizResult.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **quizResultFindById**
> \DBCDK\CommunityServices\Model\QuizResult quizResultFindById($id, $filter)

Find a model instance by {{id}} from the data source.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\QuizResultApi();
$id = "id_example"; // string | Model id
$filter = "filter_example"; // string | Filter defining fields and include - must be a JSON-encoded string ({\"something\":\"value\"})

try {
    $result = $api_instance->quizResultFindById($id, $filter);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling QuizResultApi->quizResultFindById: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| Model id |
 **filter** | **string**| Filter defining fields and include - must be a JSON-encoded string ({\&quot;something\&quot;:\&quot;value\&quot;}) | [optional]

### Return type

[**\DBCDK\CommunityServices\Model\QuizResult**](../Model/QuizResult.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **quizResultFindOne**
> \DBCDK\CommunityServices\Model\QuizResult quizResultFindOne($filter)

Find first instance of the model matched by filter from the data source.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\QuizResultApi();
$filter = "filter_example"; // string | Filter defining fields, where, include, order, offset, and limit - must be a JSON-encoded string ({\"something\":\"value\"})

try {
    $result = $api_instance->quizResultFindOne($filter);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling QuizResultApi->quizResultFindOne: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **filter** | **string**| Filter defining fields, where, include, order, offset, and limit - must be a JSON-encoded string ({\&quot;something\&quot;:\&quot;value\&quot;}) | [optional]

### Return type

[**\DBCDK\CommunityServices\Model\QuizResult**](../Model/QuizResult.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **quizResultPrototypeGetProfiles**
> \DBCDK\CommunityServices\Model\Profile quizResultPrototypeGetProfiles($id, $refresh)

Fetches belongsTo relation profiles.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\QuizResultApi();
$id = "id_example"; // string | QuizResult id
$refresh = true; // bool | 

try {
    $result = $api_instance->quizResultPrototypeGetProfiles($id, $refresh);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling QuizResultApi->quizResultPrototypeGetProfiles: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| QuizResult id |
 **refresh** | **bool**|  | [optional]

### Return type

[**\DBCDK\CommunityServices\Model\Profile**](../Model/Profile.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **quizResultPrototypeUpdateAttributesPatchQuizResultsid**
> \DBCDK\CommunityServices\Model\QuizResult quizResultPrototypeUpdateAttributesPatchQuizResultsid($id, $data)

Patch attributes for a model instance and persist it into the data source.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\QuizResultApi();
$id = "id_example"; // string | QuizResult id
$data = new \DBCDK\CommunityServices\Model\QuizResult(); // \DBCDK\CommunityServices\Model\QuizResult | An object of model property name/value pairs

try {
    $result = $api_instance->quizResultPrototypeUpdateAttributesPatchQuizResultsid($id, $data);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling QuizResultApi->quizResultPrototypeUpdateAttributesPatchQuizResultsid: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| QuizResult id |
 **data** | [**\DBCDK\CommunityServices\Model\QuizResult**](../Model/\DBCDK\CommunityServices\Model\QuizResult.md)| An object of model property name/value pairs | [optional]

### Return type

[**\DBCDK\CommunityServices\Model\QuizResult**](../Model/QuizResult.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **quizResultPrototypeUpdateAttributesPutQuizResultsid**
> \DBCDK\CommunityServices\Model\QuizResult quizResultPrototypeUpdateAttributesPutQuizResultsid($id, $data)

Patch attributes for a model instance and persist it into the data source.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\QuizResultApi();
$id = "id_example"; // string | QuizResult id
$data = new \DBCDK\CommunityServices\Model\QuizResult(); // \DBCDK\CommunityServices\Model\QuizResult | An object of model property name/value pairs

try {
    $result = $api_instance->quizResultPrototypeUpdateAttributesPutQuizResultsid($id, $data);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling QuizResultApi->quizResultPrototypeUpdateAttributesPutQuizResultsid: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| QuizResult id |
 **data** | [**\DBCDK\CommunityServices\Model\QuizResult**](../Model/\DBCDK\CommunityServices\Model\QuizResult.md)| An object of model property name/value pairs | [optional]

### Return type

[**\DBCDK\CommunityServices\Model\QuizResult**](../Model/QuizResult.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **quizResultReplaceById**
> \DBCDK\CommunityServices\Model\QuizResult quizResultReplaceById($id, $data)

Replace attributes for a model instance and persist it into the data source.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\QuizResultApi();
$id = "id_example"; // string | Model id
$data = new \DBCDK\CommunityServices\Model\QuizResult(); // \DBCDK\CommunityServices\Model\QuizResult | Model instance data

try {
    $result = $api_instance->quizResultReplaceById($id, $data);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling QuizResultApi->quizResultReplaceById: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| Model id |
 **data** | [**\DBCDK\CommunityServices\Model\QuizResult**](../Model/\DBCDK\CommunityServices\Model\QuizResult.md)| Model instance data | [optional]

### Return type

[**\DBCDK\CommunityServices\Model\QuizResult**](../Model/QuizResult.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **quizResultReplaceOrCreate**
> \DBCDK\CommunityServices\Model\QuizResult quizResultReplaceOrCreate($data)

Replace an existing model instance or insert a new one into the data source.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\QuizResultApi();
$data = new \DBCDK\CommunityServices\Model\QuizResult(); // \DBCDK\CommunityServices\Model\QuizResult | Model instance data

try {
    $result = $api_instance->quizResultReplaceOrCreate($data);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling QuizResultApi->quizResultReplaceOrCreate: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **data** | [**\DBCDK\CommunityServices\Model\QuizResult**](../Model/\DBCDK\CommunityServices\Model\QuizResult.md)| Model instance data | [optional]

### Return type

[**\DBCDK\CommunityServices\Model\QuizResult**](../Model/QuizResult.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **quizResultUpdateAll**
> \DBCDK\CommunityServices\Model\InlineResponse2001 quizResultUpdateAll($where, $data)

Update instances of the model matched by {{where}} from the data source.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\QuizResultApi();
$where = "where_example"; // string | Criteria to match model instances
$data = new \DBCDK\CommunityServices\Model\QuizResult(); // \DBCDK\CommunityServices\Model\QuizResult | An object of model property name/value pairs

try {
    $result = $api_instance->quizResultUpdateAll($where, $data);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling QuizResultApi->quizResultUpdateAll: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **where** | **string**| Criteria to match model instances | [optional]
 **data** | [**\DBCDK\CommunityServices\Model\QuizResult**](../Model/\DBCDK\CommunityServices\Model\QuizResult.md)| An object of model property name/value pairs | [optional]

### Return type

[**\DBCDK\CommunityServices\Model\InlineResponse2001**](../Model/InlineResponse2001.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **quizResultUpsertPatchQuizResults**
> \DBCDK\CommunityServices\Model\QuizResult quizResultUpsertPatchQuizResults($data)

Patch an existing model instance or insert a new one into the data source.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\QuizResultApi();
$data = new \DBCDK\CommunityServices\Model\QuizResult(); // \DBCDK\CommunityServices\Model\QuizResult | Model instance data

try {
    $result = $api_instance->quizResultUpsertPatchQuizResults($data);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling QuizResultApi->quizResultUpsertPatchQuizResults: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **data** | [**\DBCDK\CommunityServices\Model\QuizResult**](../Model/\DBCDK\CommunityServices\Model\QuizResult.md)| Model instance data | [optional]

### Return type

[**\DBCDK\CommunityServices\Model\QuizResult**](../Model/QuizResult.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **quizResultUpsertPutQuizResults**
> \DBCDK\CommunityServices\Model\QuizResult quizResultUpsertPutQuizResults($data)

Patch an existing model instance or insert a new one into the data source.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\QuizResultApi();
$data = new \DBCDK\CommunityServices\Model\QuizResult(); // \DBCDK\CommunityServices\Model\QuizResult | Model instance data

try {
    $result = $api_instance->quizResultUpsertPutQuizResults($data);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling QuizResultApi->quizResultUpsertPutQuizResults: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **data** | [**\DBCDK\CommunityServices\Model\QuizResult**](../Model/\DBCDK\CommunityServices\Model\QuizResult.md)| Model instance data | [optional]

### Return type

[**\DBCDK\CommunityServices\Model\QuizResult**](../Model/QuizResult.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **quizResultUpsertWithWhere**
> \DBCDK\CommunityServices\Model\QuizResult quizResultUpsertWithWhere($where, $data)

Update an existing model instance or insert a new one into the data source based on the where criteria.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\QuizResultApi();
$where = "where_example"; // string | Criteria to match model instances
$data = new \DBCDK\CommunityServices\Model\QuizResult(); // \DBCDK\CommunityServices\Model\QuizResult | An object of model property name/value pairs

try {
    $result = $api_instance->quizResultUpsertWithWhere($where, $data);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling QuizResultApi->quizResultUpsertWithWhere: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **where** | **string**| Criteria to match model instances | [optional]
 **data** | [**\DBCDK\CommunityServices\Model\QuizResult**](../Model/\DBCDK\CommunityServices\Model\QuizResult.md)| An object of model property name/value pairs | [optional]

### Return type

[**\DBCDK\CommunityServices\Model\QuizResult**](../Model/QuizResult.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

