<?php

declare(strict_types=1);

namespace Prometee\VIESClient\Soap\Model;

interface CheckVatRequestInterface
{
    public function setVatNumber(string $vatNumber): void;

    public function getFullVatNumber(): string;

    public function getCountryCode(): string;

    public function setCountryCode(string $countryCode): void;

    public function getVatNumber(): string;

    public function setFullVatNumber(string $fullVatNumber): void;
}
