<?php

declare(strict_types=1);

namespace Prometee\VatInformationExchangeSystem\Soap\Model;

use Prometee\VatInformationExchangeSystem\Util\CompanyTypeCodeUtil;

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

    /**
     * {@inheritdoc}
     */
    public function getTraderName(): ?string
    {
        return $this->traderName;
    }

    /**
     * {@inheritdoc}
     */
    public function setTraderName(?string $traderName): void
    {
        $this->traderName = $traderName;
    }

    /**
     * {@inheritdoc}
     */
    public function getTraderCompanyType(): ?string
    {
        return $this->traderCompanyType;
    }

    /**
     * {@inheritdoc}
     */
    public function setTraderCompanyType(?string $traderCompanyType): bool
    {
        if (CompanyTypeCodeUtil::check($traderCompanyType)) {
            $this->traderCompanyType = $traderCompanyType;
            return true;
        }

        return false;
    }

    /**
     * {@inheritdoc}
     */
    public function getTraderStreet(): ?string
    {
        return $this->traderStreet;
    }

    /**
     * {@inheritdoc}
     */
    public function setTraderStreet(?string $traderStreet): void
    {
        $this->traderStreet = $traderStreet;
    }

    /**
     * {@inheritdoc}
     */
    public function getTraderPostcode(): ?string
    {
        return $this->traderPostcode;
    }

    /**
     * {@inheritdoc}
     */
    public function setTraderPostcode(?string $traderPostcode): void
    {
        $this->traderPostcode = $traderPostcode;
    }

    /**
     * {@inheritdoc}
     */
    public function getTraderCity(): ?string
    {
        return $this->traderCity;
    }

    /**
     * {@inheritdoc}
     */
    public function setTraderCity(?string $traderCity): void
    {
        $this->traderCity = $traderCity;
    }
}
