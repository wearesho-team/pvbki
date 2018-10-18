<?php

namespace Wearesho\Pvbki\Collections;

use Wearesho\Pvbki\BaseCollection;
use Wearesho\Pvbki\Elements\Collateral;

/**
 * Class Collaterals
 * @package Wearesho\Pvbki\Collections
 */
class Collaterals extends BaseCollection
{
    public function type(): string
    {
        return Collateral::class;
    }
}
