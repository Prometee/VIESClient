<?php

declare(strict_types=1);

namespace Prometee\VatInformationExchangeSystem\Soap\Model;

interface CheckVatApproxRequestInterface extends CheckVatApproxInterface
{
    /**
     * @param string|null $requesterCountryCode
     */
    public function setRequesterCountryCode(?string $requesterCountryCode): void;

    /**
     * @return string|null
     */
    public function getRequesterCountryCode(): ?string;

    /**
     * @param string|null $requesterVatNumber
     */
    public function setRequesterVatNumber(?string $requesterVatNumber): void;

    /**
     * @return string|null
     */
    public function getRequesterVatNumber(): ?string;
}
