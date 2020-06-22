<?php

declare(strict_types=1);

namespace Setono\TagBag\Tag;

class GtagEvent extends Gtag implements GtagEventInterface
{
    /** @var string */
    protected $event;

    public function __construct(string $event, array $parameters = [])
    {
        parent::__construct('@SetonoTagBagGtag/event', $parameters);

        $this->event = $event;
    }

    public function getEvent(): string
    {
        return $this->event;
    }

    protected function getPropertiesForContext(): array
    {
        return array_merge(['event'], parent::getPropertiesForContext());
    }
}
