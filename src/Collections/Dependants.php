<?php

namespace Wearesho\Pvbki\Collections;

use Wearesho\BaseCollection;
use Wearesho\Pvbki;

/**
 * Class Dependants
 * @package Wearesho\Pvbki\Collections
 */
class Dependants extends BaseCollection
{
    public function type(): string
    {
        return Pvbki\Elements\Dependant::class;
    }
}
