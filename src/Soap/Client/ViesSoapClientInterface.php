<?php

declare(strict_types=1);

namespace Prometee\VatInformationExchangeSystem\Soap\Client;

use Prometee\VatInformationExchangeSystem\Soap\Model\CheckVatApproxRequest;
use Prometee\VatInformationExchangeSystem\Soap\Model\CheckVatApproxRequestInterface;
use Prometee\VatInformationExchangeSystem\Soap\Model\CheckVatApproxResponse;
use Prometee\VatInformationExchangeSystem\Soap\Model\CheckVatApproxResponseInterface;
use Prometee\VatInformationExchangeSystem\Soap\Model\CheckVatRequest;
use Prometee\VatInformationExchangeSystem\Soap\Model\CheckVatRequestInterface;
use Prometee\VatInformationExchangeSystem\Soap\Model\CheckVatResponse;
use Prometee\VatInformationExchangeSystem\Soap\Model\CheckVatResponseInterface;

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
     * @return CheckVatResponseInterface
     */
    public function checkVat(CheckVatRequestInterface $checkVatRequest): CheckVatResponseInterface;

    /**
     * @param CheckVatApproxRequestInterface $checkVatApproxRequest
     * @return CheckVatApproxResponseInterface
     */
    public function checkVatApprox(CheckVatApproxRequestInterface $checkVatApproxRequest): CheckVatApproxResponseInterface;
}
