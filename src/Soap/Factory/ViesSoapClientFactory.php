<?php

declare(strict_types=1);

namespace Prometee\VIESClient\Soap\Factory;

use Prometee\VIESClient\Soap\Client\ViesSoapClientInterface;

final class ViesSoapClientFactory implements ViesSoapClientFactoryInterface
{
    /**
     * @var string
     * @psalm-var class-string
     */
    private $className;

    /**
     * @psalm-param class-string $className
     */
    public function __construct(string $className)
    {
        $this->className = $className;
    }

    public function createNew(): ViesSoapClientInterface
    {
        return new $this->className();
    }
}
