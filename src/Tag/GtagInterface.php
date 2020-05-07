<?php

declare(strict_types=1);

namespace Setono\TagBag\Tag;

interface GtagInterface extends PhpTagInterface
{
    public function getParameters(): array;

    /**
     * @param mixed $value
     */
    public function addParameter(string $key, $value): self;
}
