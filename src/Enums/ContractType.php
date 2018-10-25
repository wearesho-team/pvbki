<?php

namespace Wearesho\Pvbki\Enums;

use Wearesho\Pvbki\Infrastructure\Enum;

/**
 * Class ContractType
 * @package Wearesho\Pvbki\Enums
 *
 * @method static static UNDEFINED()
 * @method static ContractType BUSINESS()
 * @method static ContractType CREDIT()
 * @method static ContractType INSTALMENT()
 * @method static ContractType LEASING()
 * @method static ContractType NON_INSTALMENT()
 */
final class ContractType extends Enum
{
    public const BUSINESS = 'business';
    public const CREDIT = 'credit';
    public const INSTALMENT = 'instalment';
    public const LEASING = 'leasing';
    public const NON_INSTALMENT = 'nonInstalment';
}
