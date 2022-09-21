<?php

declare(strict_types=1);

namespace Setono\TagBag\Tag;

use Setono\TagBag\DTO\EventDTO;

class GtagEvent extends Gtag implements GtagEventInterface
{
    public const TWIG_TEMPLATE = '@SetonoTagBagGtag/event.html.twig';

    public const PHP_TEMPLATES_TEMPLATE = '@SetonoTagBagGtag/event.php';

    protected string $name = 'setono_tag_bag_gtag_event';

    protected string $event;

    public function __construct(string $event, array $parameters = [], string $template = null)
    {
        if (null === $template) {
            $template = self::guessTemplate(self::TWIG_TEMPLATE, self::PHP_TEMPLATES_TEMPLATE);
        }

        parent::__construct($template, $parameters);

        $this->event = $event;

        $this
            ->setPriority(GtagLibrary::PRIORITY - 20)
            ->setUnique(false)
        ;
    }

    public static function createFromDTO(EventDTO $dto): self
    {
        return new self($dto->getEvent(), $dto->getEventParameters());
    }

    public function getEvent(): string
    {
        return $this->event;
    }

    protected function getPropertiesForContext(): array
    {
        return array_merge(['event'], parent::getPropertiesForContext());
    }
}
