<?php

namespace Wearesho\Pvbki\Collections;

use Wearesho\Pvbki;

/**
 * Class Summaries
 * @package Wearesho\Pvbki\Collections
 */
class Summaries extends Pvbki\Infrastructure\BaseCollection
{
    public function type(): string
    {
        return Pvbki\Elements\Summary::class;
    }
}
