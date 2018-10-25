<?php

namespace Wearesho\Pvbki\Enums;

use Wearesho\Pvbki\Infrastructure\Enum;

/**
 * Class Gender
 * @package Wearesho\Pvbki\Enums
 *
 * @method static static UNDEFINED()
 * @method static Gender MAN()
 * @method static Gender FEMALE()
 */
final class Gender extends Enum
{
    public const MAN = 1;
    public const FEMALE = 2;
}
