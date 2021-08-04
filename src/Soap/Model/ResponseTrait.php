<?php

declare(strict_types=1);

namespace Prometee\VIESClient\Soap\Model;

use DateTime;

trait ResponseTrait
{
    /**
     * @see DateTime::ISO8601 format
     *
     * @var string
     */
    protected $requestDate = '';

    /** @var bool */
    protected $valid = false;

    public function getRequestDatetime(): DateTime
    {
        return new DateTime($this->getRequestDate());
    }

    public function setRequestDatetime(DateTime $requestDatetime): void
    {
        $this->setRequestDate($requestDatetime->format(DateTime::ISO8601));
    }

    public function getRequestDate(): string
    {
        return $this->requestDate;
    }

    public function setRequestDate(string $requestDate): void
    {
        $this->requestDate = $requestDate;
    }

    public function isValid(): bool
    {
        return $this->valid;
    }

    public function setValid(bool $valid): void
    {
        $this->valid = $valid;
    }
}
