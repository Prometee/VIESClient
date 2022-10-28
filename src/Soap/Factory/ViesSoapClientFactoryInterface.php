<?php

declare(strict_types=1);

namespace Prometee\VIESClient\Soap\Factory;

use Prometee\VIESClient\Soap\Client\ViesSoapClientInterface;

interface ViesSoapClientFactoryInterface
{
    public function createNew(): ViesSoapClientInterface;
}
