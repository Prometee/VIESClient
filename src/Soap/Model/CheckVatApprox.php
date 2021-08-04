<?php

declare(strict_types=1);

namespace Prometee\VIESClient\Soap\Model;

use Prometee\VIESClient\Util\CompanyTypeCodeUtil;

class CheckVatApprox extends CheckVatRequest implements CheckVatApproxInterface
{
    /** @var string|null */
    protected $traderName;

    /** @var string|null */
    protected $traderCompanyType;

    /** @var string|null */
    protected $traderStreet;

    /** @var string|null */
    protected $traderPostcode;

    /** @var string|null */
    protected $traderCity;

    public function getTraderName(): ?string
    {
        return $this->traderName;
    }

    public function setTraderName(?string $traderName): void
    {
        $this->traderName = $traderName;
    }

    public function getTraderCompanyType(): ?string
    {
        return $this->traderCompanyType;
    }

    public function setTraderCompanyType(string $traderCompanyType): bool
    {
        if (CompanyTypeCodeUtil::check($traderCompanyType)) {
            $this->traderCompanyType = $traderCompanyType;

            return true;
        }

        return false;
    }

    public function getTraderStreet(): ?string
    {
        return $this->traderStreet;
    }

    public function setTraderStreet(?string $traderStreet): void
    {
        $this->traderStreet = $traderStreet;
    }

    public function getTraderPostcode(): ?string
    {
        return $this->traderPostcode;
    }

    public function setTraderPostcode(?string $traderPostcode): void
    {
        $this->traderPostcode = $traderPostcode;
    }

    public function getTraderCity(): ?string
    {
        return $this->traderCity;
    }

    public function setTraderCity(?string $traderCity): void
    {
        $this->traderCity = $traderCity;
    }
}
