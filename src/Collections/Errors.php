<?php

namespace Wearesho\Pvbki\Collections;

use Wearesho\Pvbki;

/**
 * Class Errors
 * @package Wearesho\Pvbki\Collections
 */
class Errors extends Pvbki\BaseCollection
{
    public function type(): string
    {
        return Pvbki\Elements\Error::class;
    }
}
