<?php

declare(strict_types=1);

namespace Setono\TagBag\Tag;

class GtagSet extends Gtag implements GtagSetInterface
{
    public function __construct(array $parameters)
    {
        parent::__construct('@SetonoTagBagGtag/set', $parameters);

        $this->setName('setono_tag_bag_gtag_set');
    }
}
