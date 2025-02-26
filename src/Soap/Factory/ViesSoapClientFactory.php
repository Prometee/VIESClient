<?php

declare(strict_types=1);

namespace Prometee\VIESClient\Soap\Factory;

use Prometee\VIESClient\Soap\Client\ViesSoapClientInterface;

final class ViesSoapClientFactory implements ViesSoapClientFactoryInterface
{
    /**
     * @var string
     *
     * @psalm-var class-string<ViesSoapClientInterface>
     */
    private $className;

    /** @var string|null */
    private $wsdl;

    /** @var array */
    private $options;

    /**
     * @psalm-param class-string<ViesSoapClientInterface> $className
     */
    public function __construct(string $className, ?string $wsdl = null, array $options = [])
    {
        $this->className = $className;
        $this->wsdl = $wsdl;
        $this->options = $options;
    }

    public function createNew(): ViesSoapClientInterface
    {
        return new $this->className(
            $this->wsdl,
            $this->options
        );
    }
}
