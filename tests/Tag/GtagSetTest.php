<?php

declare(strict_types=1);

namespace Setono\TagBag\Tag;

use PHPUnit\Framework\TestCase;
use Setono\PhpTemplates\Engine\Engine;
use Setono\TagBag\Renderer\PhpTemplatesRenderer;

final class GtagSetTest extends TestCase
{
    /**
     * @test
     */
    public function it_creates(): void
    {
        $tag = new GtagSet(['param1' => 'value1']);
        self::assertInstanceOf(TagInterface::class, $tag);
        self::assertInstanceOf(TemplateTagInterface::class, $tag);
        self::assertInstanceOf(GtagInterface::class, $tag);
        self::assertInstanceOf(GtagSetInterface::class, $tag);
    }

    /**
     * @test
     */
    public function it_has_default_values(): void
    {
        $tag = new GtagSet(['param1' => 'value1']);

        self::assertSame('@SetonoTagBagGtag/set.html.twig', $tag->getTemplate());
        self::assertSame(TagInterface::SECTION_HEAD, $tag->getSection());
        self::assertSame(80, $tag->getPriority());
        self::assertIsArray($tag->getDependencies());
        self::assertCount(0, $tag->getDependencies());
        self::assertIsArray($tag->getContext());
        self::assertCount(1, $tag->getContext()); // the event and parameter keys
        self::assertIsArray($tag->getParameters());
        self::assertCount(1, $tag->getParameters());
    }

    /**
     * @test
     */
    public function it_adds_parameters(): void
    {
        $tag = new GtagSet(['param1' => 'value1']);
        $tag->addParameter('param2', 'value2');
        self::assertSame(['param1' => 'value1', 'param2' => 'value2'], $tag->getParameters());
    }

    /**
     * @test
     */
    public function it_renders_with_parameters(): void
    {
        $tag = new GtagSet(['param1' => 'value1'], GtagSet::PHP_TEMPLATES_TEMPLATE);

        $renderer = new PhpTemplatesRenderer(new Engine([__DIR__ . '/../../src/templates']));

        $expected = <<<SCRIPT
<script>
gtag('set', {
    "param1": "value1"
});
</script>

SCRIPT;

        self::assertTrue($renderer->supports($tag));
        self::assertSame($expected, $renderer->render($tag));
    }
}
