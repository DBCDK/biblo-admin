<?php
/**
 * Group
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
 *  Copyright 2015 SmartBear Software
 *
 *  Licensed under the Apache License, Version 2.0 (the "License");
 *  you may not use this file except in compliance with the License.
 *  You may obtain a copy of the License at
 *
 *      http://www.apache.org/licenses/LICENSE-2.0
 *
 *  Unless required by applicable law or agreed to in writing, software
 *  distributed under the License is distributed on an "AS IS" BASIS,
 *  WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 *  See the License for the specific language governing permissions and
 *  limitations under the License.
 */
/**
 * NOTE: This class is auto generated by the swagger code generator program.
 * https://github.com/swagger-api/swagger-codegen
 * Do not edit the class manually.
 */

namespace DBCDK\CommunityServices\Model;

use \ArrayAccess;
/**
 * Group Class Doc Comment
 *
 * @category    Class
 * @description 
 * @package     DBCDK\CommunityServices
 * @author      http://github.com/swagger-api/swagger-codegen
 * @license     http://www.apache.org/licenses/LICENSE-2.0 Apache Licene v2
 * @link        https://github.com/swagger-api/swagger-codegen
 */
class Group implements ArrayAccess
{
    /**
      * Array of property to type mappings. Used for (de)serialization 
      * @var string[]
      */
    static $swaggerTypes = array(
        'name' => 'string',
        'description' => 'string',
        'timeCreated' => '\DateTime',
        'id' => 'double',
        'groupownerid' => 'double'
    );
  
    /** 
      * Array of attributes where the key is the local name, and the value is the original name
      * @var string[] 
      */
    static $attributeMap = array(
        'name' => 'name',
        'description' => 'description',
        'timeCreated' => 'timeCreated',
        'id' => 'id',
        'groupownerid' => 'groupownerid'
    );
  
    /**
      * Array of attributes to setter functions (for deserialization of responses)
      * @var string[]
      */
    static $setters = array(
        'name' => 'setName',
        'description' => 'setDescription',
        'timeCreated' => 'setTimeCreated',
        'id' => 'setId',
        'groupownerid' => 'setGroupownerid'
    );
  
    /**
      * Array of attributes to getter functions (for serialization of requests)
      * @var string[]
      */
    static $getters = array(
        'name' => 'getName',
        'description' => 'getDescription',
        'timeCreated' => 'getTimeCreated',
        'id' => 'getId',
        'groupownerid' => 'getGroupownerid'
    );
  
    
    /**
      * $name 
      * @var string
      */
    protected $name;
    
    /**
      * $description 
      * @var string
      */
    protected $description;
    
    /**
      * $timeCreated 
      * @var \DateTime
      */
    protected $timeCreated;
    
    /**
      * $id 
      * @var double
      */
    protected $id;
    
    /**
      * $groupownerid 
      * @var double
      */
    protected $groupownerid;
    

    /**
     * Constructor
     * @param mixed[] $data Associated array of property value initalizing the model
     */
    public function __construct(array $data = null)
    {
        if ($data != null) {
            $this->name = $data["name"];
            $this->description = $data["description"];
            $this->timeCreated = $data["timeCreated"];
            $this->id = $data["id"];
            $this->groupownerid = $data["groupownerid"];
        }
    }
    
    /**
     * Gets name
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
  
    /**
     * Sets name
     * @param string $name 
     * @return $this
     */
    public function setName($name)
    {
        
        $this->name = $name;
        return $this;
    }
    
    /**
     * Gets description
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }
  
    /**
     * Sets description
     * @param string $description 
     * @return $this
     */
    public function setDescription($description)
    {
        
        $this->description = $description;
        return $this;
    }
    
    /**
     * Gets timeCreated
     * @return \DateTime
     */
    public function getTimeCreated()
    {
        return $this->timeCreated;
    }
  
    /**
     * Sets timeCreated
     * @param \DateTime $timeCreated 
     * @return $this
     */
    public function setTimeCreated($timeCreated)
    {
        
        $this->timeCreated = $timeCreated;
        return $this;
    }
    
    /**
     * Gets id
     * @return double
     */
    public function getId()
    {
        return $this->id;
    }
  
    /**
     * Sets id
     * @param double $id 
     * @return $this
     */
    public function setId($id)
    {
        
        $this->id = $id;
        return $this;
    }
    
    /**
     * Gets groupownerid
     * @return double
     */
    public function getGroupownerid()
    {
        return $this->groupownerid;
    }
  
    /**
     * Sets groupownerid
     * @param double $groupownerid 
     * @return $this
     */
    public function setGroupownerid($groupownerid)
    {
        
        $this->groupownerid = $groupownerid;
        return $this;
    }
    
    /**
     * Returns true if offset exists. False otherwise.
     * @param  integer $offset Offset 
     * @return boolean
     */
    public function offsetExists($offset)
    {
        return isset($this->$offset);
    }
  
    /**
     * Gets offset.
     * @param  integer $offset Offset 
     * @return mixed 
     */
    public function offsetGet($offset)
    {
        return $this->$offset;
    }
  
    /**
     * Sets value based on offset.
     * @param  integer $offset Offset 
     * @param  mixed   $value  Value to be set
     * @return void
     */
    public function offsetSet($offset, $value)
    {
        $this->$offset = $value;
    }
  
    /**
     * Unsets offset.
     * @param  integer $offset Offset 
     * @return void
     */
    public function offsetUnset($offset)
    {
        unset($this->$offset);
    }
  
    /**
     * Gets the string presentation of the object
     * @return string
     */
    public function __toString()
    {
        if (defined('JSON_PRETTY_PRINT')) {
            return json_encode(get_object_vars($this), JSON_PRETTY_PRINT);
        } else {
            return json_encode(get_object_vars($this));
        }
    }
}