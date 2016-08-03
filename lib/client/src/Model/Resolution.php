<?php
/**
 * Resolution
 *
 * PHP version 5
 *
 * @category Class
 * @package  DBCDK\CommunityServices
 * @author   http://github.com/swagger-api/swagger-codegen
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache Licene v2
 * @link     https://github.com/swagger-api/swagger-codegen
 */

/**
 * communityservice
 *
 * OpenAPI spec version: 1.0.0
 * 
 * Generated by: https://github.com/swagger-api/swagger-codegen.git
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *      http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

/**
 * NOTE: This class is auto generated by the swagger code generator program.
 * https://github.com/swagger-api/swagger-codegen
 * Do not edit the class manually.
 */

namespace DBCDK\CommunityServices\Model;

use \ArrayAccess;

/**
 * Resolution Class Doc Comment
 *
 * @category    Class */
/** 
 * @package     DBCDK\CommunityServices
 * @author      http://github.com/swagger-api/swagger-codegen
 * @license     http://www.apache.org/licenses/LICENSE-2.0 Apache Licene v2
 * @link        https://github.com/swagger-api/swagger-codegen
 */
class Resolution implements ArrayAccess
{
    /**
      * The original name of the model.
      * @var string
      */
    protected static $swaggerModelName = 'resolution';

    /**
      * Array of property to type mappings. Used for (de)serialization
      * @var string[]
      */
    protected static $swaggerTypes = array(
        'size' => 'string',
        'id' => 'double',
        'videoCollectionResolutionId' => 'double',
        'imageCollectionResolutionId' => 'double'
    );

    public static function swaggerTypes()
    {
        return self::$swaggerTypes;
    }

    /**
     * Array of attributes where the key is the local name, and the value is the original name
     * @var string[]
     */
    protected static $attributeMap = array(
        'size' => 'size',
        'id' => 'id',
        'videoCollectionResolutionId' => 'videoCollectionResolutionId',
        'imageCollectionResolutionId' => 'imageCollectionResolutionId'
    );

    public static function attributeMap()
    {
        return self::$attributeMap;
    }

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     * @var string[]
     */
    protected static $setters = array(
        'size' => 'setSize',
        'id' => 'setId',
        'videoCollectionResolutionId' => 'setVideoCollectionResolutionId',
        'imageCollectionResolutionId' => 'setImageCollectionResolutionId'
    );

    public static function setters()
    {
        return self::$setters;
    }

    /**
     * Array of attributes to getter functions (for serialization of requests)
     * @var string[]
     */
    protected static $getters = array(
        'size' => 'getSize',
        'id' => 'getId',
        'videoCollectionResolutionId' => 'getVideoCollectionResolutionId',
        'imageCollectionResolutionId' => 'getImageCollectionResolutionId'
    );

    public static function getters()
    {
        return self::$getters;
    }

    

    

    /**
     * Associative array for storing property values
     * @var mixed[]
     */
    protected $container = array();

    /**
     * Constructor
     * @param mixed[] $data Associated array of property value initalizing the model
     */
    public function __construct(array $data = null)
    {
        $this->container['size'] = isset($data['size']) ? $data['size'] : null;
        $this->container['id'] = isset($data['id']) ? $data['id'] : null;
        $this->container['videoCollectionResolutionId'] = isset($data['videoCollectionResolutionId']) ? $data['videoCollectionResolutionId'] : null;
        $this->container['imageCollectionResolutionId'] = isset($data['imageCollectionResolutionId']) ? $data['imageCollectionResolutionId'] : null;
    }

    /**
     * show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalid_properties = array();
        if ($this->container['size'] === null) {
            $invalid_properties[] = "'size' can't be null";
        }
        return $invalid_properties;
    }

    /**
     * validate all the properties in the model
     * return true if all passed
     *
     * @return bool True if all properteis are valid
     */
    public function valid()
    {
        if ($this->container['size'] === null) {
            return false;
        }
        return true;
    }


    /**
     * Gets size
     * @return string
     */
    public function getSize()
    {
        return $this->container['size'];
    }

    /**
     * Sets size
     * @param string $size
     * @return $this
     */
    public function setSize($size)
    {
        $this->container['size'] = $size;

        return $this;
    }

    /**
     * Gets id
     * @return double
     */
    public function getId()
    {
        return $this->container['id'];
    }

    /**
     * Sets id
     * @param double $id
     * @return $this
     */
    public function setId($id)
    {
        $this->container['id'] = $id;

        return $this;
    }

    /**
     * Gets videoCollectionResolutionId
     * @return double
     */
    public function getVideoCollectionResolutionId()
    {
        return $this->container['videoCollectionResolutionId'];
    }

    /**
     * Sets videoCollectionResolutionId
     * @param double $videoCollectionResolutionId
     * @return $this
     */
    public function setVideoCollectionResolutionId($videoCollectionResolutionId)
    {
        $this->container['videoCollectionResolutionId'] = $videoCollectionResolutionId;

        return $this;
    }

    /**
     * Gets imageCollectionResolutionId
     * @return double
     */
    public function getImageCollectionResolutionId()
    {
        return $this->container['imageCollectionResolutionId'];
    }

    /**
     * Sets imageCollectionResolutionId
     * @param double $imageCollectionResolutionId
     * @return $this
     */
    public function setImageCollectionResolutionId($imageCollectionResolutionId)
    {
        $this->container['imageCollectionResolutionId'] = $imageCollectionResolutionId;

        return $this;
    }
    /**
     * Returns true if offset exists. False otherwise.
     * @param  integer $offset Offset
     * @return boolean
     */
    public function offsetExists($offset)
    {
        return isset($this->container[$offset]);
    }

    /**
     * Gets offset.
     * @param  integer $offset Offset
     * @return mixed
     */
    public function offsetGet($offset)
    {
        return isset($this->container[$offset]) ? $this->container[$offset] : null;
    }

    /**
     * Sets value based on offset.
     * @param  integer $offset Offset
     * @param  mixed   $value  Value to be set
     * @return void
     */
    public function offsetSet($offset, $value)
    {
        if (is_null($offset)) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }
    }

    /**
     * Unsets offset.
     * @param  integer $offset Offset
     * @return void
     */
    public function offsetUnset($offset)
    {
        unset($this->container[$offset]);
    }

    /**
     * Gets the string presentation of the object
     * @return string
     */
    public function __toString()
    {
        if (defined('JSON_PRETTY_PRINT')) { // use JSON pretty print
            return json_encode(\DBCDK\CommunityServices\ObjectSerializer::sanitizeForSerialization($this), JSON_PRETTY_PRINT);
        }

        return json_encode(\DBCDK\CommunityServices\ObjectSerializer::sanitizeForSerialization($this));
    }
}


