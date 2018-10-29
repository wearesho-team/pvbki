<?php

namespace Wearesho\Pvbki\Enums;

use MyCLabs\Enum\Enum;
use Wearesho\Pvbki\Interrelations\NullableEnum;

/**
 * Class Phase
 * @package Wearesho\Pvbki\Enums
 *
 * @method static Phase REQUESTED()
 * @method static Phase WITHDRAWN()
 * @method static Phase REJECTED()
 * @method static Phase EXISTING()
 * @method static Phase TERMINATED()
 * @method static Phase TERMINATED_IN_ADVANCE()
 */
final class Phase extends Enum implements NullableEnum
{
    public const REQUESTED = 1;
    public const WITHDRAWN = 2;
    public const REJECTED = 3;
    public const EXISTING = 4;
    public const TERMINATED = 5;
    public const TERMINATED_IN_ADVANCE = 6;
}
