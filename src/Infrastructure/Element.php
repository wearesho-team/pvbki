<?php

namespace Wearesho\Pvbki\Infrastructure;

use Wearesho\Pvbki\Interrelations;

/**
 * Class Element
 * @package Wearesho\Pvbki\Infrastructure
 */
abstract class Element implements Interrelations\ElementInterface
{
    use JsonSerializeTrait;

    public const ROOT = null;

    public static function tag(): string
    {
        return static::ROOT;
    }
}
