<?php

declare(strict_types=1);

namespace Setono\TagBag\Tag;

interface GtagConfigInterface extends GtagInterface
{
    public function getTarget(): string;
}
