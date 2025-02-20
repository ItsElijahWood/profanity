<?php
require 'vendor/autoload.php';

use ItsElijahWood\Profanity\Profanity;

$string = "cul";

$profanity = new Profanity();
$getList = $profanity->getProfanityList();

echo $getList; 
