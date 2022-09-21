<?php

declare(strict_types=1);

namespace Setono\TagBag\DTO;

class EventDTO
{
    private string $event;

    public function __construct(string $event)
    {
        $this->event = $event;
    }

    public function getEvent(): string
    {
        return $this->event;
    }

    public function setEvent(string $event): void
    {
        $this->event = $event;
    }

    /**
     * Returns an associative array of the parameters injected into the gtag event
     */
    public function getEventParameters(): array
    {
        return [];
    }

    protected function filterNullValues(array $arr): array
    {
        return array_filter($arr, static function ($val): bool {
            return null !== $val;
        });
    }
}
