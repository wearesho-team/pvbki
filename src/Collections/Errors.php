<?php

namespace Wearesho\Pvbki\Collections;

use Wearesho\BaseCollection;
use Wearesho\Pvbki;

/**
 * Class Errors
 * @package Wearesho\Pvbki\Collections
 */
class Errors extends BaseCollection
{
    public function type(): string
    {
        return Pvbki\Elements\Error::class;
    }
}
