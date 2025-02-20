<?php
namespace Src\Filter;

class Filterstring
{
  private array $bad_words;

  public function __construct($bad_words)
  {
    $this->bad_words = $bad_words;
  }

  /**
   * Calls to private function to return a result
   * 
   * @param string $string
   * @return bool
   */
  public function filter_string($string): bool
  {
    return $this->filter($string);
  }

  /**
   * Returns a private function
   * 
   * @param string $string
   * @return array|string|null
   */
  public function censor_string($string)
  {
    return $this->tagFilter($string);
  }

  /**
   * Callbacks to private function to return a result
   * 
   * @param string $string
   * @param string $replace_string
   * @return array|string|null
   */
  public function replace_string($string, $replace_string)
  {
    return $this->replaceString($string, $replace_string);
  }

  /**
   * Returns true or false if its a string
   * 
   * @param string $string
   * @return bool
   */
  private function is_string($string): bool
  {
    return is_string($string);
  }

  /**
   * Filters a swear word in a string and return true or false
   * 
   * @param string $string
   * @throws \InvalidArgumentException
   * @return bool
   */
  private function filter($string): bool
  {
    if (!$this->is_string($string)) {
      throw new \InvalidArgumentException("Invalid type must be string.");
    }
    $string = trim($string);
    $string = strtolower($string);

    foreach ($this->bad_words as $badword) {
      if (strpos($string, $badword) !== false) {
        return true;
      }
    }

    return false;
  }

  /**
   * Filters a tag and replaces the swear word with *
   * 
   * @param string $string
   * @throws \InvalidArgumentException
   * @return array|string|null
   */
  private function tagFilter($string)
  {
    if (!$this->is_string($string)) {
      throw new \InvalidArgumentException("Invalid type must be string.");
    }
    $string = trim($string);
    $string = strtolower($string);

    foreach ($this->bad_words as $badword) {
      if (strpos($string, $badword) !== false) {
        $string = preg_replace_callback(
          "/\b(" . preg_quote($badword, '/') . ")\b/i",
          function ($matches) {
            return str_repeat('*', strlen($matches[0]));
          },
          $string
        );
      }
    }

    return $string;
  }

  public function replaceString($string, $replace_string)
  {
    if (!$this->is_string($string)) throw new \InvalidArgumentException("Parameter #1 must be a string");
    if (!$this->is_string($replace_string)) throw new \InvalidArgumentException("Parameter #2 must be a string");
  
    $string = trim($string);
    $replace_string = trim($replace_string);
    $string = strtolower($string);

    foreach ($this->bad_words as $badword) {
      if (stripos($string, $badword) !== false) {
          $string = preg_replace(
              "/\b" . preg_quote($badword, '/') . "\b/i",
              $replace_string,
              $string
          );
      }
  }

    return $string;
  }
}
