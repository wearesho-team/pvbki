<?php

namespace Wearesho\Pvbki\Enums;

use MyCLabs\Enum\Enum;
use Wearesho\Pvbki\Interrelations\NullableEnum;

/**
 * Class Category
 * @package Wearesho\Pvbki\Enums
 *
 * @method static Category COLLATERAL()
 * @method static Category COLLATERAL_AMOUNT()
 * @method static Category CREDIT_LIMIT()
 * @method static Category CURRENCY()
 * @method static Category EVENT()
 * @method static Category INSTALMENT_AMOUNT()
 * @method static Category NEGATIVE_STATUS()
 * @method static Category OPEN_AMOUNT()
 * @method static Category OPEN_LIMIT()
 * @method static Category OVERDUE_AMOUNT()
 * @method static Category PHASE_ID()
 * @method static Category REST_AMOUNT()
 * @method static Category ROLE_ID()
 * @method static Category TOTAL_AMOUNT()
 * @method static Category TYPE()
 */
final class Category extends Enum implements NullableEnum
{
    public const COLLATERAL = 'collateral';
    public const COLLATERAL_AMOUNT = 'collateralAmount';
    public const CREDIT_LIMIT = 'creditLimit';
    public const CURRENCY = 'currency';
    public const EVENT = 'event';
    public const INSTALMENT_AMOUNT = 'instalmentAmount';
    public const NEGATIVE_STATUS = 'negativeStatus';
    public const OPEN_AMOUNT = 'openAmount';
    public const OPEN_LIMIT = 'openLimit';
    public const OVERDUE_AMOUNT = 'overdueAmount';
    public const PHASE_ID = 'phaseId';
    public const REST_AMOUNT = 'restAmount';
    public const ROLE_ID = 'roleId';
    public const TOTAL_AMOUNT = 'totalAmount';
    public const TYPE = 'type';
}
