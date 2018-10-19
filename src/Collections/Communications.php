<?php

namespace Wearesho\Pvbki\Collections;

use Wearesho\BaseCollection;
use Wearesho\Pvbki;

/**
 * Class Communications
 * @package Wearesho\Pvbki\Collections
 */
class Communications extends BaseCollection
{
    public function type(): string
    {
        return Pvbki\Elements\Communication::class;
    }
}
