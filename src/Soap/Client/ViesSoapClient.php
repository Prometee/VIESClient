<?php

declare(strict_types=1);

namespace Prometee\VIESClient\Soap\Client;

use Prometee\VIESClient\Soap\Model\CheckVatApproxRequestInterface;
use Prometee\VIESClient\Soap\Model\CheckVatApproxResponseInterface;
use Prometee\VIESClient\Soap\Model\CheckVatRequestInterface;
use Prometee\VIESClient\Soap\Model\CheckVatResponseInterface;
use SoapClient;
use SoapFault;
use UnexpectedValueException;

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
        $soapCall = parent::__soapCall(__FUNCTION__, [$checkVatRequest]);

        if (false === $soapCall instanceof CheckVatResponseInterface) {
            throw new UnexpectedValueException(sprintf('Expect %s get %s !', CheckVatResponseInterface::class, gettype($soapCall)));
        }

        return $soapCall;
    }

    public function checkVatApprox(CheckVatApproxRequestInterface $checkVatApproxRequest): CheckVatApproxResponseInterface
    {
        $soapCall = parent::__soapCall(__FUNCTION__, [$checkVatApproxRequest]);

        if (false === $soapCall instanceof CheckVatApproxResponseInterface) {
            throw new UnexpectedValueException(sprintf('Expect %s get %s !', CheckVatApproxResponseInterface::class, gettype($soapCall)));
        }

        return $soapCall;
    }
}
