<?php

declare(strict_types=1);

namespace Prometee\VatInformationExchangeSystem\Soap\Model;

class Response extends CheckVatRequest implements ResponseInterface
{
    use ResponseTrait;
}
