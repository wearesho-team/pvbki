<?php

namespace Wearesho\Pvbki\Enums;

use MyCLabs\Enum\Enum;

/**
 * Class Classification
 * @package Wearesho\Pvbki\Enums
 *
 * @method static Classification INDIVIDUAL()
 * @method static Classification ENTREPRENEUR()
 */
final class Classification extends Enum
{
    public const INDIVIDUAL = 1;
    public const ENTREPRENEUR = 2;
}
