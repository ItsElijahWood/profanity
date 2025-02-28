<?php

namespace ItsElijahWood\Profanity;

require_once __DIR__ . '/./filter/filter_string.php';

class Profanity
{
  /**
   * Filters a string of swear words returns true or false.
   * (optional) You can add custom array of swear words in parameter 2.
   * 
   * @param string $string
   * @param array $customSwearWords (optional)
   * @return bool
   */
  public function filterString($string, array $customSwearWords = []): bool
  {
    $en = require __DIR__ . '/../config/en.php';
    $fr = require __DIR__ . '/../config/fr.php';
    $es = require __DIR__ . '/../config/es.php';

    $en = array_merge($en, $fr, $es);

    if (!empty($customSwearWords)) {
      $en = array_merge($en, $customSwearWords);
    }

    $filter_string_class = new \Src\Filter\Filterstring($en);
    return $filter_string_class->filter_string($string);
  }

  /**
   * Returns swear word but tagged, example: (**** you)
   * (optional) You can add custom array of bad words in parameter 2.
   * 
   * @param string $string
   * @param array $customSwearWords (optional)
   * @return array|string|null
   */
  public function censorString($string, array $customSwearWords = []): mixed
  {
    $en = require __DIR__ . '/../config/en.php';
    $fr = require __DIR__ . '/../config/fr.php';
    $es = require __DIR__ . '/../config/es.php';

    $en = array_merge($en, $fr, $es);

    if (!empty($customSwearWords)) {
      $en = array_merge($en, $customSwearWords);
    }

    $censor_string_class = new \Src\Filter\Filterstring($en);
    return $censor_string_class->censor_string($string);
  }

  /**
   * Similar to censorString but you can pick your own censor string
   * 
   * @param string $string
   * @param string $replaceString
   * @param array $customSwearWords (optional)
   * @throws \InvalidArgumentException
   * @return array|string|null
   */
  public function replaceString($string, string $replaceString, array $customSwearWords = [])
  {
    $en = require __DIR__ . '/../config/en.php';
    $fr = require __DIR__ . '/../config/fr.php';
    $es = require __DIR__ . '/../config/es.php';

    $en = array_merge($en, $fr, $es);

    if (empty($replaceString)) throw new \InvalidArgumentException("Parameter #2 on replaceString() === null");

    if (!empty($customSwearWords)) {
      $en = array_merge($en, $customSwearWords);
    }

    $replace_string_class = new \Src\Filter\Filterstring($en);
    return $replace_string_class->replace_string($string, $replaceString);
  }

  /**
   * Returns a list of default blocked swear words as an array
   * 
   * @return bool
   */
  public function getProfanityList(): bool
  {
    $en = require __DIR__ . '/../config/en.php';
    $fr = require __DIR__ . '/../config/fr.php';
    $es = require __DIR__ . '/../config/es.php';

    $en = array_merge($en, $fr, $es);

    return print_r($en);
  }
}
