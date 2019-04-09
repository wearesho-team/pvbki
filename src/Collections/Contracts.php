<?php

declare(strict_types=1);

namespace Wearesho\Pvbki\Collections;

use Wearesho\BaseCollection;
use Wearesho\Pvbki;

/**
 * Class Contracts
 * @package Wearesho\Pvbki\Collections
 */
class Contracts extends BaseCollection
{
    public function type(): string
    {
        return Pvbki\Elements\Contract::class;
    }
}
