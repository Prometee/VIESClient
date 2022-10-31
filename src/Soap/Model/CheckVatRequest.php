<?php

declare(strict_types=1);

namespace Prometee\VIESClient\Soap\Model;

use Prometee\VIESClient\Util\VatNumberUtil;

class CheckVatRequest implements CheckVatRequestInterface
{
    /** @var string */
    protected $countryCode = '';

    /** @var string */
    protected $vatNumber = '';

    public function setFullVatNumber(string $fullVatNumber): void
    {
        $vatNumberArr = VatNumberUtil::split($fullVatNumber);
        if (null !== $vatNumberArr) {
            $this->setCountryCode($vatNumberArr[0]);
            $this->setVatNumber($vatNumberArr[1]);
        }
    }

    public function getFullVatNumber(): string
    {
        return $this->getCountryCode() . $this->getVatNumber();
    }

    public function getCountryCode(): string
    {
        return $this->countryCode;
    }

    public function setCountryCode(string $countryCode): void
    {
        $this->countryCode = $countryCode;
    }

    public function getVatNumber(): string
    {
        return $this->vatNumber;
    }

    public function setVatNumber(string $vatNumber): void
    {
        $this->vatNumber = $vatNumber;
    }
}
