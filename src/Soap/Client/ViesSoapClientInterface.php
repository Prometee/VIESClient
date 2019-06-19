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

    public const WSDL = 'http://ec.europa.eu/taxation_customs/vies/checkVatService.wsdl';

    /**
     * @param CheckVatRequestInterface $checkVatRequest
     *
     * @return CheckVatResponseInterface
     *
     * @throws SoapFault
     */
    public function checkVat(CheckVatRequestInterface $checkVatRequest): CheckVatResponseInterface;

    /**
     * @param CheckVatApproxRequestInterface $checkVatApproxRequest
     *
     * @return CheckVatApproxResponseInterface
     *
     * @throws SoapFault
     */
    public function checkVatApprox(CheckVatApproxRequestInterface $checkVatApproxRequest): CheckVatApproxResponseInterface;

    /**
     * @param string|null $new_location
     *
     * @return string|null
     */
    public function setLocation(string $new_location = null): ?string;
}
