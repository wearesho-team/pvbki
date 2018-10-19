<?php

namespace Wearesho\Pvbki\Collections;

use Wearesho\Pvbki;

/**
 * Class Collaterals
 * @package Wearesho\Pvbki\Collections
 */
class Collaterals extends Pvbki\Infrastructure\BaseCollection
{
    public function type(): string
    {
        return Pvbki\Elements\Collateral::class;
    }
}
