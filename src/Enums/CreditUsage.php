<?php

namespace Wearesho\Pvbki\Enums;

use Wearesho\Pvbki\Infrastructure\Enum;

/**
 * Class CreditUsage
 * @package Wearesho\Pvbki\Enums
 *
 * @method static CreditUsage OUT()
 * @method static CreditUsage IN()
 * @method static CreditUsage NO()
 */
final class CreditUsage extends Enum
{
    public const OUT = 1;
    public const IN = 2;
    public const NO = 3;
}
