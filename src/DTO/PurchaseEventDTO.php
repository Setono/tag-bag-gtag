<?php

declare(strict_types=1);

namespace Setono\TagBag\DTO;

use Setono\TagBag\Tag\GtagEventInterface;

final class PurchaseEventDTO extends EventDTO
{
    public $event = GtagEventInterface::EVENT_PURCHASE;

    /** @var string */
    public $sendTo;

    /** @var string|null */
    public $transactionId;

    /** @var string */
    public $currency;

    /** @var float|int */
    public $value;

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
