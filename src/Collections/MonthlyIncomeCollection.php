<?php

namespace Wearesho\Pvbki\Collections;

use Wearesho\Pvbki\BaseCollection;
use Wearesho\Pvbki\Elements\MonthlyIncome;

/**
 * Class MonthlyIncomeCollection
 * @package Wearesho\Pvbki\Collections
 */
class MonthlyIncomeCollection extends BaseCollection
{
    public function type(): string
    {
        return MonthlyIncome::class;
    }
}
