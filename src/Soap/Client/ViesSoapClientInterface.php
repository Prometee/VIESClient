<?php

declare(strict_types=1);

namespace Prometee\VIESClient\Soap\Client;

use Prometee\VIESClient\Soap\Model\CheckVatApproxRequest;
use Prometee\VIESClient\Soap\Model\CheckVatApproxRequestInterface;
use Prometee\VIESClient\Soap\Model\CheckVatApproxResponse;
use Prometee\VIESClient\Soap\Model\CheckVatApproxResponseInterface;
use Prometee\VIESClient\Soap\Model\CheckVatRequest;
use Prometee\VIESClient\Soap\Model\CheckVatRequestInterface;
use Prometee\VIESClient\Soap\Model\CheckVatResponse;
use Prometee\VIESClient\Soap\Model\CheckVatResponseInterface;
use SoapFault;

interface ViesSoapClientInterface
{
    public const CLASS_MAPPING = [
        'checkVat' => CheckVatRequest::class,
        'checkVatResponse' => CheckVatResponse::class,
        'checkVatApprox' => CheckVatApproxRequest::class,
        'checkVatApproxResponse' => CheckVatApproxResponse::class,
    ];

    public const WSDL = 'https://ec.europa.eu/taxation_customs/vies/checkVatService.wsdl';

    /**
     * @throws SoapFault
     */
    public function checkVat(CheckVatRequestInterface $checkVatRequest): CheckVatResponseInterface;

    /**
     * @throws SoapFault
     */
    public function checkVatApprox(CheckVatApproxRequestInterface $checkVatApproxRequest): CheckVatApproxResponseInterface;

    public function setLocation(string $new_location = ''): ?string;
}
