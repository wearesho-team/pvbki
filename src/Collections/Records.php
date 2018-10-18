<?php

namespace Wearesho\Pvbki\Collections;

use Wearesho\Pvbki;

/**
 * Class Records
 * @package Wearesho\Pvbki\Collections
 */
class Records extends Pvbki\BaseCollection
{
    public function type(): string
    {
        return Pvbki\Elements\Record::class;
    }
}
