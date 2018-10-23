<?php

namespace Wearesho\Pvbki\Infrastructure;

use MyCLabs;

/**
 * Class Dictionary
 * @package Wearesho\Pvbki\Infrastructure
 *
 * @method static Enum UNDEFINED()
 */
abstract class Enum extends MyCLabs\Enum\Enum
{
    public const UNDEFINED = null;
}
