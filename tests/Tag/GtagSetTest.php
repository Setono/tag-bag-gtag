<?php

declare(strict_types=1);

namespace Setono\TagBag\Tag;

use PHPUnit\Framework\TestCase;
use Setono\PhpTemplates\Engine\Engine;
use Setono\TagBag\Renderer\PhpRenderer;

final class GtagSetTest extends TestCase
{
    /**
     * @test
     */
    public function it_creates(): void
    {
        $tag = new GtagSet('key', ['param1' => 'value1']);
        $this->assertInstanceOf(TagInterface::class, $tag);
        $this->assertInstanceOf(GtagInterface::class, $tag);
        $this->assertInstanceOf(GtagSetInterface::class, $tag);
    }

    /**
     * @test
     */
    public function it_has_default_values(): void
    {
        $tag = new GtagSet('key', ['param1' => 'value1']);

        $this->assertSame('key', $tag->getKey());
        $this->assertSame('@SetonoTagBagGtag/set', $tag->getTemplate());
        $this->assertNull($tag->getSection());
        $this->assertSame(0, $tag->getPriority());
        $this->assertIsArray($tag->getDependents());
        $this->assertCount(0, $tag->getDependents());
        $this->assertTrue($tag->willReplace());
        $this->assertIsArray($tag->getContext());
        $this->assertCount(1, $tag->getContext()); // the event and parameter keys
        $this->assertIsArray($tag->getParameters());
        $this->assertCount(1, $tag->getParameters());
    }

    /**
     * @test
     */
    public function it_adds_parameters(): void
    {
        $tag = new GtagSet('key', ['param1' => 'value1']);
        $tag->addParameter('param2', 'value2');
        $this->assertSame(['param1' => 'value1', 'param2' => 'value2'], $tag->getParameters());
    }

    /**
     * @test
     */
    public function it_renders_with_parameters(): void
    {
        $tag = new GtagSet('key', ['param1' => 'value1']);

        $renderer = new PhpRenderer(new Engine([__DIR__ . '/../../src/templates']));

        $expected = <<<SCRIPT
<script>
gtag('set', {
    "param1": "value1"
});
</script>

SCRIPT;

        $this->assertTrue($renderer->supports($tag));
        $this->assertSame($expected, $renderer->render($tag));
    }
}
