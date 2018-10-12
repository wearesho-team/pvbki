<?php

namespace Wearesho\Pvbki\Colelctions;

use Wearesho\Pvbki\BaseCollection;
use Wearesho\Pvbki\Elements\Error;

/**
 * Class ErrorCollection
 * @package Wearesho\Pvbki\Colelctions
 */
class ErrorCollection extends BaseCollection
{
    public function type(): string
    {
        return Error::class;
    }
}
