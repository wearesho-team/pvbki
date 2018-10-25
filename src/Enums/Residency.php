<?php

namespace Wearesho\Pvbki\Enums;

use Wearesho\Pvbki\Infrastructure\Enum;

/**
 * Class Residency
 * @package Wearesho\Pvbki\Enums
 *
 * @method static static UNDEFINED()
 * @method static Residency RESIDENT()
 * @method static Residency FOREIGNER()
 */
final class Residency extends Enum
{
    public const RESIDENT = 1;
    public const FOREIGNER = 2;
}
