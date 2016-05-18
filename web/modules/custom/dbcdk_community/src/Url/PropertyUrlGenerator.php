<?php

namespace Drupal\dbcdk_community\Url;

/**
 * Class which generates urls based on replacing property values into a pattern.
 */
class PropertyUrlGenerator implements UrlGeneratorInterface {

  /**
   * The url pattern for objects.
   *
   * @var string $urlPattern
   */
  protected $urlPattern;

  /**
   * ObjectUrlGenerator constructor.
   *
   * @param string $url_pattern
   *   The url pattern to use as a base for generation. Patterns can
   *   contain tokens in the format [id] which will be replaced with
   *   corresponding values from the passed object.
   */
  public function __construct($url_pattern) {
    $this->urlPattern = $url_pattern;
  }

  /**
   * {@inheritdoc}
   */
  public function generate($object) {
    $tokens = [];
    if (preg_match_all('/\[(\w+)\]/', $this->urlPattern, $tokens)) {
      $tokens = $tokens[1];
    }

    $token_values = [];
    if (!empty($tokens)) {
      foreach ($tokens as $token_name) {
        $getter = 'get' . ucfirst($token_name);
        if (method_exists($object, $getter)) {
          $token_values['[' . $token_name . ']'] = $object->{$getter}();
        }
      }
    }

    return strtr($this->urlPattern, $token_values);
  }

}
