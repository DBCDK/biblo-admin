# DBCDK\CommunityServices\ProfileApi

All URIs are relative to *https://localhost/api*

Method | HTTP request | Description
------------- | ------------- | -------------
[**profileCheckIfDisplayNameIsTaken**](ProfileApi.md#profileCheckIfDisplayNameIsTaken) | **POST** /Profiles/checkIfDisplayNameIsTaken | Check if displayname exists
[**profileCheckIfUserExists**](ProfileApi.md#profileCheckIfUserExists) | **POST** /Profiles/checkIfUserExists | Check if a user exists.
[**profileCount**](ProfileApi.md#profileCount) | **GET** /Profiles/count | Count instances of the model matched by where from the data source.
[**profileCreate**](ProfileApi.md#profileCreate) | **POST** /Profiles | Create a new instance of the model and persist it into the data source.
[**profileCreateChangeStreamGetProfilesChangeStream**](ProfileApi.md#profileCreateChangeStreamGetProfilesChangeStream) | **GET** /Profiles/change-stream | Create a change stream.
[**profileCreateChangeStreamPostProfilesChangeStream**](ProfileApi.md#profileCreateChangeStreamPostProfilesChangeStream) | **POST** /Profiles/change-stream | Create a change stream.
[**profileDeleteById**](ProfileApi.md#profileDeleteById) | **DELETE** /Profiles/{id} | Delete a model instance by id from the data source.
[**profileExistsGetProfilesidExists**](ProfileApi.md#profileExistsGetProfilesidExists) | **GET** /Profiles/{id}/exists | Check whether a model instance exists in the data source.
[**profileExistsHeadProfilesid**](ProfileApi.md#profileExistsHeadProfilesid) | **HEAD** /Profiles/{id} | Check whether a model instance exists in the data source.
[**profileFind**](ProfileApi.md#profileFind) | **GET** /Profiles | Find all instances of the model matched by filter from the data source.
[**profileFindById**](ProfileApi.md#profileFindById) | **GET** /Profiles/{id} | Find a model instance by id from the data source.
[**profileFindOne**](ProfileApi.md#profileFindOne) | **GET** /Profiles/findOne | Find first instance of the model matched by filter from the data source.
[**profileLogout**](ProfileApi.md#profileLogout) | **POST** /Profiles/logout | Logout a user with access token.
[**profilePrototypeCountAccessTokens**](ProfileApi.md#profilePrototypeCountAccessTokens) | **GET** /Profiles/{id}/accessTokens/count | Counts accessTokens of Profile.
[**profilePrototypeCountComments**](ProfileApi.md#profilePrototypeCountComments) | **GET** /Profiles/{id}/comments/count | Counts comments of Profile.
[**profilePrototypeCountCommunityRoles**](ProfileApi.md#profilePrototypeCountCommunityRoles) | **GET** /Profiles/{id}/communityRoles/count | Counts communityRoles of Profile.
[**profilePrototypeCountGroups**](ProfileApi.md#profilePrototypeCountGroups) | **GET** /Profiles/{id}/groups/count | Counts groups of Profile.
[**profilePrototypeCountLikes**](ProfileApi.md#profilePrototypeCountLikes) | **GET** /Profiles/{id}/likes/count | Counts likes of Profile.
[**profilePrototypeCountOwnedGroups**](ProfileApi.md#profilePrototypeCountOwnedGroups) | **GET** /Profiles/{id}/ownedGroups/count | Counts ownedGroups of Profile.
[**profilePrototypeCountPosts**](ProfileApi.md#profilePrototypeCountPosts) | **GET** /Profiles/{id}/posts/count | Counts posts of Profile.
[**profilePrototypeCountQuarantines**](ProfileApi.md#profilePrototypeCountQuarantines) | **GET** /Profiles/{id}/quarantines/count | Counts quarantines of Profile.
[**profilePrototypeCountReviews**](ProfileApi.md#profilePrototypeCountReviews) | **GET** /Profiles/{id}/reviews/count | Counts reviews of Profile.
[**profilePrototypeCreateAccessTokens**](ProfileApi.md#profilePrototypeCreateAccessTokens) | **POST** /Profiles/{id}/accessTokens | Creates a new instance in accessTokens of this model.
[**profilePrototypeCreateComments**](ProfileApi.md#profilePrototypeCreateComments) | **POST** /Profiles/{id}/comments | Creates a new instance in comments of this model.
[**profilePrototypeCreateCommunityRoles**](ProfileApi.md#profilePrototypeCreateCommunityRoles) | **POST** /Profiles/{id}/communityRoles | Creates a new instance in communityRoles of this model.
[**profilePrototypeCreateGroups**](ProfileApi.md#profilePrototypeCreateGroups) | **POST** /Profiles/{id}/groups | Creates a new instance in groups of this model.
[**profilePrototypeCreateImage**](ProfileApi.md#profilePrototypeCreateImage) | **POST** /Profiles/{id}/image | Creates a new instance in image of this model.
[**profilePrototypeCreateLikes**](ProfileApi.md#profilePrototypeCreateLikes) | **POST** /Profiles/{id}/likes | Creates a new instance in likes of this model.
[**profilePrototypeCreateOwnedGroups**](ProfileApi.md#profilePrototypeCreateOwnedGroups) | **POST** /Profiles/{id}/ownedGroups | Creates a new instance in ownedGroups of this model.
[**profilePrototypeCreatePosts**](ProfileApi.md#profilePrototypeCreatePosts) | **POST** /Profiles/{id}/posts | Creates a new instance in posts of this model.
[**profilePrototypeCreateQuarantines**](ProfileApi.md#profilePrototypeCreateQuarantines) | **POST** /Profiles/{id}/quarantines | Creates a new instance in quarantines of this model.
[**profilePrototypeCreateReviews**](ProfileApi.md#profilePrototypeCreateReviews) | **POST** /Profiles/{id}/reviews | Creates a new instance in reviews of this model.
[**profilePrototypeDeleteAccessTokens**](ProfileApi.md#profilePrototypeDeleteAccessTokens) | **DELETE** /Profiles/{id}/accessTokens | Deletes all accessTokens of this model.
[**profilePrototypeDeleteComments**](ProfileApi.md#profilePrototypeDeleteComments) | **DELETE** /Profiles/{id}/comments | Deletes all comments of this model.
[**profilePrototypeDeleteCommunityRoles**](ProfileApi.md#profilePrototypeDeleteCommunityRoles) | **DELETE** /Profiles/{id}/communityRoles | Deletes all communityRoles of this model.
[**profilePrototypeDeleteGroups**](ProfileApi.md#profilePrototypeDeleteGroups) | **DELETE** /Profiles/{id}/groups | Deletes all groups of this model.
[**profilePrototypeDeleteLikes**](ProfileApi.md#profilePrototypeDeleteLikes) | **DELETE** /Profiles/{id}/likes | Deletes all likes of this model.
[**profilePrototypeDeleteOwnedGroups**](ProfileApi.md#profilePrototypeDeleteOwnedGroups) | **DELETE** /Profiles/{id}/ownedGroups | Deletes all ownedGroups of this model.
[**profilePrototypeDeletePosts**](ProfileApi.md#profilePrototypeDeletePosts) | **DELETE** /Profiles/{id}/posts | Deletes all posts of this model.
[**profilePrototypeDeleteQuarantines**](ProfileApi.md#profilePrototypeDeleteQuarantines) | **DELETE** /Profiles/{id}/quarantines | Deletes all quarantines of this model.
[**profilePrototypeDeleteReviews**](ProfileApi.md#profilePrototypeDeleteReviews) | **DELETE** /Profiles/{id}/reviews | Deletes all reviews of this model.
[**profilePrototypeDestroyByIdAccessTokens**](ProfileApi.md#profilePrototypeDestroyByIdAccessTokens) | **DELETE** /Profiles/{id}/accessTokens/{fk} | Delete a related item by id for accessTokens.
[**profilePrototypeDestroyByIdComments**](ProfileApi.md#profilePrototypeDestroyByIdComments) | **DELETE** /Profiles/{id}/comments/{fk} | Delete a related item by id for comments.
[**profilePrototypeDestroyByIdCommunityRoles**](ProfileApi.md#profilePrototypeDestroyByIdCommunityRoles) | **DELETE** /Profiles/{id}/communityRoles/{fk} | Delete a related item by id for communityRoles.
[**profilePrototypeDestroyByIdGroups**](ProfileApi.md#profilePrototypeDestroyByIdGroups) | **DELETE** /Profiles/{id}/groups/{fk} | Delete a related item by id for groups.
[**profilePrototypeDestroyByIdLikes**](ProfileApi.md#profilePrototypeDestroyByIdLikes) | **DELETE** /Profiles/{id}/likes/{fk} | Delete a related item by id for likes.
[**profilePrototypeDestroyByIdOwnedGroups**](ProfileApi.md#profilePrototypeDestroyByIdOwnedGroups) | **DELETE** /Profiles/{id}/ownedGroups/{fk} | Delete a related item by id for ownedGroups.
[**profilePrototypeDestroyByIdPosts**](ProfileApi.md#profilePrototypeDestroyByIdPosts) | **DELETE** /Profiles/{id}/posts/{fk} | Delete a related item by id for posts.
[**profilePrototypeDestroyByIdQuarantines**](ProfileApi.md#profilePrototypeDestroyByIdQuarantines) | **DELETE** /Profiles/{id}/quarantines/{fk} | Delete a related item by id for quarantines.
[**profilePrototypeDestroyByIdReviews**](ProfileApi.md#profilePrototypeDestroyByIdReviews) | **DELETE** /Profiles/{id}/reviews/{fk} | Delete a related item by id for reviews.
[**profilePrototypeDestroyImage**](ProfileApi.md#profilePrototypeDestroyImage) | **DELETE** /Profiles/{id}/image | Deletes image of this model.
[**profilePrototypeExistsComments**](ProfileApi.md#profilePrototypeExistsComments) | **HEAD** /Profiles/{id}/comments/rel/{fk} | Check the existence of comments relation to an item by id.
[**profilePrototypeExistsCommunityRoles**](ProfileApi.md#profilePrototypeExistsCommunityRoles) | **HEAD** /Profiles/{id}/communityRoles/rel/{fk} | Check the existence of communityRoles relation to an item by id.
[**profilePrototypeExistsGroups**](ProfileApi.md#profilePrototypeExistsGroups) | **HEAD** /Profiles/{id}/groups/rel/{fk} | Check the existence of groups relation to an item by id.
[**profilePrototypeExistsOwnedGroups**](ProfileApi.md#profilePrototypeExistsOwnedGroups) | **HEAD** /Profiles/{id}/ownedGroups/rel/{fk} | Check the existence of ownedGroups relation to an item by id.
[**profilePrototypeFindByIdAccessTokens**](ProfileApi.md#profilePrototypeFindByIdAccessTokens) | **GET** /Profiles/{id}/accessTokens/{fk} | Find a related item by id for accessTokens.
[**profilePrototypeFindByIdComments**](ProfileApi.md#profilePrototypeFindByIdComments) | **GET** /Profiles/{id}/comments/{fk} | Find a related item by id for comments.
[**profilePrototypeFindByIdCommunityRoles**](ProfileApi.md#profilePrototypeFindByIdCommunityRoles) | **GET** /Profiles/{id}/communityRoles/{fk} | Find a related item by id for communityRoles.
[**profilePrototypeFindByIdGroups**](ProfileApi.md#profilePrototypeFindByIdGroups) | **GET** /Profiles/{id}/groups/{fk} | Find a related item by id for groups.
[**profilePrototypeFindByIdLikes**](ProfileApi.md#profilePrototypeFindByIdLikes) | **GET** /Profiles/{id}/likes/{fk} | Find a related item by id for likes.
[**profilePrototypeFindByIdOwnedGroups**](ProfileApi.md#profilePrototypeFindByIdOwnedGroups) | **GET** /Profiles/{id}/ownedGroups/{fk} | Find a related item by id for ownedGroups.
[**profilePrototypeFindByIdPosts**](ProfileApi.md#profilePrototypeFindByIdPosts) | **GET** /Profiles/{id}/posts/{fk} | Find a related item by id for posts.
[**profilePrototypeFindByIdQuarantines**](ProfileApi.md#profilePrototypeFindByIdQuarantines) | **GET** /Profiles/{id}/quarantines/{fk} | Find a related item by id for quarantines.
[**profilePrototypeFindByIdReviews**](ProfileApi.md#profilePrototypeFindByIdReviews) | **GET** /Profiles/{id}/reviews/{fk} | Find a related item by id for reviews.
[**profilePrototypeGetAccessTokens**](ProfileApi.md#profilePrototypeGetAccessTokens) | **GET** /Profiles/{id}/accessTokens | Queries accessTokens of Profile.
[**profilePrototypeGetComments**](ProfileApi.md#profilePrototypeGetComments) | **GET** /Profiles/{id}/comments | Queries comments of Profile.
[**profilePrototypeGetCommunityRoles**](ProfileApi.md#profilePrototypeGetCommunityRoles) | **GET** /Profiles/{id}/communityRoles | Queries communityRoles of Profile.
[**profilePrototypeGetGroups**](ProfileApi.md#profilePrototypeGetGroups) | **GET** /Profiles/{id}/groups | Queries groups of Profile.
[**profilePrototypeGetImage**](ProfileApi.md#profilePrototypeGetImage) | **GET** /Profiles/{id}/image | Fetches hasOne relation image.
[**profilePrototypeGetLikes**](ProfileApi.md#profilePrototypeGetLikes) | **GET** /Profiles/{id}/likes | Queries likes of Profile.
[**profilePrototypeGetOwnedGroups**](ProfileApi.md#profilePrototypeGetOwnedGroups) | **GET** /Profiles/{id}/ownedGroups | Queries ownedGroups of Profile.
[**profilePrototypeGetPosts**](ProfileApi.md#profilePrototypeGetPosts) | **GET** /Profiles/{id}/posts | Queries posts of Profile.
[**profilePrototypeGetQuarantines**](ProfileApi.md#profilePrototypeGetQuarantines) | **GET** /Profiles/{id}/quarantines | Queries quarantines of Profile.
[**profilePrototypeGetReviews**](ProfileApi.md#profilePrototypeGetReviews) | **GET** /Profiles/{id}/reviews | Queries reviews of Profile.
[**profilePrototypeLinkComments**](ProfileApi.md#profilePrototypeLinkComments) | **PUT** /Profiles/{id}/comments/rel/{fk} | Add a related item by id for comments.
[**profilePrototypeLinkCommunityRoles**](ProfileApi.md#profilePrototypeLinkCommunityRoles) | **PUT** /Profiles/{id}/communityRoles/rel/{fk} | Add a related item by id for communityRoles.
[**profilePrototypeLinkGroups**](ProfileApi.md#profilePrototypeLinkGroups) | **PUT** /Profiles/{id}/groups/rel/{fk} | Add a related item by id for groups.
[**profilePrototypeLinkOwnedGroups**](ProfileApi.md#profilePrototypeLinkOwnedGroups) | **PUT** /Profiles/{id}/ownedGroups/rel/{fk} | Add a related item by id for ownedGroups.
[**profilePrototypeUnlinkComments**](ProfileApi.md#profilePrototypeUnlinkComments) | **DELETE** /Profiles/{id}/comments/rel/{fk} | Remove the comments relation to an item by id.
[**profilePrototypeUnlinkCommunityRoles**](ProfileApi.md#profilePrototypeUnlinkCommunityRoles) | **DELETE** /Profiles/{id}/communityRoles/rel/{fk} | Remove the communityRoles relation to an item by id.
[**profilePrototypeUnlinkGroups**](ProfileApi.md#profilePrototypeUnlinkGroups) | **DELETE** /Profiles/{id}/groups/rel/{fk} | Remove the groups relation to an item by id.
[**profilePrototypeUnlinkOwnedGroups**](ProfileApi.md#profilePrototypeUnlinkOwnedGroups) | **DELETE** /Profiles/{id}/ownedGroups/rel/{fk} | Remove the ownedGroups relation to an item by id.
[**profilePrototypeUpdateAttributes**](ProfileApi.md#profilePrototypeUpdateAttributes) | **PUT** /Profiles/{id} | Update attributes for a model instance and persist it into the data source.
[**profilePrototypeUpdateByIdAccessTokens**](ProfileApi.md#profilePrototypeUpdateByIdAccessTokens) | **PUT** /Profiles/{id}/accessTokens/{fk} | Update a related item by id for accessTokens.
[**profilePrototypeUpdateByIdComments**](ProfileApi.md#profilePrototypeUpdateByIdComments) | **PUT** /Profiles/{id}/comments/{fk} | Update a related item by id for comments.
[**profilePrototypeUpdateByIdCommunityRoles**](ProfileApi.md#profilePrototypeUpdateByIdCommunityRoles) | **PUT** /Profiles/{id}/communityRoles/{fk} | Update a related item by id for communityRoles.
[**profilePrototypeUpdateByIdGroups**](ProfileApi.md#profilePrototypeUpdateByIdGroups) | **PUT** /Profiles/{id}/groups/{fk} | Update a related item by id for groups.
[**profilePrototypeUpdateByIdLikes**](ProfileApi.md#profilePrototypeUpdateByIdLikes) | **PUT** /Profiles/{id}/likes/{fk} | Update a related item by id for likes.
[**profilePrototypeUpdateByIdOwnedGroups**](ProfileApi.md#profilePrototypeUpdateByIdOwnedGroups) | **PUT** /Profiles/{id}/ownedGroups/{fk} | Update a related item by id for ownedGroups.
[**profilePrototypeUpdateByIdPosts**](ProfileApi.md#profilePrototypeUpdateByIdPosts) | **PUT** /Profiles/{id}/posts/{fk} | Update a related item by id for posts.
[**profilePrototypeUpdateByIdQuarantines**](ProfileApi.md#profilePrototypeUpdateByIdQuarantines) | **PUT** /Profiles/{id}/quarantines/{fk} | Update a related item by id for quarantines.
[**profilePrototypeUpdateByIdReviews**](ProfileApi.md#profilePrototypeUpdateByIdReviews) | **PUT** /Profiles/{id}/reviews/{fk} | Update a related item by id for reviews.
[**profilePrototypeUpdateImage**](ProfileApi.md#profilePrototypeUpdateImage) | **PUT** /Profiles/{id}/image | Update image of this model.
[**profileUnilogin**](ProfileApi.md#profileUnilogin) | **POST** /Profiles/unilogin | Login a user with unilogin.
[**profileUpdateAll**](ProfileApi.md#profileUpdateAll) | **POST** /Profiles/update | Update instances of the model matched by where from the data source.
[**profileUpsert**](ProfileApi.md#profileUpsert) | **PUT** /Profiles | Update an existing model instance or insert a new one into the data source.


# **profileCheckIfDisplayNameIsTaken**
> object profileCheckIfDisplayNameIsTaken($displayname)

Check if displayname exists

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\ProfileApi();
$displayname = "displayname_example"; // string | The users displayname

try {
    $result = $api_instance->profileCheckIfDisplayNameIsTaken($displayname);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProfileApi->profileCheckIfDisplayNameIsTaken: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **displayname** | **string**| The users displayname |

### Return type

**object**

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **profileCheckIfUserExists**
> object profileCheckIfUserExists($username)

Check if a user exists.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\ProfileApi();
$username = "username_example"; // string | 

try {
    $result = $api_instance->profileCheckIfUserExists($username);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProfileApi->profileCheckIfUserExists: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **username** | **string**|  |

### Return type

**object**

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **profileCount**
> \DBCDK\CommunityServices\Model\InlineResponse200 profileCount($where)

Count instances of the model matched by where from the data source.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\ProfileApi();
$where = "where_example"; // string | Criteria to match model instances

try {
    $result = $api_instance->profileCount($where);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProfileApi->profileCount: ', $e->getMessage(), PHP_EOL;
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

# **profileCreate**
> \DBCDK\CommunityServices\Model\Profile profileCreate($data)

Create a new instance of the model and persist it into the data source.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\ProfileApi();
$data = new \DBCDK\CommunityServices\Model\Profile(); // \DBCDK\CommunityServices\Model\Profile | Model instance data

try {
    $result = $api_instance->profileCreate($data);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProfileApi->profileCreate: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **data** | [**\DBCDK\CommunityServices\Model\Profile**](../Model/\DBCDK\CommunityServices\Model\Profile.md)| Model instance data | [optional]

### Return type

[**\DBCDK\CommunityServices\Model\Profile**](../Model/Profile.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **profileCreateChangeStreamGetProfilesChangeStream**
> \SplFileObject profileCreateChangeStreamGetProfilesChangeStream($options)

Create a change stream.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\ProfileApi();
$options = "options_example"; // string | 

try {
    $result = $api_instance->profileCreateChangeStreamGetProfilesChangeStream($options);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProfileApi->profileCreateChangeStreamGetProfilesChangeStream: ', $e->getMessage(), PHP_EOL;
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

# **profileCreateChangeStreamPostProfilesChangeStream**
> \SplFileObject profileCreateChangeStreamPostProfilesChangeStream($options)

Create a change stream.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\ProfileApi();
$options = "options_example"; // string | 

try {
    $result = $api_instance->profileCreateChangeStreamPostProfilesChangeStream($options);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProfileApi->profileCreateChangeStreamPostProfilesChangeStream: ', $e->getMessage(), PHP_EOL;
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

# **profileDeleteById**
> object profileDeleteById($id)

Delete a model instance by id from the data source.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\ProfileApi();
$id = "id_example"; // string | Model id

try {
    $result = $api_instance->profileDeleteById($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProfileApi->profileDeleteById: ', $e->getMessage(), PHP_EOL;
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

# **profileExistsGetProfilesidExists**
> \DBCDK\CommunityServices\Model\InlineResponse2001 profileExistsGetProfilesidExists($id)

Check whether a model instance exists in the data source.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\ProfileApi();
$id = "id_example"; // string | Model id

try {
    $result = $api_instance->profileExistsGetProfilesidExists($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProfileApi->profileExistsGetProfilesidExists: ', $e->getMessage(), PHP_EOL;
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

# **profileExistsHeadProfilesid**
> \DBCDK\CommunityServices\Model\InlineResponse2001 profileExistsHeadProfilesid($id)

Check whether a model instance exists in the data source.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\ProfileApi();
$id = "id_example"; // string | Model id

try {
    $result = $api_instance->profileExistsHeadProfilesid($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProfileApi->profileExistsHeadProfilesid: ', $e->getMessage(), PHP_EOL;
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

# **profileFind**
> \DBCDK\CommunityServices\Model\Profile[] profileFind($filter)

Find all instances of the model matched by filter from the data source.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\ProfileApi();
$filter = "filter_example"; // string | Filter defining fields, where, include, order, offset, and limit

try {
    $result = $api_instance->profileFind($filter);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProfileApi->profileFind: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **filter** | **string**| Filter defining fields, where, include, order, offset, and limit | [optional]

### Return type

[**\DBCDK\CommunityServices\Model\Profile[]**](../Model/Profile.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **profileFindById**
> \DBCDK\CommunityServices\Model\Profile profileFindById($id, $filter)

Find a model instance by id from the data source.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\ProfileApi();
$id = "id_example"; // string | Model id
$filter = "filter_example"; // string | Filter defining fields and include

try {
    $result = $api_instance->profileFindById($id, $filter);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProfileApi->profileFindById: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| Model id |
 **filter** | **string**| Filter defining fields and include | [optional]

### Return type

[**\DBCDK\CommunityServices\Model\Profile**](../Model/Profile.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **profileFindOne**
> \DBCDK\CommunityServices\Model\Profile profileFindOne($filter)

Find first instance of the model matched by filter from the data source.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\ProfileApi();
$filter = "filter_example"; // string | Filter defining fields, where, include, order, offset, and limit

try {
    $result = $api_instance->profileFindOne($filter);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProfileApi->profileFindOne: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **filter** | **string**| Filter defining fields, where, include, order, offset, and limit | [optional]

### Return type

[**\DBCDK\CommunityServices\Model\Profile**](../Model/Profile.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **profileLogout**
> profileLogout()

Logout a user with access token.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\ProfileApi();

try {
    $api_instance->profileLogout();
} catch (Exception $e) {
    echo 'Exception when calling ProfileApi->profileLogout: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters
This endpoint does not need any parameter.

### Return type

void (empty response body)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **profilePrototypeCountAccessTokens**
> \DBCDK\CommunityServices\Model\InlineResponse200 profilePrototypeCountAccessTokens($id, $where)

Counts accessTokens of Profile.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\ProfileApi();
$id = "id_example"; // string | PersistedModel id
$where = "where_example"; // string | Criteria to match model instances

try {
    $result = $api_instance->profilePrototypeCountAccessTokens($id, $where);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProfileApi->profilePrototypeCountAccessTokens: ', $e->getMessage(), PHP_EOL;
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

# **profilePrototypeCountComments**
> \DBCDK\CommunityServices\Model\InlineResponse200 profilePrototypeCountComments($id, $where)

Counts comments of Profile.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\ProfileApi();
$id = "id_example"; // string | PersistedModel id
$where = "where_example"; // string | Criteria to match model instances

try {
    $result = $api_instance->profilePrototypeCountComments($id, $where);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProfileApi->profilePrototypeCountComments: ', $e->getMessage(), PHP_EOL;
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

# **profilePrototypeCountCommunityRoles**
> \DBCDK\CommunityServices\Model\InlineResponse200 profilePrototypeCountCommunityRoles($id, $where)

Counts communityRoles of Profile.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\ProfileApi();
$id = "id_example"; // string | PersistedModel id
$where = "where_example"; // string | Criteria to match model instances

try {
    $result = $api_instance->profilePrototypeCountCommunityRoles($id, $where);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProfileApi->profilePrototypeCountCommunityRoles: ', $e->getMessage(), PHP_EOL;
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

# **profilePrototypeCountGroups**
> \DBCDK\CommunityServices\Model\InlineResponse200 profilePrototypeCountGroups($id, $where)

Counts groups of Profile.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\ProfileApi();
$id = "id_example"; // string | PersistedModel id
$where = "where_example"; // string | Criteria to match model instances

try {
    $result = $api_instance->profilePrototypeCountGroups($id, $where);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProfileApi->profilePrototypeCountGroups: ', $e->getMessage(), PHP_EOL;
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

# **profilePrototypeCountLikes**
> \DBCDK\CommunityServices\Model\InlineResponse200 profilePrototypeCountLikes($id, $where)

Counts likes of Profile.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\ProfileApi();
$id = "id_example"; // string | PersistedModel id
$where = "where_example"; // string | Criteria to match model instances

try {
    $result = $api_instance->profilePrototypeCountLikes($id, $where);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProfileApi->profilePrototypeCountLikes: ', $e->getMessage(), PHP_EOL;
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

# **profilePrototypeCountOwnedGroups**
> \DBCDK\CommunityServices\Model\InlineResponse200 profilePrototypeCountOwnedGroups($id, $where)

Counts ownedGroups of Profile.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\ProfileApi();
$id = "id_example"; // string | PersistedModel id
$where = "where_example"; // string | Criteria to match model instances

try {
    $result = $api_instance->profilePrototypeCountOwnedGroups($id, $where);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProfileApi->profilePrototypeCountOwnedGroups: ', $e->getMessage(), PHP_EOL;
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

# **profilePrototypeCountPosts**
> \DBCDK\CommunityServices\Model\InlineResponse200 profilePrototypeCountPosts($id, $where)

Counts posts of Profile.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\ProfileApi();
$id = "id_example"; // string | PersistedModel id
$where = "where_example"; // string | Criteria to match model instances

try {
    $result = $api_instance->profilePrototypeCountPosts($id, $where);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProfileApi->profilePrototypeCountPosts: ', $e->getMessage(), PHP_EOL;
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

# **profilePrototypeCountQuarantines**
> \DBCDK\CommunityServices\Model\InlineResponse200 profilePrototypeCountQuarantines($id, $where)

Counts quarantines of Profile.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\ProfileApi();
$id = "id_example"; // string | PersistedModel id
$where = "where_example"; // string | Criteria to match model instances

try {
    $result = $api_instance->profilePrototypeCountQuarantines($id, $where);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProfileApi->profilePrototypeCountQuarantines: ', $e->getMessage(), PHP_EOL;
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

# **profilePrototypeCountReviews**
> \DBCDK\CommunityServices\Model\InlineResponse200 profilePrototypeCountReviews($id, $where)

Counts reviews of Profile.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\ProfileApi();
$id = "id_example"; // string | PersistedModel id
$where = "where_example"; // string | Criteria to match model instances

try {
    $result = $api_instance->profilePrototypeCountReviews($id, $where);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProfileApi->profilePrototypeCountReviews: ', $e->getMessage(), PHP_EOL;
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

# **profilePrototypeCreateAccessTokens**
> \DBCDK\CommunityServices\Model\AccessToken profilePrototypeCreateAccessTokens($id, $data)

Creates a new instance in accessTokens of this model.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\ProfileApi();
$id = "id_example"; // string | PersistedModel id
$data = new \DBCDK\CommunityServices\Model\AccessToken(); // \DBCDK\CommunityServices\Model\AccessToken | 

try {
    $result = $api_instance->profilePrototypeCreateAccessTokens($id, $data);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProfileApi->profilePrototypeCreateAccessTokens: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| PersistedModel id |
 **data** | [**\DBCDK\CommunityServices\Model\AccessToken**](../Model/\DBCDK\CommunityServices\Model\AccessToken.md)|  | [optional]

### Return type

[**\DBCDK\CommunityServices\Model\AccessToken**](../Model/AccessToken.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **profilePrototypeCreateComments**
> \DBCDK\CommunityServices\Model\Comment profilePrototypeCreateComments($id, $data)

Creates a new instance in comments of this model.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\ProfileApi();
$id = "id_example"; // string | PersistedModel id
$data = new \DBCDK\CommunityServices\Model\Comment(); // \DBCDK\CommunityServices\Model\Comment | 

try {
    $result = $api_instance->profilePrototypeCreateComments($id, $data);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProfileApi->profilePrototypeCreateComments: ', $e->getMessage(), PHP_EOL;
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

# **profilePrototypeCreateCommunityRoles**
> \DBCDK\CommunityServices\Model\CommunityRole profilePrototypeCreateCommunityRoles($id, $data)

Creates a new instance in communityRoles of this model.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\ProfileApi();
$id = "id_example"; // string | PersistedModel id
$data = new \DBCDK\CommunityServices\Model\CommunityRole(); // \DBCDK\CommunityServices\Model\CommunityRole | 

try {
    $result = $api_instance->profilePrototypeCreateCommunityRoles($id, $data);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProfileApi->profilePrototypeCreateCommunityRoles: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| PersistedModel id |
 **data** | [**\DBCDK\CommunityServices\Model\CommunityRole**](../Model/\DBCDK\CommunityServices\Model\CommunityRole.md)|  | [optional]

### Return type

[**\DBCDK\CommunityServices\Model\CommunityRole**](../Model/CommunityRole.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **profilePrototypeCreateGroups**
> \DBCDK\CommunityServices\Model\Group profilePrototypeCreateGroups($id, $data)

Creates a new instance in groups of this model.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\ProfileApi();
$id = "id_example"; // string | PersistedModel id
$data = new \DBCDK\CommunityServices\Model\Group(); // \DBCDK\CommunityServices\Model\Group | 

try {
    $result = $api_instance->profilePrototypeCreateGroups($id, $data);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProfileApi->profilePrototypeCreateGroups: ', $e->getMessage(), PHP_EOL;
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

# **profilePrototypeCreateImage**
> \DBCDK\CommunityServices\Model\ImageCollection profilePrototypeCreateImage($id, $data)

Creates a new instance in image of this model.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\ProfileApi();
$id = "id_example"; // string | PersistedModel id
$data = new \DBCDK\CommunityServices\Model\ImageCollection(); // \DBCDK\CommunityServices\Model\ImageCollection | 

try {
    $result = $api_instance->profilePrototypeCreateImage($id, $data);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProfileApi->profilePrototypeCreateImage: ', $e->getMessage(), PHP_EOL;
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

# **profilePrototypeCreateLikes**
> \DBCDK\CommunityServices\Model\Like profilePrototypeCreateLikes($id, $data)

Creates a new instance in likes of this model.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\ProfileApi();
$id = "id_example"; // string | PersistedModel id
$data = new \DBCDK\CommunityServices\Model\Like(); // \DBCDK\CommunityServices\Model\Like | 

try {
    $result = $api_instance->profilePrototypeCreateLikes($id, $data);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProfileApi->profilePrototypeCreateLikes: ', $e->getMessage(), PHP_EOL;
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

# **profilePrototypeCreateOwnedGroups**
> \DBCDK\CommunityServices\Model\Profile profilePrototypeCreateOwnedGroups($id, $data)

Creates a new instance in ownedGroups of this model.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\ProfileApi();
$id = "id_example"; // string | PersistedModel id
$data = new \DBCDK\CommunityServices\Model\Profile(); // \DBCDK\CommunityServices\Model\Profile | 

try {
    $result = $api_instance->profilePrototypeCreateOwnedGroups($id, $data);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProfileApi->profilePrototypeCreateOwnedGroups: ', $e->getMessage(), PHP_EOL;
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

# **profilePrototypeCreatePosts**
> \DBCDK\CommunityServices\Model\Post profilePrototypeCreatePosts($id, $data)

Creates a new instance in posts of this model.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\ProfileApi();
$id = "id_example"; // string | PersistedModel id
$data = new \DBCDK\CommunityServices\Model\Post(); // \DBCDK\CommunityServices\Model\Post | 

try {
    $result = $api_instance->profilePrototypeCreatePosts($id, $data);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProfileApi->profilePrototypeCreatePosts: ', $e->getMessage(), PHP_EOL;
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

# **profilePrototypeCreateQuarantines**
> \DBCDK\CommunityServices\Model\Quarantine profilePrototypeCreateQuarantines($id, $data)

Creates a new instance in quarantines of this model.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\ProfileApi();
$id = "id_example"; // string | PersistedModel id
$data = new \DBCDK\CommunityServices\Model\Quarantine(); // \DBCDK\CommunityServices\Model\Quarantine | 

try {
    $result = $api_instance->profilePrototypeCreateQuarantines($id, $data);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProfileApi->profilePrototypeCreateQuarantines: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| PersistedModel id |
 **data** | [**\DBCDK\CommunityServices\Model\Quarantine**](../Model/\DBCDK\CommunityServices\Model\Quarantine.md)|  | [optional]

### Return type

[**\DBCDK\CommunityServices\Model\Quarantine**](../Model/Quarantine.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **profilePrototypeCreateReviews**
> \DBCDK\CommunityServices\Model\Review profilePrototypeCreateReviews($id, $data)

Creates a new instance in reviews of this model.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\ProfileApi();
$id = "id_example"; // string | PersistedModel id
$data = new \DBCDK\CommunityServices\Model\Review(); // \DBCDK\CommunityServices\Model\Review | 

try {
    $result = $api_instance->profilePrototypeCreateReviews($id, $data);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProfileApi->profilePrototypeCreateReviews: ', $e->getMessage(), PHP_EOL;
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

# **profilePrototypeDeleteAccessTokens**
> profilePrototypeDeleteAccessTokens($id)

Deletes all accessTokens of this model.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\ProfileApi();
$id = "id_example"; // string | PersistedModel id

try {
    $api_instance->profilePrototypeDeleteAccessTokens($id);
} catch (Exception $e) {
    echo 'Exception when calling ProfileApi->profilePrototypeDeleteAccessTokens: ', $e->getMessage(), PHP_EOL;
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

# **profilePrototypeDeleteComments**
> profilePrototypeDeleteComments($id)

Deletes all comments of this model.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\ProfileApi();
$id = "id_example"; // string | PersistedModel id

try {
    $api_instance->profilePrototypeDeleteComments($id);
} catch (Exception $e) {
    echo 'Exception when calling ProfileApi->profilePrototypeDeleteComments: ', $e->getMessage(), PHP_EOL;
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

# **profilePrototypeDeleteCommunityRoles**
> profilePrototypeDeleteCommunityRoles($id)

Deletes all communityRoles of this model.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\ProfileApi();
$id = "id_example"; // string | PersistedModel id

try {
    $api_instance->profilePrototypeDeleteCommunityRoles($id);
} catch (Exception $e) {
    echo 'Exception when calling ProfileApi->profilePrototypeDeleteCommunityRoles: ', $e->getMessage(), PHP_EOL;
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

# **profilePrototypeDeleteGroups**
> profilePrototypeDeleteGroups($id)

Deletes all groups of this model.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\ProfileApi();
$id = "id_example"; // string | PersistedModel id

try {
    $api_instance->profilePrototypeDeleteGroups($id);
} catch (Exception $e) {
    echo 'Exception when calling ProfileApi->profilePrototypeDeleteGroups: ', $e->getMessage(), PHP_EOL;
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

# **profilePrototypeDeleteLikes**
> profilePrototypeDeleteLikes($id)

Deletes all likes of this model.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\ProfileApi();
$id = "id_example"; // string | PersistedModel id

try {
    $api_instance->profilePrototypeDeleteLikes($id);
} catch (Exception $e) {
    echo 'Exception when calling ProfileApi->profilePrototypeDeleteLikes: ', $e->getMessage(), PHP_EOL;
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

# **profilePrototypeDeleteOwnedGroups**
> profilePrototypeDeleteOwnedGroups($id)

Deletes all ownedGroups of this model.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\ProfileApi();
$id = "id_example"; // string | PersistedModel id

try {
    $api_instance->profilePrototypeDeleteOwnedGroups($id);
} catch (Exception $e) {
    echo 'Exception when calling ProfileApi->profilePrototypeDeleteOwnedGroups: ', $e->getMessage(), PHP_EOL;
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

# **profilePrototypeDeletePosts**
> profilePrototypeDeletePosts($id)

Deletes all posts of this model.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\ProfileApi();
$id = "id_example"; // string | PersistedModel id

try {
    $api_instance->profilePrototypeDeletePosts($id);
} catch (Exception $e) {
    echo 'Exception when calling ProfileApi->profilePrototypeDeletePosts: ', $e->getMessage(), PHP_EOL;
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

# **profilePrototypeDeleteQuarantines**
> profilePrototypeDeleteQuarantines($id)

Deletes all quarantines of this model.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\ProfileApi();
$id = "id_example"; // string | PersistedModel id

try {
    $api_instance->profilePrototypeDeleteQuarantines($id);
} catch (Exception $e) {
    echo 'Exception when calling ProfileApi->profilePrototypeDeleteQuarantines: ', $e->getMessage(), PHP_EOL;
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

# **profilePrototypeDeleteReviews**
> profilePrototypeDeleteReviews($id)

Deletes all reviews of this model.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\ProfileApi();
$id = "id_example"; // string | PersistedModel id

try {
    $api_instance->profilePrototypeDeleteReviews($id);
} catch (Exception $e) {
    echo 'Exception when calling ProfileApi->profilePrototypeDeleteReviews: ', $e->getMessage(), PHP_EOL;
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

# **profilePrototypeDestroyByIdAccessTokens**
> profilePrototypeDestroyByIdAccessTokens($fk, $id)

Delete a related item by id for accessTokens.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\ProfileApi();
$fk = "fk_example"; // string | Foreign key for accessTokens
$id = "id_example"; // string | PersistedModel id

try {
    $api_instance->profilePrototypeDestroyByIdAccessTokens($fk, $id);
} catch (Exception $e) {
    echo 'Exception when calling ProfileApi->profilePrototypeDestroyByIdAccessTokens: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **fk** | **string**| Foreign key for accessTokens |
 **id** | **string**| PersistedModel id |

### Return type

void (empty response body)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **profilePrototypeDestroyByIdComments**
> profilePrototypeDestroyByIdComments($fk, $id)

Delete a related item by id for comments.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\ProfileApi();
$fk = "fk_example"; // string | Foreign key for comments
$id = "id_example"; // string | PersistedModel id

try {
    $api_instance->profilePrototypeDestroyByIdComments($fk, $id);
} catch (Exception $e) {
    echo 'Exception when calling ProfileApi->profilePrototypeDestroyByIdComments: ', $e->getMessage(), PHP_EOL;
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

# **profilePrototypeDestroyByIdCommunityRoles**
> profilePrototypeDestroyByIdCommunityRoles($fk, $id)

Delete a related item by id for communityRoles.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\ProfileApi();
$fk = "fk_example"; // string | Foreign key for communityRoles
$id = "id_example"; // string | PersistedModel id

try {
    $api_instance->profilePrototypeDestroyByIdCommunityRoles($fk, $id);
} catch (Exception $e) {
    echo 'Exception when calling ProfileApi->profilePrototypeDestroyByIdCommunityRoles: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **fk** | **string**| Foreign key for communityRoles |
 **id** | **string**| PersistedModel id |

### Return type

void (empty response body)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **profilePrototypeDestroyByIdGroups**
> profilePrototypeDestroyByIdGroups($fk, $id)

Delete a related item by id for groups.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\ProfileApi();
$fk = "fk_example"; // string | Foreign key for groups
$id = "id_example"; // string | PersistedModel id

try {
    $api_instance->profilePrototypeDestroyByIdGroups($fk, $id);
} catch (Exception $e) {
    echo 'Exception when calling ProfileApi->profilePrototypeDestroyByIdGroups: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **fk** | **string**| Foreign key for groups |
 **id** | **string**| PersistedModel id |

### Return type

void (empty response body)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **profilePrototypeDestroyByIdLikes**
> profilePrototypeDestroyByIdLikes($fk, $id)

Delete a related item by id for likes.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\ProfileApi();
$fk = "fk_example"; // string | Foreign key for likes
$id = "id_example"; // string | PersistedModel id

try {
    $api_instance->profilePrototypeDestroyByIdLikes($fk, $id);
} catch (Exception $e) {
    echo 'Exception when calling ProfileApi->profilePrototypeDestroyByIdLikes: ', $e->getMessage(), PHP_EOL;
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

# **profilePrototypeDestroyByIdOwnedGroups**
> profilePrototypeDestroyByIdOwnedGroups($fk, $id)

Delete a related item by id for ownedGroups.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\ProfileApi();
$fk = "fk_example"; // string | Foreign key for ownedGroups
$id = "id_example"; // string | PersistedModel id

try {
    $api_instance->profilePrototypeDestroyByIdOwnedGroups($fk, $id);
} catch (Exception $e) {
    echo 'Exception when calling ProfileApi->profilePrototypeDestroyByIdOwnedGroups: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **fk** | **string**| Foreign key for ownedGroups |
 **id** | **string**| PersistedModel id |

### Return type

void (empty response body)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **profilePrototypeDestroyByIdPosts**
> profilePrototypeDestroyByIdPosts($fk, $id)

Delete a related item by id for posts.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\ProfileApi();
$fk = "fk_example"; // string | Foreign key for posts
$id = "id_example"; // string | PersistedModel id

try {
    $api_instance->profilePrototypeDestroyByIdPosts($fk, $id);
} catch (Exception $e) {
    echo 'Exception when calling ProfileApi->profilePrototypeDestroyByIdPosts: ', $e->getMessage(), PHP_EOL;
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

# **profilePrototypeDestroyByIdQuarantines**
> profilePrototypeDestroyByIdQuarantines($fk, $id)

Delete a related item by id for quarantines.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\ProfileApi();
$fk = "fk_example"; // string | Foreign key for quarantines
$id = "id_example"; // string | PersistedModel id

try {
    $api_instance->profilePrototypeDestroyByIdQuarantines($fk, $id);
} catch (Exception $e) {
    echo 'Exception when calling ProfileApi->profilePrototypeDestroyByIdQuarantines: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **fk** | **string**| Foreign key for quarantines |
 **id** | **string**| PersistedModel id |

### Return type

void (empty response body)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **profilePrototypeDestroyByIdReviews**
> profilePrototypeDestroyByIdReviews($fk, $id)

Delete a related item by id for reviews.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\ProfileApi();
$fk = "fk_example"; // string | Foreign key for reviews
$id = "id_example"; // string | PersistedModel id

try {
    $api_instance->profilePrototypeDestroyByIdReviews($fk, $id);
} catch (Exception $e) {
    echo 'Exception when calling ProfileApi->profilePrototypeDestroyByIdReviews: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **fk** | **string**| Foreign key for reviews |
 **id** | **string**| PersistedModel id |

### Return type

void (empty response body)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **profilePrototypeDestroyImage**
> profilePrototypeDestroyImage($id)

Deletes image of this model.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\ProfileApi();
$id = "id_example"; // string | PersistedModel id

try {
    $api_instance->profilePrototypeDestroyImage($id);
} catch (Exception $e) {
    echo 'Exception when calling ProfileApi->profilePrototypeDestroyImage: ', $e->getMessage(), PHP_EOL;
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

# **profilePrototypeExistsComments**
> bool profilePrototypeExistsComments($fk, $id)

Check the existence of comments relation to an item by id.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\ProfileApi();
$fk = "fk_example"; // string | Foreign key for comments
$id = "id_example"; // string | PersistedModel id

try {
    $result = $api_instance->profilePrototypeExistsComments($fk, $id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProfileApi->profilePrototypeExistsComments: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **fk** | **string**| Foreign key for comments |
 **id** | **string**| PersistedModel id |

### Return type

**bool**

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **profilePrototypeExistsCommunityRoles**
> bool profilePrototypeExistsCommunityRoles($fk, $id)

Check the existence of communityRoles relation to an item by id.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\ProfileApi();
$fk = "fk_example"; // string | Foreign key for communityRoles
$id = "id_example"; // string | PersistedModel id

try {
    $result = $api_instance->profilePrototypeExistsCommunityRoles($fk, $id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProfileApi->profilePrototypeExistsCommunityRoles: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **fk** | **string**| Foreign key for communityRoles |
 **id** | **string**| PersistedModel id |

### Return type

**bool**

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **profilePrototypeExistsGroups**
> bool profilePrototypeExistsGroups($fk, $id)

Check the existence of groups relation to an item by id.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\ProfileApi();
$fk = "fk_example"; // string | Foreign key for groups
$id = "id_example"; // string | PersistedModel id

try {
    $result = $api_instance->profilePrototypeExistsGroups($fk, $id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProfileApi->profilePrototypeExistsGroups: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **fk** | **string**| Foreign key for groups |
 **id** | **string**| PersistedModel id |

### Return type

**bool**

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **profilePrototypeExistsOwnedGroups**
> bool profilePrototypeExistsOwnedGroups($fk, $id)

Check the existence of ownedGroups relation to an item by id.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\ProfileApi();
$fk = "fk_example"; // string | Foreign key for ownedGroups
$id = "id_example"; // string | PersistedModel id

try {
    $result = $api_instance->profilePrototypeExistsOwnedGroups($fk, $id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProfileApi->profilePrototypeExistsOwnedGroups: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **fk** | **string**| Foreign key for ownedGroups |
 **id** | **string**| PersistedModel id |

### Return type

**bool**

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **profilePrototypeFindByIdAccessTokens**
> \DBCDK\CommunityServices\Model\AccessToken profilePrototypeFindByIdAccessTokens($fk, $id)

Find a related item by id for accessTokens.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\ProfileApi();
$fk = "fk_example"; // string | Foreign key for accessTokens
$id = "id_example"; // string | PersistedModel id

try {
    $result = $api_instance->profilePrototypeFindByIdAccessTokens($fk, $id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProfileApi->profilePrototypeFindByIdAccessTokens: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **fk** | **string**| Foreign key for accessTokens |
 **id** | **string**| PersistedModel id |

### Return type

[**\DBCDK\CommunityServices\Model\AccessToken**](../Model/AccessToken.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **profilePrototypeFindByIdComments**
> \DBCDK\CommunityServices\Model\Comment profilePrototypeFindByIdComments($fk, $id)

Find a related item by id for comments.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\ProfileApi();
$fk = "fk_example"; // string | Foreign key for comments
$id = "id_example"; // string | PersistedModel id

try {
    $result = $api_instance->profilePrototypeFindByIdComments($fk, $id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProfileApi->profilePrototypeFindByIdComments: ', $e->getMessage(), PHP_EOL;
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

# **profilePrototypeFindByIdCommunityRoles**
> \DBCDK\CommunityServices\Model\CommunityRole profilePrototypeFindByIdCommunityRoles($fk, $id)

Find a related item by id for communityRoles.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\ProfileApi();
$fk = "fk_example"; // string | Foreign key for communityRoles
$id = "id_example"; // string | PersistedModel id

try {
    $result = $api_instance->profilePrototypeFindByIdCommunityRoles($fk, $id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProfileApi->profilePrototypeFindByIdCommunityRoles: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **fk** | **string**| Foreign key for communityRoles |
 **id** | **string**| PersistedModel id |

### Return type

[**\DBCDK\CommunityServices\Model\CommunityRole**](../Model/CommunityRole.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **profilePrototypeFindByIdGroups**
> \DBCDK\CommunityServices\Model\Group profilePrototypeFindByIdGroups($fk, $id)

Find a related item by id for groups.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\ProfileApi();
$fk = "fk_example"; // string | Foreign key for groups
$id = "id_example"; // string | PersistedModel id

try {
    $result = $api_instance->profilePrototypeFindByIdGroups($fk, $id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProfileApi->profilePrototypeFindByIdGroups: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **fk** | **string**| Foreign key for groups |
 **id** | **string**| PersistedModel id |

### Return type

[**\DBCDK\CommunityServices\Model\Group**](../Model/Group.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **profilePrototypeFindByIdLikes**
> \DBCDK\CommunityServices\Model\Like profilePrototypeFindByIdLikes($fk, $id)

Find a related item by id for likes.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\ProfileApi();
$fk = "fk_example"; // string | Foreign key for likes
$id = "id_example"; // string | PersistedModel id

try {
    $result = $api_instance->profilePrototypeFindByIdLikes($fk, $id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProfileApi->profilePrototypeFindByIdLikes: ', $e->getMessage(), PHP_EOL;
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

# **profilePrototypeFindByIdOwnedGroups**
> \DBCDK\CommunityServices\Model\Profile profilePrototypeFindByIdOwnedGroups($fk, $id)

Find a related item by id for ownedGroups.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\ProfileApi();
$fk = "fk_example"; // string | Foreign key for ownedGroups
$id = "id_example"; // string | PersistedModel id

try {
    $result = $api_instance->profilePrototypeFindByIdOwnedGroups($fk, $id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProfileApi->profilePrototypeFindByIdOwnedGroups: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **fk** | **string**| Foreign key for ownedGroups |
 **id** | **string**| PersistedModel id |

### Return type

[**\DBCDK\CommunityServices\Model\Profile**](../Model/Profile.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **profilePrototypeFindByIdPosts**
> \DBCDK\CommunityServices\Model\Post profilePrototypeFindByIdPosts($fk, $id)

Find a related item by id for posts.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\ProfileApi();
$fk = "fk_example"; // string | Foreign key for posts
$id = "id_example"; // string | PersistedModel id

try {
    $result = $api_instance->profilePrototypeFindByIdPosts($fk, $id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProfileApi->profilePrototypeFindByIdPosts: ', $e->getMessage(), PHP_EOL;
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

# **profilePrototypeFindByIdQuarantines**
> \DBCDK\CommunityServices\Model\Quarantine profilePrototypeFindByIdQuarantines($fk, $id)

Find a related item by id for quarantines.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\ProfileApi();
$fk = "fk_example"; // string | Foreign key for quarantines
$id = "id_example"; // string | PersistedModel id

try {
    $result = $api_instance->profilePrototypeFindByIdQuarantines($fk, $id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProfileApi->profilePrototypeFindByIdQuarantines: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **fk** | **string**| Foreign key for quarantines |
 **id** | **string**| PersistedModel id |

### Return type

[**\DBCDK\CommunityServices\Model\Quarantine**](../Model/Quarantine.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **profilePrototypeFindByIdReviews**
> \DBCDK\CommunityServices\Model\Review profilePrototypeFindByIdReviews($fk, $id)

Find a related item by id for reviews.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\ProfileApi();
$fk = "fk_example"; // string | Foreign key for reviews
$id = "id_example"; // string | PersistedModel id

try {
    $result = $api_instance->profilePrototypeFindByIdReviews($fk, $id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProfileApi->profilePrototypeFindByIdReviews: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **fk** | **string**| Foreign key for reviews |
 **id** | **string**| PersistedModel id |

### Return type

[**\DBCDK\CommunityServices\Model\Review**](../Model/Review.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **profilePrototypeGetAccessTokens**
> \DBCDK\CommunityServices\Model\AccessToken[] profilePrototypeGetAccessTokens($id, $filter)

Queries accessTokens of Profile.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\ProfileApi();
$id = "id_example"; // string | PersistedModel id
$filter = "filter_example"; // string | 

try {
    $result = $api_instance->profilePrototypeGetAccessTokens($id, $filter);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProfileApi->profilePrototypeGetAccessTokens: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| PersistedModel id |
 **filter** | **string**|  | [optional]

### Return type

[**\DBCDK\CommunityServices\Model\AccessToken[]**](../Model/AccessToken.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **profilePrototypeGetComments**
> \DBCDK\CommunityServices\Model\Comment[] profilePrototypeGetComments($id, $filter)

Queries comments of Profile.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\ProfileApi();
$id = "id_example"; // string | PersistedModel id
$filter = "filter_example"; // string | 

try {
    $result = $api_instance->profilePrototypeGetComments($id, $filter);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProfileApi->profilePrototypeGetComments: ', $e->getMessage(), PHP_EOL;
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

# **profilePrototypeGetCommunityRoles**
> \DBCDK\CommunityServices\Model\CommunityRole[] profilePrototypeGetCommunityRoles($id, $filter)

Queries communityRoles of Profile.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\ProfileApi();
$id = "id_example"; // string | PersistedModel id
$filter = "filter_example"; // string | 

try {
    $result = $api_instance->profilePrototypeGetCommunityRoles($id, $filter);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProfileApi->profilePrototypeGetCommunityRoles: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| PersistedModel id |
 **filter** | **string**|  | [optional]

### Return type

[**\DBCDK\CommunityServices\Model\CommunityRole[]**](../Model/CommunityRole.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **profilePrototypeGetGroups**
> \DBCDK\CommunityServices\Model\Group[] profilePrototypeGetGroups($id, $filter)

Queries groups of Profile.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\ProfileApi();
$id = "id_example"; // string | PersistedModel id
$filter = "filter_example"; // string | 

try {
    $result = $api_instance->profilePrototypeGetGroups($id, $filter);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProfileApi->profilePrototypeGetGroups: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| PersistedModel id |
 **filter** | **string**|  | [optional]

### Return type

[**\DBCDK\CommunityServices\Model\Group[]**](../Model/Group.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **profilePrototypeGetImage**
> \DBCDK\CommunityServices\Model\ImageCollection profilePrototypeGetImage($id, $refresh)

Fetches hasOne relation image.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\ProfileApi();
$id = "id_example"; // string | PersistedModel id
$refresh = true; // bool | 

try {
    $result = $api_instance->profilePrototypeGetImage($id, $refresh);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProfileApi->profilePrototypeGetImage: ', $e->getMessage(), PHP_EOL;
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

# **profilePrototypeGetLikes**
> \DBCDK\CommunityServices\Model\Like[] profilePrototypeGetLikes($id, $filter)

Queries likes of Profile.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\ProfileApi();
$id = "id_example"; // string | PersistedModel id
$filter = "filter_example"; // string | 

try {
    $result = $api_instance->profilePrototypeGetLikes($id, $filter);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProfileApi->profilePrototypeGetLikes: ', $e->getMessage(), PHP_EOL;
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

# **profilePrototypeGetOwnedGroups**
> \DBCDK\CommunityServices\Model\Profile[] profilePrototypeGetOwnedGroups($id, $filter)

Queries ownedGroups of Profile.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\ProfileApi();
$id = "id_example"; // string | PersistedModel id
$filter = "filter_example"; // string | 

try {
    $result = $api_instance->profilePrototypeGetOwnedGroups($id, $filter);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProfileApi->profilePrototypeGetOwnedGroups: ', $e->getMessage(), PHP_EOL;
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

# **profilePrototypeGetPosts**
> \DBCDK\CommunityServices\Model\Post[] profilePrototypeGetPosts($id, $filter)

Queries posts of Profile.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\ProfileApi();
$id = "id_example"; // string | PersistedModel id
$filter = "filter_example"; // string | 

try {
    $result = $api_instance->profilePrototypeGetPosts($id, $filter);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProfileApi->profilePrototypeGetPosts: ', $e->getMessage(), PHP_EOL;
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

# **profilePrototypeGetQuarantines**
> \DBCDK\CommunityServices\Model\Quarantine[] profilePrototypeGetQuarantines($id, $filter)

Queries quarantines of Profile.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\ProfileApi();
$id = "id_example"; // string | PersistedModel id
$filter = "filter_example"; // string | 

try {
    $result = $api_instance->profilePrototypeGetQuarantines($id, $filter);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProfileApi->profilePrototypeGetQuarantines: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| PersistedModel id |
 **filter** | **string**|  | [optional]

### Return type

[**\DBCDK\CommunityServices\Model\Quarantine[]**](../Model/Quarantine.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **profilePrototypeGetReviews**
> \DBCDK\CommunityServices\Model\Review[] profilePrototypeGetReviews($id, $filter)

Queries reviews of Profile.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\ProfileApi();
$id = "id_example"; // string | PersistedModel id
$filter = "filter_example"; // string | 

try {
    $result = $api_instance->profilePrototypeGetReviews($id, $filter);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProfileApi->profilePrototypeGetReviews: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| PersistedModel id |
 **filter** | **string**|  | [optional]

### Return type

[**\DBCDK\CommunityServices\Model\Review[]**](../Model/Review.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **profilePrototypeLinkComments**
> \DBCDK\CommunityServices\Model\ProfileComment profilePrototypeLinkComments($fk, $id, $data)

Add a related item by id for comments.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\ProfileApi();
$fk = "fk_example"; // string | Foreign key for comments
$id = "id_example"; // string | PersistedModel id
$data = new \DBCDK\CommunityServices\Model\ProfileComment(); // \DBCDK\CommunityServices\Model\ProfileComment | 

try {
    $result = $api_instance->profilePrototypeLinkComments($fk, $id, $data);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProfileApi->profilePrototypeLinkComments: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **fk** | **string**| Foreign key for comments |
 **id** | **string**| PersistedModel id |
 **data** | [**\DBCDK\CommunityServices\Model\ProfileComment**](../Model/\DBCDK\CommunityServices\Model\ProfileComment.md)|  | [optional]

### Return type

[**\DBCDK\CommunityServices\Model\ProfileComment**](../Model/ProfileComment.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **profilePrototypeLinkCommunityRoles**
> \DBCDK\CommunityServices\Model\ProfileCommunityRole profilePrototypeLinkCommunityRoles($fk, $id, $data)

Add a related item by id for communityRoles.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\ProfileApi();
$fk = "fk_example"; // string | Foreign key for communityRoles
$id = "id_example"; // string | PersistedModel id
$data = new \DBCDK\CommunityServices\Model\ProfileCommunityRole(); // \DBCDK\CommunityServices\Model\ProfileCommunityRole | 

try {
    $result = $api_instance->profilePrototypeLinkCommunityRoles($fk, $id, $data);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProfileApi->profilePrototypeLinkCommunityRoles: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **fk** | **string**| Foreign key for communityRoles |
 **id** | **string**| PersistedModel id |
 **data** | [**\DBCDK\CommunityServices\Model\ProfileCommunityRole**](../Model/\DBCDK\CommunityServices\Model\ProfileCommunityRole.md)|  | [optional]

### Return type

[**\DBCDK\CommunityServices\Model\ProfileCommunityRole**](../Model/ProfileCommunityRole.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **profilePrototypeLinkGroups**
> \DBCDK\CommunityServices\Model\GroupProfile profilePrototypeLinkGroups($fk, $id, $data)

Add a related item by id for groups.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\ProfileApi();
$fk = "fk_example"; // string | Foreign key for groups
$id = "id_example"; // string | PersistedModel id
$data = new \DBCDK\CommunityServices\Model\GroupProfile(); // \DBCDK\CommunityServices\Model\GroupProfile | 

try {
    $result = $api_instance->profilePrototypeLinkGroups($fk, $id, $data);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProfileApi->profilePrototypeLinkGroups: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **fk** | **string**| Foreign key for groups |
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

# **profilePrototypeLinkOwnedGroups**
> \DBCDK\CommunityServices\Model\ProfileProfile profilePrototypeLinkOwnedGroups($fk, $id, $data)

Add a related item by id for ownedGroups.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\ProfileApi();
$fk = "fk_example"; // string | Foreign key for ownedGroups
$id = "id_example"; // string | PersistedModel id
$data = new \DBCDK\CommunityServices\Model\ProfileProfile(); // \DBCDK\CommunityServices\Model\ProfileProfile | 

try {
    $result = $api_instance->profilePrototypeLinkOwnedGroups($fk, $id, $data);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProfileApi->profilePrototypeLinkOwnedGroups: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **fk** | **string**| Foreign key for ownedGroups |
 **id** | **string**| PersistedModel id |
 **data** | [**\DBCDK\CommunityServices\Model\ProfileProfile**](../Model/\DBCDK\CommunityServices\Model\ProfileProfile.md)|  | [optional]

### Return type

[**\DBCDK\CommunityServices\Model\ProfileProfile**](../Model/ProfileProfile.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **profilePrototypeUnlinkComments**
> profilePrototypeUnlinkComments($fk, $id)

Remove the comments relation to an item by id.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\ProfileApi();
$fk = "fk_example"; // string | Foreign key for comments
$id = "id_example"; // string | PersistedModel id

try {
    $api_instance->profilePrototypeUnlinkComments($fk, $id);
} catch (Exception $e) {
    echo 'Exception when calling ProfileApi->profilePrototypeUnlinkComments: ', $e->getMessage(), PHP_EOL;
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

# **profilePrototypeUnlinkCommunityRoles**
> profilePrototypeUnlinkCommunityRoles($fk, $id)

Remove the communityRoles relation to an item by id.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\ProfileApi();
$fk = "fk_example"; // string | Foreign key for communityRoles
$id = "id_example"; // string | PersistedModel id

try {
    $api_instance->profilePrototypeUnlinkCommunityRoles($fk, $id);
} catch (Exception $e) {
    echo 'Exception when calling ProfileApi->profilePrototypeUnlinkCommunityRoles: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **fk** | **string**| Foreign key for communityRoles |
 **id** | **string**| PersistedModel id |

### Return type

void (empty response body)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **profilePrototypeUnlinkGroups**
> profilePrototypeUnlinkGroups($fk, $id)

Remove the groups relation to an item by id.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\ProfileApi();
$fk = "fk_example"; // string | Foreign key for groups
$id = "id_example"; // string | PersistedModel id

try {
    $api_instance->profilePrototypeUnlinkGroups($fk, $id);
} catch (Exception $e) {
    echo 'Exception when calling ProfileApi->profilePrototypeUnlinkGroups: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **fk** | **string**| Foreign key for groups |
 **id** | **string**| PersistedModel id |

### Return type

void (empty response body)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **profilePrototypeUnlinkOwnedGroups**
> profilePrototypeUnlinkOwnedGroups($fk, $id)

Remove the ownedGroups relation to an item by id.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\ProfileApi();
$fk = "fk_example"; // string | Foreign key for ownedGroups
$id = "id_example"; // string | PersistedModel id

try {
    $api_instance->profilePrototypeUnlinkOwnedGroups($fk, $id);
} catch (Exception $e) {
    echo 'Exception when calling ProfileApi->profilePrototypeUnlinkOwnedGroups: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **fk** | **string**| Foreign key for ownedGroups |
 **id** | **string**| PersistedModel id |

### Return type

void (empty response body)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **profilePrototypeUpdateAttributes**
> \DBCDK\CommunityServices\Model\Profile profilePrototypeUpdateAttributes($id, $data)

Update attributes for a model instance and persist it into the data source.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\ProfileApi();
$id = "id_example"; // string | PersistedModel id
$data = new \DBCDK\CommunityServices\Model\Profile(); // \DBCDK\CommunityServices\Model\Profile | An object of model property name/value pairs

try {
    $result = $api_instance->profilePrototypeUpdateAttributes($id, $data);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProfileApi->profilePrototypeUpdateAttributes: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| PersistedModel id |
 **data** | [**\DBCDK\CommunityServices\Model\Profile**](../Model/\DBCDK\CommunityServices\Model\Profile.md)| An object of model property name/value pairs | [optional]

### Return type

[**\DBCDK\CommunityServices\Model\Profile**](../Model/Profile.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **profilePrototypeUpdateByIdAccessTokens**
> \DBCDK\CommunityServices\Model\AccessToken profilePrototypeUpdateByIdAccessTokens($fk, $id, $data)

Update a related item by id for accessTokens.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\ProfileApi();
$fk = "fk_example"; // string | Foreign key for accessTokens
$id = "id_example"; // string | PersistedModel id
$data = new \DBCDK\CommunityServices\Model\AccessToken(); // \DBCDK\CommunityServices\Model\AccessToken | 

try {
    $result = $api_instance->profilePrototypeUpdateByIdAccessTokens($fk, $id, $data);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProfileApi->profilePrototypeUpdateByIdAccessTokens: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **fk** | **string**| Foreign key for accessTokens |
 **id** | **string**| PersistedModel id |
 **data** | [**\DBCDK\CommunityServices\Model\AccessToken**](../Model/\DBCDK\CommunityServices\Model\AccessToken.md)|  | [optional]

### Return type

[**\DBCDK\CommunityServices\Model\AccessToken**](../Model/AccessToken.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **profilePrototypeUpdateByIdComments**
> \DBCDK\CommunityServices\Model\Comment profilePrototypeUpdateByIdComments($fk, $id, $data)

Update a related item by id for comments.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\ProfileApi();
$fk = "fk_example"; // string | Foreign key for comments
$id = "id_example"; // string | PersistedModel id
$data = new \DBCDK\CommunityServices\Model\Comment(); // \DBCDK\CommunityServices\Model\Comment | 

try {
    $result = $api_instance->profilePrototypeUpdateByIdComments($fk, $id, $data);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProfileApi->profilePrototypeUpdateByIdComments: ', $e->getMessage(), PHP_EOL;
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

# **profilePrototypeUpdateByIdCommunityRoles**
> \DBCDK\CommunityServices\Model\CommunityRole profilePrototypeUpdateByIdCommunityRoles($fk, $id, $data)

Update a related item by id for communityRoles.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\ProfileApi();
$fk = "fk_example"; // string | Foreign key for communityRoles
$id = "id_example"; // string | PersistedModel id
$data = new \DBCDK\CommunityServices\Model\CommunityRole(); // \DBCDK\CommunityServices\Model\CommunityRole | 

try {
    $result = $api_instance->profilePrototypeUpdateByIdCommunityRoles($fk, $id, $data);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProfileApi->profilePrototypeUpdateByIdCommunityRoles: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **fk** | **string**| Foreign key for communityRoles |
 **id** | **string**| PersistedModel id |
 **data** | [**\DBCDK\CommunityServices\Model\CommunityRole**](../Model/\DBCDK\CommunityServices\Model\CommunityRole.md)|  | [optional]

### Return type

[**\DBCDK\CommunityServices\Model\CommunityRole**](../Model/CommunityRole.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **profilePrototypeUpdateByIdGroups**
> \DBCDK\CommunityServices\Model\Group profilePrototypeUpdateByIdGroups($fk, $id, $data)

Update a related item by id for groups.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\ProfileApi();
$fk = "fk_example"; // string | Foreign key for groups
$id = "id_example"; // string | PersistedModel id
$data = new \DBCDK\CommunityServices\Model\Group(); // \DBCDK\CommunityServices\Model\Group | 

try {
    $result = $api_instance->profilePrototypeUpdateByIdGroups($fk, $id, $data);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProfileApi->profilePrototypeUpdateByIdGroups: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **fk** | **string**| Foreign key for groups |
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

# **profilePrototypeUpdateByIdLikes**
> \DBCDK\CommunityServices\Model\Like profilePrototypeUpdateByIdLikes($fk, $id, $data)

Update a related item by id for likes.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\ProfileApi();
$fk = "fk_example"; // string | Foreign key for likes
$id = "id_example"; // string | PersistedModel id
$data = new \DBCDK\CommunityServices\Model\Like(); // \DBCDK\CommunityServices\Model\Like | 

try {
    $result = $api_instance->profilePrototypeUpdateByIdLikes($fk, $id, $data);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProfileApi->profilePrototypeUpdateByIdLikes: ', $e->getMessage(), PHP_EOL;
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

# **profilePrototypeUpdateByIdOwnedGroups**
> \DBCDK\CommunityServices\Model\Profile profilePrototypeUpdateByIdOwnedGroups($fk, $id, $data)

Update a related item by id for ownedGroups.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\ProfileApi();
$fk = "fk_example"; // string | Foreign key for ownedGroups
$id = "id_example"; // string | PersistedModel id
$data = new \DBCDK\CommunityServices\Model\Profile(); // \DBCDK\CommunityServices\Model\Profile | 

try {
    $result = $api_instance->profilePrototypeUpdateByIdOwnedGroups($fk, $id, $data);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProfileApi->profilePrototypeUpdateByIdOwnedGroups: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **fk** | **string**| Foreign key for ownedGroups |
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

# **profilePrototypeUpdateByIdPosts**
> \DBCDK\CommunityServices\Model\Post profilePrototypeUpdateByIdPosts($fk, $id, $data)

Update a related item by id for posts.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\ProfileApi();
$fk = "fk_example"; // string | Foreign key for posts
$id = "id_example"; // string | PersistedModel id
$data = new \DBCDK\CommunityServices\Model\Post(); // \DBCDK\CommunityServices\Model\Post | 

try {
    $result = $api_instance->profilePrototypeUpdateByIdPosts($fk, $id, $data);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProfileApi->profilePrototypeUpdateByIdPosts: ', $e->getMessage(), PHP_EOL;
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

# **profilePrototypeUpdateByIdQuarantines**
> \DBCDK\CommunityServices\Model\Quarantine profilePrototypeUpdateByIdQuarantines($fk, $id, $data)

Update a related item by id for quarantines.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\ProfileApi();
$fk = "fk_example"; // string | Foreign key for quarantines
$id = "id_example"; // string | PersistedModel id
$data = new \DBCDK\CommunityServices\Model\Quarantine(); // \DBCDK\CommunityServices\Model\Quarantine | 

try {
    $result = $api_instance->profilePrototypeUpdateByIdQuarantines($fk, $id, $data);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProfileApi->profilePrototypeUpdateByIdQuarantines: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **fk** | **string**| Foreign key for quarantines |
 **id** | **string**| PersistedModel id |
 **data** | [**\DBCDK\CommunityServices\Model\Quarantine**](../Model/\DBCDK\CommunityServices\Model\Quarantine.md)|  | [optional]

### Return type

[**\DBCDK\CommunityServices\Model\Quarantine**](../Model/Quarantine.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **profilePrototypeUpdateByIdReviews**
> \DBCDK\CommunityServices\Model\Review profilePrototypeUpdateByIdReviews($fk, $id, $data)

Update a related item by id for reviews.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\ProfileApi();
$fk = "fk_example"; // string | Foreign key for reviews
$id = "id_example"; // string | PersistedModel id
$data = new \DBCDK\CommunityServices\Model\Review(); // \DBCDK\CommunityServices\Model\Review | 

try {
    $result = $api_instance->profilePrototypeUpdateByIdReviews($fk, $id, $data);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProfileApi->profilePrototypeUpdateByIdReviews: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **fk** | **string**| Foreign key for reviews |
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

# **profilePrototypeUpdateImage**
> \DBCDK\CommunityServices\Model\ImageCollection profilePrototypeUpdateImage($id, $data)

Update image of this model.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\ProfileApi();
$id = "id_example"; // string | PersistedModel id
$data = new \DBCDK\CommunityServices\Model\ImageCollection(); // \DBCDK\CommunityServices\Model\ImageCollection | 

try {
    $result = $api_instance->profilePrototypeUpdateImage($id, $data);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProfileApi->profilePrototypeUpdateImage: ', $e->getMessage(), PHP_EOL;
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

# **profileUnilogin**
> object profileUnilogin($username, $timestamp, $authtoken, $ttl)

Login a user with unilogin.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\ProfileApi();
$username = "username_example"; // string | 
$timestamp = "timestamp_example"; // string | 
$authtoken = "authtoken_example"; // string | 
$ttl = 1.2; // double | 

try {
    $result = $api_instance->profileUnilogin($username, $timestamp, $authtoken, $ttl);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProfileApi->profileUnilogin: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **username** | **string**|  |
 **timestamp** | **string**|  |
 **authtoken** | **string**|  |
 **ttl** | **double**|  |

### Return type

**object**

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **profileUpdateAll**
> object profileUpdateAll($where, $data)

Update instances of the model matched by where from the data source.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\ProfileApi();
$where = "where_example"; // string | Criteria to match model instances
$data = new \DBCDK\CommunityServices\Model\Profile(); // \DBCDK\CommunityServices\Model\Profile | An object of model property name/value pairs

try {
    $result = $api_instance->profileUpdateAll($where, $data);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProfileApi->profileUpdateAll: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **where** | **string**| Criteria to match model instances | [optional]
 **data** | [**\DBCDK\CommunityServices\Model\Profile**](../Model/\DBCDK\CommunityServices\Model\Profile.md)| An object of model property name/value pairs | [optional]

### Return type

**object**

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **profileUpsert**
> \DBCDK\CommunityServices\Model\Profile profileUpsert($data)

Update an existing model instance or insert a new one into the data source.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new DBCDK\CommunityServices\Api\ProfileApi();
$data = new \DBCDK\CommunityServices\Model\Profile(); // \DBCDK\CommunityServices\Model\Profile | Model instance data

try {
    $result = $api_instance->profileUpsert($data);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProfileApi->profileUpsert: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **data** | [**\DBCDK\CommunityServices\Model\Profile**](../Model/\DBCDK\CommunityServices\Model\Profile.md)| Model instance data | [optional]

### Return type

[**\DBCDK\CommunityServices\Model\Profile**](../Model/Profile.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json, application/x-www-form-urlencoded, application/xml, text/xml
 - **Accept**: application/json, application/xml, text/xml, application/javascript, text/javascript

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

