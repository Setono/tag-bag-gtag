<?php

declare(strict_types=1);

namespace Setono\TagBag\Tag;

class GtagConfig extends Gtag implements GtagConfigInterface
{
    /** @var string */
    protected $target;

    public function __construct(string $target, array $parameters = [])
    {
        parent::__construct('@SetonoTagBagGtag/config', $parameters);

        $this->target = $target;
    }

    public function getTarget(): string
    {
        return $this->target;
    }

    protected function getPropertiesForContext(): array
    {
        return array_merge(['target'], parent::getPropertiesForContext());
    }
}
