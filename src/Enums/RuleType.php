<?php

namespace Wearesho\Pvbki\Enums;

use MyCLabs\Enum\Enum;

/**
 * Class RuleType
 * @package Wearesho\Pvbki\Enums
 *
 * @method static RuleType STRING()
 * @method static RuleType INT()
 * @method static RuleType FLOAT()
 * @method static RuleType DATETIME()
 * @method static RuleType TRANSLATE()
 * @method static RuleType COLLECTION()
 */
class RuleType extends Enum
{
    public const STRING = 0;
    public const INT = 1;
    public const FLOAT = 2;
    public const DATETIME = 3;
    public const TRANSLATE = 4;
    public const COLLECTION = 5;
}
