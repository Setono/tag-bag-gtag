<?php

declare(strict_types=1);

namespace Setono\TagBag\Tag;

class GtagLibrary extends Gtag
{
    public const TWIG_TEMPLATE = '@SetonoTagBagGtag/library.html.twig';

    public const PHP_TEMPLATES_TEMPLATE = '@SetonoTagBagGtag/library.php';

    public const NAME = 'setono_tag_bag_gtag_library';

    public const PRIORITY = 100;

    /** @var string */
    protected $id;

    public function __construct(string $id, string $template = null)
    {
        if (null === $template) {
            $template = self::guessTemplate(self::TWIG_TEMPLATE, self::PHP_TEMPLATES_TEMPLATE);
        }

        parent::__construct($template);

        $this->id = $id;

        $this->setName(self::NAME)
            ->setSection(TagInterface::SECTION_HEAD)
            ->setPriority(self::PRIORITY)
        ;
    }

    protected function getPropertiesForContext(): array
    {
        return ['id'];
    }
}
