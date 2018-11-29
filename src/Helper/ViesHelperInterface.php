<?php

declare(strict_types=1);

namespace Prometee\VIESClient\Helper;

use Prometee\VIESClient\Soap\Client\ViesSoapClientInterface;

interface ViesHelperInterface
{
    public const CHECK_STATUS_INVALID = 0;
    public const CHECK_STATUS_FORMAT = 1;
    public const CHECK_STATUS_WEBSERVICE = 2;
    public const CHECK_STATUS_VALID = 3;

    /**
     * @param string $fullVatNumber
     * @return int One of ViesHelper::CHECK_STATUS_* value
     */
    public function isValid(string $fullVatNumber): int;

    /**
     * @return ViesSoapClientInterface
     */
    public function getSoapClient(): ViesSoapClientInterface;
}
