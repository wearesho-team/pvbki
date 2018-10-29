<?php

namespace Wearesho\Pvbki\Enums;

use MyCLabs\Enum\Enum;
use Wearesho\Pvbki\Interrelations\NullableEnum;

/**
 * Class Classification
 * @package Wearesho\Pvbki\Enums
 *
 * @method static Classification INDIVIDUAL()
 * @method static Classification ENTREPRENEUR()
 */
final class Classification extends Enum implements NullableEnum
{
    public const INDIVIDUAL = 1;
    public const ENTREPRENEUR = 2;
}
