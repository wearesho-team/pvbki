<?php

namespace Wearesho\Pvbki\Collections;

use Wearesho\Pvbki;

/**
 * Class MonthlyIncomes
 * @package Wearesho\Pvbki\Collections
 */
class MonthlyIncomes extends Pvbki\BaseCollection
{
    public function type(): string
    {
        return Pvbki\Elements\MonthlyIncome::class;
    }
}
