<?php

declare(strict_types=1);

namespace Setono\TagBag\DTO;

use Spatie\DataTransferObject\DataTransferObject;

abstract class EventDTO extends DataTransferObject
{
    /** @var string */
    public $event;

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
