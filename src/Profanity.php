<?php
namespace ItsElijahWood\Profanity;

class Profanity
{
  /**
   * Filters a string of bad words returns true or false.
   * 
   * @param string $string
   * @return bool
   */
  public function filterString($string): bool
  {
    $badWords = require __DIR__ . '/../config/words.php';
    require_once __DIR__ . '/./filter/filter_string.php';

    $filter_string_class = new \Src\Filter\Filterstring($badWords);

    return $filter_string_class->check_string($string);
  }

  /**
   * Returns swear word but tagged, example: (**** you)
   * 
   * @param string $string
   * @return mixed
   */
  public function tagFilterString($string): mixed
  {
    $badWords = require __DIR__ . '/../config/words.php';
    require_once __DIR__ . '/./filter/filter_string.php';

    $filter_string_class = new \Src\Filter\Filterstring($badWords);
    return $filter_string_class->check_tag_string($string);
  }
}
