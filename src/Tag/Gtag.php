<?php

declare(strict_types=1);

namespace Setono\TagBag\Tag;

abstract class Gtag extends PhpTemplatesTag implements GtagInterface
{
    /** @var array */
    protected $parameters;

    public function __construct(string $template, array $parameters = [])
    {
        parent::__construct($template);

        $this->parameters = $parameters;
    }

    public function getParameters(): array
    {
        return $this->parameters;
    }

    /**
     * @param mixed $value
     */
    public function addParameter(string $key, $value): GtagInterface
    {
        $this->parameters[$key] = $value;

        return $this;
    }

    public function getContext(): array
    {
        $properties = $this->getPropertiesForContext();

        $context = [];
        foreach ($properties as $property) {
            $context[$property] = $this->{$property};
        }

        return $context;
    }

    /**
     * Returns the properties that will be returned as the context for the template
     */
    protected function getPropertiesForContext(): array
    {
        return ['parameters'];
    }
}
