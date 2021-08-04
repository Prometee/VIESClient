<?php

declare(strict_types=1);

namespace Prometee\VIESClient\Soap\Model;

interface CheckVatApproxResponseInterface extends CheckVatApproxInterface, ResponseInterface
{
    public function getTraderCompanyTypeMatch(): ?string;

    public function getTraderCityMatch(): ?string;

    public function setTraderNameMatch(?string $traderNameMatch): void;

    public function setTraderCompanyTypeMatch(?string $traderCompanyTypeMatch): void;

    public function getTraderPostcodeMatch(): ?string;

    public function setTraderCityMatch(?string $traderCityMatch): void;

    public function setTraderStreetMatch(?string $traderStreetMatch): void;

    public function getTraderNameMatch(): ?string;

    public function getTraderStreetMatch(): ?string;

    public function setTraderPostcodeMatch(?string $traderPostcodeMatch): void;

    public function getTraderAddress(): ?string;

    public function setTraderAddress(?string $traderAddress): void;

    public function getRequestIdentifier(): string;

    public function setRequestIdentifier(string $requestIdentifier): void;
}
