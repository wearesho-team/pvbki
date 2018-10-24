<?php

namespace Wearesho\Pvbki\Enums;

use MyCLabs\Enum\Enum;
use Wearesho\Pvbki\Interrelations\NullableEnum;

/**
 * Class EmployeeCount
 * @package Wearesho\Pvbki\Enums
 *
 * @method static EmployeeCount FROM_1_TO_5()
 * @method static EmployeeCount FROM_6_TO_30()
 * @method static EmployeeCount FROM_31_TO_100()
 * @method static EmployeeCount FROM_101_TO_500()
 * @method static EmployeeCount MORE_THAN_500()
 */
final class EmployeeCount extends Enum implements NullableEnum
{
    public const FROM_1_TO_5 = 1;
    public const FROM_6_TO_30 = 2;
    public const FROM_31_TO_100 = 3;
    public const FROM_101_TO_500 = 4;
    public const MORE_THAN_500 = 5;
}
