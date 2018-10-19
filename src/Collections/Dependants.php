<?php

namespace Wearesho\Pvbki\Collections;

use Wearesho\Pvbki;

/**
 * Class Dependants
 * @package Wearesho\Pvbki\Collections
 */
class Dependants extends Pvbki\Infrastructure\BaseCollection
{
    public function type(): string
    {
        return Pvbki\Elements\Dependant::class;
    }
}
