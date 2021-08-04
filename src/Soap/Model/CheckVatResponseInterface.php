<?php

declare(strict_types=1);

namespace Prometee\VIESClient\Soap\Model;

interface CheckVatResponseInterface extends CheckVatRequestInterface, ResponseInterface
{
    public function setAddress(?string $address): void;

    public function getAddress(): ?string;

    public function getName(): ?string;

    public function setName(?string $name): void;
}
