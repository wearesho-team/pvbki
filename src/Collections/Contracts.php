<?php

namespace Wearesho\Pvbki\Collections;

use Wearesho\Pvbki;

/**
 * Class Contracts
 * @package Wearesho\Pvbki\Collections
 */
class Contracts extends Pvbki\Infrastructure\BaseCollection
{
    public function type(): string
    {
        return Pvbki\Elements\Contract::class;
    }
}
