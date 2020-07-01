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
        $dto = new PurchaseEventDTO('sendTo', 'USD', 123.45, 'transactionId');

        $this->assertSame(GtagEventInterface::EVENT_PURCHASE, $dto->getEvent());
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
        $dto = new PurchaseEventDTO('sendTo', 'USD', (float) 0);

        $this->assertSame([
            'send_to' => 'sendTo',
            'currency' => 'USD',
            'value' => 0.0,
        ], $dto->getEventParameters());
    }
}
