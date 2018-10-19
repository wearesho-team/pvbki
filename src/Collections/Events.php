<?php

namespace Wearesho\Pvbki\Collections;

use Wearesho\Pvbki;

/**
 * Class Events
 * @package Wearesho\Pvbki\Collections
 */
class Events extends Pvbki\Infrastructure\BaseCollection
{
    public function type(): string
    {
        return Pvbki\Elements\Event::class;
    }
}
