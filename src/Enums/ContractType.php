<?php

namespace Wearesho\Pvbki\Enums;

use MyCLabs\Enum\Enum;
use Wearesho\Pvbki\Interrelations\NullableEnum;

/**
 * Class ContractType
 * @package Wearesho\Pvbki\Enums
 *
 * @method static ContractType BUSINESS()
 * @method static ContractType CREDIT()
 * @method static ContractType INSTALMENT()
 * @method static ContractType LEASING()
 * @method static ContractType NON_INSTALMENT()
 */
final class ContractType extends Enum implements NullableEnum
{
    public const BUSINESS = 'business';
    public const CREDIT = 'credit';
    public const INSTALMENT = 'instalment';
    public const LEASING = 'leasing';
    public const NON_INSTALMENT = 'nonInstalment';
}
