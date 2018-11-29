<?php

declare(strict_types=1);

namespace Prometee\VIESClient\Soap\Model;

interface CheckVatResponseInterface extends CheckVatRequestInterface
{

    /**
     * @param string|null $address
     */
    public function setAddress(?string $address): void;

    /**
     * @return string|null
     */
    public function getAddress(): ?string;

    /**
     * @return string|null
     */
    public function getName(): ?string;

    /**
     * @param string|null $name
     */
    public function setName(?string $name): void;
}
