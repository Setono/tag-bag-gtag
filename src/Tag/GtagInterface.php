<?php

declare(strict_types=1);

namespace Setono\TagBag\Tag;

interface GtagInterface extends PhpTemplatesTagInterface
{
    public function getParameters(): array;

    /**
     * Allows the user to add parameters to the existing parameters.
     * NOTICE that if the key exists, it will be overwritten
     *
     * @param mixed $value
     */
    public function addParameter(string $key, $value): self;
}
