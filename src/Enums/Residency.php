<?php

namespace Wearesho\Pvbki\Enums;

use MyCLabs\Enum\Enum;
use Wearesho\Pvbki\Interrelations\NullableEnum;

/**
 * Class Residency
 * @package Wearesho\Pvbki\Enums
 *
 * @method static Residency RESIDENT()
 * @method static Residency FOREIGNER()
 */
final class Residency extends Enum implements NullableEnum
{
    public const RESIDENT = 1;
    public const FOREIGNER = 2;
}
