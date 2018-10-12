<?php

namespace Wearesho\Pvbki\Collections;

use Wearesho\Pvbki\BaseCollection;
use Wearesho\Pvbki\Elements\Identification;

/**
 * Class IdentificationCollection
 * @package Wearesho\Pvbki\Collections
 */
class IdentificationCollection extends BaseCollection
{
    public function type(): string
    {
        return Identification::class;
    }
}
