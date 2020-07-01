<?php

declare(strict_types=1);

namespace Setono\TagBag\DTO;

use PHPUnit\Framework\TestCase;
use Setono\TagBag\Tag\GtagEventInterface;

final class PurchaseEventDTOTest extends TestCase
{
    /**
     * @test
     */
    public function it_creates(): void
    {
        $dto = new PurchaseEventDTO([
            'sendTo' => 'sendTo',
            'transactionId' => 'transactionId',
            'currency' => 'USD',
            'value' => 123.45,
        ]);

        $this->assertSame(GtagEventInterface::EVENT_PURCHASE, $dto->event);
        $this->assertSame([
            'send_to' => 'sendTo',
            'transaction_id' => 'transactionId',
            'currency' => 'USD',
            'value' => 123.45,
        ], $dto->getEventParameters());
    }

    /**
     * @test
     */
    public function it_filters_null_values(): void
    {
        $dto = new PurchaseEventDTO([
            'sendTo' => 'sendTo',
            'transactionId' => null,
            'currency' => 'USD',
            'value' => 0,
        ]);

        $this->assertSame([
            'send_to' => 'sendTo',
            'currency' => 'USD',
            'value' => 0,
        ], $dto->getEventParameters());
    }
}
