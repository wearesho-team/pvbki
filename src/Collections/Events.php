<?php

namespace Wearesho\Pvbki\Collections;

use Wearesho\BaseCollection;
use Wearesho\Pvbki;

/**
 * Class Events
 * @package Wearesho\Pvbki\Collections
 */
class Events extends BaseCollection
{
    public function type(): string
    {
        return Pvbki\Elements\Event::class;
    }
}
