<?php

namespace Wearesho\Pvbki\Enums;

use Wearesho\Pvbki\Infrastructure\Enum;

/**
 * Class Status
 * @package Wearesho\Pvbki\Enums
 *
 * @method static Status EXISTING()
 * @method static Status CLOSED()
 */
final class Status extends Enum
{
    public const EXISTING = 1;
    public const CLOSED = 2;
}
