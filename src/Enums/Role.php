<?php

namespace Wearesho\Pvbki\Enums;

use MyCLabs\Enum\Enum;
use Wearesho\Pvbki\Interrelations\NullableEnum;

/**
 * Class Role
 * @package Wearesho\Pvbki\Enums
 *
 * @method static Role BORROWER()
 * @method static Role CO_DEBTOR()
 * @method static Role GUARANTOR()
 * @method static Role CHIEF_ACCOUNTANT()
 * @method static Role DIRECTOR()
 * @method static Role PARTNER()
 * @method static Role WIFE_OR_HUSBAND()
 * @method static Role INSURED()
 * @method static Role INSURANCE_PREMIUM_PAYER()
 * @method static Role LIQUIDATOR()
 * @method static Role ACCIDENT_WITNESS()
 * @method static Role CLAIMANT()
 */
final class Role extends Enum implements NullableEnum
{
    public const BORROWER = 1;
    public const CO_DEBTOR = 2;
    public const GUARANTOR = 3;
    public const CHIEF_ACCOUNTANT = 4;
    public const DIRECTOR = 5;
    public const PARTNER = 6;
    public const WIFE_OR_HUSBAND = 7;
    public const INSURED = 8;
    public const INSURANCE_PREMIUM_PAYER = 9;
    public const LIQUIDATOR = 10;
    public const ACCIDENT_WITNESS = 11;
    public const CLAIMANT = 12;
}
