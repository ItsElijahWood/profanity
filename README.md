# 🛡️ Profanity Filter

Profanity filter is a swear word filter made in PHP for PHP! It blocks over 200+ swear words + racial slurs.
I'm accepting **PR's** but mostly won't be available to accept / review.

## Install

```bash
  composer install itselijahwood/profanity 
```

## Getting started

Get an array of swear words that are blocked
```php
  <?php
  require 'vendor/autoload.php';

  use ItsElijahWood\Profanity\Profanity;

  $profanity = new Profanity();
  $getList = $profanity->getProfanityList();

  echo $getList;
```

Checks a string and returns true if it contains a swear word from the list, otherwise returns false.
```php
  $string = "fuck you";
  $profanity = new Profanity();
  $result = $profanity->filterString($string);

  if ($result) {
    echo "Swear word found."; // Output
  } else {
    echo "No swear word.";
  }
```

Filters a string by replacing swear words with **** instead of returning a boolean.
```php
  $string = "i aint testin shit";
  $profanity = new Profanity();
  $result = $profanity->censorString($string);

  echo $result; // output: "i aint testin ****"
```

Similar to censorString but you can choose the censorString
```php
  $string = "sexy string";
  $replaceCensorString = "quack";

  $profanity = new Profanity();
  $getList = $profanity->replaceString($string, $replaceCensorString);

  echo $getList; // Output: quack string
```

Add your own custom swear word array, merges onto default array. Works for all functions
```php
  $string = "i aint testing shit";
  $customSwearWordArray = ["testing"];

  $profanity = new Profanity();
  $getString = $profanity->censorString($string, $customSwearWordArray);

  echo $getString; // Ouput: i aint ******* ****
```
