<?php

namespace Wearesho\Pvbki\Infrastructure;

use Wearesho\Pvbki;

/**
 * Class Element
 * @package Wearesho\Pvbki\Infrastructure
 */
abstract class Element implements Pvbki\Interrelations\ElementInterface
{
    use JsonSerializeTrait;

    public const ROOT = null;

    public static function tag(): string
    {
        return static::ROOT;
    }
}
