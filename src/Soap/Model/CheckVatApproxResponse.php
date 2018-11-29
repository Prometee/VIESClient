<?php

declare(strict_types=1);

namespace Prometee\VIESClient\Soap\Model;

class CheckVatApproxResponse extends CheckVatApprox implements CheckVatApproxResponseInterface, ResponseInterface
{
    use ResponseTrait;

    /** @var string|null */
    protected $traderAddress;

    /** @var string|null */
    protected $traderNameMatch;

    /** @var string|null */
    protected $traderCompanyTypeMatch;

    /** @var string|null */
    protected $traderStreetMatch;

    /** @var string|null */
    protected $traderPostcodeMatch;

    /** @var string|null */
    protected $traderCityMatch;

    /** @var string */
    protected $requestIdentifier = '';

    /**
     * {@inheritdoc}
     */
    public function getTraderAddress(): ?string
    {
        return $this->traderAddress;
    }

    /**
     * {@inheritdoc}
     */
    public function setTraderAddress(?string $traderAddress): void
    {
        $this->traderAddress = $traderAddress;
    }

    /**
     * {@inheritdoc}
     */
    public function getTraderNameMatch(): ?string
    {
        return $this->traderNameMatch;
    }

    /**
     * {@inheritdoc}
     */
    public function setTraderNameMatch(?string $traderNameMatch): void
    {
        $this->traderNameMatch = $traderNameMatch;
    }

    /**
     * {@inheritdoc}
     */
    public function getTraderCompanyTypeMatch(): ?string
    {
        return $this->traderCompanyTypeMatch;
    }

    /**
     * {@inheritdoc}
     */
    public function setTraderCompanyTypeMatch(?string $traderCompanyTypeMatch): void
    {
        $this->traderCompanyTypeMatch = $traderCompanyTypeMatch;
    }

    /**
     * {@inheritdoc}
     */
    public function getTraderStreetMatch(): ?string
    {
        return $this->traderStreetMatch;
    }

    /**
     * {@inheritdoc}
     */
    public function setTraderStreetMatch(?string $traderStreetMatch): void
    {
        $this->traderStreetMatch = $traderStreetMatch;
    }

    /**
     * {@inheritdoc}
     */
    public function getTraderPostcodeMatch(): ?string
    {
        return $this->traderPostcodeMatch;
    }

    /**
     * {@inheritdoc}
     */
    public function setTraderPostcodeMatch(?string $traderPostcodeMatch): void
    {
        $this->traderPostcodeMatch = $traderPostcodeMatch;
    }

    /**
     * {@inheritdoc}
     */
    public function getTraderCityMatch(): ?string
    {
        return $this->traderCityMatch;
    }

    /**
     * {@inheritdoc}
     */
    public function setTraderCityMatch(?string $traderCityMatch): void
    {
        $this->traderCityMatch = $traderCityMatch;
    }

    /**
     * {@inheritdoc}
     */
    public function getRequestIdentifier(): string
    {
        return $this->requestIdentifier;
    }

    /**
     * {@inheritdoc}
     */
    public function setRequestIdentifier(string $requestIdentifier): void
    {
        $this->requestIdentifier = $requestIdentifier;
    }
}
