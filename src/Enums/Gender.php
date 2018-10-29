<?php

namespace Wearesho\Pvbki\Enums;

use MyCLabs\Enum\Enum;
use Wearesho\Pvbki\Interrelations\NullableEnum;

/**
 * Class Gender
 * @package Wearesho\Pvbki\Enums
 *
 * @method static Gender MAN()
 * @method static Gender FEMALE()
 */
final class Gender extends Enum implements NullableEnum
{
    public const MAN = 1;
    public const FEMALE = 2;
}
