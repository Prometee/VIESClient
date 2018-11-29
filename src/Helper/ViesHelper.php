<?php

declare(strict_types=1);

namespace Prometee\VIESClient\Helper;

use Prometee\VIESClient\Soap\Client\ViesSoapClientInterface;
use Prometee\VIESClient\Soap\Model\CheckVatRequest;
use Prometee\VIESClient\Util\VatNumberUtil;
use SoapFault;

class ViesHelper
{
    public const CHECK_STATUS_INVALID = 0;
    public const CHECK_STATUS_FORMAT = 1;
    public const CHECK_STATUS_WEBSERVICE = 2;
    public const CHECK_STATUS_VALID = 3;

    /**
     * @var ViesSoapClientInterface
     */
    protected $soapClient;

    public function __construct(ViesSoapClientInterface $soapClient)
    {
        $this->soapClient = $soapClient;
    }

    /**
     * @return ViesSoapClientInterface
     */
    public function getSoapClient(): ViesSoapClientInterface
    {
        return $this->soapClient;
    }

    /**
     * @param string $fullVatNumber
     * @return int One of ViesHelper::CHECK_STATUS_* value
     */
    public function isValid(string $fullVatNumber): int
    {
        $status = static::CHECK_STATUS_INVALID;

        if (VatNumberUtil::check($fullVatNumber)) {
            $status = static::CHECK_STATUS_FORMAT;
        }

        $checkVatRequest = new CheckVatRequest();
        $checkVatRequest->setFullVatNumber($fullVatNumber);

        if (!empty($checkVatRequest->getFullVatNumber())) {
            try {
                $response = $this->getSoapClient()->checkVat($checkVatRequest);
                if ($response->isValid()) {
                    $status = $status === static::CHECK_STATUS_INVALID ? static::CHECK_STATUS_WEBSERVICE : static::CHECK_STATUS_VALID;
                } else {
                    $status = static::CHECK_STATUS_INVALID;
                }
            } catch (SoapFault $e) {
                // Nothing to do here just silent it
            }
        }

        return $status;
    }
}
