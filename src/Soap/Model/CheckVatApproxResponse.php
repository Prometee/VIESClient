<?php

declare(strict_types=1);

namespace Prometee\VIESClient\Soap\Model;

class CheckVatApproxResponse extends CheckVatApprox implements CheckVatApproxResponseInterface
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

    public function getTraderAddress(): ?string
    {
        return $this->traderAddress;
    }

    public function setTraderAddress(?string $traderAddress): void
    {
        $this->traderAddress = $traderAddress;
    }

    public function getTraderNameMatch(): ?string
    {
        return $this->traderNameMatch;
    }

    public function setTraderNameMatch(?string $traderNameMatch): void
    {
        $this->traderNameMatch = $traderNameMatch;
    }

    public function getTraderCompanyTypeMatch(): ?string
    {
        return $this->traderCompanyTypeMatch;
    }

    public function setTraderCompanyTypeMatch(?string $traderCompanyTypeMatch): void
    {
        $this->traderCompanyTypeMatch = $traderCompanyTypeMatch;
    }

    public function getTraderStreetMatch(): ?string
    {
        return $this->traderStreetMatch;
    }

    public function setTraderStreetMatch(?string $traderStreetMatch): void
    {
        $this->traderStreetMatch = $traderStreetMatch;
    }

    public function getTraderPostcodeMatch(): ?string
    {
        return $this->traderPostcodeMatch;
    }

    public function setTraderPostcodeMatch(?string $traderPostcodeMatch): void
    {
        $this->traderPostcodeMatch = $traderPostcodeMatch;
    }

    public function getTraderCityMatch(): ?string
    {
        return $this->traderCityMatch;
    }

    public function setTraderCityMatch(?string $traderCityMatch): void
    {
        $this->traderCityMatch = $traderCityMatch;
    }

    public function getRequestIdentifier(): string
    {
        return $this->requestIdentifier;
    }

    public function setRequestIdentifier(string $requestIdentifier): void
    {
        $this->requestIdentifier = $requestIdentifier;
    }
}
