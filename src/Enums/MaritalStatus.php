<?php

namespace Wearesho\Pvbki\Enums;

use MyCLabs\Enum\Enum;
use Wearesho\Pvbki\Interrelations\NullableEnum;

/**
 * Class MaritalStatus
 * @package Wearesho\Pvbki\Enums
 *
 * @method static MaritalStatus UNMARRIED()
 * @method static MaritalStatus MARRIED()
 * @method static MaritalStatus DIVORCED()
 * @method static MaritalStatus WIDOW()
 * @method static MaritalStatus MATE()
 * @method static MaritalStatus UNKNOWN()
 */
final class MaritalStatus extends Enum implements NullableEnum
{
    public const UNMARRIED = 1;
    public const MARRIED = 2;
    public const DIVORCED = 3;
    public const WIDOW = 4;
    public const MATE = 5;
    public const UNKNOWN = 6;
}
