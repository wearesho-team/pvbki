<?php

namespace Wearesho\Pvbki\Collections;

use Wearesho\Pvbki\BaseCollection;
use Wearesho\Pvbki\Elements\Communication;

/**
 * Class CommunicationCollection
 * @package Wearesho\Pvbki\Collections
 */
class CommunicationCollection extends BaseCollection
{
    public function type(): string
    {
        return Communication::class;
    }
}
