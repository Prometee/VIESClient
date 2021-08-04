[![Latest Version on Packagist][ico-version]][link-packagist]
[![Build Status][ico-github-actions]][link-github-actions]
[![Quality Score][ico-code-quality]][link-code-quality]

## European VAT Information Exchange System SOAP client

This library is designed to handle validation trough VIES Soap WebService.

See https://ec.europa.eu/taxation_customs/vies/ for more information.

## Installation

Install using Composer :

```
$ composer require prometee/vies-client
```

## Usage

```php
$loader = require_once( __DIR__.'/vendor/autoload.php');

use Prometee\VIESClient\Soap\Client\ViesSoapClient;
use Prometee\VIESClient\Helper\ViesHelper;

$viesSoapClient = new ViesSoapClient();

$viesHelper = new ViesHelper($viesSoapClient);
$viesHelper->isValid('FR12345678987');

// Should print:
// 0: Invalid (Format is not ok or the Soap WebService
//    return isValid() === false
// 1: Format is ok, but we could not check the Soap WebService
//    because a network error occurred
// 2: Format is not OK, but the Soap WebService say it exists
//    (Could append if one day a new format is created,
//    like adding a new European country)
// 3: Format is ok and the VAT number exists
print_r($viesHelper->isValid('FR12345678987'));

```

[ico-version]: https://img.shields.io/packagist/v/Prometee/vies-client.svg?style=flat-square
[ico-github-actions]: https://github.com/Prometee/VIESClient/workflows/Build/badge.svg
[ico-code-quality]: https://img.shields.io/scrutinizer/g/Prometee/VIESClient.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/prometee/vies-client
[link-github-actions]: https://github.com/Prometee/VIESClient/actions?query=workflow%3A"Build"
[link-code-quality]: https://scrutinizer-ci.com/g/Prometee/VIESClient
