<?php

declare(strict_types=1);

namespace Setono\TagBag\Tag;

use PHPUnit\Framework\TestCase;
use Setono\PhpTemplates\Engine\Engine;
use Setono\TagBag\Renderer\PhpTemplatesRenderer;

/**
 * @covers \Setono\TagBag\Tag\GtagLibrary
 */
final class GtagLibraryTest extends TestCase
{
    /**
     * @test
     */
    public function it_creates(): void
    {
        $tag = new GtagLibrary('id');
        $this->assertInstanceOf(TagInterface::class, $tag);
        $this->assertInstanceOf(PhpTemplatesTagInterface::class, $tag);
    }

    /**
     * @test
     */
    public function it_has_default_values(): void
    {
        $tag = new GtagLibrary('id');

        $this->assertSame('@SetonoTagBagGtag/library', $tag->getTemplate());
    }

    /**
     * @test
     */
    public function it_renders_with_parameters(): void
    {
        $tag = new GtagLibrary('id');

        $renderer = new PhpTemplatesRenderer(new Engine([__DIR__ . '/../../src/templates']));

        $expected = <<<SCRIPT
<script async src="https://www.googletagmanager.com/gtag/js?id=id"></script>
<script>
window.dataLayer = window.dataLayer || [];
function gtag(){dataLayer.push(arguments);}
gtag('js', new Date());
</script>

SCRIPT;

        $this->assertTrue($renderer->supports($tag));
        $this->assertSame($expected, $renderer->render($tag));
    }
}
