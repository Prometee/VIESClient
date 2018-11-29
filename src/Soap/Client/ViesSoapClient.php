<?php

declare(strict_types=1);

namespace Prometee\VIESClient\Soap\Client;

use Prometee\VIESClient\Soap\Model\CheckVatApproxRequestInterface;
use Prometee\VIESClient\Soap\Model\CheckVatApproxResponseInterface;
use Prometee\VIESClient\Soap\Model\CheckVatRequestInterface;
use Prometee\VIESClient\Soap\Model\CheckVatResponseInterface;
use SoapClient;

class ViesSoapClient extends SoapClient implements ViesSoapClientInterface
{

    /**
     * @param string|null $wsdl
     * @param array $options
     */
    public function __construct(string $wsdl = null, array $options = [])
    {
        if ($wsdl === null) {
            $wsdl = static::WSDL;
        }

        if (!isset($options['classmap'])) {
            $options['classmap'] = static::CLASS_MAPPING;
        }

        parent::__construct($wsdl, $options);
    }

    /**
     * {@inheritdoc}
     */
    public function checkVat(CheckVatRequestInterface $checkVatRequest): CheckVatResponseInterface
    {
        return parent::__call(__FUNCTION__, [$checkVatRequest]);
    }

    /**
     * {@inheritdoc}
     */
    public function checkVatApprox(CheckVatApproxRequestInterface $checkVatApproxRequest): CheckVatApproxResponseInterface
    {
        return parent::__call(__FUNCTION__, [$checkVatApproxRequest]);
    }
}
