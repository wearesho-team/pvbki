<?php

namespace Wearesho\Pvbki\Collections;

use Wearesho\Pvbki;

/**
 * Class Identifiers
 * @package Wearesho\Pvbki\Collections
 */
class Identifiers extends Pvbki\BaseCollection
{
    public function type(): string
    {
        return Pvbki\Elements\Identifier::class;
    }
}
