<?php

namespace Wearesho\Pvbki\Collections;

use Wearesho\Pvbki\BaseCollection;
use Wearesho\Pvbki\Elements\Address;

/**
 * Class Addresses
 * @package Wearesho\Pvbki\Collections
 */
class Addresses extends BaseCollection
{
    public function type(): string
    {
        return Address::class;
    }
}
