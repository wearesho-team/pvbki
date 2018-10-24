<?php

namespace Wearesho\Pvbki\Enums;

use MyCLabs\Enum\Enum;
use Wearesho\Pvbki\Interrelations\NullableEnum;

/**
 * Class AddressType
 * @package Wearesho\Pvbki\Enums
 *
 * @method static AddressType REGISTRATION()
 * @method static AddressType FACTUAL()
 * @method static AddressType POSTAL()
 * @method static AddressType CURRENT_EMPLOYMENT()
 * @method static AddressType PREVIOUS_EMPLOYMENT()
 * @method static AddressType COLLATERAL()
 */
final class AddressType extends Enum implements NullableEnum
{
    /**
     * Address of permanent residence or registration
     */
    public const REGISTRATION = 1;

    /**
     * Factual address
     */
    public const FACTUAL = 2;

    /**
     * Postal address
     */
    public const POSTAL = 3;

    /**
     * Address of employment place
     */
    public const CURRENT_EMPLOYMENT = 4;

    /**
     * Address of previous employment place
     */
    public const PREVIOUS_EMPLOYMENT = 5;

    /**
     * Address of collateral
     */
    public const COLLATERAL = 6;
}
