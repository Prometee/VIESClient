<?php

declare(strict_types=1);

namespace Prometee\VIESClient\Soap\Model;

class CheckVatResponse extends Response implements CheckVatResponseInterface
{
    /** @var string|null */
    protected $name;

    /** @var string|null */
    protected $address;

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(?string $address): void
    {
        $this->address = $address;
    }
}
