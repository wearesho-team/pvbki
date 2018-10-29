<?php

namespace Wearesho\Pvbki\Enums;

use MyCLabs\Enum\Enum;
use Wearesho\Pvbki\Interrelations\NullableEnum;

/**
 * Class Status
 * @package Wearesho\Pvbki\Enums
 *
 * @method static Status EXISTING()
 * @method static Status CLOSED()
 */
final class Status extends Enum implements NullableEnum
{
    public const EXISTING = 1;
    public const CLOSED = 2;
}
