<?php

namespace Wearesho\Pvbki\Enums;

use MyCLabs\Enum\Enum;
use Wearesho\Pvbki\Interrelations\NullableEnum;

/**
 * Class EconomicActivity
 * @package Wearesho\Pvbki\Enums
 *
 * @method static EconomicActivity INDUSTRY()
 * @method static EconomicActivity AGRICULTURE()
 * @method static EconomicActivity FORESTRY()
 * @method static EconomicActivity TRANSPORT_AND_COMMUNICATION()
 * @method static EconomicActivity BUILDING()
 * @method static EconomicActivity TRADE_AND_PUBLIC_FEEDING()
 * @method static EconomicActivity LOGISTICAL_SUPPORT_AND_SALE()
 * @method static EconomicActivity OTHER()
 */
final class EconomicActivity extends Enum implements NullableEnum
{
    public const INDUSTRY = 1;
    public const AGRICULTURE = 2;
    public const FORESTRY = 3;
    public const TRANSPORT_AND_COMMUNICATION = 5;
    public const BUILDING = 6;
    public const TRADE_AND_PUBLIC_FEEDING = 7;
    public const LOGISTICAL_SUPPORT_AND_SALE = 8;
    public const OTHER = 9;
}
