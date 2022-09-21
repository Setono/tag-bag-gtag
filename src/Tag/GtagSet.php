<?php

declare(strict_types=1);

namespace Setono\TagBag\Tag;

class GtagSet extends Gtag implements GtagSetInterface
{
    public const TWIG_TEMPLATE = '@SetonoTagBagGtag/set.html.twig';

    public const PHP_TEMPLATES_TEMPLATE = '@SetonoTagBagGtag/set.php';

    protected string $name = 'setono_tag_bag_gtag_set';

    public function __construct(array $parameters, string $template = null)
    {
        if (null === $template) {
            $template = self::guessTemplate(self::TWIG_TEMPLATE, self::PHP_TEMPLATES_TEMPLATE);
        }

        parent::__construct($template, $parameters);

        $this->setPriority(GtagLibrary::PRIORITY - 20);
    }
}
