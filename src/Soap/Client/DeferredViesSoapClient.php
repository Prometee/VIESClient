<?php

declare(strict_types=1);

namespace Prometee\VIESClient\Soap\Client;

use Prometee\VIESClient\Soap\Model\CheckVatApproxRequestInterface;
use Prometee\VIESClient\Soap\Model\CheckVatApproxResponseInterface;
use Prometee\VIESClient\Soap\Model\CheckVatRequestInterface;
use Prometee\VIESClient\Soap\Model\CheckVatResponseInterface;
use Prometee\VIESClient\Soap\Factory\ViesSoapClientFactoryInterface;

class DeferredViesSoapClient implements ViesSoapClientInterface
{
    /** @var ViesSoapClientInterface|null */
    protected $viesSoapClient = null;

    /** @var ViesSoapClientFactoryInterface */
    protected $viesSoapClientFactory;

    public function __construct(ViesSoapClientFactoryInterface $viesSoapClientFactory)
    {
        $this->viesSoapClientFactory = $viesSoapClientFactory;
    }

    protected function getViesSoapClient(): ViesSoapClientInterface
    {
        if (null === $this->viesSoapClient) {
            $this->viesSoapClient = $this->viesSoapClientFactory->createNew();
        }

        return $this->viesSoapClient;
    }

    public function checkVat(CheckVatRequestInterface $checkVatRequest): CheckVatResponseInterface
    {
        return $this->getViesSoapClient()->checkVat($checkVatRequest);
    }

    public function checkVatApprox(CheckVatApproxRequestInterface $checkVatApproxRequest): CheckVatApproxResponseInterface
    {
        return $this->getViesSoapClient()->checkVatApprox($checkVatApproxRequest);
    }
}
