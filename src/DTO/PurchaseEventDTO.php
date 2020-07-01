<?php

declare(strict_types=1);

namespace Setono\TagBag\DTO;

use Setono\TagBag\Tag\GtagEventInterface;

final class PurchaseEventDTO extends EventDTO
{
    /** @var string */
    private $sendTo;

    /** @var string|null */
    private $transactionId;

    /** @var string */
    private $currency;

    /** @var float */
    private $value;

    public function __construct(string $sendTo, string $currency, float $value, string $transactionId = null)
    {
        parent::__construct(GtagEventInterface::EVENT_PURCHASE);

        $this->sendTo = $sendTo;
        $this->currency = $currency;
        $this->value = $value;
        $this->transactionId = $transactionId;
    }

    public function getSendTo(): string
    {
        return $this->sendTo;
    }

    public function setSendTo(string $sendTo): void
    {
        $this->sendTo = $sendTo;
    }

    public function getTransactionId(): ?string
    {
        return $this->transactionId;
    }

    public function setTransactionId(?string $transactionId): void
    {
        $this->transactionId = $transactionId;
    }

    public function getCurrency(): string
    {
        return $this->currency;
    }

    public function setCurrency(string $currency): void
    {
        $this->currency = $currency;
    }

    public function getValue(): float
    {
        return $this->value;
    }

    public function setValue(float $value): void
    {
        $this->value = $value;
    }

    public function getEventParameters(): array
    {
        return $this->filterNullValues([
            'send_to' => $this->sendTo,
            'transaction_id' => $this->transactionId,
            'currency' => $this->currency,
            'value' => $this->value,
        ]);
    }
}
