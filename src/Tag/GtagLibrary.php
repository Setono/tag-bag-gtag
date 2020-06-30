<?php

declare(strict_types=1);

namespace Setono\TagBag\Tag;

class GtagLibrary extends PhpTemplatesTag
{
    public const NAME = 'setono_tag_bag_gtag_library';

    public function __construct(string $id)
    {
        parent::__construct('@SetonoTagBagGtag/library', [
            'id' => $id,
        ]);

        $this->setName(self::NAME)
            ->setUnique(true)
            ->setSection(TagInterface::SECTION_HEAD)
            ->setPriority(128)
        ;
    }
}
