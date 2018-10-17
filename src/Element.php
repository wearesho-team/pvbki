<?php

namespace Wearesho\Pvbki;

/**
 * Class Element
 * @package Wearesho\Pvbki
 */
abstract class Element implements ElementInterface
{
    public const ROOT = null;

    public function jsonSerialize(): array
    {
        return get_object_vars($this);
    }

    public static function tag(): string
    {
        return static::ROOT;
    }
}
