<?php
namespace ItsElijahWood\Profanity;

require_once __DIR__ . '/./filter/filter_string.php';

class Profanity
{
  /**
   * Filters a string of bad words returns true or false.
   * (optional) You can add custom array of bad words in parameter 2.
   * 
   * @param string $string
   * @param array $customSwearWords (optional)
   * @return bool
   */
  public function filterString($string, array $customSwearWords = []): bool
  {
    $bad_words = require __DIR__ . '/../config/en.php';

    if (!empty($customSwearWords)) {
      $bad_words = array_merge($bad_words, $customSwearWords);
    }

    $filter_string_class = new \Src\Filter\Filterstring($bad_words);
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
    $bad_words = require __DIR__ . '/../config/en.php';

    if (!empty($customSwearWords)) {
      $bad_words = array_merge($bad_words, $customSwearWords);
    }

    $censor_string_class = new \Src\Filter\Filterstring($bad_words);
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
    $bad_words = require __DIR__ . '/../config/en.php';
    if (empty($replaceString)) throw new \InvalidArgumentException("Parameter #2 on replaceString() === null");

    if (!empty($customSwearWords)) {
      $bad_words = array_merge($bad_words, $customSwearWords);
    }

    $replace_string_class = new \Src\Filter\Filterstring($bad_words);
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

    return print_r($en);
  }
}
