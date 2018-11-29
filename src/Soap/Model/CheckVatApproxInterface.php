<?php

declare(strict_types=1);

namespace Prometee\VIESClient\Soap\Model;

interface CheckVatApproxInterface extends CheckVatRequestInterface
{
    /**
     * @return string|null
     */
    public function getTraderName(): ?string;

    /**
     * @return string|null
     */
    public function getTraderPostcode(): ?string;

    /**
     * @param string|null $traderStreet
     */
    public function setTraderStreet(?string $traderStreet): void;

    /**
     * @param string|null $traderName
     */
    public function setTraderName(?string $traderName): void;

    /**
     * @param string|null $traderCompanyType
     * @return bool
     */
    public function setTraderCompanyType(?string $traderCompanyType): bool;

    /**
     * @return string|null
     */
    public function getTraderCity(): ?string;

    /**
     * @return string|null
     */
    public function getTraderStreet(): ?string;

    /**
     * @param string|null $traderPostcode
     */
    public function setTraderPostcode(?string $traderPostcode): void;

    /**
     * @return string|null
     */
    public function getTraderCompanyType(): ?string;

    /**
     * @param string|null $traderCity
     */
    public function setTraderCity(?string $traderCity): void;
}
