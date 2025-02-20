<?php
require 'vendor/autoload.php';

use ItsElijahWood\Profanity\Profanity;

$string = "test string";
$customArray = ["string"];
$replaceString = "[CENSORED]";

$profanity = new Profanity();
$getList = $profanity->replaceString($string, $replaceString, $customArray);

echo $getList; // Output: [CENSORED] string
