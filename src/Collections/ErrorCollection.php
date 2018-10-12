<?php

namespace Wearesho\Pvbki\Collections;

use Wearesho\Pvbki\BaseCollection;
use Wearesho\Pvbki\Elements\Error;

/**
 * Class ErrorCollection
 * @package Wearesho\Pvbki\Collections
 */
class ErrorCollection extends BaseCollection
{
    public function type(): string
    {
        return Error::class;
    }
}
