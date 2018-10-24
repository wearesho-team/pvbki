<?php

namespace Wearesho\Pvbki\Enums;

use MyCLabs\Enum\Enum;
use Wearesho\Pvbki\Interrelations\NullableEnum;

/**
 * Class Ownership
 * @package Wearesho\Pvbki\Enums
 *
 * @method static Ownership ENTERPRISES()
 * @method static Ownership ECONOMIC_COMPANIES()
 * @method static Ownership COOPERATIVES()
 * @method static Ownership ORGANIZATIONS()
 * @method static Ownership ENTERPRISES_UNIONS()
 * @method static Ownership SEPARATED_BRANCHES()
 * @method static Ownership ORGANIZATIONS_UNIONS()
 * @method static Ownership OTHER_LEGAL_FORMS()
 * @method static Ownership OTHER_INDIVIDUAL()
 */
final class Ownership extends Enum implements NullableEnum
{
    public const ENTERPRISES = 1;
    public const ECONOMIC_COMPANIES = 2;
    public const COOPERATIVES = 3;
    public const ORGANIZATIONS = 4;
    public const ENTERPRISES_UNIONS = 5;
    public const SEPARATED_BRANCHES = 6;
    public const ORGANIZATIONS_UNIONS = 8;
    public const OTHER_LEGAL_FORMS = 9;
    public const OTHER_INDIVIDUAL = 10;
}
