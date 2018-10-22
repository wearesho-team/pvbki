<?php

namespace Wearesho\Pvbki\Collections;

use Wearesho\Pvbki\Infrastructure\BaseCollection;
use Wearesho\Pvbki\Rule;

/**
 * Class RuleCollection
 * @package Wearesho\Pvbki\Collections
 */
class RuleCollection extends BaseCollection
{
    public function type(): string
    {
        return Rule::class;
    }
}
