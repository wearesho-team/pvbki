<?php

namespace Wearesho\Pvbki\Infrastructure;

use Wearesho\Pvbki\Collections\RuleCollection;
use Wearesho\Pvbki\Interrelations;

/**
 * Class Element
 * @package Wearesho\Pvbki\Infrastructure
 */
abstract class Element implements Interrelations\ElementInterface
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

    /**
     * Need rules for parser
     *
     * @return RuleCollection
     */
    abstract public static function arguments(): RuleCollection;
}
