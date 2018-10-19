<?php

namespace Wearesho\Pvbki\Collections;

use Wearesho\BaseCollection;
use Wearesho\Pvbki;

/**
 * Class Collaterals
 * @package Wearesho\Pvbki\Collections
 */
class Collaterals extends BaseCollection
{
    public function type(): string
    {
        return Pvbki\Elements\Collateral::class;
    }
}
