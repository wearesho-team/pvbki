<?php

namespace Wearesho\Pvbki\Infrastructure;

use Wearesho\Pvbki;

/**
 * Class Element
 * @package Wearesho\Pvbki\Infrastructure
 */
abstract class Element implements Pvbki\Interrelations\ElementInterface
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
