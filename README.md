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

use Prometee\VIESClient\Soap\Client\DeferredViesSoapClient;
use Prometee\VIESClient\Soap\Client\ViesSoapClient;
use Prometee\VIESClient\Soap\Factory\ViesSoapClientFactory;
use Prometee\VIESClient\Helper\ViesHelper;

// Use the Deferred client to avoid getting error
// when the WSDL file is not accessible
$viesSoapClientFactory = ViesSoapClientFactory(ViesSoapClient::class);
$viesSoapClient = new DeferredViesSoapClient($viesSoapClientFactory);

$viesHelper = new ViesHelper($viesSoapClient);
$viesHelper->isValid('FR12345678987');

// Should print:
// 0: CHECK_STATUS_INVALID => Format is not valid and the webservice is not reachable)
// 1: CHECK_STATUS_INVALID_WEBSERVICE => Format is not valid according to the webservice
// 2: CHECK_STATUS_VALID_FORMAT => Format is valid but the webservice is not reachable
// 3: CHECK_STATUS_VALID_WEBSERVICE => Format is valid and the VAT number exists
print_r($viesHelper->isValid('FR12345678987'));

```

[ico-version]: https://img.shields.io/packagist/v/Prometee/vies-client.svg?style=flat-square
[ico-github-actions]: https://github.com/Prometee/VIESClient/workflows/Build/badge.svg
[ico-code-quality]: https://img.shields.io/scrutinizer/g/Prometee/VIESClient.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/prometee/vies-client
[link-github-actions]: https://github.com/Prometee/VIESClient/actions?query=workflow%3A"Build"
[link-code-quality]: https://scrutinizer-ci.com/g/Prometee/VIESClient
