<?php

namespace Wearesho\Pvbki\Collections;

use Wearesho\BaseCollection;
use Wearesho\Pvbki;

/**
 * Class MonthlyIncomes
 * @package Wearesho\Pvbki\Collections
 */
class MonthlyIncomes extends BaseCollection
{
    public function type(): string
    {
        return Pvbki\Elements\MonthlyIncome::class;
    }
}
