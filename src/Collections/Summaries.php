<?php

namespace Wearesho\Pvbki\Collections;

use Wearesho\BaseCollection;
use Wearesho\Pvbki;

/**
 * Class Summaries
 * @package Wearesho\Pvbki\Collections
 */
class Summaries extends BaseCollection
{
    public function type(): string
    {
        return Pvbki\Elements\Summary::class;
    }
}
