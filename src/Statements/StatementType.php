<?php

namespace Wearesho\Pvbki\Statements;

use MyCLabs\Enum\Enum;

/**
 * Class StatementType
 * @package Wearesho\Pvbki\Statements
 *
 * @method static StatementType BASE()
 * @method static StatementType EXTEND()
 * @method static StatementType SCORING()
 */
final class StatementType extends Enum
{
    public const BASE = 0;
    public const EXTEND = 1;
    public const SCORING = 2;
}
