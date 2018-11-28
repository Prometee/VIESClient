<?php

declare(strict_types=1);

namespace Prometee\VatInformationExchangeSystem\Soap\Model;

interface CheckVatApproxResponseInterface extends CheckVatApproxInterface
{
    /**
     * @return string|null
     */
    public function getTraderCompanyTypeMatch(): ?string;

    /**
     * @return string|null
     */
    public function getTraderCityMatch(): ?string;

    /**
     * @param string|null $traderNameMatch
     */
    public function setTraderNameMatch(?string $traderNameMatch): void;

    /**
     * @param string|null $traderCompanyTypeMatch
     */
    public function setTraderCompanyTypeMatch(?string $traderCompanyTypeMatch): void;

    /**
     * @return string|null
     */
    public function getTraderPostcodeMatch(): ?string;

    /**
     * @param string|null $traderCityMatch
     */
    public function setTraderCityMatch(?string $traderCityMatch): void;

    /**
     * @param string|null $traderStreetMatch
     */
    public function setTraderStreetMatch(?string $traderStreetMatch): void;

    /**
     * @return string|null
     */
    public function getTraderNameMatch(): ?string;

    /**
     * @return string|null
     */
    public function getTraderStreetMatch(): ?string;

    /**
     * @param string|null $traderPostcodeMatch
     */
    public function setTraderPostcodeMatch(?string $traderPostcodeMatch): void;

    /**
     * @return string|null
     */
    public function getTraderAddress(): ?string;

    /**
     * @param string|null $traderAddress
     */
    public function setTraderAddress(?string $traderAddress): void;

    /**
     * @return string
     */
    public function getRequestIdentifier(): string;

    /**
     * @param string $requestIdentifier
     */
    public function setRequestIdentifier(string $requestIdentifier): void;
}
