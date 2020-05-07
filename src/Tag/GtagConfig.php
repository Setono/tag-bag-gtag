<?php

declare(strict_types=1);

namespace Setono\TagBag\Tag;

class GtagConfig extends Gtag implements GtagConfigInterface
{
    /** @var string */
    protected $target;

    public function __construct(string $key, string $target, array $parameters = [])
    {
        parent::__construct($key, '@SetonoTagBagGtag/config');

        $this->target = $target;

        foreach ($parameters as $k => $v) {
            $this->addParameter($k, $v);
        }
    }

    public function getTarget(): string
    {
        return $this->target;
    }

    protected function getPropertiesForContext(): array
    {
        return ['target', 'parameters'];
    }
}
