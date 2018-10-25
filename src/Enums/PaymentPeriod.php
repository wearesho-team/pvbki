<?php

namespace Wearesho\Pvbki\Enums;

use MyCLabs\Enum\Enum;
use Wearesho\Pvbki\Interrelations\NullableEnum;

/**
 * Class PaymentPeriod
 * @package Wearesho\Pvbki\Enums
 *
 * @method static PaymentPeriod EVERY_15_DAYS()
 * @method static PaymentPeriod EVERY_30_DAYS()
 * @method static PaymentPeriod EVERY_60_DAYS()
 * @method static PaymentPeriod EVERY_90_DAYS()
 * @method static PaymentPeriod EVERY_120_DAYS()
 * @method static PaymentPeriod EVERY_150_DAYS()
 * @method static PaymentPeriod EVERY_180_DAYS()
 * @method static PaymentPeriod EVERY_360_DAYS()
 * @method static PaymentPeriod AT_THE_FINAL_DAY()
 * @method static PaymentPeriod IRREGULAR_INSTALMENTS()
 * @method static PaymentPeriod ADVANCED_MONTHLY_PAYMENTS()
 */
final class PaymentPeriod extends Enum implements NullableEnum
{
    public const EVERY_15_DAYS = 1;
    public const EVERY_30_DAYS = 2;
    public const EVERY_60_DAYS = 3;
    public const EVERY_90_DAYS = 4;
    public const EVERY_120_DAYS = 5;
    public const EVERY_150_DAYS = 6;
    public const EVERY_180_DAYS = 7;
    public const EVERY_360_DAYS = 8;
    public const AT_THE_FINAL_DAY = 9;
    public const IRREGULAR_INSTALMENTS = 10;
    public const ADVANCED_MONTHLY_PAYMENTS = 11;
}
