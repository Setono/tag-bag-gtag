<?php

declare(strict_types=1);

namespace Setono\TagBag\Tag;

use const PATHINFO_EXTENSION;
use RuntimeException;
use function Safe\sprintf;

abstract class Gtag extends Tag implements GtagInterface
{
    /** @var string */
    protected $name = 'setono_tag_bag_gtag';

    /** @var string */
    protected $template;

    /** @var array */
    protected $parameters;

    public function __construct(string $template, array $parameters = [])
    {
        $this->template = $template;
        $this->parameters = $parameters;

        $this->setSection(TagInterface::SECTION_HEAD);
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

    public function getTemplate(): string
    {
        return $this->template;
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

    public function setContext(array $context): TemplateTagInterface
    {
        throw new RuntimeException(sprintf(
            'Do not call %s. Use the addParameter() method instead or inject parameters into the constructor',
            __METHOD__
        ));
    }

    public function getTemplateType(): string
    {
        return mb_strtolower(pathinfo($this->template, PATHINFO_EXTENSION));
    }

    /**
     * Returns the properties that will be returned as the context for the template
     */
    protected function getPropertiesForContext(): array
    {
        return ['parameters'];
    }

    protected static function guessTemplate(string $twigTemplate, string $phpTemplatesTemplate): string
    {
        if (class_exists('Twig\Environment')) {
            return $twigTemplate;
        }

        if (class_exists('Setono\PhpTemplates\Engine\Engine')) {
            return $phpTemplatesTemplate;
        }

        throw new RuntimeException('Neither the twig or php templates engines were found. Please install one of these.');
    }
}
