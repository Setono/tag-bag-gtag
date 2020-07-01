<?php

declare(strict_types=1);

namespace Setono\TagBag\Tag;

use Setono\TagBag\DTO\EventDTO;

class GtagEvent extends Gtag implements GtagEventInterface
{
    /** @var string */
    protected $event;

    public function __construct(string $event, array $parameters = [])
    {
        parent::__construct('@SetonoTagBagGtag/event', $parameters);

        $this
            ->setName('setono_tag_bag_gtag_event')
            ->setPriority(GtagLibrary::PRIORITY - 20)
        ;
        $this->event = $event;
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
