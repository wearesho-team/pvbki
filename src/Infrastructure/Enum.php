<?php

namespace Wearesho\Pvbki\Infrastructure;

use Wearesho\Pvbki\Interrelations\NullableEnum;

/**
 * Class Enum
 * @package Wearesho\Pvbki\Infrastructure
 */
abstract class Enum extends \MyCLabs\Enum\Enum implements NullableEnum
{
    public static function __callStatic($name, $arguments)
    {
        $array = static::toArray();

        if (array_key_exists($name, $array)) {
            return new static($array[$name]);
        }

        throw new \BadMethodCallException("No static method or enum constant '$name' in class " . \get_called_class());
    }
}
