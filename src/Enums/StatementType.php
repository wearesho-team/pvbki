<?php

namespace Wearesho\Pvbki\Enums;

use MyCLabs\Enum\Enum;

/**
 * Class StatementType
 * @package Wearesho\Pvbki\Enums
 *
 * @method static static UNDEFINED()
 * @method static StatementType BASE()
 * @method static StatementType SCORING()
 */
final class StatementType extends Enum
{
    public const BASE = 'Report-Statement';
    public const SCORING = 'Report-StatementPlus';
}
