<?php

declare(strict_types=1);

namespace Setono\TagBag\Tag;

class GtagSet extends Gtag implements GtagSetInterface
{
    public function __construct(string $key, array $parameters)
    {
        parent::__construct($key, '@SetonoTagBagGtag/set');

        foreach ($parameters as $k => $v) {
            $this->addParameter($k, $v);
        }
    }

    protected function getPropertiesForContext(): array
    {
        return ['parameters'];
    }
}
