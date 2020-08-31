<?php

declare(strict_types=1);

namespace Setono\TagBag\Tag;

class GtagConfig extends Gtag implements GtagConfigInterface
{
    public const TWIG_TEMPLATE = '@SetonoTagBagGtag/config.html.twig';

    public const PHP_TEMPLATES_TEMPLATE = '@SetonoTagBagGtag/config.php';

    /** @var string */
    protected $name = 'setono_tag_bag_gtag_config';

    /** @var string */
    protected $target;

    public function __construct(string $target, array $parameters = [], string $template = null)
    {
        if (null === $template) {
            $template = self::guessTemplate(self::TWIG_TEMPLATE, self::PHP_TEMPLATES_TEMPLATE);
        }

        parent::__construct($template, $parameters);

        $this->setPriority(GtagLibrary::PRIORITY - 10);

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
