<?php

namespace Wearesho\Pvbki\Enums;

use MyCLabs\Enum\Enum;
use Wearesho\Pvbki\Interrelations\NullableEnum;

/**
 * Class Entity
 * @package Wearesho\Pvbki\Enums
 *
 * @method static Entity COMPANY()
 * @method static Entity INDIVIDUAL()
 * @method static Entity SUBJECT()
 */
final class Entity extends Enum implements NullableEnum
{
    public const COMPANY = 'company';
    public const INDIVIDUAL = 'individual';
    public const SUBJECT = 'subject';
}
