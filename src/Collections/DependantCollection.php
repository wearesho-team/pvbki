<?php

namespace Wearesho\Pvbki\Collections;

use Wearesho\Pvbki\BaseCollection;
use Wearesho\Pvbki\Elements\Dependant;

/**
 * Class DependantCollection
 * @package Wearesho\Pvbki\Collections
 */
class DependantCollection extends BaseCollection
{
    public function type(): string
    {
        return Dependant::class;
    }
}
