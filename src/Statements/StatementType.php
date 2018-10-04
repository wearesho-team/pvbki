<?php

namespace Wearesho\Pvbki\Statements;

use MyCLabs\Enum\Enum;

/**
 * Class StatementType
 * @package Wearesho\Pvbki\Statements
 *
 * @method static StatementType BASE()
 * @method static StatementType SCORING()
 */
final class StatementType extends Enum
{
    public const BASE = 'Report-Statement';
    public const SCORING = 'Report-StatementPlus';
}
