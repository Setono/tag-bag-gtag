<?php

declare(strict_types=1);

namespace Setono\TagBag\Tag;

use PHPUnit\Framework\TestCase;
use Setono\PhpTemplates\Engine\Engine;
use Setono\TagBag\Renderer\PhpTemplatesRenderer;

final class GtagConfigTest extends TestCase
{
    /**
     * @test
     */
    public function it_creates(): void
    {
        $tag = new GtagConfig('target');
        self::assertInstanceOf(TagInterface::class, $tag);
        self::assertInstanceOf(TemplateTagInterface::class, $tag);
        self::assertInstanceOf(GtagInterface::class, $tag);
        self::assertInstanceOf(GtagConfigInterface::class, $tag);
    }

    /**
     * @test
     */
    public function it_has_default_values(): void
    {
        $tag = new GtagConfig('target');

        self::assertSame('@SetonoTagBagGtag/config.html.twig', $tag->getTemplate());
        self::assertSame(TagInterface::SECTION_HEAD, $tag->getSection());
        self::assertSame(90, $tag->getPriority());
        self::assertIsArray($tag->getDependencies());
        self::assertCount(0, $tag->getDependencies());
        self::assertIsArray($tag->getContext());
        self::assertCount(2, $tag->getContext()); // the target and parameter keys
        self::assertIsArray($tag->getParameters());
        self::assertCount(0, $tag->getParameters());
        self::assertSame('target', $tag->getTarget());
    }

    /**
     * @test
     */
    public function it_adds_parameters(): void
    {
        $tag = new GtagConfig('target', [
            'param1' => 'value1',
        ]);
        $tag->addParameter('param2', 'value2');
        self::assertSame(['param1' => 'value1', 'param2' => 'value2'], $tag->getParameters());
    }

    /**
     * @test
     */
    public function it_renders(): void
    {
        $tag = new GtagConfig('target', [], GtagConfig::PHP_TEMPLATES_TEMPLATE);

        $renderer = new PhpTemplatesRenderer(new Engine([__DIR__ . '/../../src/templates']));

        $expected = <<<SCRIPT
<script>
gtag('config', 'target');
</script>

SCRIPT;

        self::assertTrue($renderer->supports($tag));
        self::assertSame($expected, $renderer->render($tag));
    }

    /**
     * @test
     */
    public function it_renders_with_parameters(): void
    {
        $tag = new GtagConfig('target', [
            'param1' => 'value1',
        ], GtagConfig::PHP_TEMPLATES_TEMPLATE);

        $renderer = new PhpTemplatesRenderer(new Engine([__DIR__ . '/../../src/templates']));

        $expected = <<<SCRIPT
<script>
gtag('config', 'target', {
    "param1": "value1"
});
</script>

SCRIPT;

        self::assertTrue($renderer->supports($tag));
        self::assertSame($expected, $renderer->render($tag));
    }
}
