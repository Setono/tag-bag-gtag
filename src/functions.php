<?php

declare(strict_types=1);

namespace Setono\TagBag;

use const JSON_INVALID_UTF8_IGNORE;
use const JSON_PRESERVE_ZERO_FRACTION;
use const JSON_PRETTY_PRINT;
use const JSON_THROW_ON_ERROR;
use const JSON_UNESCAPED_SLASHES;

if (!function_exists('Setono\TagBag\encode')) {
    /**
     * @param mixed $val
     */
    function encode($val): string
    {
        return json_encode($val, JSON_THROW_ON_ERROR | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_PRESERVE_ZERO_FRACTION | JSON_INVALID_UTF8_IGNORE);
    }
}
