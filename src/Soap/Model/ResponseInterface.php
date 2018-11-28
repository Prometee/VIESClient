<?php

declare(strict_types=1);

namespace Prometee\VatInformationExchangeSystem\Soap\Model;

use DateTime;
use Exception;

interface ResponseInterface
{
    /**
     * @return DateTime
     * @throws Exception
     */
    public function getRequestDatetime(): DateTime;

    /**
     * @return string
     */
    public function getRequestDate(): string;

    /**
     * @param bool $valid
     */
    public function setValid(bool $valid): void;

    /**
     * @param string $requestDate
     */
    public function setRequestDate(string $requestDate): void;

    /**
     * @param DateTime $requestDatetime
     */
    public function setRequestDatetime(DateTime $requestDatetime): void;

    /**
     * @return bool
     */
    public function isValid(): bool;
}
