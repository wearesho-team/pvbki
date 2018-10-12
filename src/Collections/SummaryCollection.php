<?php

namespace Wearesho\Pvbki\Collections;

use Wearesho\Pvbki\BaseCollection;
use Wearesho\Pvbki\Elements\Summary;

/**
 * Class SummaryCollection
 * @package Wearesho\Pvbki\Collections
 */
class SummaryCollection extends BaseCollection
{
    public function type(): string
    {
        return Summary::class;
    }
}
