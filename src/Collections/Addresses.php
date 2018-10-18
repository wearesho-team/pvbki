<?php

namespace Wearesho\Pvbki\Collections;

use Wearesho\Pvbki;

/**
 * Class Addresses
 * @package Wearesho\Pvbki\Collections
 */
class Addresses extends Pvbki\Infrastructure\BaseCollection
{
    public function type(): string
    {
        return Pvbki\Elements\Address::class;
    }
}
