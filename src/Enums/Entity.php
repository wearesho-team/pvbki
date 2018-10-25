<?php

namespace Wearesho\Pvbki\Enums;

use Wearesho\Pvbki\Infrastructure\Enum;

/**
 * Class Entity
 * @package Wearesho\Pvbki\Enums
 *
 * @method static static UNDEFINED()
 * @method static Entity COMPANY()
 * @method static Entity INDIVIDUAL()
 * @method static Entity SUBJECT()
 */
final class Entity extends Enum
{
    public const COMPANY = 'company';
    public const INDIVIDUAL = 'individual';
    public const SUBJECT = 'subject';
}
