<?php

namespace Wearesho\Pvbki\Collections;

use Wearesho\Pvbki\BaseCollection;
use Wearesho\Pvbki\Elements\Collateral;

/**
 * Class CollateralCollection
 * @package Wearesho\Pvbki\Collections
 */
class CollateralCollection extends BaseCollection
{
    public function type(): string
    {
        return Collateral::class;
    }
}
