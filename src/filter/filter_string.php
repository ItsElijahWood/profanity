<?php
namespace Src\Filter;

class Filterstring
{
  private array $bad_words;

  public function __construct($bad_words)
  {
    $this->bad_words = $bad_words;
  }

  public function check_string($string): bool
  {
    return $this->string_filter($string);
  }
  public function check_tag_string($string)
  {
    return $this->string_tag_filter($string);
  }
  /**
   * Combined filter_string
   * 
   * @param string $word
   * @throws \InvalidArgumentException
   * @return bool
   */
  protected function string_filter($string)
  {
    if (!$this->is_string($string)) {
      throw new \InvalidArgumentException("Invalid type, must be string.");
    }

    if ($this->filter($string)) {
      return true;
    } else {
      return false;
    }
  }

  protected function string_tag_filter($string)
  {
    if (!$this->is_string($string)) {
      throw new \InvalidArgumentException("Invalid type, must be string.");
    }

    if (!empty($this->tagFilter($string))) {
      return preg_replace_callback(
        "/\b(" . implode("|", array_map('preg_quote', $this->bad_words)) . ")\b/i",
        function ($matches) {
          return str_repeat('*', strlen($matches[0]));
        },
        $string
      );
    } else {
      return $string;
    }
  }

  private function is_string($string): bool
  {
    return is_string($string);
  }

  private function filter($string): bool
  {
    $string = trim($string);
    $string = strtolower($string);

    foreach ($this->bad_words as $badword) {
      if (strpos($string, $badword) !== false) {
        return true;
      }
    }

    return false;
  }

  private function tagFilter($string)
  {

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
}
