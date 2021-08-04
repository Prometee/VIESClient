<?php

declare(strict_types=1);

namespace Prometee\VIESClient\Soap\Model;

use DateTime;
use Exception;

interface ResponseInterface
{
    /**
     * @throws Exception
     */
    public function getRequestDatetime(): DateTime;

    public function getRequestDate(): string;

    public function setValid(bool $valid): void;

    public function setRequestDate(string $requestDate): void;

    public function setRequestDatetime(DateTime $requestDatetime): void;

    public function isValid(): bool;
}
