<?php

declare(strict_types=1);

namespace Prometee\VIESClient\Soap\Model;

class Response extends CheckVatRequest implements ResponseInterface
{
    use ResponseTrait;
}
