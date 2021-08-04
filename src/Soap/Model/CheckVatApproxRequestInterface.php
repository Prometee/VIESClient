<?php

declare(strict_types=1);

namespace Prometee\VIESClient\Soap\Model;

interface CheckVatApproxRequestInterface extends CheckVatApproxInterface
{
    public function setRequesterCountryCode(?string $requesterCountryCode): void;

    public function getRequesterCountryCode(): ?string;

    public function setRequesterVatNumber(?string $requesterVatNumber): void;

    public function getRequesterVatNumber(): ?string;
}
