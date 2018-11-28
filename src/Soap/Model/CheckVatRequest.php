<?php

declare(strict_types=1);

namespace Prometee\VatInformationExchangeSystem\Soap\Model;

use Prometee\VatInformationExchangeSystem\Util\VatNumberUtil;

class CheckVatRequest implements CheckVatRequestInterface
{
    /** @var string */
    protected $countryCode = '';

    /** @var string */
    protected $vatNumber = '';

    /**
     * {@inheritdoc}
     */
    public function setFullVatNumber(string $fullVatNumber): void
    {
        $vatNumberArr = VatNumberUtil::split($fullVatNumber);
        if ($vatNumberArr !== null) {
            $this->setCountryCode($vatNumberArr[0]);
            $this->setVatNumber($vatNumberArr[1]);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function getFullVatNumber(): string
    {
        return $this->getCountryCode().$this->getVatNumber();
    }

    /**
     * {@inheritdoc}
     */
    public function getCountryCode(): string
    {
        return $this->countryCode;
    }

    /**
     * {@inheritdoc}
     */
    public function setCountryCode(string $countryCode): void
    {
        $this->countryCode = $countryCode;
    }

    /**
     * {@inheritdoc}
     */
    public function getVatNumber(): string
    {
        return $this->vatNumber;
    }

    /**
     * {@inheritdoc}
     */
    public function setVatNumber(string $vatNumber): void
    {
        $this->vatNumber = $vatNumber;
    }
}
