<?php

namespace Wearesho\Pvbki\Collections;

use Wearesho\Pvbki\BaseCollection;
use Wearesho\Pvbki\Elements\Address;

/**
 * Class AddressCollection
 * @package Wearesho\Pvbki\Collections
 */
class AddressCollection extends BaseCollection
{
    public function type(): string
    {
        return Address::class;
    }
}
