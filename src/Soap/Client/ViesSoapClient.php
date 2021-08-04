<?php

declare(strict_types=1);

namespace Prometee\VIESClient\Soap\Client;

use Prometee\VIESClient\Soap\Model\CheckVatApproxRequestInterface;
use Prometee\VIESClient\Soap\Model\CheckVatApproxResponseInterface;
use Prometee\VIESClient\Soap\Model\CheckVatRequestInterface;
use Prometee\VIESClient\Soap\Model\CheckVatResponseInterface;
use SoapClient;
use SoapFault;

class ViesSoapClient extends SoapClient implements ViesSoapClientInterface
{
    /**
     * @throws SoapFault
     */
    public function __construct(string $wsdl = null, array $options = [])
    {
        if (null === $wsdl) {
            $wsdl = static::WSDL;
        }

        if (!isset($options['classmap'])) {
            $options['classmap'] = static::CLASS_MAPPING;
        }

        parent::__construct($wsdl, $options);
    }

    public function checkVat(CheckVatRequestInterface $checkVatRequest): CheckVatResponseInterface
    {
        return parent::__soapCall(__FUNCTION__, [$checkVatRequest]);
    }

    public function checkVatApprox(CheckVatApproxRequestInterface $checkVatApproxRequest): CheckVatApproxResponseInterface
    {
        return parent::__soapCall(__FUNCTION__, [$checkVatApproxRequest]);
    }

    public function setLocation(string $new_location = ''): ?string
    {
        return parent::__setLocation($new_location);
    }
}
