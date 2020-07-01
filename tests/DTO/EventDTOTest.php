<?php

declare(strict_types=1);

namespace Setono\TagBag\DTO;

use PHPUnit\Framework\TestCase;

final class EventDTOTest extends TestCase
{
    /**
     * @test
     */
    public function it_returns_empty_array_for_event_parameters(): void
    {
        $dto = new EventDTO('event');

        $this->assertSame('event', $dto->getEvent());
        $this->assertSame([], $dto->getEventParameters());
    }
}
