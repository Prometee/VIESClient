<?php

declare(strict_types=1);

namespace Prometee\VIESClient\Soap\Model;

class CheckVatResponse extends Response implements CheckVatResponseInterface, ResponseInterface
{

    /** @var string|null */
    protected $name;

    /** @var string|null */
    protected $address;

    /**
     * {@inheritdoc}
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * {@inheritdoc}
     */
    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    /**
     * {@inheritdoc}
     */
    public function getAddress(): ?string
    {
        return $this->address;
    }

    /**
     * {@inheritdoc}
     */
    public function setAddress(?string $address): void
    {
        $this->address = $address;
    }
}
