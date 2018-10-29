<?php

namespace Wearesho\Pvbki\Enums;

use MyCLabs\Enum\Enum;
use Wearesho\Pvbki\Interrelations\NullableEnum;

/**
 * Class StatementType
 * @package Wearesho\Pvbki\Enums
 *
 * @method static StatementType BASE()
 * @method static StatementType SCORING()
 */
final class StatementType extends Enum implements NullableEnum
{
    public const BASE = 'Report-Statement';
    public const SCORING = 'Report-StatementPlus';
}
