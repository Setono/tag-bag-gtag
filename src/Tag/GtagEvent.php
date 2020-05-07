<?php

declare(strict_types=1);

namespace Setono\TagBag\Tag;

class GtagEvent extends Gtag implements GtagEventInterface
{
    /** @var string */
    protected $event;

    public function __construct(string $key, string $event, array $parameters = [])
    {
        parent::__construct($key, '@SetonoTagBagGtag/event');

        $this->event = $event;

        foreach ($parameters as $k => $v) {
            $this->addParameter($k, $v);
        }
    }

    public function getEvent(): string
    {
        return $this->event;
    }

    protected function getPropertiesForContext(): array
    {
        return ['event', 'parameters'];
    }
}
