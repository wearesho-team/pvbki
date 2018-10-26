<?php

namespace Wearesho\Pvbki\Enums;

use Wearesho\Pvbki\Infrastructure\Enum;

/**
 * Class Education
 * @package Wearesho\Pvbki\Enums
 *
 * @method static Education UNFINISHED()
 * @method static Education BASIC()
 * @method static Education CERTIFICATED_SECONDARY()
 * @method static Education NOT_CERTIFICATED_SECONDARY()
 * @method static Education HIGHER()
 * @method static Education ACADEMIC()
 * @method static Education OTHER()
 */
final class Education extends Enum
{
    public const UNFINISHED = 1;
    public const BASIC = 2;
    public const CERTIFICATED_SECONDARY = 3;
    public const NOT_CERTIFICATED_SECONDARY = 4;
    public const HIGHER = 5;
    public const ACADEMIC = 6;
    public const OTHER = 7;
}
