<?php

namespace Wearesho\Pvbki\Collections;

use Wearesho\BaseCollection;
use Wearesho\Pvbki;

/**
 * Class Addresses
 * @package Wearesho\Pvbki\Collections
 */
class Addresses extends BaseCollection
{
    public function type(): string
    {
        return Pvbki\Elements\Address::class;
    }
}
