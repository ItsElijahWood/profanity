# Profanity Filter

## Install

```bash
  composer install itselijahwood/profanity 
```

## Getting started

If you'd like to return a bool (swear word = true else false) 
```php
  <?php
  require 'vendor/autoload.php';

  use ItsElijahWood\Profanity\Profanity;

  $string = "test FuCk";
  $profanity = new Profanity();
  $result = $profanity->filterString($string);

  // If result is true
  if ($result) {
    echo "Swear word found.";
  } else {
    echo "No swear word.";
  }
```

If you'd like to keep the words but have them tagged
```php
  <?php
  require 'vendor/autoload.php';

  use ItsElijahWood\Profanity\Profanity;

  $string = "test fUCk";
  $profanity = new Profanity();
  $result = $profanity->tagFilterString($string);

  echo $result; // output: "test ****"
```
