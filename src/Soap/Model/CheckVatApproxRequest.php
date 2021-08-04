<?php

declare(strict_types=1);

namespace Prometee\VIESClient\Soap\Model;

class CheckVatApproxRequest extends CheckVatApprox implements CheckVatApproxRequestInterface
{
    /** @var string|null */
    protected $requesterCountryCode;

    /** @var string|null */
    protected $requesterVatNumber;

    public function getRequesterCountryCode(): ?string
    {
        return $this->requesterCountryCode;
    }

    public function setRequesterCountryCode(?string $requesterCountryCode): void
    {
        $this->requesterCountryCode = $requesterCountryCode;
    }

    public function getRequesterVatNumber(): ?string
    {
        return $this->requesterVatNumber;
    }

    public function setRequesterVatNumber(?string $requesterVatNumber): void
    {
        $this->requesterVatNumber = $requesterVatNumber;
    }
}
