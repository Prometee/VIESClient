<?php

declare(strict_types=1);

namespace Prometee\VatInformationExchangeSystem\Soap\Model;

class CheckVatApproxRequest extends CheckVatApprox implements CheckVatApproxRequestInterface
{
    /** @var string|null */
    protected $requesterCountryCode;

    /** @var string|null */
    protected $requesterVatNumber;

    /**
     * {@inheritdoc}
     */
    public function getRequesterCountryCode(): ?string
    {
        return $this->requesterCountryCode;
    }

    /**
     * {@inheritdoc}
     */
    public function setRequesterCountryCode(?string $requesterCountryCode): void
    {
        $this->requesterCountryCode = $requesterCountryCode;
    }

    /**
     * {@inheritdoc}
     */
    public function getRequesterVatNumber(): ?string
    {
        return $this->requesterVatNumber;
    }

    /**
     * {@inheritdoc}
     */
    public function setRequesterVatNumber(?string $requesterVatNumber): void
    {
        $this->requesterVatNumber = $requesterVatNumber;
    }
}
