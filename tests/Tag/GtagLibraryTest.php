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
        self::assertInstanceOf(TagInterface::class, $tag);
        self::assertInstanceOf(TemplateTagInterface::class, $tag);
    }

    /**
     * @test
     */
    public function it_has_default_values(): void
    {
        $tag = new GtagLibrary('id');

        self::assertSame('@SetonoTagBagGtag/library', $tag->getTemplate());
        self::assertSame(TagInterface::SECTION_HEAD, $tag->getSection());
        self::assertSame(100, $tag->getPriority());
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

        self::assertTrue($renderer->supports($tag));
        self::assertSame($expected, $renderer->render($tag));
    }
}
