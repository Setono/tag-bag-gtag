<?php

declare(strict_types=1);

namespace Setono\TagBag\Tag;

use PHPUnit\Framework\TestCase;
use Setono\PhpTemplates\Engine\Engine;
use Setono\TagBag\Renderer\PhpRenderer;

final class GtagConfigTest extends TestCase
{
    /**
     * @test
     */
    public function it_creates(): void
    {
        $tag = new GtagConfig('key', 'target');
        $this->assertInstanceOf(TagInterface::class, $tag);
        $this->assertInstanceOf(GtagInterface::class, $tag);
        $this->assertInstanceOf(GtagConfigInterface::class, $tag);
    }

    /**
     * @test
     */
    public function it_has_default_values(): void
    {
        $tag = new GtagConfig('key', 'target');

        $this->assertSame('key', $tag->getKey());
        $this->assertSame('@SetonoTagBagGtag/config', $tag->getTemplate());
        $this->assertNull($tag->getSection());
        $this->assertSame(0, $tag->getPriority());
        $this->assertIsArray($tag->getDependents());
        $this->assertCount(0, $tag->getDependents());
        $this->assertTrue($tag->willReplace());
        $this->assertIsArray($tag->getContext());
        $this->assertCount(2, $tag->getContext()); // the target and parameter keys
        $this->assertIsArray($tag->getParameters());
        $this->assertCount(0, $tag->getParameters());
        $this->assertSame('target', $tag->getTarget());
    }

    /**
     * @test
     */
    public function it_adds_parameters(): void
    {
        $tag = new GtagConfig('key', 'target', [
            'param1' => 'value1',
        ]);
        $tag->addParameter('param2', 'value2');
        $this->assertSame(['param1' => 'value1', 'param2' => 'value2'], $tag->getParameters());
    }

    /**
     * @test
     */
    public function it_renders(): void
    {
        $tag = new GtagConfig('key', 'target');

        $renderer = new PhpRenderer(new Engine([__DIR__ . '/../../src/templates']));

        $expected = <<<SCRIPT
<script>
gtag('config', 'target');
</script>

SCRIPT;

        $this->assertTrue($renderer->supports($tag));
        $this->assertSame($expected, $renderer->render($tag));
    }

    /**
     * @test
     */
    public function it_renders_with_parameters(): void
    {
        $tag = new GtagConfig('key', 'target', [
            'param1' => 'value1',
        ]);

        $renderer = new PhpRenderer(new Engine([__DIR__ . '/../../src/templates']));

        $expected = <<<SCRIPT
<script>
gtag('config', 'target', {
    "param1": "value1"
});
</script>

SCRIPT;

        $this->assertTrue($renderer->supports($tag));
        $this->assertSame($expected, $renderer->render($tag));
    }
}
