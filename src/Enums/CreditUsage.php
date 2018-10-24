<?php

namespace Wearesho\Pvbki\Enums;

use MyCLabs\Enum\Enum;
use Wearesho\Pvbki\Interrelations\NullableEnum;

/**
 * Class CreditUsage
 * @package Wearesho\Pvbki\Enums
 *
 * @method static CreditUsage OUT()
 * @method static CreditUsage IN()
 * @method static CreditUsage NO()
 */
final class CreditUsage extends Enum implements NullableEnum
{
    public const OUT = 1;
    public const IN = 2;
    public const NO = 3;
}
