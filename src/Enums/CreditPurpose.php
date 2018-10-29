<?php

namespace Wearesho\Pvbki\Enums;

use MyCLabs\Enum\Enum;
use Wearesho\Pvbki\Interrelations\NullableEnum;

/**
 * Class CreditPurpose
 * @package Wearesho\Pvbki\Enums
 *
 * @method static CreditPurpose REPLENISHMENT_CURRENT_ASSETS()
 * @method static CreditPurpose AQUISITION_INVESTMENT()
 * @method static CreditPurpose OTHER_BUSINESS_PURPOSE()
 * @method static CreditPurpose MORTGAGE_LOAN()
 * @method static CreditPurpose CAR_PURCHASE()
 * @method static CreditPurpose FURNITURE_PURCHASE()
 * @method static CreditPurpose OTHER_CONSUMER_PURPOSE()
 * @method static CreditPurpose NOT_SPECIFIED()
 * @method static CreditPurpose PERSONAL_CREDIT_WITHOUT_ASSURANCE()
 * @method static CreditPurpose PERSONAL_CREDIT_WITH_ASSURANCE()
 * @method static CreditPurpose GUARANTEE()
 * @method static CreditPurpose AVAL()
 * @method static CreditPurpose BILL_OF_CREDIT()
 * @method static CreditPurpose FACTORING()
 * @method static CreditPurpose CONSUMER_CREDIT()
 * @method static CreditPurpose CREDIT_CARD()
 * @method static CreditPurpose OVERDRAFT()
 * @method static CreditPurpose ADDITION_TURNOVER_LEGAL_ENTITY_MEANS()
 * @method static CreditPurpose INVESTMENT_PURPOSES()
 */
final class CreditPurpose extends Enum implements NullableEnum
{
    public const REPLENISHMENT_CURRENT_ASSETS= 1;
    public const AQUISITION_INVESTMENT = 2;
    public const OTHER_BUSINESS_PURPOSE = 3;
    public const MORTGAGE_LOAN = 4;
    public const CAR_PURCHASE = 5;
    public const FURNITURE_PURCHASE = 6;
    public const OTHER_CONSUMER_PURPOSE = 7;
    public const NOT_SPECIFIED = 8;
    public const PERSONAL_CREDIT_WITHOUT_ASSURANCE = 9;
    public const PERSONAL_CREDIT_WITH_ASSURANCE = 10;
    public const GUARANTEE = 11;
    public const AVAL = 12;
    public const BILL_OF_CREDIT = 13;
    public const FACTORING = 14;
    public const CONSUMER_CREDIT = 15;
    public const CREDIT_CARD = 16;
    public const OVERDRAFT = 17;
    public const ADDITION_TURNOVER_LEGAL_ENTITY_MEANS = 18;
    public const INVESTMENT_PURPOSES = 19;
}
