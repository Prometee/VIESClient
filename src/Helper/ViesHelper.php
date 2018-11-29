<?php

declare(strict_types=1);

namespace Prometee\VIESClient\Helper;

use Prometee\VIESClient\Soap\Client\ViesSoapClientInterface;
use Prometee\VIESClient\Soap\Model\CheckVatRequest;
use Prometee\VIESClient\Util\VatNumberUtil;
use SoapFault;

class ViesHelper implements ViesHelperInterface
{
    /**
     * @var ViesSoapClientInterface
     */
    protected $soapClient;

    public function __construct(ViesSoapClientInterface $soapClient)
    {
        $this->soapClient = $soapClient;
    }

    /**
     * {@inheritdoc}
     */
    public function getSoapClient(): ViesSoapClientInterface
    {
        return $this->soapClient;
    }

    /**
     * {@inheritdoc}
     */
    public function isValid(string $fullVatNumber): int
    {
        $status = static::CHECK_STATUS_INVALID;

        if (VatNumberUtil::check($fullVatNumber)) {
            $status = static::CHECK_STATUS_VALID_FORMAT;
        }

        $checkVatRequest = new CheckVatRequest();
        $checkVatRequest->setFullVatNumber($fullVatNumber);

        if (!empty($checkVatRequest->getFullVatNumber())) {
            try {
                $response = $this->getSoapClient()->checkVat($checkVatRequest);
                if ($response->isValid()) {
                    $status = $status === static::CHECK_STATUS_INVALID ? static::CHECK_STATUS_VALID_WEBSERVICE : static::CHECK_STATUS_VALID;
                } else {
                    $status = static::CHECK_STATUS_INVALID_WEBSERVICE;
                }
            } catch (SoapFault $e) {
                $e->faultcode;
            }
        }

        return $status;
    }
}
