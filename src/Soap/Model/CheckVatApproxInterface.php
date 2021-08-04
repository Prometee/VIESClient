<?php

declare(strict_types=1);

namespace Prometee\VIESClient\Soap\Model;

interface CheckVatApproxInterface extends CheckVatRequestInterface
{
    public function getTraderName(): ?string;

    public function getTraderPostcode(): ?string;

    public function setTraderStreet(?string $traderStreet): void;

    public function setTraderName(?string $traderName): void;

    public function setTraderCompanyType(string $traderCompanyType): bool;

    public function getTraderCity(): ?string;

    public function getTraderStreet(): ?string;

    public function setTraderPostcode(?string $traderPostcode): void;

    public function getTraderCompanyType(): ?string;

    public function setTraderCity(?string $traderCity): void;
}
