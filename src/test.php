<?php
require 'vendor/autoload.php';

use ItsElijahWood\Profanity\Profanity;

$string = "test";
$profanity = new Profanity();
$filter = $profanity->filterString($string);

if ($filter) {
  echo "Swear word found.";
} else {
  echo "No swear word.";
}
