<?php

declare(strict_types=1);

namespace Prometee\VatInformationExchangeSystem\Soap\Model;

use DateTime;

trait ResponseTrait
{
    /**
     * @see DateTime::ISO8601 format
     * @var string
     */
    protected $requestDate = '';

    /** @var bool */
    protected $valid = false;

    /**
     * {@inheritdoc}
     */
    public function getRequestDatetime(): DateTime
    {
        return new DateTime($this->getRequestDate());
    }

    /**
     * {@inheritdoc}
     */
    public function setRequestDatetime(DateTime $requestDatetime): void
    {
        $this->setRequestDate($requestDatetime->format(DateTime::ISO8601));
    }

    /**
     * {@inheritdoc}
     */
    public function getRequestDate(): string
    {
        return $this->requestDate;
    }

    /**
     * {@inheritdoc}
     */
    public function setRequestDate(string $requestDate): void
    {
        $this->requestDate = $requestDate;
    }

    /**
     * {@inheritdoc}
     */
    public function isValid(): bool
    {
        return $this->valid;
    }

    /**
     * {@inheritdoc}
     */
    public function setValid(bool $valid): void
    {
        $this->valid = $valid;
    }
}
