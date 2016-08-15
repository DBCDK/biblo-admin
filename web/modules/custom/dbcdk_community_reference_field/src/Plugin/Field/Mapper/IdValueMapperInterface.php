<?php

namespace Drupal\dbcdk_community_reference_field\Plugin\Field\Mapper;

/**
 * Interface for classes which can map for a remote entity id to a string value.
 *
 * This is used to manage fields where the stored value is the id of the remote
 * entity but the displayed value is a string.
 *
 * Mapping must work both ways ie. an id can be transformed to a string value
 * and that string value can be transformed back to an id.
 */
interface IdValueMapperInterface {

  /**
   * Map an id to a string representation.
   *
   * @param int $id
   *   The id to map.
   *
   * @return string
   *   The string representation for the id.
   *
   * @throws \UnexpectedValueException
   *   Thrown if the id cannot be converted to a string representation. This
   *   could occur if the id no longer exists in the remote system.
   */
  public function toValue($id);

  /**
   * Map a string representation to an id.
   *
   * @param string $value
   *   The value to map.
   *
   * @return int
   *   The id corresponding to the string value.
   *
   * @throws \UnexpectedValueException
   *   Thrown if the value cannot be converted to an id. This could occur if the
   *   value does not contain sufficient information to complete a mapping or
   *   the information is invalid.
   */
  public function toId($value);

}
