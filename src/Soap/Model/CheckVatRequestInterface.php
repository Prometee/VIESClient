<?php

declare(strict_types=1);

namespace Prometee\VatInformationExchangeSystem\Soap\Model;

use Prometee\VatInformationExchangeSystem\Util\VatNumberUtil;

interface CheckVatRequestInterface
{

    /**
     * @param string $vatNumber
     */
    public function setVatNumber(string $vatNumber): void;

    /**
     * @return string
     */
    public function getFullVatNumber(): string;

    /**
     * @return string
     */
    public function getCountryCode(): string;

    /**
     * @param string $countryCode
     */
    public function setCountryCode(string $countryCode): void;

    /**
     * @return string
     */
    public function getVatNumber(): string;

    /**
     * @param string $fullVatNumber
     */
    public function setFullVatNumber(string $fullVatNumber): void;
}
